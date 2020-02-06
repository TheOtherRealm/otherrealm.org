<?php
/**
 * Plugin Name: wysiwyg
 * Version: 1.0.0
 * Author: Aaron E-J
 * Author URI: https://otherrealm.org
 * License:           GNU Affero General Public License Version 3
 * License URI:       https://www.gnu.org/licenses/agpl-3.0.html
 */
/*
  Created		: Feb 2, 2020, 12:38:19 PM
  Author		: Aaron E-J <the at otherrealm.org>
  Copyright(C): 2020 Other Realm LLC
  This program is free software: you can redistribute it and/or modify
  it under the terms of the latest version of the GNU Affero General Public License as published by
  the Free Software Foundation, using at least version 3.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU Affero General Public License for more details: <https://www.gnu.org/licenses/agpl-3.0.html>.
 */
register_activation_hook( __FILE__, 'setup_wysiwyg' );
register_deactivation_hook( __FILE__, 'takedown_wysiwyg' );
register_uninstall_hook(__FILE__, 'uninstall_wysiwyg');
plugins_url( 'myscript.js', _FILE_ );