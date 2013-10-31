<?php
// section 1
// used to connect to db and access control
require_once("./inc/connect_db.php");

session_start();
$login_id = $_SESSION['login_id'];
$rider_name = $_SESSION['rider_name'];
session_write_close();

require_once('./inc/php_functions.php');
require_once('header.php');
require_once('navigation.php');

/*
if (empty($month)) {
	
}
if ($month) {
	
}
*/

if (empty($year)) {
	$year = date("Y");
	$month = date("m");
}


if ($month == 0) {
	$month = 12;
	--$year;
}

$days = date("t",mktime(1,1,1,$month,1,$year));

$begin_events = mktime(1,1,1,$month,1,$year);
$end_events = mktime(23,59,59,$month,$days,$year);

$prev_month = $month - 1;
$next_month = $month + 1;

$display_date = date("F Y",$begin_events);

// section 2
// do inserts, updates and delete statements


// section 3
// single record selects or one time selects


// section 4
// the main print and nth selects



?>
				<div id="main">
					<div id="main_header">
						<h2>Select A Month To View It's Events</h2>
					</div>
					
					<div id="content_text">
						<div class="help_box">
							<h4>To register for a specific course</h4>
							<p>To register for a specific course click on the event name in the table then select one of the available courses on the following page.</p>
						</div>
						
						<div id="event_table">
							<?php print("<form method=\"post\" action=\"./events.php\"> ");?>
								<div id="choose_month">
								<?php
									print("<select name=\"month\">
									");
									for ($x=1;$x<=12;++$x) {
										if ($month == $x) {
											$selected = " selected=\"selected\"";
										} else {
											$selected = "";
										}
										$mon = date("F",mktime(1,1,1,$x,1,2000));
										print("<option value=\"$x\"$selected>$mon</option>
										");
									}

									print("</select><select name=\"year\">
									");
									for ($x=2010;$x<=date("Y")+1;++$x) {
										if ($year == $x) {
											$selected = " selected=\"selected\"";
										} else {
											$selected = "";
										}
										print("<option value=\"$x\"$selected>$x</option>
										");
									}

									print("</select> 
									<input type=\"submit\" name=\"submit\" value=\"GO\" />
									<br /><br /><br />
									</form>
									");
									?>
								</div>
								
								<div id="table_date">
								<table>
									<tr>
										<td id="prev_btn"><a href="events.php?month=<?echo $prev_month?>&year=<? echo $year?>" class="prev_next"><< Prev</a></td>
										<td id="date_title"><? echo $display_date ?></td>
										<td id="next_btn"><a href="events.php?month=<?echo $next_month?>&year=<? echo $year?>" class="prev_next">Next >></a></td>
									</tr>
								</table>
								</div>
								
								<div id="table_content">
								<table id="table_headers">
									<tr><th class="left_header">Date</th><th>Name</th><th>Location</th><th class="right_header">Category</th></tr>		
									<?php
										$query = "SELECT evt.id, evt.name, start_date, cat.name, loc.name
										FROM events AS evt, categories AS cat, locations AS loc
										WHERE start_date BETWEEN $begin_events AND $end_events AND
										cat.id = categories_id AND loc.id = locations_id
										ORDER BY start_date DESC ";
										$mysql_results = mysql_query($query, $mysql_link);
										while($row = mysql_fetch_row($mysql_results)){
											$events_id = $row[0];
											$events_name = stripslashes($row[1]);
											$date = stripslashes($row[2]);
											$category_name = stripslashes($row[3]);
											$location_name = stripslashes($row[4]);
											
											$date = date("l, j", $date);
											print("<tr><td class='event_date'>$date</td>
														<td class='event_name'><a href='events_detail.php?id=$events_id'>$events_name</a></td>
														<td class='event_location'>$location_name</td>
														<td class='event_category'>$category_name</td>
												</tr>");
										}
									?>
								</table>
								</div>
								
							</form>
						</div>
					</div>
				</div>
				
				<?php require_once('sidebar.php');?>
				
			<?php require_once('footer.php');?>
			