
/*$(document).ready(function() {

	$('.search-box input[type="text"').on("keyup input", function() {
		// Get input value on change
		var inputVal = $(this).val();
		var resultDropdown = $(".result");
		if (inputVal.length) {
			$.get("http://localhost/nissan/backend-search.php", {term: inputVal}).done(function(data) {
        // Display the return data in browser
        resultDropdown.html(data);
    }
    ); 
		} else {
			resultDropdown.empty();
		}
	});

  // Set search input value on click of result item
  $(document).on("click", ".result p", function() {
    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
    $(this).parent(".result").empty();
});
});*/


$(document).ready(function() {
	$('.search-box input[type="text"').on("keyup input", function() {
		var inputVal = $(this).val();
		var resultDropdown = $(".result");

		if (inputVal.length) {
			$.get("http://localhost/nissan/view/backend-search.php", {key: inputVal}).done(function(data){
				resultDropdown.html(data);
			});
			/*$.get("backend-search.php", {term: inputVal}).done(function(data){
				resultDropdown.html(data);
			});*/
		} else {
			$.get("http://localhost/nissan/view/backend-search.php").done(function(data){
				resultDropdown.html(data);	
			})
			
		}
	});
});