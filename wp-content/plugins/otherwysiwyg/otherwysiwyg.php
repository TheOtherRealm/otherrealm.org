<?php
/**
 * Plugin Name: other-wysiwyg
 * Version: 1.0.0
 * Author: Aaron E-J
 * Author URI: https://otherrealm.org
 * License:           GNU General Public License Version 2
 * License URI:       https://www.gnu.org/licenses/agpl-3.0.html
 */
/*
  Created		: Feb 2, 2020, 12:38:19 PM
  Author		: Aaron E-J <the at otherrealm.org>
  Copyright(C): 2020 Other Realm
  This program is free software: you can redistribute it and/or modify
  it under the terms of the latest version of the GNU General Public License as published by
  the Free Software Foundation, using at least version 2.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU Affero General Public License for more details: <https://www.gnu.org/licenses/agpl-3.0.html>.
 */
class OtherWysiwyg {
	
}
if (current_user_can('edit_posts') || current_user_can('edit_pages')) {
	function setup_otherwysiwyg() {
		wp_create_nonce('wysiwyg_editor_plugin');
		wp_enqueue_script('tinymce', plugins_url('js/tinymce/js/tinymce/tinymce.min', __FILE__), array('jquery'));
		wp_enqueue_script('otherwysiwyg', plugins_url('js/otherwysiwyg.js', __FILE__), array('jquery'));
		$post_nonce = wp_create_nonce('post_nonce');
		wp_localize_script('otherwysiwyg', 'wysiwyg_editor_plugin', array('post_body' => 'otherwysiwyg.js', 'nonce' => $post_nonce));
	}
	add_action('init', 'setup_otherwysiwyg');
	function takedown_otherwysiwyg() {
		wp_deregister_script(plugins_url('js/tinymce/js/tinymce/tinymce.min', __FILE__));
		wp_deregister_script(plugins_url('js/otherwysiwyg.js', __FILE__));
	}
	add_action(takedown_otherwysiwyg());
	function uninstall_otherwysiwyg() {
		
	}
	add_action(uninstall_otherwysiwyg());
	add_action('wp_ajax_post_nonce', 'the_ajax_handler');
	function the_ajax_handler() {
		check_ajax_referer('post_nonce');
		$post_id = wp_update_post($_POST['post_body']);
		if (is_wp_error($post_id)) {
			$errors = $post_id->get_error_messages();
			foreach ($errors as $error) {
				echo $error;
			}
		}
		wp_die(); // all ajax handlers should die when finished
	}
	register_activation_hook(__FILE__, 'setup_otherwysiwyg');
	register_deactivation_hook(__FILE__, 'takedown_otherwysiwyg');
	register_uninstall_hook(__FILE__, 'uninstall_otherwysiwyg');
} else {
	die;
}