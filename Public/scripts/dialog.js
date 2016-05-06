$(function() {

	// add category dialog
	var dialog = document.querySelector("#dialog-add");
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



function editCategory(id) {

	$.post('/Admin/Category/findCategoryById', {'id': id}, function(data, status) {

		console.log(data);

		$("#edit-title").val(data.name);
		$("#edit-description").val(data.description);
		$("#edit-viewfile").val(data.location);
		$("#edit-id").val(data.id);

		var dialog = document.querySelector("#dialog-edit");
		var closeDialogButton = document.querySelector(".close-edit");
		if (!dialog.showModal) {
			dialogPolyfill.registerDialog(dialog);
		}
		closeDialogButton.addEventListener("click", function() {
			dialog.close();
		});
		dialog.showModal();
	});


}