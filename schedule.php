<?php

/* days */
define('MONDAY', 'Monday');
define('TUESDAY', 'Tuesday');
define('WEDNESDAY', 'Wednesday');
define('THURSDAY', 'Thursday');
define('FRIDAY', 'Friday');
define('SATURDAY', 'Saturday');

$DAY_ENUM = array(MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY, SATURDAY);

/* color blocks */
define('RED', 'red');
define('ORANGE', 'orange');
define('YELLOW', 'yellow');
define('GREEN', 'green');
define('BLUE', 'blue');
define('PLUM', 'plum');
define('BROWN', 'brown');
define('X_BLOCK', 'x-block');
	define('X_BLOCK_TITLE', 'X Block');
define('SM_SATURDAY', 'sm-saturday');
	define('SM_SATURDAY_TITLE', "SM Saturday");
define('ALL_SCHOOL', 'all-school');
define('CO_CURRICULAR', 'co-curricular');
	define('CO_CURRICULAR_TITLE', 'Co-Curricular');
define('FREE', 'free');

$COLOR_ENUM = array(RED, ORANGE, YELLOW, GREEN, BLUE, PLUM, BROWN, SM_SATURDAY, X_BLOCK);

/* info */
define('TITLE', 'title');
define('LOCATION', 'location');
define('START', 'start');
define('END', 'end');

define('TIME_FORMAT', 'g:i a');

define('DEFAULT_HEADER', 'Schedule');
define('DEFAULT_FOOTER', '');

/**
 * Calculate the CSS height of a block given a duration in seconds
 *
 * @param int $duration Seconds
 *
 * @return string CSS height
 **/
function height($duration) {
	$_duration = $duration / 60 * .0185;
	return $_duration . "in";
}

/* general schedule */
$NORMAL_MORNING = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('7:45am'),
	END => strtotime('8:00am')
);
$MORNING_MEETING = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('8:00am'),
	END => strtotime('8:25am')
);
$PASSING_1 = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('8:25am'),
	END => strtotime('8:30am')
);
$BLOCK_1 = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('8:30am'),
	END => strtotime('9:50am')
);
$PASSING_2 = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('9:50am'),
	END => strtotime('9:55am')
);
$BLOCK_2 = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('9:55am'),
	END => strtotime('10:40am')
);
$MORNING_BREAK = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('10:40am'),
	END => strtotime('11:00am')
);
$BLOCK_3 = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('11:00am'),
	END => strtotime('12:20pm')
);
$PASSING_LUNCH = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('12:20pm'),
	END => strtotime('12:25pm')
);
$LUNCH = array(
	TITLE => 'Lunch',
	LOCATION => '',
	START => strtotime('12:20pm'),
	END => strtotime('12:55pm')
);
$PASSING_4 = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('12:55pm'),
	END => strtotime('1:00pm')
);
$BLOCK_4 = array(
	TITLE => CO_CURRICULAR_TITLE,
	LOCATION => '',
	START => strtotime('1:00pm'),
	END => strtotime('1:40pm')
);
$PASSING_5 = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('1:40pm'),
	END => strtotime('1:45pm')
);
$BLOCK_5 = array(
	TITLE => '',
	LOCATION => '',
	START => strtotime('1:45pm'),
	END => strtotime('3:05pm')
);

$i = 0; /* unique key counter */

