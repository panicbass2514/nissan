<?php
// $name = 'Peter';
// $a = 1;
// $b = 2;
// $str = <<<'FOO'
// My name is: '$name' The result is: "$a + $b"
// FOO;

// echo $str;
?>
<link rel="icon" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/nissan_favicon.png">
<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/navbar-fixed-side.css" type="text/css" rel="stylesheet">
<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/custom.css" type="text/css" rel="stylesheet">
<!--   <link href="<?php //echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/inventory.css" type="text/css" rel="stylesheet"> -->
<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/custom.js"></script>

<style>
	/* START SELECT3.css */
	.searchSelect3 {
		position: relative;
		color: #000;
		margin-bottom: 10px;
		/*font-size: 16px;*/
	}

	.searchSelect3_Input {
		width: 250px;
		height: 32px;
		background: #fcfcfc;
		border: 1px solid #aaa;
		border-radius: 5px;
		text-indent: 10px;
		padding-right: 20px;
		width: 200px;

		/*font: 200 16px/1.5 Helvetica, Verdana, sans-serif;*/
	}

	.searchSelect3_Caret_Down {
		position: absolute;
		top: 10px;
		left: 180px;
		cursor: pointer;
	}

	.searchSelect3_Times {
		position: absolute;
		top: 10px;
		left: 210px;
		cursor: pointer;
		display: none;
	}

	.searchSelect3_List {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: auto;
		overflow-x: hidden;
		height: 20em;
		width: 250px;
		position: absolute;
	}

	.searchSelect3_List li {
		list-style-type: none;
		background: #ffffff;
		color: #000000;
		/*font: 200 16px/1.5 Helvetica, Verdana, sans-serif;*/
		border-bottom: 1px solid #ccc;
	}

	.searchSelect3_List li:hover {
		cursor: pointer;
		background: #f940a0;
		color: #ffffff;
	}


	.searchSelect3_List li label {
		padding: 0.5em;
		cursor: pointer;
	}

	.searchSelect3_List li:hover label {
		color: #ffffff;
	}

	.searchSelect3_Input::-ms-clear {
		display: none;
		width: 0;
		height: 0;
	}

	.searchSelect3_Input::-ms-reveal {
		display: none;
		width: 0;
		height: 0;
	}

	.searchSelect3_Input::-webkit-search-decoration,
	.searchSelect3_Input::-webkit-search-cancel-button,
	.searchSelect3_Input::-webkit-search-results-button,
	.searchSelect3_Input::-webkit-search-results-decoration {
		display: none;
	}
	/* END SELECT3.css */

	#wrapper{
		margin-top: 20px;
		margin-left: 300px;

	}
</style>
<div id="wrapper">
	<select id="selectBankList" >
		<option value="BCA"></option>
		<option value="BNI"></option>
		<option value="BRI"></option>
	</select>

	<select id="selectDescription" >
		<option value="Designer is a art, art of design. a good design is a innovative design and must always fresh wih the new innovation"></option>
		<option value="Programmer thingking logically , learn the code and make button on the web can process something"></option>
	</select>
	<p>twas brilig</p>
</div>


<script>
	
	/* START select3.js */
