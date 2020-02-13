/*
 Copyright (C) 2019 Aaron E-J!
 
 This program is free software: you can redistribute it and/or modify
 it under the terms of the latest version of The GNU Affero General Public License
 as published by the Free Software Foundation, or at least version 3.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the text of The GNU Affero General Public License
 for more details: <https://www.gnu.org/licenses/agpl-3.0.txt>.
 */
(function () {
	var doesItShow = false;
//	console.log($('.menu,.menu>*').css('display'));
	$(document).ready(function ($) {
		var today = new Date();
		$('#year').html(today.getFullYear());
//		console.log($('.menu,.menu>*').css('display'));
		$(window).resize(function () {
//			if ($('#content').width() < 700) {
//				console.log('<800');
//				$('.menu').css('position', 'absolute');
//				$('.menu,.menu>*').css('display', 'none');
//			} else {
//				console.log('>800');
//				$('.menu').css('position', 'reletive');
//				$('.menu,.menu>*').css('display', 'block');
//			}
		});
//		if ($('#content').width() < 700) {
//			console.log('<800');
//			$('.menu').css('position', 'absolute');
//			$('.menu,.menu>*').css('display', 'none');
//		} else {
//			console.log('>800');
//			$('.menu').css('position', 'reletive');
//			$('.menu,.menu>*').css('display', 'block');
//		}
		$('#contactTheOtherRealm').click(function () {
			$.post('http://10.0.0.11/otherrealm.org/wp-content/themes/otherrealm/inc/contacttheotherrealm.php?simplewaytopreventspam=1dft334rfgb54t43wb645e4trf4g5654e5rf34v567ju5e64yega5b65eu6i8jrhya34WT5Y67J~``~', function (data) {
				// console.log(data);
				$('#contactTheOtherRealm').attr({
					href: "mailto:" + data
				});
				$('#contactTheOtherRealm').text('Click for email »');
			}).done(function (data) {
				// console.log(data);
			}).fail(function () {
				console.log("fail");
			}).always(function () {
				// console.log("always");
			});
		});
		$('#menubar').click(function () {
			doesItShow = !doesItShow;
			console.log(doesItShow);
			if ($('.menu,.menu>*').css('display') === 'none') {
				console.log($('.menu,.menu>*').css('display'));
				$('.menu,.menu>*').css('display', 'block');
			} else {
				console.log($('.menu,.menu>*').css('display'));
				$('.menu,.menu>*').css('display', 'none');
			}
			;
		});
//		var mainBodyConfig = {
//			selector: '#main',
//			inline: true,
//			plugins: [
//				'lists',
//				'powerpaste',
//				'autolink'
//			],
//			toolbar: [
//				'undo redo | bold italic underline | fontselect fontsizeselect',
//				'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
//			],
//			powerpaste_word_import: 'clean',
//		};
//		tinymce.init(mainBodyConfig);
	});
//	console.log($('.fm-form-container'));
	$('.fm-form-container').css('display', 'block');
})(jQuery);

