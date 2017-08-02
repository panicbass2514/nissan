<?php 

// include('evaluation_backend.php');


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Performance Evaluation Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/nissan_favicon.png">
	<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/bootstrap.css" type="text/css" rel="stylesheet">
	<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/navbar-fixed-side.css" type="text/css" rel="stylesheet">
	<link href="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/css/custom.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/js/custom.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="#myPage"><img src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/nissan_logo_sm.png" alt=""></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#attendance">ATTENDANCE |</a></li>
					<li><a href="#performance">PERFORMANCE FACTORS |</a></li>
					<li><a href="#behavior">BEHAVIOR AND ATTITUDE |</a></li>
					<li><a href="#contact">PERFORMANCE SUMMARY</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="jumbotron text-center">
		<h1>Performance Evaluation Form</h1> 
	</div>

	<!-- Container (About Section) -->
	<section>
		<form class="form-group" action="evaluation.php">
			<div id="form-eval-container">
				<div id="form-eval-container-item">
					<div><label for="">Employee Name</label>
						<span>First </span><input type="text" class="field-style-name">
						<span>MI </span><input size="1" type="text" class="field-style-name">
						<span>Last </span><input size="23" type="text" class="field-style-name">
					</div>
					<div><label for="">Designation</label>
						<input type="text" class="field-style">
					</div>
					<div><label for="">Section/Department</label>
						<select name="" id="" class="field-style">
							<option value="">Admin</option>
						</select>
					</div>
					<div><label for="">Branch</label>
						<select name="" id="" class="field-style">
							<option value="">Nissan Cebu</option>
							<option value="">Nissan Bohol</option>
							<option value="">Nissan Cagayan</option>
						</select>
					</div>
					<div><label for="">Date Hired</label>
						<input type="date" class="field-style">
					</div>
				</div>

				<div id="form-eval-container-item" >
					<div><label for="">Date Accomplished</label>
						<input type="date" class="field-style">
					</div>
					<div><label for="">Immediate Supervisor's Name:</label>
						<span>First </span><input type="text" class="field-style-name">
						<span>Mi </span><input size="1" type="text" class="field-style-name">
						<span>Last </span><input size="23" type="text" class="field-style-name">
					</div>
					<div><label for="">Designation:</label>
						<input type="text" class="field-style">
					</div>
					<div><label for="">Length of time under current immediate supervisor</label>
						<span>Years </span><input type="text" class="field-style-name" size="25">
						<span>Months </span><input type="text" class="field-style-name" size="25">
					</div>
					<div><label for="">Evaluation Period:</label>
						<input type="date" class="field-style">
					</div>
				</div>
			</div>
			<div style="text-align: center; margin-top: -5px;"><input style="width: 300px;" class="btn btn-primary" type="submit"></div>
		</form>
	</section>

	<div class="container-fluid bg-grey">
		<div class="row">
			<div class="col-sm-4">
				<span><img src="<?php echo "http://".$_SERVER['SERVER_NAME']?>/nissan/res/img/ncdi_logo_md.png" alt=""></span>
			</div>
			<div class="col-sm-8">
				<h2>Objectives</h2><br>
				<h4>The <strong>Performance Evaluation Form</strong>  is intended to enhance communications between superior and employee; expand employee's skills and identify areas where growth can be accomplished. The measurement taken at the time of this review can be used to clarify job duties and expectations, acknowledge outstanding performance, suggest ways to improve performance, outline potential career goals, and form the basis for salary adjustment.</h4><br>
				<p><strong>This form is composed of the following sections, namely:</strong></p>
				<ul>
					<li><p><span style="color: red; font-weight: bold;">Part I :</span> Criteria</p></li>
					<ul>
						<li><p>A. Attendance and Punctuality</p> <span style="color: #000; font-weight: bold">20%</span></li>
						<li><p>B. Performance Factors</p> <span style="color: #000; font-weight: bold">60%</span></li>
						<li><p>C. Behavior and Attitude</p> <span style="color: #000; font-weight: bold">20%</span></li>
						<li><p>D. Performance Summary, Strengths, Improvement Areas and Employee's Confirmation</p></li>
					</ul>
					<li><p><span style="color: red; font-weight: bold;">Part II :</span> Recommendations and Actions to be taken</p></li>
					<li><p><span style="color: red; font-weight: bold;">Part III :</span> Employee Feedback for Supervisor and Manager</p></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Container (Services Section) -->
	<div id="attendance" class="container-fluid">
		<main>
			<section class="form-instructions">
				<h4>A. ATTENDANCE AND PUNCTUALITY (20%)</h4>

				<article>
					<h5><strong>Directions:</strong> </h5><p>This part records the performance of the employee in terms of attandance and punctuality. Please indicate the actual number of occurrences fo absences and tardiness incurred by the employee on the space provided below. Using the table below as reference, write the corresponding ratings under the <span>Rating Column</span>. Multiply the score with percentage weight and place the resulting value under the Weighted Score Column. Add both weighted score to arrive at the Overall Attendance and Punctuality Rating.(Please see attached Daily Time Record and Leaves)</p>
				</article>
				<article>
					<h5><strong>NOTE:</strong></h5>
					<div>
						<ol>
							<li><p>Only absences that are unapproved and unexcused are counted.</p></li>
							<li><p>One (1) undertime with excuse and approval is equivalent to one (1) tardiness.</p></li>
							<li><p>For Managerial employees, they will get an automatic rating of 5, for all incidences of tardiness and undertime</p></li>
						</ol>
					</div>
					<div>
						<table border="1">
							<form action="">
								<tr class="row-tr-headers">
									<th>No. of Absences</th>
									<th>Rating</th>
									<th>No. of Absences during Appraisal Period</th>
									<th></th>
									<th>Incidences of Tardiness and Undertime</th>
									<th>Rating</th>
									<th>Incidences of Tardiness and Undertime During Appraisal Period</th>
								</tr>
								<tr>
									<td><input type="radio"  name="no_absences" value="5"></td>
									<td>5</td>
									<td>0</td>
									<td></td>
									<td><input type="radio" name="no_tardiness" value="5"></td>
									<td>5</td>
									<td>0-2</td>
								</tr>
								<tr>
									<td><input type="radio" name="no_absences" value="4"></td>
									<td>4</td>
									<td>1-2</td>
									<td></td>
									<td><input type="radio" name="no_tardiness" value="4"></td>
									<td>4</td>
									<td>3-8</td>
								</tr>
								<tr>
									<td><input type="radio" name="no_absences" value="3"></td>
									<td>3</td>
									<td>3-4</td>
									<td></td>
									<td><input type="radio" name="no_tardiness" value="3"></td>
									<td>3</td>
									<td>9-14</td>
								</tr>
								<tr>
									<td><input type="radio" name="no_absences" value="2"></td>
									<td>2</td>
									<td>5-6</td>
									<td></td>
									<td><input type="radio" name="no_tardiness" value="2"></td>
									<td>2</td>
									<td>15-20</td>
								</tr>
								<tr>
									<td><input type="radio" name="no_absences" value="1"></td>
									<td>1</td>
									<td>7 or more</td>
									<td></td>
									<td><input type="radio" name="no_tardiness" value="1"></td>
									<td>1</td>
									<td>21 or more</td>
								</tr>
							</form>
						</table>
					</div>
					<br><br>
					<div>
						<table border="1" width="100%">
							<tr class="row-tr-headers">
								<th></th>
								<th>Rating</th>
								<th>Percentage Weight</th>
								<th>Weighted Score</th>
							</tr>
							<tr>
								<td>Absences</td>
								<td><p id="absences"></p></td>
								<td>50%</td>
								<td><p id="total_absences"></p></td>
							</tr>
							<tr>
								<td>Tardiness</td>
								<td><p id="tardiness"></p></td>
								<td>50%</td>
								<td><p id="total_tardiness"></p></td>
							</tr>
							<tr>
								<td colspan="2">OVERALL SCORE FOR ATTENDANCE AND PUNCTUALITY</td>
								<td>100%</td>
								<td><p id="overall_punctuality"></p></td>
							</tr>
						</table>
					</div>
				</article>
				<article id="article_3">
					<div>
						<h5><strong>TOTAL ATTENDANCE AND PUNCTUALITY</strong></h5>
						<h3 id="total_punctuality"></h3>

					</div>
					<div>
						<h5><strong>Rating Scale</strong></h5>
						<table border="1" width="100%" >
							<tr id="row_total_ap_5">
								<td id="rate_5">5</td>
								<td>Excellent(E)</td>
								<td>4.5-5.0</td>
							</tr>
							<tr id="row_total_ap_4">
								<td id="rate_4">4</td>
								<td>Commendable(C)</td>
								<td>3.6-4.4</td>
							</tr>
							<tr id="row_total_ap_3">
								<td id="rate_3">3</td>
								<td>Satisfactory(S)</td>
								<td>2.7-3.5</td>
							</tr>
							<tr id="row_total_ap_2">
								<td id="rate_2">2</td>
								<td>Needs Improvement(NI)</td>
								<td>1.8-2.6</td>
							</tr>
							<tr id="row_total_ap_1">
								<td id="rate_1">1</td>
								<td>Unacceptable(U)</td>
								<td>1.0-1.7</td>
							</tr>
						</table>
					</div>
				</article>
			</section>
		</main>

	</div>

	<!-- Container (Portfolio Section) -->
	<div id="performance" class="container-fluid bg-grey">
		<main>
			<section class="form-instructions">
				<h4>B. PERFORMANCE FACTORS(60%)</h4>

				<article>
					<h5><strong>Directions:</strong> </h5><p>Please indicate your rating (considering the experience of the Appraisee) for each of the competencies specified below by <span style="color: red;">CLICKING</span> the appropriate numerical rating</p>
				</article>
				<article>
					<h5><strong>NOTE:</strong></h5>
					<div>
						<p>Immediate and Department Head to attach Performance Ranking and/or Highlights covering the evaluation period. Appraiser may also refer to the employee's Job Description.</p>
					</div>
					<div>
						<table border="1" width="100%">
							<tr class="row-tr-headers">
								<th></th>
								<th>RATING SCALE</th>
								<th>DEFINITION</th>
							</tr>
							<tr>
								<td>5</td>
								<td>Excellent (E)</td>
								<td>Performance which consitently exceeds expectations. Performance at this level elaves little, if anyting to be desired and consistently and significantly exceeds levels regarded as commendable.</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Commendable (C)</td>
								<td>Performance which frequently exceeds expectations. These employees are considered to be doing a good job</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Satisfactory (S)</td>
								<td>Performance which is consistenly at acceptable levels. These employees understand and employ the basic principles, techniques and procedures necessary for efficient job performance.</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Needs Improvement (NI)</td>
								<td>Performance which is slightly below the minimum requirements for the job. If performance does not improve, corrective action may be necessary</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Unacceptable (U)</td>
								<td>Performance which is significantly below minimum requirements. Immediate attentions is required</td>
							</tr>
							<tr>
								<td>X</td>
								<td>Not Applicable</td>
								<td></td>
							</tr>
						</table>
					</div>
					<br><br>
					<div>
						<table border="1" width="100%" id="table-custom-a">
							<tr class="row-tr-headers">
								<th id="td-left" rowspan="2">1. GENERAL JOB KNOWLEDGE AND RESPONSIBILITIES</th>
								<th colspan="6" >Performance Rating</th>
								<td rowspan="2">Specific comments/examples or training needs, if any</td>
							</tr>
							<tr class="row-tr-headers">

								<th>E</th>
								<th>C</th>
								<th>S</th>
								<th>NI</th>
								<th>U</th>
								<th>NA</th>			
							</tr>
							<tr>
								<td id="td-left">1) Effectively demonstrates knowledge of the duties and skills essential to the position through required education and training</td>
								<td>5<br><input type="radio" name="gjkr_1" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_1" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_1" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_1" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_1" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_1" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">2) Provides creative, innovative and practical suggestions for work implementation</td>
								<td>5<br><input type="radio" name="gjkr_2" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_2" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_2" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_2" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_2" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_2" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">3) Employs tools of the job competently</td>
								<td>5<br><input type="radio" name="gjkr_3" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_3" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_3" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_3" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_3" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_3" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">4) Understands and applies company policies and procedures</td>
								<td>5<br><input type="radio" name="gjkr_4" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_4" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_4" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_4" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_4" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_3" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">5) Recognizes job priorities and how the work relates to other work in and outside the department</td>
								<td>5<br><input type="radio" name="gjkr_5" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_5" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_5" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_5" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_5" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_5" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">6) Wholeheartedly supports systems and processes designed to protect and maxmize company resources</td>
								<td>5<br><input type="radio" name="gjkr_6" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_6" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_6" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_6" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_6" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_6" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">7) Maintains supply of necessary items/products to do the job effectively</td>
								<td>5<br><input type="radio" name="gjkr_7" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_7" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_7" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_7" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_7" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_6" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">8) Adds to the positive image of the corporation</td>
								<td>5<br><input type="radio" name="gjkr_8" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_8" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_8" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_8" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_8" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_8" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">9) Shows commitment to team success</td>
								<td>5<br><input type="radio" name="gjkr_9" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_9" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_9" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_9" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_9" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_8" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">10) Communicates necessary information to appropriate people</td>
								<td>5<br><input type="radio" name="gjkr_10" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_10" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_10" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_10" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_10" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_9" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">11) Shows accuracy and precision; work output is complete, neat, wel-organized and is in line with set targets/ objectives</td>
								<td>5<br><input type="radio" name="gjkr_11" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_11" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_11" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_11" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_11" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_11" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">12) Actively participates in company activities</td>
								<td>5<br><input type="radio" name="gjkr_12" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_12" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_12" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_12" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_12" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_12" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">13) Upholds ethical conduct and virtues espoused by the Company</td>
								<td>5<br><input type="radio" name="gjkr_13" value="5"></td>
								<td>4<br><input type="radio" name="gjkr_13" value="4"></td>
								<td>3<br><input type="radio" name="gjkr_13" value="3"></td>
								<td>2<br><input type="radio" name="gjkr_13" value="2"></td>
								<td>1<br><input type="radio" name="gjkr_13" value="1"></td>
								<td>x<br><input type="radio" name="gjkr_13" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td class="bold">Sub-score (TOTAL SCORE /13)</td>
								<td colspan="7" id="gjkr_total"></td>
							</tr>
						</table>
					</div>
					<br><br>
					<div>
						<table border="1" width="100%">
							<tr class="row-tr-headers">
								<th id="td-left" rowspan="2">2. WORK CHARACTERS AND SKILLS</th>
								<th colspan="6" class="bold">Performance Rating</th>
								<td rowspan="2">Specific comments/examples or training needs, if any</td>
							</tr>
							<tr class="row-tr-headers">

								<th>E</th>
								<th>C</th>
								<th>S</th>
								<th>NI</th>
								<th>U</th>
								<th>NA</th>			
							</tr>
							<tr>
								<td id="td-left">1) Highly motivated, with an enthusiastic can-do attitude</td>
								<td>5<br><input type="radio" name="wcs_1" value="5"></td>
								<td>4<br><input type="radio" name="wcs_1" value="4"></td>
								<td>3<br><input type="radio" name="wcs_1" value="3"></td>
								<td>2<br><input type="radio" name="wcs_1" value="2"></td>
								<td>1<br><input type="radio" name="wcs_1" value="1"></td>
								<td>x<br><input type="radio" name="wcs_1" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">2) Shows diligence in performing assigned works</td>
								<td>5<br><input type="radio" name="wcs_2" value="5"></td>
								<td>4<br><input type="radio" name="wcs_2" value="4"></td>
								<td>3<br><input type="radio" name="wcs_2" value="3"></td>
								<td>2<br><input type="radio" name="wcs_2" value="2"></td>
								<td>1<br><input type="radio" name="wcs_2" value="1"></td>
								<td>x<br><input type="radio" name="wcs_1" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">3) Reliable, can be depended upon</td>
								<td>5<br><input type="radio" name="wcs_3" value="5"></td>
								<td>4<br><input type="radio" name="wcs_3" value="4"></td>
								<td>3<br><input type="radio" name="wcs_3" value="3"></td>
								<td>2<br><input type="radio" name="wcs_3" value="2"></td>
								<td>1<br><input type="radio" name="wcs_3" value="1"></td>
								<td>x<br><input type="radio" name="wcs_1" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td class="bold">Sub-score (TOTAL SCORE /3)</td>
								<td id="wcs_total" colspan="7"></td>

							</tr>
						</table>
					</div>
					<br><br>
					<div>
						<table border="1" width="100%">
							<tr class="row-tr-headers">
								<th id="td-left" rowspan="2">3. JUDGMENT</th>
								<th colspan="6" class="bold">Performance Rating</th>
								<td rowspan="2">Specific comments/examples or training needs, if any</td>
							</tr>
							<tr class="row-tr-headers">

								<th>E</th>
								<th>C</th>
								<th>S</th>
								<th>NI</th>
								<th>U</th>
								<th>NA</th>			
							</tr>
							<tr>
								<td id="td-left">1) Anticipates and identifies problems, analyzes causes and evaluates alternative solutions</td>
								<td>5<br><input type="radio" name="j_1" value="5"></td>
								<td>4<br><input type="radio" name="j_1" value="4"></td>
								<td>3<br><input type="radio" name="j_1" value="3"></td>
								<td>2<br><input type="radio" name="j_1" value="2"></td>
								<td>1<br><input type="radio" name="j_1" value="1"></td>
								<td>x<br><input type="radio" name="j_1" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">2) Analyzes problem situations quickly and accurately</td>
								<td>5<br><input type="radio" name="j_2" value="5"></td>
								<td>4<br><input type="radio" name="j_2" value="4"></td>
								<td>3<br><input type="radio" name="j_2" value="3"></td>
								<td>2<br><input type="radio" name="j_2" value="2"></td>
								<td>1<br><input type="radio" name="j_2" value="1"></td>
								<td>x<br><input type="radio" name="j_2" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">3) Make sounds decisions when required</td>
								<td>5<br><input type="radio" name="j_3" value="5"></td>
								<td>4<br><input type="radio" name="j_3" value="4"></td>
								<td>3<br><input type="radio" name="j_3" value="3"></td>
								<td>2<br><input type="radio" name="j_3" value="2"></td>
								<td>1<br><input type="radio" name="j_3" value="1"></td>
								<td>x<br><input type="radio" name="j_3" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">4) Reacts to adversity in logical and practical manner</td>
								<td>5<br><input type="radio" name="j_4" value="5"></td>
								<td>4<br><input type="radio" name="j_4" value="4"></td>
								<td>3<br><input type="radio" name="j_4" value="3"></td>
								<td>2<br><input type="radio" name="j_4" value="2"></td>
								<td>1<br><input type="radio" name="j_4" value="1"></td>
								<td>x<br><input type="radio" name="j_4" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">5) Exhibits ability to secure and evaluate facts before taking action</td>
								<td>5<br><input type="radio" name="j_5" value="5"></td>
								<td>4<br><input type="radio" name="j_5" value="4"></td>
								<td>3<br><input type="radio" name="j_5" value="3"></td>
								<td>2<br><input type="radio" name="j_5" value="2"></td>
								<td>1<br><input type="radio" name="j_5" value="1"></td>
								<td>x<br><input type="radio" name="j_5" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td id="td-left">6) Independently establishes sound objectives or priorities</td>
								<td>5<br><input type="radio" name="j_6" value="5"></td>
								<td>4<br><input type="radio" name="j_6" value="4"></td>
								<td>3<br><input type="radio" name="j_6" value="3"></td>
								<td>2<br><input type="radio" name="j_6" value="2"></td>
								<td>1<br><input type="radio" name="j_6" value="1"></td>
								<td>x<br><input type="radio" name="j_5" value="0"></td>
								<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
							</tr>
							<tr>
								<td class="bold">Sub-score (TOTAL SCORE /6)</td>
								<td id="j_total" colspan="7"></td>
							</tr>
						</table>
					</div>
				</article>
				<br><br>
				<div>
					<table border="1" width="100%">
						<tr class="row-tr-headers">
							<th id="td-left" rowspan="2">4. INITIATIVE PLANNING AND ORGANIZATION</th>
							<th colspan="6" class="bold">Performance Rating</th>
							<td rowspan="2">Specific comments/examples or training needs, if any</td>
						</tr>
						<tr class="row-tr-headers">
							<th>E</th>
							<th>C</th>
							<th>S</th>
							<th>NI</th>
							<th>U</th>
							<th>NA</th>			
						</tr>
						<tr>
							<td id="td-left">1) Perfoms assigned tasks without being told and under minimal supervision</td>
							<td>5<br><input type="radio" name="ipo_1" value="5"></td>
							<td>4<br><input type="radio" name="ipo_1" value="4"></td>
							<td>3<br><input type="radio" name="ipo_1" value="3"></td>
							<td>2<br><input type="radio" name="ipo_1" value="2"></td>
							<td>1<br><input type="radio" name="ipo_1" value="1"></td>
							<td>x<br><input type="radio" name="ipo_1" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">2) Willingly takes action without specific instructions, when appropriate</td>
							<td>5<br><input type="radio" name="ipo_2" value="5"></td>
							<td>4<br><input type="radio" name="ipo_2" value="4"></td>
							<td>3<br><input type="radio" name="ipo_2" value="3"></td>
							<td>2<br><input type="radio" name="ipo_2" value="2"></td>
							<td>1<br><input type="radio" name="ipo_2" value="1"></td>
							<td>x<br><input type="radio" name="ipo_2" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">3) Provides effective follow - through/ follow-up on assigned tasks</td>
							<td>5<br><input type="radio" name="ipo_3" value="5"></td>
							<td>4<br><input type="radio" name="ipo_3" value="4"></td>
							<td>3<br><input type="radio" name="ipo_3" value="3"></td>
							<td>2<br><input type="radio" name="ipo_3" value="2"></td>
							<td>1<br><input type="radio" name="ipo_3" value="1"></td>
							<td>x<br><input type="radio" name="ipo_3" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">4) Actively seeks other assignments</td>
							<td>5<br><input type="radio" name="ipo_4" value="5"></td>
							<td>4<br><input type="radio" name="ipo_4" value="4"></td>
							<td>3<br><input type="radio" name="ipo_4" value="3"></td>
							<td>2<br><input type="radio" name="ipo_4" value="2"></td>
							<td>1<br><input type="radio" name="ipo_4" value="1"></td>
							<td>x<br><input type="radio" name="ipo_4" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">5) Organize work to achieve maximum productivity</td>
							<td>5<br><input type="radio" name="ipo_5" value="5"></td>
							<td>4<br><input type="radio" name="ipo_5" value="4"></td>
							<td>3<br><input type="radio" name="ipo_5" value="3"></td>
							<td>2<br><input type="radio" name="ipo_5" value="2"></td>
							<td>1<br><input type="radio" name="ipo_5" value="1"></td>
							<td>x<br><input type="radio" name="ipo_5" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">6) Learns and applies new skills on the job on own initiative</td>
							<td>5<br><input type="radio" name="ipo_6" value="5"></td>
							<td>4<br><input type="radio" name="ipo_6" value="4"></td>
							<td>3<br><input type="radio" name="ipo_6" value="3"></td>
							<td>2<br><input type="radio" name="ipo_6" value="2"></td>
							<td>1<br><input type="radio" name="ipo_6" value="1"></td>
							<td>x<br><input type="radio" name="ipo_6" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">7) Acts independently while keeping supervisor informed</td>
							<td>5<br><input type="radio" name="ipo_7" value="5"></td>
							<td>4<br><input type="radio" name="ipo_7" value="4"></td>
							<td>3<br><input type="radio" name="ipo_7" value="3"></td>
							<td>2<br><input type="radio" name="ipo_7" value="2"></td>
							<td>1<br><input type="radio" name="ipo_7" value="1"></td>
							<td>x<br><input type="radio" name="ipo_7" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">8) Introduces new ideas/ projects without supervision</td>
							<td>5<br><input type="radio" name="ipo_8" value="5"></td>
							<td>4<br><input type="radio" name="ipo_8" value="4"></td>
							<td>3<br><input type="radio" name="ipo_8" value="3"></td>
							<td>2<br><input type="radio" name="ipo_8" value="2"></td>
							<td>1<br><input type="radio" name="ipo_8" value="1"></td>
							<td>x<br><input type="radio" name="ipo_8" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td class="bold">Sub-score (TOTAL SCORE /8)</td>
							<td id="ipo_total" colspan="7"></td>
						</tr>
					</table>
				</div>
				<br><br>
				<div>
					<table border="1" width="100%">
						<tr class="row-tr-headers">
							<th id="td-left" rowspan="2">5. COMMUNICATION SKILLS</th>
							<th colspan="6" class="bold">Performance Rating</th>
							<td rowspan="2">Specific comments/examples or training needs, if any</td>
						</tr>
						<tr class="row-tr-headers">
							<th>E</th>
							<th>C</th>
							<th>S</th>
							<th>NI</th>
							<th>U</th>
							<th>NA</th>			
						</tr>
						<tr>
							<td id="td-left">1) Speaks clearly and audibly</td>
							<td>5<br><input type="radio" name="cs_1" value="5"></td>
							<td>4<br><input type="radio" name="cs_1" value="4"></td>
							<td>3<br><input type="radio" name="cs_1" value="3"></td>
							<td>2<br><input type="radio" name="cs_1" value="2"></td>
							<td>1<br><input type="radio" name="cs_1" value="1"></td>
							<td>x<br><input type="radio" name="cs_1" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">2) Comfortable speaking in public, appears confident and credible</td>
							<td>5<br><input type="radio" name="cs_2" value="5"></td>
							<td>4<br><input type="radio" name="cs_2" value="4"></td>
							<td>3<br><input type="radio" name="cs_2" value="3"></td>
							<td>2<br><input type="radio" name="cs_2" value="2"></td>
							<td>1<br><input type="radio" name="cs_2" value="1"></td>
							<td>x<br><input type="radio" name="cs_2" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">3) Effectively communicates ideas in team meetings</td>
							<td>5<br><input type="radio" name="cs_3" value="5"></td>
							<td>4<br><input type="radio" name="cs_3" value="4"></td>
							<td>3<br><input type="radio" name="cs_3" value="3"></td>
							<td>2<br><input type="radio" name="cs_3" value="2"></td>
							<td>1<br><input type="radio" name="cs_3" value="1"></td>
							<td>x<br><input type="radio" name="cs_3" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">4) Is accurate and persuasive when presenting arguments</td>
							<td>5<br><input type="radio" name="cs_4" value="5"></td>
							<td>4<br><input type="radio" name="cs_4" value="4"></td>
							<td>3<br><input type="radio" name="cs_4" value="3"></td>
							<td>2<br><input type="radio" name="cs_4" value="2"></td>
							<td>1<br><input type="radio" name="cs_4" value="1"></td>
							<td>x<br><input type="radio" name="cs_4" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">5) Effectively alters presentation style depending on the audience</td>
							<td>5<br><input type="radio" name="cs_5" value="5"></td>
							<td>4<br><input type="radio" name="cs_5" value="4"></td>
							<td>3<br><input type="radio" name="cs_5" value="3"></td>
							<td>2<br><input type="radio" name="cs_5" value="2"></td>
							<td>1<br><input type="radio" name="cs_5" value="1"></td>
							<td>x<br><input type="radio" name="cs_5" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">6) Probes for key information when talking to others</td>
							<td>5<br><input type="radio" name="cs_6" value="5"></td>
							<td>4<br><input type="radio" name="cs_6" value="4"></td>
							<td>3<br><input type="radio" name="cs_6" value="3"></td>
							<td>2<br><input type="radio" name="cs_6" value="2"></td>
							<td>1<br><input type="radio" name="cs_6" value="1"></td>
							<td>x<br><input type="radio" name="cs_6" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">7) Answer questions well, even under presure</td>
							<td>5<br><input type="radio" name="cs_7" value="5"></td>
							<td>4<br><input type="radio" name="cs_7" value="4"></td>
							<td>3<br><input type="radio" name="cs_7" value="3"></td>
							<td>2<br><input type="radio" name="cs_7" value="2"></td>
							<td>1<br><input type="radio" name="cs_7" value="1"></td>
							<td>x<br><input type="radio" name="cs_7" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">8) Is an effective listener</td>
							<td>5<br><input type="radio" name="cs_8" value="5"></td>
							<td>4<br><input type="radio" name="cs_8" value="4"></td>
							<td>3<br><input type="radio" name="cs_8" value="3"></td>
							<td>2<br><input type="radio" name="cs_8" value="2"></td>
							<td>1<br><input type="radio" name="cs_8" value="1"></td>
							<td>x<br><input type="radio" name="cs_8" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td id="td-left">9) Does not use slang or inappropriate language</td>
							<td>5<br><input type="radio" name="cs_9" value="5"></td>
							<td>4<br><input type="radio" name="cs_9" value="4"></td>
							<td>3<br><input type="radio" name="cs_9" value="3"></td>
							<td>2<br><input type="radio" name="cs_9" value="2"></td>
							<td>1<br><input type="radio" name="cs_9" value="1"></td>
							<td>x<br><input type="radio" name="cs_9" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td class="bold">Sub-score (TOTAL SCORE /8)</td>
							<td id="cs_total" colspan="7"></td>
						</tr>
					</table>
				</div>
				<br><br>
				<div>
					<table border="1" width="100%">
						<tr class="row-tr-headers">
							<th id="td-left" rowspan="2">6. KEY PERFORMANCE INDICATOR'S ACHIEVEMENT</th>
							<th colspan="6" class="bold">Performance Rating</th>
							<td rowspan="2">Specific comments/examples or training needs, if any</td>
						</tr>
						<tr class="row-tr-headers">
							<th>E</th>
							<th>C</th>
							<th>S</th>
							<th>NI</th>
							<th>U</th>
							<th>NA</th>			
						</tr>
						<tr>
							<td id="td-left">a) Consistently hits assigned targets/ quota or deliverables for the period covered</td>
							<td>5<br><input type="radio" name="kpia" value="5"></td>
							<td>4<br><input type="radio" name="kpia" value="4"></td>
							<td>3<br><input type="radio" name="kpia" value="3"></td>
							<td>2<br><input type="radio" name="kpia" value="2"></td>
							<td>1<br><input type="radio" name="kpia" value="1"></td>
							<td>x<br><input type="radio" name="kpia" value="0"></td>
							<td><textarea name="" id="" cols="40" rows="5"></textarea></td>		
						</tr>
						<tr>
							<td class="bold">Sub-score (TOTAL SCORE /1)</td>
							<td id="kpia_total" colspan="7"></td>

						</tr>
					</table>
				</div>
				<br><br>
				<div>
					<table border="1" width="100%">		
						<tr>
							<td width="50%" class="bold">OVERALL SCORE FOR PERFORMANCE FACTORS (TOTAL Sub-Scores / 6)</td>
							<td id="pf_total" width="50%"></td>
						</tr>
					</table>
				</div>
			</article>
			<article id="article_3">
				<div>
					<h4>TOTAL PERFORMANCE RATING
					</h4>
					<p id="total_performance_factor"></p>
				</div>
				<div>
					<h5><strong>Rating Scale</strong></h5>
					<table border="1" width="100%" >
						<tr id="row_total_pr_5">
							<td id="rate_5">5</td>
							<td>Excellent(E)</td>
							<td>4.5-5.0</td>
						</tr>
						<tr id="row_total_pr_4">
							<td id="rate_4">4</td>
							<td>Commendable(C)</td>
							<td>3.6-4.4</td>
						</tr>
						<tr id="row_total_pr_3">
							<td id="rate_3">3</td>
							<td>Satisfactory(S)</td>
							<td>2.7-3.5</td>
						</tr>
						<tr id="row_total_pr_2">
							<td id="rate_2">2</td>
							<td>Needs Improvement(NI)</td>
							<td>1.8-2.6</td>
						</tr>
						<tr id="row_total_pr_1">
							<td id="rate_1">1</td>
							<td>Unacceptable(U)</td>
							<td>1.0-1.7</td>
						</tr>
					</table>
				</div>
			</article>
		</section>
	</main>