/*
Creditor: Deky
Last Date Modified: 25 April 2016
Purpose: Transform SELECT TAG HTML to SEARCH TEXTBOX + LISTBOX
Required: JQUERY
Required: FOUNDATION
Required: FONT AWESOME ICON
Inspiration: https://select2.github.io/
*/
/*
Creditor: Deky
Last Date Modified: 25 April 2016
Purpose: Transform SELECT TAG HTML to SEARCH TEXTBOX + LISTBOX
Required: JQUERY
Required: FOUNDATION
*/
(function ($) {

	$.fn.select3 = function (options) {
		var dataItems = [];
		var selectorID = '#' + this.attr('id');

		$(selectorID).find('option').each(function (index, element) {

			if (element.text != '') {
				dataItems.push(element.text.trim());
			}
			else {
				dataItems.push(element.value.trim());
			}

		});

		var opts = $.extend({}, $.fn.select3.defaults, options);

		var idDiv = this.attr('id') + 'searchSelect3';
		var idInput = this.attr('id') + 'searchSelect3_Input';
		var idClose = this.attr('id') + 'searchSelect3_Times';
		var idDown = this.attr('id') + 'searchSelect3_Caret_Down';
		var idList = this.attr('id') + 'searchSelect3_List';
		var idListLi = this.attr('id') + 'searchSelect3_List_LI';

		var selectorDiv = '#' + this.attr('id') + 'searchSelect3';
		var selectorInput = '#' + this.attr('id') + 'searchSelect3_Input';
		var selectorClose = '#' + this.attr('id') + 'searchSelect3_Times';
		var selectorDown = '#' + this.attr('id') + 'searchSelect3_Caret_Down';
		var selectorList = '#' + this.attr('id') + 'searchSelect3_List';
		var selectorListLi = '#' + this.attr('id') + 'searchSelect3_List_LI';

		var buildELement = $('<div class="searchSelect3" id="' + idDiv + '" style="position:relative;"><input class="searchSelect3_Input" placeholder="' + opts.placeholder + '" value="' + opts.defaultvalue + '" id="' + idInput + '"><span class="fa fa-times searchSelect3_Times" id="' + idClose + '"></span><span class="fa fa-caret-down searchSelect3_Caret_Down" id="' + idDown + '"></span></div>');

		if ($(selectorDiv).length > 0) {
			$(selectorDiv).remove();
		}

		this.after(buildELement);

		if (opts.width > 0) {
			$(selectorInput).css('width', opts.width);
			$(selectorDown).css('left', (opts.width - 20));
			$(selectorClose).css('left', (opts.width - 40));
		}


		var cache = {};
		var drew = false;
		this.hide();



		$(document).on('click', function (e) {
            //untuk menghilangkan list saat unfocus
            if ($(e.target).parent().is("li[id*='" + idListLi + "']") == false) {
            	if ($(e.target).attr('id') != idInput && $(e.target).attr('id') != idDown) {
            		$(selectorList).empty();
            		$(selectorList).css('z-index', -1);
            		$(selectorClose).hide();
            	}
            }

            

        });




		var showList = function (query, valuee) {



            //Check if we've searched for this term before
            if (query in cache) {
            	results = cache[query];
            } else {
                //Case insensitive search for our people array
                var results = $.grep(dataItems, function (item) {
                	return item.search(RegExp(query, "i")) != -1;
                });

                //Add results to cache
                cache[query] = results;
            }

            //First search
            $(selectorList).css('z-index', opts.zIndex);


            if (drew == false) {
                //Create list for results
                $(selectorInput).after('<ul id="' + idList + '" class="searchSelect3_List" style="z-index:' + opts.zIndex + '"></ul>');

                if (opts.width > 0) {

                	$(selectorList).css('width', opts.width);

                }

                if (opts.widthList > 0)
                {
                	$(selectorList).css('width', opts.widthList);
                }

                //Prevent redrawing/binding of list
                drew = true;

                //Bind click event to list elements in results
                $(selectorList).on("click", "li", function () {
                	var nilai = $(this).text()
                	$(selectorInput).val(nilai);
                	$(selectorID).val(nilai);
                	$(selectorList).empty();
                	$(selectorClose).show();
                	$(selectorList).css('z-index', -1);
                	$(selectorID).change();
                });


            }
                //Clear old results
                else {
                	$(selectorList).empty();
                }

                var counter = 0;
            //Add results to the list
            for (term in results) {
            	counter++;
            	$(selectorList).append("<li id=" + idListLi + counter + "><label>" + results[term] + "</label></li>");
            }


            

        };



        $(selectorInput).on('click', function (e) {
        	var query = $(this).val();

        	showList('', query);


        	$(selectorClose).hide();
        	if (query.length > 0) {
        		$(selectorClose).show();
        	}

        });

        $(selectorInput).on('keyup', function (e) {
        	$(selectorList).empty();
        	var query = $(selectorInput).val();
        	showList(query, query);

        	$(selectorClose).hide();
        	if (query.length > 0) {
        		$(selectorClose).show();
        	}

        	$(selectorID).change();
        });

        //bila key tab di tekan maka akan pindah ke DOM lain, maka dari itu mesti di HIDE LIST nya
        $(selectorInput).on('keydown', function (e) {
        	if (e.which == 9) {
        		$(selectorList).empty();
        		$(selectorList).css('z-index', -1);
        		$(selectorClose).hide();
        	}
        });

        $(selectorDown).on('click', function (e) {
        	var query = $(this).val();
        	if ($(selectorList).find('li').length == 0) {
        		showList('', query);
        	}
        	else {
                //$(selectorList).css('z-index', -1);
                $(selectorList).empty();
                $(selectorList).css('z-index', -1);
            }

            $(selectorClose).hide();
            if (query.length > 0) {
            	$(selectorClose).show();
            }

        });

        $(selectorClose).on('click', function (e) {
        	$(selectorInput).val('');
        	$(selectorClose).hide();
        	$(selectorID).change();

        });


        return this;
    };

    $.fn.select3.defaults = {
    	placeholder: "",
    	zIndex: 1,
    	defaultvalue: "",
    	width: 0,
    	widthList: 0
    };

}(jQuery));
/* END select3.js */


$(document).ready(function(e){

	$('#selectBankList').select3({ width: 260, placeholder: 'Pilih Metode Pelunasan', zIndex: 100 });  

	$('#selectDescription').select3({ width: 400, placeholder: 'Pilih Description', zIndex: 100, widthList:800 });  


});

</script>