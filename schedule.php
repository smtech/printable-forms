<?php

require_once('vendor/autoload.php');

use smtech\StMarksColors as col;

/* days */
define('MONDAY', 'monday');
define('TUESDAY', 'tuesday');
define('WEDNESDAY', 'wednesday');
define('THURSDAY', 'thursday');
define('FRIDAY', 'friday');
define('SATURDAY', 'saturday');

$DAY_ENUM = array(MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY, SATURDAY);

/* color blocks */
define('RED', col::RED_BLOCK);
define('ORANGE', col::ORANGE_BLOCK);
define('YELLOW', col::YELLOW_BLOCK);
define('GREEN', col::GREEN_BLOCK);
define('BLUE', col::BLUE_BLOCK);
define('PLUM', col::PLUM_BLOCK);
define('BROWN', col::BROWN_BLOCK);
define('X_BLOCK', 'x-block');
	define('X_BLOCK_TITLE', 'X Block');
define('SM_SATURDAY', 'sm-saturday');
	define('SM_SATURDAY_TITLE', "SM Saturday");
define('ALL_SCHOOL', 'all-school');
define('CO_CURRICULAR', 'co-curricular');
	define('CO_CURRICULAR_TITLE', 'Co-Curricular');
define('FREE', 'free');
define('SPACER', 'spacer');

$COLOR_BLOCKS_ENUM = array(RED, ORANGE, YELLOW, GREEN, BLUE, PLUM, BROWN);
$COLOR_ENUM = array(RED, ORANGE, YELLOW, GREEN, BLUE, PLUM, BROWN);

/* info */
define('TITLE', 'title');
define('LOCATION', 'location');
define('START', 'start');
define('END', 'end');

date_default_timezone_set('America/New_York');
define('TIME_FORMAT', 'g:i a');

/* form parameters */
define('FREE_BW', 'bw');
define('DEFAULT_FREE_BW', true);
define('FORM_MODE', 'mode');
define('FORM_MODE_EDITABLE', 'edit');
define('FORM_MODE_PRINTABLE', 'print');
define('DEFAULT_FORM_MODE', FORM_MODE_EDITABLE);
define('PAGE_SIZE', 'page');
define('PAGE_SIZE_LETTER', 'letter');
define('PAGE_SIZE_LEGAL', 'legal');
define('DEFAULT_PAGE_SIZE', PAGE_SIZE_LETTER);

/* dimensions in inches */
define('DEFAULT_FIVE_MINUTES', 0.0185);
define('LETTER_PAGE_HEIGHT', 11);
define('LEGAL_PAGE_HEIGHT', 14);
define('PAGE_WIDTH', 8.5);
define('MARGIN', 0.5);
define('HEADER_HEIGHT', 0.75);
define('COLUMN_HEADER_HEIGHT', 0.25);

define('DEFAULT_HEADER', 'Schedule');
define('DEFAULT_FOOTER', '');

$fiveMinutes = DEFAULT_FIVE_MINUTES; // inches, by default
function setMinuteHeight($schedule, $pageHeight = LETTER_PAGE_HEIGHT) {
	$maxDuration = 0;
	foreach ($schedule as $day) {
		$duration = 0;
		foreach ($day as $block) {
			$duration += ($block[END] - $block[START]);
		}
		if ($duration > $maxDuration) {
			$maxDuration = $duration;
		}
	}
	return ($pageHeight - (2 * MARGIN) - HEADER_HEIGHT - COLUMN_HEADER_HEIGHT) / ($maxDuration / 60);
}

function width($schedule) {
	return (100 / count($schedule)) . "%";
}

/**
 * Calculate the CSS height of a block given a duration in seconds
 *
 * @param int $duration Seconds
 *
 * @return string CSS height
 **/
