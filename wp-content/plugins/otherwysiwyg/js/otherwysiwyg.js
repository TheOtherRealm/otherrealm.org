/*
 Created		: Feb 6, 2020, 12:07:22 PM
 Author		: Aaron E-J <the at otherrealm.org>
 Copyright(C): 2020 Other Realm
 This program is free software: you can redistribute it and/or modify
 it under the terms of the latest version of the GNU  General Public License as published by
 the Free Software Foundation, using at least version 2.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details: <http://www.gnu.org/licenses/>.
 */
(function () {
	$(document).ready(function ($) {
		var mainBodyConfig = {
			selector: '#main',
			inline: true,
			plugins: [
				'lists',
				'powerpaste',
				'autolink'
			],
			toolbar: [
				'undo redo | bold italic underline | fontselect fontsizeselect',
				'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
			],
			powerpaste_word_import: 'clean',
		};
		tinymce.init(mainBodyConfig);

		$("#main").change(function () {             //event
			var this2 = this;                      //use in callback
			$.post(wysiwyg_editor_plugin.ajax_url, {//POST request
				_ajax_nonce: wysiwyg_editor_plugin.nonce, //nonce
				action: "post_body", //action
				content: this.value                  //data
			}, function (data) {                    //callback
				this2.css('border','red');           //insert server response
			});
		});
	});
});