</div>

<!-- Container (Pricing Section) -->
<div id="behavior" class="container-fluid">
	<main>
		<section class="form-instructions">
			<h4>C .BEHAVIOR AND ATTITUDE (20%)</h4>

			<article>
				<h5><strong>Directions:</strong> </h5><p>Takes into account the behaviors and attitudes of the employee in accordance to Nissan Cebu Distributors Inc. Mission, Vission, Philosophies and Core Values.</p>
			</article>
			<article>
				<div>
					<table border="1" width="100%">
						<tr class="row-tr-headers">
							<th>BEHAVIOR and ATTITUDE</th>
							<th>Always</th>
							<th>Often</th>
							<th>Sometimes</th>
							<th>Seldom</th>
							<th>Never</th>
						</tr>
						<tr>
							<td id="td-left">1. Initiates change and shifts thinking to have a better work environment</td>
							<td>5<br><input type="radio" name="ba_1" value="5"></td>
							<td>4<br><input type="radio" name="ba_1" value="4"></td>
							<td>3<br><input type="radio" name="ba_1" value="3"></td>
							<td>2<br><input type="radio" name="ba_1" value="2"></td>
							<td>1<br><input type="radio" name="ba_1" value="1"></td>
						</tr>
						<tr>
							<td id="td-left">2. Continually seeks education and training for self-improvement</td>
							<td>5<br><input type="radio" name="ba_2" value="5"></td>
							<td>4<br><input type="radio" name="ba_2" value="4"></td>
							<td>3<br><input type="radio" name="ba_2" value="3"></td>
							<td>2<br><input type="radio" name="ba_2" value="2"></td>
							<td>1<br><input type="radio" name="ba_2" value="1"></td>
						</tr>
						<tr>
							<td id="td-left">3. Motivates him/herself through active involvement</td>
							<td>5<br><input type="radio" name="ba_3" value="5"></td>
							<td>4<br><input type="radio" name="ba_3" value="4"></td>
							<td>3<br><input type="radio" name="ba_3" value="3"></td>
							<td>2<br><input type="radio" name="ba_3" value="2"></td>
							<td>1<br><input type="radio" name="ba_3" value="1"></td>
						</tr>
						<tr>
							<td id="td-left">4. Manages and establishes stronger realtionships through synergy, leadership, goodwill, truth, loyalty and respect</td>
							<td>5<br><input type="radio" name="ba_4" value="5"></td>
							<td>4<br><input type="radio" name="ba_4" value="4"></td>
							<td>3<br><input type="radio" name="ba_4" value="3"></td>
							<td>2<br><input type="radio" name="ba_4" value="2"></td>
							<td>1<br><input type="radio" name="ba_4" value="1"></td>
						</tr>
						<tr>
							<td id="td-left">5. Professional and timely by setting asisde personal issues when in the workplace</td>
							<td>5<br><input type="radio" name="ba_5" value="5"></td>
							<td>4<br><input type="radio" name="ba_5" value="4"></td>
							<td>3<br><input type="radio" name="ba_5" value="3"></td>
							<td>2<br><input type="radio" name="ba_5" value="2"></td>
							<td>1<br><input type="radio" name="ba_5" value="1"></td>
						</tr>
						<tr>
							<td id="td-left">6. Unselfish in contributing for NCDI growth by setting aside and respecting personal differencesS</td>
							<td>5<br><input type="radio" name="ba_6" value="5"></td>
							<td>4<br><input type="radio" name="ba_6" value="4"></td>
							<td>3<br><input type="radio" name="ba_6" value="3"></td>
							<td>2<br><input type="radio" name="ba_6" value="2"></td>
							<td>1<br><input type="radio" name="ba_6" value="1"></td>
						</tr>
						<tr>
							<td id="td-left">7. Ceaselessly exceeds expectaions with regards to work output because of continious self-enhancement</td>
							<td>5<br><input type="radio" name="ba_7" value="5"></td>
							<td>4<br><input type="radio" name="ba_7" value="4"></td>
							<td>3<br><input type="radio" name="ba_7" value="3"></td>
							<td>2<br><input type="radio" name="ba_7" value="2"></td>
							<td>1<br><input type="radio" name="ba_7" value="1"></td>
						</tr>
						<tr>
							<td class="bold">Sub-score FOR BEHAVIOR AND ATTITUES (TOTAL SCORE /7)</td>
							<td colspan="7" id="ba_total"></td>

						</tr>
					</table>
				</div>
			</article>
			<article id="article_3">
				<div>
					<h5><strong>TOTAL PERFORMANCE RATING</strong> 
					</h5>
					<h3 id="total_behavior"></h3>
				</div>
				<div>
					<h5><strong>Rating Scale</strong></h5>
					<table border="1" width="100%" >
						<tr id="row_total_bh_5">
							<td id="rate_5">5</td>
							<td>Excellent(E)</td>
							<td>4.5-5.0</td>
						</tr>
						<tr id="row_total_bh_4">
							<td id="rate_4">4</td>
							<td>Commendable(C)</td>
							<td>3.6-4.4</td>
						</tr>
						<tr id="row_total_bh_3">
							<td id="rate_3">3</td>
							<td>Satisfactory(S)</td>
							<td>2.7-3.5</td>
						</tr>
						<tr id="row_total_bh_2">
							<td id="rate_2">2</td>
							<td>Needs Improvement(NI)</td>
							<td>1.8-2.6</td>
						</tr>
						<tr id="row_total_bh_1">
							<td id="rate_1">1</td>
							<td>Unacceptable(U)</td>
							<td>1.0-1.7</td>
						</tr>
					</table>
				</div>
			</article>
		</section>
	</main>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
	<main>
		<section class="form-instructions">
			<h4 style="text-align: center">Performance Summary</h4>
			<p>
				Write the ratings of the different sections under the Rating Column. Multiply the score with the percentage weight and place the resulting value under the Weighted Score Column. Then get the sum of all weighted scores to arrive at the Overall Rating
			</p>
			<p>
				<strong>Note: </strong>In case of decimal points, standard rule in rounding off shall apply.
			</p>
			<p><strong>Example: </strong>A score of 3.1415 will be rounded off to 3.1. A score of 3.525 will be rounded off to 3.6.</p>
		</section>
		<section class="form-instructions">
			<div>
				<table border="1" width="100%">
					<tr class="row-tr-headers">
						<th></th>
						<th>RATING</th>
						<th>PERCENTAGE 
							<pre style="background: inherit; color: #fff">WEIGHT</pre>
						</th>
						<th>WEIGHTED SCORE</th>
					</tr>
					<tr>
						<td>Part I. Attendance and Punctuality</td>
						<td id="rating_ap_total"></td>
						<td>20%</td>
						<td id="rating_ap_total_w"></td>
					</tr>
					<tr>
						<td>Part II. Performance Factors</td>
						<td id="rating_pf_total"></td>
						<td>60%</td>
						<td id="rating_pf_total_w"></td>
					</tr>
					<tr>
						<td>Part III. Behavior and Attitude</td>
						<td id="rating_ba_total"></td>
						<td>20%</td>
						<td id="rating_ba_total_w"></td>
					</tr>
					<tr>
						<td colspan="2"><strong>OVER-ALL RATING</strong></td>
						<td>100%</td>
						<td id="rating_overall"></td></td>
					</tr>
				</table>
			</div>
			<br>
			<br>
			<div style="display: flex;">
				<div style="width: 50%">
					<table border="1" width="100%" style="text-align: center">
						<tr>
							<th colspan="2">Rating Scale</th>
							<th>Score 
								<pre style="background: inherit;">Equivalent</pre>
							</th>
						</tr>
						<tr id="tr_total_w5">
							<td>5</td>
							<td style="text-align: left;">Excellent (E)</td>
							<td>4.5-5.0</td>
						</tr>
						<tr id="tr_total_w4">
							<td>4</td>
							<td style="text-align: left;">Commendable (C)</td>
							<td>3.6-4.4</td>
						</tr>
						<tr id="tr_total_w3">
							<td>3</td>
							<td style="text-align: left;">Satisfactory (S)</td>
							<td>2.7-3.5</td>
						</tr>
						<tr id="tr_total_w2">
							<td>2</td>
							<td style="text-align: left;">Needs Improvement (NI)</td>
							<td>1.8-2.6</td>
						</tr>
						<tr id="tr_total_w1">
							<td>1</td>
							<td>Unaceptable (U)</td>
							<td>1.0-1.7</td>
						</tr>
					</table>
				</div>

				<div style="width: 50%; text-align: center;">
					<h5><strong>RATING DESCRIPTION</strong></h5>
					<textarea name="" id="" cols="70" rows="10"></textarea>
				</div>
			</div>
		</section>
		<section class="form-instructions">
			<div>
				<table width="100%" border="1">
					<tr>
						<td colspan="2">
							<p class="p-left"><strong>Strengths:</strong></p>
							<textarea name="" id="" cols="140" rows="10"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<p class="p-left"><strong>Areas that need improvement:</strong></p>
							<textarea name="" id="" cols="140" rows="10"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<p class="p-left"><strong>Conducted by:</strong></p>
							<br>
							<p class="p-left"><strong>Signature over Printed Name of Immediate Superior</strong></p>
							<br>
							<p class="p-left"><strong>Date:</strong></p>
						</td>
						<td>
							<p class="p-left"><strong>Noted by:</strong></p>
							<br>
							<p class="p-left"><strong>Signature over Printed Name of Division Head</strong></p>
							<br>
							<p class="p-left"><strong>Date:</strong></p>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<p class="p-left">Appriasee's Comments and Reactions</p>
							<textarea name="" id="" cols="140" rows="10"></textarea>

						</td>
					</tr>
					<tr>
						<td colspan="2">
							<table width="100%" border="0">
								<tr>
									<td width="50%"><br><strong>Employees Signature over Printed Name</strong></td>
									<td widht="50%"><br><strong>Date</strong></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</section>
	</main>
