<?php 
include('header.php');
include('issues_backend.php');

// Checks if the key is requested or set
if (!empty($_REQUEST['key']) && isset($_REQUEST['key'])) {
	$key = $_REQUEST['key'];
}

// Insert Data Verification
if (isset($_REQUEST['insert'])) {
	extract($_REQUEST);
	if ($issues->insertData($issue_concern, $description, $module_location, $date_reported, $status, $user, $qa_in_charge, $cas_reference_no, $date_closed, $reason_of_error, $remarks, "issues")) {
		header("location:issues.php");
	}
}

// Update Data Verification
if (isset($_REQUEST['update'])) {
	extract($_REQUEST);
	if ($issues->updateData($id, $issue_concern, $description, $module_location, $date_reported, $status, $user, $qa_in_charge, $cas_reference_no, $date_closed, $reason_of_error, $remarks, "issues")) {
		header("location:issues.php");
	}
}

// Delete Data
if (isset($_REQUEST['del_id'])) {
	if ($nissan->deleteData($_REQUEST['del_id'], "issues")) {
		header("location:issues.php");
	}
}
?>

<!-- Modal for delete -->
<div class="modal fade" id="issue_delete_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body">
				<a href="#" class="btn btn-danger btn-ok">Delete</a>
				<a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal for udpate -->
<div class="modal fade" id="issue_dialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Issues</h4>
			</div>
			<div class="modal-body">
				<form class="form-group" id="issues_form" action="issues.php" method="POST">
					<input type="hidden" name="id" value="">
					<table width="400" class="table-bordered table-custom">
						<tr>
							<th>Issue Concern</th>
							<td><input class="form-control" type="text" name="issue_concern" value=""></td>
						</tr>
						<tr>
							<th>Description</th>

							<td><textarea class="form-control" name="description" rows="3"></textarea></td>
						</tr>
						<tr>
							<th>Module Location</th>
							<td>
							<select name="myselect" id="" class="form-contol" name=""></select>
								<?php 
								$module_location = $issues->getModule("eric_module");
								echo '<select id="myselect" class="form-control" name="module_location"><option value="11">Select Module</option>';
								foreach($module_location as $m) {
									extract($m);
									echo "<option value='$id'>$module</option>";
								}
								echo '</select>';
								?>
							</td>
						</tr>
						<tr>
							<th>Date Reported</th>
							<td><input class="form-control"  type="date" name="date_reported" value=""></td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								<select name="status" class="form-control" id="status">
									<option value="1">Open</option>
									<option value="0">Closed</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>User</th>
							<td>
								<!-- <input class="form-control"  type="text" name="user" value=""> -->
								<select name="user" id="myselect" class="form-control">
									<?php 
									$emp = $employee->showEmployee("employee");
									foreach($emp as $e) {
										extract($e);
										echo "<option value='$id'>$f_name $mi $l_name</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<th>QA in Charge</th>
							<td><input class="form-control"  type="text" name="qa_in_charge" value=""></td>
						</tr>
						<tr>
							<th>CAS Reference No</th>
							<td><input class="form-control"  type="text" name="cas_reference_no" value=""></td>
						</tr>
						<tr>
							<th>Date Closed</th>
							<td><input class="form-control"  type="date" name="date_closed" value=""></td>
						</tr>
						<tr>
							<th>Reason of Error</th>
							<td><input class="form-control"  type="text" name="reason_of_error" value=""></td>
						</tr>
						<tr>
							<th>Remarks</th>
							<td><textarea class="form-control" name="remarks" rows="3" value=""></textarea></td>
						</tr>
						<tr>
							<td id="td_update"><input type="submit" name="insert" value="Insert" class="btn btn-primary"></td>
							<td><button class="btn btn-danger"><a href="issues.php">Cancel</a></button></td>
						</tr>
					</table>
				</form>
			</div>
<!-- 			<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="button" id="submitForm" class="btn btn-default">Send</button>
</div> -->
</div>
</div>
</div>

<script>
	/*Must apply only after HTML has loaded*/
	// $(document).ready(function () {
		(function ($) {	
			$('#issue_delete_form').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
			});


			$.fn.selectEmp = function (options) {
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

				var opts = $.extend({}, $.fn.selectEmp.defaults, options);

				var idDiv = this.attr('id') + 'searchselectEmp';
				var idInput = this.attr('id') + 'searchselectEmp_Input';
				var idClose = this.attr('id') + 'searchselectEmp_Times';
				var idDown = this.attr('id') + 'searchselectEmp_Caret_Down';
				var idList = this.attr('id') + 'searchselectEmp_List';
				var idListLi = this.attr('id') + 'searchselectEmp_List_LI';

				var selectorDiv = '#' + this.attr('id') + 'searchselectEmp';
				var selectorInput = '#' + this.attr('id') + 'searchselectEmp_Input';
				var selectorClose = '#' + this.attr('id') + 'searchselectEmp_Times';
				var selectorDown = '#' + this.attr('id') + 'searchselectEmp_Caret_Down';
				var selectorList = '#' + this.attr('id') + 'searchselectEmp_List';
				var selectorListLi = '#' + this.attr('id') + 'searchselectEmp_List_LI';

				var buildELement = $('<div class="searchselectEmp" id="' + idDiv + '" style="text-align:left;"><input class="form-control" placeholder="' + opts.placeholder + '" value="' + opts.defaultvalue + '" id="' + idInput + '"><span class="fa fa-times searchselectEmp_Times" id="' + idClose + '"></span><span class="fa fa-caret-down searchselectEmp_Caret_Down" id="' + idDown + '"></span></div>');

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
                $(selectorInput).after('<ul id="' + idList + '" class="searchselectEmp_List" style="z-index:' + opts.zIndex + '"></ul>');

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

    $.fn.selectEmp.defaults = {
    	placeholder: "",
    	zIndex: 1,
    	defaultvalue: "",
    	width: 0,
    	widthList: 0
    };

}(jQuery));

$(document).ready(function(e) {
	$('#selectEmployeeList').selectEmp({width: 260, placeholder: 'Select Employee', zIndex: 100});
})
</script>