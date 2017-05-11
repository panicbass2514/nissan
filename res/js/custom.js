/*Workstation Backend Query*/

$(document).ready(function() {
	$('.search-workstation input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if (inputVal.length) {
			$.get("http://localhost/nissan/view/workstation_backend.php", {key: inputVal}).done(function(data){
				resultDropdown.html(data);
			});
		} else {
			$.get("http://localhost/nissan/view/workstation_backend.php").done(function(data) {
				resultDropdown.html(data);
			});
		}
	});

	$('.search-issues input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if (inputVal.length) {
			$.get("http://localhost/nissan/view/issues_backend.php", {key: inputVal}).done(function(data){
				resultDropdown.html(data);
			});
		} else {
			$.get("http://localhost/nissan/view/issues_backend.php").done(function(data) {
				resultDropdown.html(data);
			});
		}
	});

	$('.search-employee input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if (inputVal.length) {
			$.get("http://localhost/nissan/view/employee_backend.php", {key: inputVal}).done(function(data){
				resultDropdown.html(data);
			});
		} else {
			$.get("http://localhost/nissan/view/employee_backend.php").done(function(data) {
				resultDropdown.html(data);
			});
		}
	});

	$('.search-inventory input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if(inputVal.length) {
			$.get("http://localhost/nissan/view/inventory_backend.php", {key: inputVal}).done(function(data) {
				resultDropdown.html(data);
			});
		} else {
			$.get("http://localhost/nissan/view/inventory_backend.php").done(function(data) {
				resultDropdown.html(data);	
			});

		}
	});
});
/*// Set search input value on click of result item
  $(document).on("click", ".result p", function() {
    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
    $(this).parent(".result").empty();*/