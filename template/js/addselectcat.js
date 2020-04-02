$(function () {
	$("#selectCategory").select2({placeholder: "Select category"});
	$('#selectCategory').on('change', function () {
		const category = $(this).val();
		let loc = "";
		if (category) {
			loc = $(location).attr('href').replace('add', '');
			window.location =   loc + category + "/add";
		}
		return false;
	});
});



