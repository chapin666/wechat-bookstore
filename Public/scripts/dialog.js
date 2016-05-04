$(function() {

	// add category dialog
	var dialog = document.querySelector("dialog");
	var addDialogButton = document.querySelector("#add-dialog");
	var closeDialogButton = document.querySelector(".close");
	if (!dialog.showModal) {
		dialogPolyfill.registerDialog(dialog);
	}
	addDialogButton.addEventListener("click", function() {
		dialog.showModal();
	});
	closeDialogButton.addEventListener("click", function() {
		dialog.close();
	});



});