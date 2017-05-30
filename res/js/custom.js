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
			location.reload();
		}
	});

	$('.search-supplier input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if (inputVal.length) {
			$.get("http://localhost/nissan/view/supplier_backend.php", {key: inputVal}).done(function(data){
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
			$.get("http://localhost/nissan/view/issues_backend.php", {key: inputVal}).done(function(data){
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
			$.get("http://localhost/nissan/view/employee_backend.php", {key: inputVal}).done(function(data){
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
			$.get("http://localhost/nissan/view/inventory_backend.php", {key: inputVal}).done(function(data) {
				resultDropdown.html(data);
			});
		} else {
			location.reload();

		}
	});
});





