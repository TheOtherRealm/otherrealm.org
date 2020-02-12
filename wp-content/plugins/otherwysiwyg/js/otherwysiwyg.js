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
	jQuery(document).ready(function ($) {
		let mainBodyConfig = {
			selector: '.entry-content',
			inline: true,
			plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
			imagetools_cors_hosts: ['picsum.photos'],
			menubar: 'file edit view insert format tools table help',
			browser_spellcheck: true,
			toolbar: [
				'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl'
			],
			powerpaste_word_import: 'clean',
			mobile: {
				menubar: true
			},
			setup: function (editor) {
				editor.on('init', function (e) {
					editor.focus();
				});
				editor.on('blur', function (e) {
					editor.remove();
					return false;
				});
			}
		};
		function createEditor(id) {
			var ed = new tinymce.Editor(id, mainBodyConfig, tinymce.EditorManager);
			ed.render();
			console.log(tinymce.editors);
		}
//		$(document).on('focusin', function (e) {
//			if ($(e.target).closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
//				e.stopImmediatePropagation();
//			}
//		});
		$(".entry-content").attr('id',"tinymceEditContent");
		$('<button id="tinymceEdit">Edit/Save</button>').appendTo(document.body);
		$("#tinymceEdit").on('click', function () {
			console.log($('.tinymceEdit').text());
			createEditor('tinymceEditContent');
//			if (!isEditActive) {
//			} else {
//			var ed = new tinymce.Editor('.tinymceEdit', mainBodyConfig, tinymce.EditorManager);
//			ed.render();
//			var this2 = $('.entry-content');
////			console.log(this2.html());
//			$.post(wysiwyg_editor_plugin.ajax_url, {
//				_ajax_nonce: wysiwyg_editor_plugin.nonce,
//				action: "post_body",
//				content: this2.html()
//			}, function (data) {
//				console.log(tinymce);
//			}).done(function (d) {
////				console.log(d);
//			}).fail(function (d) {
//				console.log(d);
//			});
////			}
		});
	});
})(jQuery);