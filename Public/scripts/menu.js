$(function() {
	$('ul').find('a').on('click', function () {
		$(this).closest('ul').find('a').removeClass('ui-btn-active');
		$(this).addClass('ui-btn-active');
	});
});