(function () {
	$("#category").change(function () {
			if($("#category option:selected")[0]['text'] === 'New category') {
				$("#new_category").show();
			} else {
				$("#new_category").hide();
			}
		}).change();
})();