function height($duration, $unitHeight) {
	$_duration = ($duration / 60) * $unitHeight;
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
	TITLE => '',
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
$SPACER = array(SPACER);

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
		SPACER . $i++ => $SPACER,
		FREE . $i++ => $LUNCH,
		SPACER . $i++ => $SPACER,
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
		SPACER . $i++ => $SPACER,
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
		SPACER . $i++ => $SPACER,
		FREE . $i++ => $LUNCH,
		SPACER . $i++ => $SPACER,
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

/* set form parameters */
$printable = FORM_MODE_PRINTABLE == (isset($_REQUEST[FORM_MODE]) ? $_REQUEST[FORM_MODE] : DEFAULT_FORM_MODE);
$bw = (isset($_REQUEST[FREE_BW]) ? $_REQUEST[FREE_BW] == true: DEFAULT_FREE_BW);
$letter = PAGE_SIZE_LETTER == (isset($_REQUEST[PAGE_SIZE]) ? $_REQUEST[PAGE_SIZE]: DEFAULT_PAGE_SIZE);
$header = (empty($_REQUEST['header']) ? DEFAULT_HEADER : $_REQUEST['header']);
$footer = (empty($_REQUEST['footer']) ? DEFAULT_FOOTER : $_REQUEST['footer']);

/*
 * are we processing a form submission? let's apply color block classes across
 * the entire schedule uniformly...
 */
foreach($COLOR_ENUM as $color) {
	if(!empty($_REQUEST[$color][TITLE])) {
		foreach($DAY_ENUM as $day) {
			$blocks = array_keys($schedule[$day]);
			foreach ($blocks as $block) {
				if (preg_match("%$color\d*%", $block)) {
					if ($printable) {
						$schedule[$day][$block][TITLE] = $_REQUEST[$color][TITLE];
						if (!empty($_REQUEST[$color][LOCATION])) {
							$schedule[$day][$block][LOCATION] = $_REQUEST[$color][LOCATION];
						}
					} else {
						$schedule[$day][$block][TITLE] = '';
						$schedule[$day][$block][LOCATION] = '';
					}
				}
			}
		}
	}
}

/* apply individual block settings */
if (!empty($_REQUEST['schedule'])) {
	foreach ($_REQUEST['schedule'] as $day => $blocks) {
		foreach ($blocks as $color => $info) {
			foreach ($info as $key => $value) {
				if (!empty($value)) {
					if ($key == START || $key == END){
						if (preg_match('/[^0-9]/i', $value)) {
							$value = strtotime($value);
						}
					}
					$schedule[$day][$color][$key] = $value;
				}
			}
		}
	}
}

$minuteHeight = setMinuteHeight($schedule, ($letter ? LETTER_PAGE_HEIGHT : LEGAL_PAGE_HEIGHT));

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Color Schedule</title>
		<style type="text/css">
			@page {
				size: <?= PAGE_WIDTH ?>in <?= ($letter ? LETTER_PAGE_HEIGHT : LEGAL_PAGE_HEIGHT) ?>in;
				margin: <?= MARGIN ?>in;
			}
			@media print {
				#controls {
					display: none !important;
				}
			}
			body, div, p, table, td {
				font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
				font-size: 9pt;
				margin: 0;
				padding: 0;
			}
						
			form {
				padding: 2em;
			}
			
			#wrapper {
				position: relative;
			}
		<?php if ($printable): ?>
			#wrapper {
				width: <?= PAGE_WIDTH ?>in;
			}
			<?php else: ?>
			#wrapper {
				width: 100%;
				margin: 1em;
				height: auto;
			}
			#content {
				width: 100%;
				height: auto;
			}
			<?php endif; ?>
			
			#controls {
				display: block;
				float: right;
				background: #eee;
				padding: 0.25em;
				position: fixed;
				top: 0;
				right: 0;
				z-index: 100;
				border-radius: 0 0 0 0.5em;
				border: 1px solid #ddd;
			}
			
			#controls .section {
				border: 1px solid #bbb;
				padding: 0.1em 0.5em;
				margin: 0.25em;
				border-radius: 0.25em;
			}
			
			button {
				margin: 0.5em;
			}
			
			h1 {
				margin: 0;
				padding: 0;
			}
			
			#header, #footer{
				width: 100%;
				text-align: center;
				overflow: hidden;
			}
			
			#header {
				height: <?= HEADER_HEIGHT ?>in;
			}
			
			#header, #header input {
				font-size: 18pt;
			}
			
			#header h1 {
				margin: 0;
				padding: 0;
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
				height: <?= COLUMN_HEADER_HEIGHT ?>in;
			}
			
			td {
				position: relative;
			}

			.day {
				width: <?= width($schedule) ?>;
				padding: 1em;
			}
			
			.block {
				border-radius: 3pt;
				border: solid 1pt transparent;
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
				font-size: 8pt;
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
			
			.<?= SPACER ?> {
				height: 0px;
				background: transparent;
			}
						
			<?php foreach($COLOR_BLOCKS_ENUM as $color): ?>
			.<?= $color ?>.busy {
				background: <?= col::get($color) ?>;
				color: <?= col::get($color)->text() ?>;
			}
			
			.<?= $color ?>.free {
				background: <?= col::get($color)->light() ?>;
				color: <?= col::get($color)->dark() ?>;
				border-color: <?= col::get($color)->dark() ?>;
			}
			
			.<?= $color ?>.busy input {
				color: <?= col::get($color)->text() ?>;
			}
			<?php endforeach; ?>
			
			
			.<?= X_BLOCK ?> .title, .<?= X_BLOCK ?> .location, .<?= ALL_SCHOOL ?> .title, .<?= ALL_SCHOOL ?> .location {
				font-size: 8pt;
			}
			
			.<?= ALL_SCHOOL ?> .location {
				margin-bottom: 0;
			}
			
			.<?= ALL_SCHOOL ?>.busy, .<?= SM_SATURDAY ?>.busy {
				background: <?= col::get(col::STMARKS_BLUE) ?>;
				color: <?= col::get(col::STMARKS_BLUE)->text() ?>;
			}
			
			.<?= ALL_SCHOOL ?>.free, .<?= SM_SATURDAY ?>.free {
				background: <?= col::get(col::STMARKS_BLUE)->light() ?>;
				color: <?= col::get(col::STMARKS_BLUE)->dark() ?>;
				border-color: <?= col::get(col::STMARKS_BLUE)->dark() ?>;
			}
			
			.<?= ALL_SCHOOL ?>.busy input, .<?= SM_SATURDAY ?>.busy input {
				color: <?= col::get(col::STMARKS_BLUE)->text()?>;
			}
			
			.<?= X_BLOCK ?>.busy, .<?= CO_CURRICULAR ?>.busy {
				background: #ddd;
			}
			
			.<?= X_BLOCK ?>.free, .<?= CO_CURRICULAR ?>.free {
				background: #eee;
				color: #999;
			}
			
			<?php if ($printable): ?>
			<?php foreach($COLOR_ENUM as $color): ?>
			.<?= $color ?>.free .title::before {
				<?php
					$label = $color;
					switch($color) {
						case X_BLOCK:
							$label = X_BLOCK_TITLE;
							break;
						case CO_CURRICULAR:
							$label = CO_CURRICULAR_TITLE;
							break;
						case SM_SATURDAY:
							$label = SM_SATURDAY_TITLE;
							break;
					}
				?>
				content: "<?= ucwords($label) ?> ";
			}
			<?php endforeach; ?>
			<?php endif; ?>
			
			<?php for($i = (5 * 60); $i < (200 * 60); $i += (5 * 60)): ?>
			
			.dur<?= $i ?> {
				height: <?= height($i, $minuteHeight) ?>;
			}
			
			<?php if ($i <= 35 * 60): ?>
			.dur<?= $i ?> .details {
				margin-top: 0.5em;
			}
			
			<?php if (!$printable): ?>
			.dur<?= $i ?> .details {
				margin-top: 1.5em;
			}
			<?php endif; ?>
			<?php endif; ?>
			
			<?php if ($printable): ?>
			.free.<?= FREE_BW ?> {
				border-color: black;
				color: black;
				background: transparent;
			}
			<?php endif; ?>
			
			<?php endfor; ?>
		</style>
		<script type="text/javascript"><!--
		
		function toggleFreeBusy(id) {
			if (document.getElementById(id + '-title').value.length > 0) {
				document.getElementById(id).classList.remove('free');
				document.getElementById(id).classList.add('busy');
			} else {
				document.getElementById(id).classList.remove('busy');
				document.getElementById(id).classList.add('free');
			}
		}
		
		--></script>
	</head>
	<body <?php if ($printable): ?>onload="window.print();"<?php else: ?> onload="<?php foreach ($COLOR_ENUM as $color): ?>toggleFreeBusy('<?= $color ?>'); <?php endforeach; ?>"<?php endif; ?>>
		
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

			<div id="controls">
				<div class="section">
					<button type="submit" name="<?= FORM_MODE ?>" value="<?= ($printable ? FORM_MODE_EDITABLE : FORM_MODE_PRINTABLE) ?>"><?= ucwords($printable ? FORM_MODE_EDITABLE : FORM_MODE_PRINTABLE) ?></button>
				<?php if (!$printable): ?>
					<button type="button" onclick="window.location.href=window.location.href;">Reset</button>
				</div>
				<div class="section">
					<label for="<?= FREE_BW ?>-false"><input type="radio" id="<?= FREE_BW ?>-false" name="<?= FREE_BW ?>" value="0" <?= ($bw ? '' : 'checked') ?> /> Color Free Blocks</label>
					<label for="<?= FREE_BW ?>-true"><input type="radio" id="<?= FREE_BW ?>-true" name="<?= FREE_BW ?>" value="1" <?= ($bw ? 'checked' : '') ?> /> B&W Free Blocks</label>
				</div>
				<div class="section">
					<label for="<?= PAGE_SIZE_LETTER ?>"><input type="radio" id="<?= PAGE_SIZE_LETTER ?>" name="<?= PAGE_SIZE ?>" value="<?= PAGE_SIZE_LETTER ?>" <?= ($letter ? 'checked' : '') ?> /> <?= ucwords(PAGE_SIZE_LETTER) ?></label>
					<label for="<?= PAGE_SIZE_LEGAL ?>"><input type="radio" id="<?= PAGE_SIZE_LEGAL ?>" name="<?= PAGE_SIZE ?>" value="<?= PAGE_SIZE_LEGAL ?>" <?= ($letter ? '' : 'checked') ?> /> <?= ucwords(PAGE_SIZE_LEGAL) ?></label>
				</div>
				<?php else: ?>
				<button  type="button" onclick="window.print();"><?= ucwords(FORM_MODE_PRINTABLE) ?></button>
				<input type="hidden" name="<?= FREE_BW ?>" value="<?= ($bw ? 1 : 0) ?>" />
				<input type="hidden" name="<?= PAGE_SIZE ?>" value="<?= ($letter ? PAGE_SIZE_LETTER : PAGE_SIZE_LEGAL) ?>" />
				</div>
				<?php endif; ?>
			</div>
			
			<?php if (!$printable): ?>
			<div id="courses">
				<h2>Enter courses by color</h2>
				<ul>
					<?php foreach($COLOR_ENUM as $color): ?>
					<li class="<?= $color ?> free block" id="<?= $color ?>">
						<span class="title">
							<input name="<?= $color ?>[<?= TITLE ?>]" id="<?= $color ?>-title" type="text" placeholder="<?= ucwords($color) ?> Course" value="<?= $_REQUEST[$color][TITLE] ?>" onblur="toggleFreeBusy('<?= $color ?>');" onload="toggleFreeBusy('<?= $color ?>');" />
						</span>
						<input name="<?= $color ?>[<?= LOCATION ?>]" type="text" value="<?= $_REQUEST[$color][LOCATION] ?>" placeholder="Location" />
					</li>
					<?php endforeach; ?>
				</ul>
				<br clear="all" />
			</div>
			<?php else: ?>
				<?php foreach ($COLOR_ENUM as $color) {
					if (!empty($_REQUEST[$color][TITLE])) {
						?><input type="hidden" name="<?= $color ?>[<?= TITLE ?>]" value="<?= $_REQUEST[$color][TITLE] ?>" /><?php
					}
					if (!empty($_REQUEST[$color][LOCATION])) {
						?><input type="hidden" name="<?= $color ?>[<?= LOCATION ?>]" value="<?= $_REQUEST[$color][LOCATION] ?>" /><?php
					}
				} ?>
			<?php endif;?>
			
			<div id="wrapper">
				
				<?php if (!$printable): ?><h2>Enter a title</h2><?php endif; ?>
				
				<header id="header">
					<h1><?php if ($printable): ?>
							<?= $_REQUEST['header'] ?>
							<input type="hidden" name="header" value="<?= $_REQUEST['header'] ?>" />
						<?php else: ?>
							<input type="text" name="header" value="<?= $header ?>" />
						<?php endif; ?>
					</h1>
				</header>
				
				<div id="content">
					
					<?php if (!$printable): ?><h2>Enter individual blocks</h2><?php endif; ?>
					
					<table id="schedule">
						<tr>
							
							<?php foreach ($schedule as $day => $blocks): ?>
							<td id="<?= $day ?>" class="day">
								<table>
									<tr>
										<th><?= ucwords($day) ?></th>
									</tr>
									
									<?php foreach ($blocks as $color => $info): ?>
									<tr>
										<?php if (preg_match('%' . SPACER . '\d*%', $color)): ?>
										<td class="<?= SPACER ?> block">
											<input type="hidden" name="schedule[<?= $day ?>][<?= $color ?>]" value="<?= SPACER ?>" />
										</td>
										<?php else: ?>
										<td>
											<div class="<?= preg_replace('%\d+%', '', $color) ?> <?= (empty($info[TITLE]) ? 'free' : 'busy') ?> <?= ($bw && !preg_match('%' . FREE . '\d*%', $color) ? FREE_BW : '') ?> block dur<?= $info[END] - $info[START] + (!$printable && !preg_match('%' . FREE . '\d*%', $color) ? 20 * 60 : 0) ?>" id="<?= "$day-$color" ?>">
												<p class="duration">
													<?php if (preg_match('%' . FREE .'\d*%', $color)): ?>
													<?php else: ?>
														<?= date(TIME_FORMAT, $info[START]) ?> &ndash; <?= date(TIME_FORMAT, $info[END]) ?>
													<?php endif; ?>
													<input type="hidden" name="schedule[<?= $day ?>][<?= $color ?>][<?= START ?>]" value="<?= $info[START] ?>" />
													<input type="hidden" name="schedule[<?= $day ?>][<?= $color ?>][<?= END ?>]" value="<?= $info[END] ?>" />
												</p>
	
												<div class="details">
													<p class="title">
														<?php if ($printable): ?>
															<?= $info[TITLE] ?>
															<input type="hidden" name="schedule[<?= $day ?>][<?= $color ?>][<?= TITLE ?>]" value="<?= $_REQUEST['schedule'][$day][$color][TITLE] ?>" />	
														<?php else: ?>
															<?php if (preg_match('%' . FREE . '\d*%', $color)): ?>
																<input type="hidden" name="schedule[<?= $day ?>][<?= $color ?>][<?= TITLE ?>]" value="<?= $info[TITLE] ?>" />
															<?php else: ?>
																<input type="text" name="schedule[<?= $day ?>][<?= $color ?>][<?= TITLE ?>]" id="<?= "$day-$color" ?>-title" value="<?= $info[TITLE] ?>" placeholder="<?= (preg_match('%' . X_BLOCK . '\d*%', $color) || $color == SM_SATURDAY ? ($color == SM_SATURDAY ? SM_SATURDAY_TITLE : ucwords($day . ' ' . X_BLOCK_TITLE)) : ucwords($day . ' ' . ucwords(preg_replace('%\d+%', '', $color)))) ?>" onblur="toggleFreeBusy('<?= "$day-$color" ?>');" onload="toggleFreeBusy('<?= "$day-$color" ?>');" />
															<?php endif; ?>
														<?php endif; ?>
													</p>
													<?php if ($printable): ?>
														<?php if (!empty($info[LOCATION])): ?>
															<p class="location">
																<?= $info[LOCATION] ?>
																<input type="hidden" name="schedule[<?= $day ?>][<?= $color ?>][<?= LOCATION ?>]" value="<?= $_REQUEST['schedule'][$day][$color][LOCATION] ?>" />
															</p>
														<?php endif; ?>
													<?php else: ?>
														<p class="location">
															<?php if (preg_match('%' . FREE . '\d*%', $color)): ?>
															<?php else: ?>
																<input type="text" name="schedule[<?= $day ?>][<?= $color ?>][<?= LOCATION ?>]" value="<?= $info[LOCATION] ?>" placeholder="Location" />
															<?php endif; ?>
														</p>
													<?php endif; ?>
												</div>
											</div>
										</td>
										<?php endif; ?>
									</tr>
									<?php endforeach; ?>
									
								</table>
							</td>
							<?php endforeach; ?>
							
						</tr>
					</table>
					
				</div>
				
				<?php if (!$printable): ?><h2>Enter a note for the bottom of the schedule</h2><?php endif; ?>
				
				<footer id="footer">
					<p><?php if ($printable): ?>
							<?= $_REQUEST['footer'] ?>
							<input type="hidden" name="footer" value="<?= $_REQUEST['footer'] ?>" />
						<?php else: ?>
							<textarea type="text" name="footer"><?= $footer ?></textarea>
						<?php endif; ?>
					</p>
				</footer>
			</div>
		</form>
	</body>
</html>