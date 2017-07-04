/*Workstation Backend Query*/

$(document).ready(function() {
	
	// Search Sripts
	$('.search-workstation input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if (inputVal.length) {
			$.get(localhost+"/view/workstation_backend.php", {key: inputVal}).done(function(data){
				resultDropdown.html(data);
			});
		} else {
			location.reload();
		}
	});

	$('.search-supplier input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if (inputVal.length) {
			$.get(localhost+"/view/supplier_backend.php", {key: inputVal}).done(function(data){
				resultDropdown.html(data);
			});
		} else {
			location.reload();
		}
	});

	$('.search-issues input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if (inputVal.length) {
			$.get(localhost+"/view/issues_backend.php", {key: inputVal}).done(function(data){
				resultDropdown.html(data);
			});
		} else {
			location.reload();
		}
	});

	$('.search-employee input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if (inputVal.length) {
			$.get(localhost+"/view/employee_backend.php", {key: inputVal}).done(function(data){
				resultDropdown.html(data);
			});
		} else {
			location.reload();
		}
	});

	$('.search-inventory input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if(inputVal.length) {
			$.get(localhost+"/view/inventory_backend.php", {key: inputVal}).done(function(data) {
				resultDropdown.html(data);
			});
		} else {
			location.reload();

		}
	});
});