/* the weekly schedule */
$schedule = array(
	MONDAY => array(
		FREE . $i++ => $NORMAL_MORNING,
		X_BLOCK . $i++ => $MORNING_MEETING,
		FREE . $i++ => $PASSING_1,
		GREEN => $BLOCK_1,
		FREE . $i++ => $PASSING_2,
		PLUM => $BLOCK_2,
		X_BLOCK . $i++ => $MORNING_BREAK,
		RED => $BLOCK_3,
		FREE . $i++ => $PASSING_LUNCH,
		ALL_SCHOOL => $LUNCH,
		FREE . $i++ => $PASSING_4,
		CO_CURRICULAR => $BLOCK_4,
		FREE . $i++ => $PASSING_5,
		ORANGE => $BLOCK_5
	),
	
	TUESDAY => array(
		FREE . $i++ => $NORMAL_MORNING,
		ALL_SCHOOL => $MORNING_MEETING,
		FREE . $i++ => $PASSING_1,
		BLUE => $BLOCK_1,
		FREE . $i++ => $PASSING_2,
		GREEN => $BLOCK_2,
		X_BLOCK => $MORNING_BREAK,
		PLUM => $BLOCK_3,
		FREE . $i++ => $LUNCH,
		BROWN => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('12:55pm'),
			END => strtotime('1:40pm')
		),
		FREE . $i++ => $PASSING_5,
		YELLOW => $BLOCK_5
	),
	
	WEDNESDAY => array(
		FREE . $i++ => $NORMAL_MORNING,
		ORANGE => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('8:00am'),
			END => strtotime('9:20am')
		),
		FREE . $i++ => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('9:20am'),
			END => strtotime('9:25am')
		),
		RED => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('9:25am'),
			END => strtotime('10:10am')
		),
		FREE . $i++ => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('10:10am'),
			END => strtotime('10:15am')
		),
		ALL_SCHOOL => array(
			TITLE => 'School Meeting',
			LOCATION => '',
			START => strtotime('10:15am'),
			END => strtotime('10:35am')
		),
		FREE . $i++ => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('10:35am'),
			END => strtotime('10:40am')
		),
		BROWN => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('10:40am'),
			END => strtotime('12:00pm')
		),
		FREE . $i++ => array(
			TITLE => 'Lunch',
			LOCATION => '',
			START => strtotime('12:00pm'),
			END => strtotime('12:30pm')
		),
		BLUE => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('12:30pm'),
			END => strtotime('1:15pm')
		)
	),
	
	THURSDAY => array(
		CO_CURRICULAR . $i++ => array(
			TITLE => 'Meeting Block',
			LOCATION => '',
			START => strtotime('7:45am'),
			END => strtotime('8:25am')
		),
		FREE . $i++ => $PASSING_1,
		YELLOW => $BLOCK_1,
		FREE . $i++ => $PASSING_2,
		ORANGE => $BLOCK_2,
		X_BLOCK => $MORNING_BREAK,
		PLUM => $BLOCK_3,
		FREE . $i++ => $PASSING_LUNCH,
		ALL_SCHOOL => $LUNCH,
		FREE . $i++ => $PASSING_4,
		CO_CURRICULAR . $i++ => $BLOCK_4,
		FREE . $i++ => $PASSING_5,
		GREEN => $BLOCK_5
	),
	
	FRIDAY => array(
		FREE . $i++ => $NORMAL_MORNING,
		ALL_SCHOOL => $MORNING_MEETING,
		FREE . $i++ => $PASSING_1,
		RED => $BLOCK_1,
		FREE . $i++ => $PASSING_2,
		YELLOW => $BLOCK_2,
		X_BLOCK => $MORNING_BREAK,
		BLUE => $BLOCK_3,
		FREE . $i++ => $LUNCH,
		CO_CURRICULAR => $BLOCK_4,
		FREE . $i++ => $PASSING_5,
		BROWN => $BLOCK_5
	),
	
	SATURDAY => array(
		FREE . $i++ => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('7:45am'),
			END => strtotime('8:30am')
		),
		X_BLOCK => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('8:30am'),
			END => strtotime('8:55am')	
		),
		FREE . $i++ => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('8:55am'),
			END => strtotime('9:00am')
		),
		SM_SATURDAY => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('9:00am'),
			END => strtotime('11:30am')
		),
		FREE . $i++ => array(
			TITLE => '',
			LOCATION => '',
			START => strtotime('11:30am'),
			END => strtotime('11:40am')
		),
		ALL_SCHOOL => array(
			TITLE => 'School Meeting',
			LOCATION => '',
			START => strtotime('11:40am'),
			END => strtotime('12:00pm')
		),
		FREE . $i++ => $LUNCH
	)
);

