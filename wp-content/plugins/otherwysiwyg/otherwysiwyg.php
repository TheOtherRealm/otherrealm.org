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
  GNU General Public License for more details: <https://www.gnu.org/licenses/agpl-3.0.html>.
 */
class OtherWysiwyg {
	
}
//$user=get_current_user();

function setup_otherwysiwyg() {
	if (current_user_can('edit_others_posts')) {
		wp_enqueue_style('otherwysiwygcss', plugins_url('/css/otherwysiwyg.css',__FILE__));
		wp_enqueue_script('tinymce', plugins_url('js/tinymce/js/tinymce/tinymce.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('tinymcejquery', plugins_url('js/tinymce/js/tinymce/jquery.tinymce.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('otherwysiwyg', plugins_url('js/otherwysiwyg.js', __FILE__), array('jquery'));
		$post_nonce = wp_create_nonce('post_nonce');
		wp_localize_script('otherwysiwyg', 'wysiwyg_editor_plugin', 
			array('ajax_url' => admin_url('admin-ajax.php'), 'nonce' => $post_nonce));
	}
}
add_action('init', 'setup_otherwysiwyg');
function takedown_otherwysiwyg() {
	wp_deregister_script(plugins_url('js/tinymce/js/tinymce/tinymce.min', __FILE__));
	wp_deregister_script(plugins_url('js/otherwysiwyg.js', __FILE__));
}
//add_action(takedown_otherwysiwyg());
function uninstall_otherwysiwyg() {
	
}
//	add_action(uninstall_otherwysiwyg());
add_action('wp_ajax_post_body', 'the_ajax_handler');
function the_ajax_handler() {
	check_ajax_referer('post_nonce');
	$url     = wp_get_referer();
	$theID = url_to_postid( $url ); 
	$thePost = array(
	  'ID'=>$theID,
	  'post_content'=>$_POST['content']
	);
	$post_id = wp_update_post($thePost, true);
	echo '$post_id='.$theID;
	if (is_wp_error($post_id)) {
		$errors = $post_id->get_error_messages();
		foreach ($errors as $error) {
			echo $error;
		}
	}
//	} else {
//		echo "_POST['content']".check_ajax_referer('post_nonce');//. $_POST['content'];
//	}
	wp_die(); // all ajax handlers should die when finished
}
register_activation_hook(__FILE__, 'setup_otherwysiwyg');
register_deactivation_hook(__FILE__, 'takedown_otherwysiwyg');
register_uninstall_hook(__FILE__, 'uninstall_otherwysiwyg');