</div>


<footer class="container-fluid text-center">
	<a href="#myPage" title="To Top">
		<span class="glyphicon glyphicon-chevron-up"></span>
	</a>
	<p>For Nissan Cebu Distributors Inc. By: Paul Noel E. Calinao</p>
</footer>

<script>
	$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
      	scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
    });
    } // End if
});
  
  $(window).scroll(function() {
  	$(".slideanim").each(function(){
  		var pos = $(this).offset().top;

  		var winTop = $(window).scrollTop();
  		if (pos < winTop + 600) {
  			$(this).addClass("slide");
  		}
  	});
  });

  $("input[type='radio']").click(function(){

  	var radioValue_a = $("input[name='no_absences']:checked").val();
  	var radioValue_t = $("input[name='no_tardiness']:checked").val();

  	if(radioValue_t){
  		$("#absences").html(radioValue_a).css({"color":"red", "font-weight" : "bold"});;
  		$("#total_absences").html(radioValue_a * .50).css({"color":"red", "font-weight" : "bold"});
  		$("#tardiness").html(radioValue_t).css({"color":"red", "font-weight" : "bold"});;
  		$("#total_tardiness").html(radioValue_t * .50).css({"color":"red", "font-weight" : "bold"});;
  		$("#overall_punctuality").html(parseFloat($("#total_absences").text(), 2) + parseFloat($("#total_tardiness").text(), 2)).css({"color":"red", "font-weight" : "bold"});;
  		$("#total_punctuality").html($("#overall_punctuality").text()).css({"color":"red", "font-weight" : "bold", "font-size" : "3em"});;
  		$("#rating_ap_total").html($("#overall_punctuality").text()).css({"color":"red", "font-weight" : "bold"});;

  		var total_punctuality =  parseFloat($("#total_punctuality").text()).toFixed(1); 

  		switch(true) {
  			case total_punctuality <= 5.0 && total_punctuality >= 4.5:
  			$("#row_total_ap_5").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_ap_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_2").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_punctuality <= 4.4 && total_punctuality >= 3.6:
  			$("#row_total_ap_4").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_ap_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_2").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_punctuality <= 3.5 && total_punctuality >= 2.7:
  			$("#row_total_ap_3").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_ap_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_2").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_punctuality <= 2.6 && total_punctuality >= 1.8:
  			$("#row_total_ap_2").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_ap_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_punctuality <= 1.7 && total_punctuality >= 1.0:
  			$("#row_total_ap_1").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_ap_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_ap_2").css({"background" : "inherit", "color" : "inherit"});
  			break;				
  		}

  		
  	}
  	/*General Job Knowledge and responsibilities*/
  	var radioValue1 = $("input[name='gjkr_1']:checked").val();
  	var radioValue2 = $("input[name='gjkr_2']:checked").val();
  	var radioValue3 = $("input[name='gjkr_3']:checked").val();
  	var radioValue4 = $("input[name='gjkr_4']:checked").val();
  	var radioValue5 = $("input[name='gjkr_5']:checked").val();
  	var radioValue6 = $("input[name='gjkr_6']:checked").val();
  	var radioValue7 = $("input[name='gjkr_7']:checked").val();
  	var radioValue8 = $("input[name='gjkr_8']:checked").val();
  	var radioValue9 = $("input[name='gjkr_9']:checked").val();
  	var radioValue10 = $("input[name='gjkr_10']:checked").val();
  	var radioValue11 = $("input[name='gjkr_11']:checked").val();
  	var radioValue12 = $("input[name='gjkr_12']:checked").val();
  	var radioValue13 = $("input[name='gjkr_13']:checked").val();

  	if(radioValue13){
  		$("#gjkr_total").html(((parseFloat(radioValue1)+parseFloat(radioValue2)+parseFloat(radioValue3)+parseFloat(radioValue4)+parseFloat(radioValue5)+parseFloat(radioValue6)+parseFloat(radioValue7)+parseFloat(radioValue8)+parseFloat(radioValue9)+parseFloat(radioValue10)+parseFloat(radioValue11)+parseFloat(radioValue12)+parseFloat(radioValue13))/13).toFixed(1)).css({"color" : "#ff0000", "font-weight" : "bold", "font-size" : "1.5em"});
  	}

  	/*Work Characteristics and skills*/

  	var radioWork1 = $("input[name='wcs_1']:checked").val();
  	var radioWork2 = $("input[name='wcs_2']:checked").val();
  	var radioWork3 = $("input[name='wcs_3']:checked").val();

  	if (radioWork3) {
  		$("#wcs_total").html(((parseFloat(radioWork1)+parseFloat(radioWork2)+parseFloat(radioWork3))/3).toFixed(1)).css({"color" : "#ff0000", "font-weight" : "bold", "font-size" : "1.5em"});
  	}

  	/*Judgement*/

  	var radioJob1 = $("input[name='j_1']:checked").val();
  	var radioJob2 = $("input[name='j_2']:checked").val();
  	var radioJob3 = $("input[name='j_3']:checked").val();
  	var radioJob4 = $("input[name='j_4']:checked").val();
  	var radioJob5 = $("input[name='j_5']:checked").val();
  	var radioJob6 = $("input[name='j_6']:checked").val();

  	if (radioJob6) {
  		$("#j_total").html(((parseFloat(radioJob1)+parseFloat(radioJob2)+parseFloat(radioJob3)+parseFloat(radioJob4)+parseFloat(radioJob5)+parseFloat(radioJob6))/6).toFixed(1)).css({"color" : "#ff0000", "font-weight" : "bold", "font-size" : "1.5em"});
  	}

  	/*Initiative planning and organization*/

  	var radioIpo1 = $("input[name='ipo_1']:checked").val();
  	var radioIpo2 = $("input[name='ipo_2']:checked").val();
  	var radioIpo3 = $("input[name='ipo_3']:checked").val();
  	var radioIpo4 = $("input[name='ipo_4']:checked").val();
  	var radioIpo5 = $("input[name='ipo_5']:checked").val();
  	var radioIpo6 = $("input[name='ipo_6']:checked").val();
  	var radioIpo7 = $("input[name='ipo_7']:checked").val();
  	var radioIpo8 = $("input[name='ipo_8']:checked").val();

  	if (radioIpo8) {
  		$("#ipo_total").html(((parseFloat(radioIpo1)+parseFloat(radioIpo2)+parseFloat(radioIpo3)+parseFloat(radioIpo4)+parseFloat(radioIpo5)+parseFloat(radioIpo6)+parseFloat(radioIpo7)+parseFloat(radioIpo8))/8).toFixed(1)).css({"color" : "#ff0000", "font-weight" : "bold", "font-size" : "1.5em"});
  	}

  	/*Communication Skills*/

  	var radioCs1 = $("input[name='cs_1']:checked").val();
  	var radioCs2 = $("input[name='cs_2']:checked").val();
  	var radioCs3 = $("input[name='cs_3']:checked").val();
  	var radioCs4 = $("input[name='cs_4']:checked").val();
  	var radioCs5 = $("input[name='cs_5']:checked").val();
  	var radioCs6 = $("input[name='cs_6']:checked").val();
  	var radioCs7 = $("input[name='cs_7']:checked").val();
  	var radioCs8 = $("input[name='cs_8']:checked").val();
  	var radioCs9 = $("input[name='cs_9']:checked").val();

  	if (radioCs9) {
  		$("#cs_total").html(((parseFloat(radioCs1)+parseFloat(radioCs2)+parseFloat(radioCs3)+parseFloat(radioCs4)+parseFloat(radioCs5)+parseFloat(radioCs6)+parseFloat(radioCs8)+parseFloat(radioCs9))/9).toFixed(1)).css({"color" : "#ff0000", "font-weight" : "bold", "font-size" : "1.5em"});
  	}

  	var radioKpia = $("input[name='kpia']:checked").val();

  	if (radioKpia) {
  		$("#kpia_total").html(((parseFloat(radioKpia))/1).toFixed(1)).css({"color" : "#ff0000", "font-weight" : "bold", "font-size" : "1.5em"});
  		$("#pf_total").html(((parseFloat($("#kpia_total").text())+parseFloat($("#cs_total").text())+parseFloat($("#j_total").text())+parseFloat($("#j_total").text())+parseFloat($("#cs_total").text())+parseFloat($("#gjkr_total").text()))/6).toFixed(1)).css({"color" : "#ff0000", "font-weight" : "bold", "font-size" : "1.5em"});
  		$("#rating_pf_total").html(((parseFloat($("#kpia_total").text())+parseFloat($("#cs_total").text())+parseFloat($("#j_total").text())+parseFloat($("#j_total").text())+parseFloat($("#cs_total").text())+parseFloat($("#gjkr_total").text()))/6).toFixed(1));

  		$("#total_performance_factor").html($("#pf_total").text()).css({"color":"red", "font-weight" : "bold", "font-size" : "3em"});

  		var total_performance_factor = parseFloat($("#total_performance_factor").text()).toFixed(1);



  		switch(true) {
  			case total_performance_factor <= 5.0 && total_performance_factor >= 4.5:
  			$("#row_total_pr_5").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_pr_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_2").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_performance_factor <= 4.4 && total_performance_factor >= 3.6:
  			$("#row_total_pr_4").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_pr_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_2").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_performance_factor <= 3.5 && total_performance_factor >= 2.7:
  			$("#row_total_pr_3").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_pr_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_2").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_performance_factor <= 2.6 && total_performance_factor >= 1.8:
  			$("#row_total_pr_2").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_pr_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_performance_factor <= 1.7 && total_performance_factor >= 1.0:
  			$("#row_total_pr_1").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_pr_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_pr_2").css({"background" : "inherit", "color" : "inherit"});
  			break;				
  		}

  	}

  	/*Behavior and Attitude*/

  	var radioBa1 = $("input[name='ba_1']:checked").val();
  	var radioBa2 = $("input[name='ba_2']:checked").val();
  	var radioBa3 = $("input[name='ba_3']:checked").val();
  	var radioBa4 = $("input[name='ba_4']:checked").val();
  	var radioBa5 = $("input[name='ba_5']:checked").val();
  	var radioBa6 = $("input[name='ba_6']:checked").val();
  	var radioBa7 = $("input[name='ba_7']:checked").val();

  	if(radioBa7) {
  		$("#ba_total").html(((parseFloat(radioBa1)+parseFloat(radioBa2)+parseFloat(radioBa3)+parseFloat(radioBa4)+parseFloat(radioBa5)+parseFloat(radioBa6)+parseFloat(radioBa7))/7).toFixed(1)).css({"color" : "#ff0000", "font-size" : "1.5em"});

  		$("#total_behavior").html(((parseFloat(radioBa1)+parseFloat(radioBa2)+parseFloat(radioBa3)+parseFloat(radioBa4)+parseFloat(radioBa5)+parseFloat(radioBa6)+parseFloat(radioBa7))/7).toFixed(1)).css({"color" : "#ff0000", "font-size" : "3em"});

  		var total_behavior = parseFloat($("#total_behavior").text()).toFixed(1);

  		switch(true) {
  			case total_behavior <= 5.0 && total_behavior >= 4.5:
  			$("#row_total_bh_5").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_bh_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_2").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_behavior <= 4.4 && total_behavior >= 3.6:
  			$("#row_total_bh_4").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_bh_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_2").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_behavior <= 3.5 && total_behavior >= 2.7:
  			$("#row_total_bh_3").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_bh_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_2").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_behavior <= 2.6 && total_behavior >= 1.8:
  			$("#row_total_bh_2").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_bh_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_1").css({"background" : "inherit", "color" : "inherit"});
  			break;
  			case total_behavior <= 1.7 && total_behavior >= 1.0:
  			$("#row_total_bh_1").css({"background" : "#3498db", "color" : "#fff"});
  			$("#row_total_bh_5").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_4").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_3").css({"background" : "inherit", "color" : "inherit"});
  			$("#row_total_bh_2").css({"background" : "inherit", "color" : "inherit"});
  			break;				
  		}
  	}

  	if (total_punctuality != null && total_performance_factor != null && total_behavior != null) {
  		$("#rating_ap_total").html(total_punctuality).css({"color" : "#ff0000", "font-size" : "1.5em"});
  		$("#rating_ap_total_w").html(parseFloat(total_punctuality * .20).toFixed(1)).css({"color" : "#ff0000", "font-size" : "1.5em"});
  		$("#rating_pf_total").html(total_performance_factor).css({"color" : "#ff0000", "font-size" : "1.5em"});
  		$("#rating_pf_total_w").html(parseFloat(total_performance_factor * .60).toFixed(1)).css({"color" : "#ff0000", "font-size" : "1.5em"});
  		$("#rating_ba_total").html(total_behavior).css({"color" : "#ff0000", "font-size" : "1.5em"});
  		$("#rating_ba_total_w").html(parseFloat(total_behavior * .20).toFixed(1)).css({"color" : "#ff0000", "font-size" : "1.5em"});


  		$("#rating_overall").html((parseFloat($("#rating_ap_total_w").text()) + parseFloat($("#rating_pf_total_w").text()) + parseFloat($("#rating_ba_total_w").text())).toFixed(1)).css({"color" : "#ff0000", "font-size" : "3em"});

  		 // = $("#rating_overall").html((parseFloat($("#rating_ap_total_w").text()) + parseFloat($("#rating_pf_total_w").text()) + parseFloat($("#rating_ba_total_w").text())).toFixed(1));

  		 var rating_overall = parseFloat($("#rating_overall").text()).toFixed(1);


  		 alert(rating_overall);

  		 switch(true) {
  		 	case rating_overall <= 5.0 && rating_overall >= 4.5:
  		 	$("#row_total_w_5").css({"background" : "#3498db", "color" : "#fff"});
  		 	$("#row_total_w_4").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_3").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_2").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_1").css({"background" : "inherit", "color" : "inherit"});
  		 	break;
  		 	case rating_overall <= 4.4 && rating_overall >= 3.6:
  		 	$("#row_total_w_4").css({"background" : "#3498db", "color" : "#fff"});
  		 	$("#row_total_w_5").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_3").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_2").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_1").css({"background" : "inherit", "color" : "inherit"});
  		 	break;
  		 	case rating_overall <= 3.5 && rating_overall >= 2.7:
  		 	$("#row_total_w_3").css({"background" : "#3498db", "color" : "#fff"});
  		 	$("#row_total_w_5").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_4").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_2").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_1").css({"background" : "inherit", "color" : "inherit"});
  		 	break;
  		 	case rating_overall <= 2.6 && rating_overall >= 1.8:
  		 	$("#row_total_w_2").css({"background" : "#3498db", "color" : "#fff"});
  		 	$("#row_total_w_5").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_4").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_3").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_1").css({"background" : "inherit", "color" : "inherit"});
  		 	break;
  		 	case rating_overall <= 1.7 && rating_overall >= 1.0:
  		 	$("#row_total_w_1").css({"background" : "#3498db", "color" : "#fff"});
  		 	$("#row_total_w_5").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_4").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_3").css({"background" : "inherit", "color" : "inherit"});
  		 	$("#row_total_w_2").css({"background" : "inherit", "color" : "inherit"});
  		 	break;				
  		 }

  		}
  	});
})
</script>

</body>
</html>