/* minor fine-tuning */
$schedule[MONDAY][ALL_SCHOOL][TITLE] = 'Seated Lunch';
$schedule[MONDAY][ALL_SCHOOL][START] = strtotime('12:25pm');
$schedule[TUESDAY][ALL_SCHOOL][TITLE] = 'Chapel';
$schedule[THURSDAY][ALL_SCHOOL][TITLE] = 'Seated Lunch';
$schedule[THURSDAY][ALL_SCHOOL][START] = strtotime('12:25pm');
$schedule[FRIDAY][ALL_SCHOOL][TITLE] = 'Chapel';
$schedule[FRIDAY][CO_CURRICULAR][START] = strtotime('12:55pm');

/*
 * are we processing a form submission? let's apply color block classes across
 * the entire schedule uniformly...
 */
if ($submission = !empty($_REQUEST)) {
	$schedule = $_REQUEST['schedule'];
	foreach($COLOR_ENUM as $color) {
		if(!empty($_REQUEST[$color][TITLE])) {
			foreach($DAY_ENUM as $day) {
				$blocks = array_keys($schedule[$day]);
				foreach ($blocks as $block) {
					if (preg_match("%$color\d*%", $block)) {
						$schedule[$day][$block][TITLE] = $_REQUEST[$color][TITLE];
						if (!empty($_REQUEST[$color][LOCATION])) {
							$schedule[$day][$block][LOCATION] = $_REQUEST[$color][LOCATION];
						}
					}
				}
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Color Schedule</title>
		<style type="text/css">
			@page {
				size: portrait;
				margin: 0.5in;
			}
			body, div, p, table, td {
				font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
				font-size: 9pt;
				margin: 0;
				padding: 0;
			}
			
			#content {
			}
			
			form {
				padding: 2em;
			}
			
			form #content {
				width: 100%;
				height: auto;
			}
			
			#controls {
				background: #eee;
				padding: 0.5em;
				position: fixed;
				top: 0;
				right: 0;
				z-index: 100;
			}
			
			button {
				margin: 0.5em;
			}
			
			h1 {
				margin: 0;
				padding: 0;
			}
			
			#wrapper {
				position: relative;
				width: 7.5in;
				height: 9in;
			}
			
			#header, #footer{
				width: 100%;
				text-align: center;
				overflow: hidden;
			}
			
			#header, #header input {
				font-size: 18pt;
			}
			
			#footer {
				width: 83%;
				position: absolute:
				bottom: 0;
				left: 0;
			}
			
			#footer textarea {
				width: 90%;
				height: 3em;
			}
			
			#courses ul {
				list-style: none;
			}
			
			#courses li.block {
				float: left;
			}
			
			#courses li {
				padding: 0.5em;
				margin: 0.5em;
			}
			
			#schedule tr {
				vertical-align: top;
			}
			
			table {
				border-collapse: collapse;
				width: 100%;
			}
			
			th {
				padding-bottom: 1em;
			}
			
			td {
				position: relative;
			}

			.day {
				width: 16%;
				padding: 1em;
			}
			
			.block {
				border-radius: 3pt;
				border: solid 1px transparent;
				overflow: visible;
			}
			
			.details {
				text-align: center;
				position: relative;
				top: 50%;
				transform: translateY(-50%);
				padding: 3pt;
			}
			
			.title, th {
				font-size: 10pt;
				font-weight: bold;
			}
			
			.location {
				font-size: 10pt;
				font-style: italic;
			}
			
			.duration {
				font-size: 6pt;
				position: absolute;
				top: 2pt;
				width: 100%;
				text-align: center;
			}
			
			.free .title {
				font-size: 8pt;
			}
			
			input {
				background: transparent;
				border: solid 1px gray;
				border-radius: 0.25em;
				margin: 0.25em;
			}
			
			#header input {
				width: 95%;
			}
						
			.<?= PLUM ?>.busy input, .<?= BROWN ?>.busy input, .<?= ALL_SCHOOL ?>.busy input, .<?= SM_SATURDAY ?>.busy input {
				color: white;
			}
			
			.<?= RED ?>.busy {
				background: #f66;
			}
			
			.<?= RED ?>.free {
				background: white /*#fdd*/;
				color: #f99;
				border-color: #f99;
			}
			
			.<?= ORANGE ?>.busy {
				background: #fa6;
			}
			
			.<?= ORANGE ?>.free {
				background: white /*#fed*/;
				color: #fb9;
				border-color: #fb9;
			}
			
			.<?= YELLOW ?>.busy {
				background: #ff0;
			}
			
			.<?= YELLOW ?>.free {
				background: white /*#ffd*/;
				color: #dd0;
				border-color: #dd0;
			}
			.<?= GREEN ?>.busy {
				background: #6f3;
			}
			
			.<?= GREEN ?>.free {
				background: white /*#dfd*/;
				color: #9d9;
				border-color: #9d9;
			}
			.<?= BLUE ?>.busy {
				background: #69f;
			}
			
			.<?= BLUE ?>.free {
				background: white /*#def*/;
				color: #69f;
				border-color: #69f;
			}
			.<?= PLUM ?>.busy {
				background: #93f;
				color: white;
			}
			
			.<?= PLUM ?>.free {
				background: white/*#edf*/;
				color: #c9f;
				border-color: #c9f;
			}
			.<?= BROWN ?>.busy {
				background: #970;
				color: white;
			}
			
			.<?= BROWN ?>.free {
				background: /*#eda*/;
				color: #db3;
				border-color: #db3;
			}
			
			.<?= X_BLOCK ?> .title, .<?= X_BLOCK ?> .location, .<?= ALL_SCHOOL ?> .title, .<?= ALL_SCHOOL ?> .location {
				font-size: 8pt;
			}
			
			.<?= ALL_SCHOOL ?> .location {
				margin-bottom: 0;
			}
			
			.<?= ALL_SCHOOL ?>.busy, .<?= SM_SATURDAY ?>.busy {
				background: #003359;
				color: white;
			}
			
			.<?= ALL_SCHOOL ?>.free, .<?= SM_SATURDAY ?>.free {
				background: white;
				color: #93d1ff;
				border-color: #003359;
			}
			
			.<?= X_BLOCK ?>.busy, .<?= CO_CURRICULAR ?>.busy {
				background: #ddd;
			}
			
			.<?= X_BLOCK ?>.free, .<?= CO_CURRICULAR ?>.free {
				background: #eee;
				color: #999;
			}

			<?php foreach($COLOR_ENUM as $color): ?>
			.<?= $color ?>.free .title::before {
				content: "<?= ( $color == X_BLOCK || $color == SM_SATURDAY ? ($color == X_BLOCK ? X_BLOCK_TITLE : SM_SATURDAY_TITLE) : ucwords($color)) ?> ";
			}
			
			form #schedule .<?= $color ?>.free .title::before{
				content: '';
			}
			<?php endforeach; ?>
			
			<?php for($i = (5 * 60); $i < (200 * 60); $i += (5 * 60)): ?>
			
			.dur<?= $i ?> {
				height: <?= height($i) ?>;
			}
			
			<?php if ($i <= 35 * 60): ?>
			.dur<?= $i ?> .details {
				margin-top: 0.5em;
			}
			
			form .dur<?= $i ?> .details {
				margin-top: 1.5em;
			}
			<?php endif; ?>
			
			<?php endfor; ?>
		</style>
		<script type="text/javascript"><!--
		
		function toggleFreeBusy(color) {
			if (document.getElementById(color).children[0].children[0].value.length > 0) {
				document.getElementById(color).className = color + ' busy block';
			} else {
				document.getElementById(color).className = color + ' free block';
			}
		}
		
		--></script>
	</head>
	<body <?php if ($submission): ?>onload="window.print();"<?php endif; ?>>
		
		<?php if (!$submission): ?><form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"><?php endif; ?>

			<?php if (!$submission): ?>
			<div id="controls">
				<button type="submit">Print</button>
				<button type="reset">Reset</button>
			</div>
			<?php endif; ?>
			
			<?php if (!$submission): ?>
			<div id="courses">
				<h2>Enter courses by color</h2>
				<ul>
					<?php foreach($COLOR_ENUM as $color): ?>
					<li class="<?= $color ?> free block" id="<?= $color ?>">
						<span class="title">
							<input name="<?= $color ?>[<?= TITLE ?>]" type="text" placeholder="Course" onblur="toggleFreeBusy('<?= $color ?>');" />
						</span>
						<input name="<?= $color ?>[<?= LOCATION ?>]" type="text" placeholder="Location" />
					</li>
					<?php endforeach; ?>
				</ul>
				<br clear="all" />
			</div>
			<?php endif; ?>
			
			<div id="wrapper">
				
				<?php if (!$submission): ?><h2>Enter a title</h2><?php endif; ?>
				
				<header id="header">
					<h1><?php if ($submission): ?><?= $_REQUEST['header'] ?><?php else: ?><input type="text" name="header" value="<?= DEFAULT_HEADER ?>" /><?php endif; ?></h1>
				</header>
				
				<div id="content">
					
					<?php if (!$submission): ?><h2>Enter individual blocks</h2><?php endif; ?>
					
					<table id="schedule">
						<tr>
							
							<?php foreach ($schedule as $day => $blocks): ?>
							<td id="<?= $day ?>" class="day">
								<table>
									<tr>
										<th><?= $day?></th>
									</tr>
									
									<?php foreach ($blocks as $color => $info): ?>
									<tr>
										<td>
											<div class="<?= preg_replace('%\d+%', '', $color) ?> <?= (empty($info[TITLE]) ? 'free' : 'busy') ?> block dur<?= $info[END] - $info[START] + (!$submission && !preg_match('%' . FREE . '\d*%', $color) ? 20 * 60 : 0) ?>">
												<p class="duration">
													<?php if (preg_match('%' . FREE .'\d*%', $color)): ?><?php else: ?><?= date(TIME_FORMAT, $info[START]) ?> &ndash; <?= date(TIME_FORMAT, $info[END]) ?><?php endif; ?>
													<?php if (!$submission): ?>
													<input type="hidden" name="schedule[<?= $day ?>][<?= $color ?>][<?= START ?>]" value="<?= $info[START] ?>" />
													<input type="hidden" name="schedule[<?= $day ?>][<?= $color ?>][<?= END ?>]" value="<?= $info[END] ?>" />
													<?php endif; ?>
												</p>
	
												<div class="details">
													<p class="title"><?php if ($submission): ?><?= $info[TITLE] ?><?php else: ?><?php if (preg_match('%' . FREE . '\d*%', $color)): ?><input type="hidden" name="schedule[<?= $day ?>][<?= $color ?>][<?= TITLE ?>]" value="<?= $info[TITLE] ?>" /><?php else: ?><input type="text" name="schedule[<?= $day ?>][<?= $color ?>][<?= TITLE ?>]" value="<?= $info[TITLE] ?>" placeholder="<?= (preg_match('%' . X_BLOCK . '\d*%', $color) || $color == SM_SATURDAY ? ($color == SM_SATURDAY ? SM_SATURDAY_TITLE : $day . ' ' . X_BLOCK_TITLE) : $day . ' ' . ucwords(preg_replace('%\d+%', '', $color))) ?>" /><?php endif; ?><?php endif; ?></p>
													<?php if ($submission): ?><?php if (!empty($info[LOCATION])): ?><p class="location"><?= $info[LOCATION] ?></p><?php endif; ?><?php else: ?><p class="location"><?php if (preg_match('%' . FREE . '\d*%', $color)): ?><?php else: ?><input type="text" name="schedule[<?= $day ?>][<?= $color ?>][<?= LOCATION ?>]" value="<?= $info[LOCATION] ?>" placeholder="Location" /><?php endif; ?></p><?php endif; ?>
												</div>
											</div>
										</td>
									</tr>
									<?php endforeach; ?>
									
								</table>
							</td>
							<?php endforeach; ?>
							
						</tr>
					</table>
					
				</div>
				
				<?php if (!$submission): ?><h2>Enter a note for the bottom of the schedule</h2><?php endif; ?>
				
				<footer id="footer">
					<p><?php if ($submission): ?><?= $_REQUEST['footer'] ?><?php else: ?><textarea type="text" name="footer"><?= DEFAULT_FOOTER ?></textarea><?php endif; ?></p>
				</footer>
			</div>
		<?php if (!$submission): ?></form><?php endif; ?>
	</body>
</html>