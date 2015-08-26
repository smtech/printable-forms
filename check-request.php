<?php 
	
	$payToBlankWidth = "3.6875in";
	$dateBlankWidth = "2.1875in";
	$accountNumberBlankWidth = "1.625in";
	$columnSpaceWidth = "0.3125in";
	$descriptionBlankWidth = "5.25in";
	$amountBlankWidth = "1.625in";
	$pleaseGiveCheckToBlankWidth = "4in";
	$tableWidth = "9.125in";
	$blankLineHeight = "0.3125in";
	$checkboxOffset = "0.7em";
	
	$isPrintView = isset($_REQUEST["isPrintView"]);

	$today = date('Y-m-d');

?>
<!doctype HTML5 />
<html>
<head>
	<title><?= $today ?> Check Request<?php if (isset($_REQUEST['payTo'])) { $name = explode(' ', $_REQUEST['payTo']); echo ' (' . array_pop($name) . ')'; } ?></title>
	<style>
		@page {
			size: landscape;
			margin: 0;
		}
		
		body, h1, h2, h3, table, th, td, input[type=text] {
			font-family: Arial, Helvetica, Sans-serif;
			font-size: 10pt;
			padding: 0;
			margin: 0;
			border: 0;
			border-collapse: collapse;
		}
				
		.monospace {
			font-family: Courier, monospace;
			font-size: 10pt;
		}
		
		.checkbox {
			font-size: 24pt;
			width: 24pt;
		}

		h1, h2, h3 {
			font-weight: bold;
			text-transform: uppercase;
		}
		
		h1, h2 {
			text-align: center;
		}
		
		h1 {
			font-size: 14pt;
			margin-top: 1em;
		}
		
		h2 {
			font-size: 12pt;
			margin-bottom: 1em;
		}
		
		h3 {
			text-align: left;
			margin-bottom: 3em;
			margin-top: 1em;
		}
		
		tr {
			vertical-align: bottom;
		}
		
		th {
			font-weight: bold;
			text-align: center;
		}
		
		td {
			text-align: right;
			padding-right: 4pt;
		}
				
		.blank {
			border: none;
			border-bottom: solid 1px black;
			height: <?= $blankLineHeight ?>;
			text-align: left;
			padding: 0;
		}

		td.blank.account,
		td.blank.account input,
		td.blank.amount,
		td.blank.amount input {
			text-align: center;
		}
				
		input[type=text] {
			border: none;
			background-color: #fffad2;
		}
		
		.credit,
		.credit a {
			font-size: 7pt;
			text-align: center;
			padding-top: 1em;
			color: gray;
			text-decoration: none;
		}
	</style>
	<script><!--
		// http://www.javascriptbank.com/currency-format-script.html
		function formatCurrency(num) {
			num = num.toString().replace(/\$|\,/g,'');
			if(isNaN(num))
				num = "0";
			sign = (num == (num = Math.abs(num)));
			num = Math.floor(num*100+0.50000000001);
			cents = num%100;
			num = Math.floor(num/100).toString();
			if(cents<10)
				cents = "0" + cents;
			for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
				num = num.substring(0,num.length-(4*i+3))+','+num.substring(num.length-(4*i+3));
			return (((sign)?'':'-') + '$ ' + num + '.' + cents);
		}
	//--></script>
</head>
<body <?php if ($isPrintView) echo 'onload="window.print();"'; else echo 'onload="document.getElementById(\'payTo\').focus();"'; ?>>
<form name="checkRequest" method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
	<table style="width: <?= $tableWidth ?>; margin: auto;">
		<tr>
			<td><h1>Saint Mark&rsquo;s School</h1>
				<h2>Check Request</h2></td>
		</tr>
		<tr>
			<td>
				<table style="width: 100%;">
					<tr style="vertical-align: middle;">
						<td align="left">
							<table>
								<tr>
									<td>Pay To:</td>
									<td class="blank" style="width: <?= $payToBlankWidth ?>;"><?php if ($isPrintView) echo $_REQUEST["payTo"]; else echo '<input name="payTo" id="payTo" type="text" style="width: ' . $payToBlankWidth . ';" onchange="' . "
										document.getElementById('pleaseGiveCheckTo').value = document.getElementById('payTo').value;
										checkDestination = document.getElementsByName('checkDestination');
										for (i = 0; i < checkDestination.length; i++) {
											if (checkDestination[i].value == 'give') {
												checkDestination[i].checked = true;
											}
											else {
												checkDestination[i].checked = false;
											}
										}
										" . '" />'; ?></td>
								</tr>
								<tr>
									<td>Address:</td>
									<td class="blank"><?php if ($isPrintView) echo $_REQUEST["addressLine1"]; else echo '<input name="addressLine1" id="addressLine1" type="text" style="width: ' . $payToBlankWidth . ';" onchange="
										if (document.getElementById(\'addressLine1\').value.length) {
											document.getElementById(\'pleaseGiveCheckTo\').value = \'\';
										}
										checkDestination = document.getElementsByName(\'checkDestination\');
										for (i = 0; i < checkDestination.length; i++) {
											if (checkDestination[i].value == \'mail\') {
												checkDestination[i].checked = true;
											}
											else {
												checkDestination[i].checked = false;
											}
										}" />'; ?></td>
								</tr>
								<tr>
									<td rowspan="2"></td>
									<td class="blank"><?php if ($isPrintView) echo $_REQUEST["addressLine2"]; else echo '<input name="addressLine2" id="addressLine2" type="text" style="width: ' . $payToBlankWidth . ';" />'; ?></td>
								</tr>
								<tr>
									<td class="blank"><?php if ($isPrintView) echo $_REQUEST["addressLine3"]; else echo '<input name="addressLine3" id="addressLine3" type="text" style="width: ' . $payToBlankWidth . ';" />'; ?></td>
								</tr>
							</table>
						</td>
						<td align="right">
							<table style="width: 100%;">
								<tr>
									<td>Date:</td>
									<td class="blank" style="width: <?= $dateBlankWidth ?>;"><?php if ($isPrintView) echo $_REQUEST["date"]; else echo '<input name="date" id="date" type="text" style="width: ' . $dateBlankWidth . ';" value="' . date("n/j/Y") . '" />'; ?></td>
								</tr>
								<tr>
									<td>Dept. Approved:</td>
									<td class="blank"></td>
								</tr>
								<tr>
									<td>Bus. Off. Approved:</td>
									<td class="blank"></td>
								</tr>
								<tr>
									<td>Check Number:</td>
									<td class="blank"></td>
								</tr>
								<tr>
									<td>Amount:</td>
									<td class="blank"></td>
								</tr>
								<tr>
									<td>Date Paid:</td>
									<td class="blank"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3"><h3>Distribution:</h3></td>
		</tr>
		<tr>
			<td colspan="3">
				<table style="width: 100%;">
					<tr>
						<th style="width: <?= $accountNumberBlankWidth ?>;">Account Number:</th>
						<td style="width: <?= $columnSpaceWidth ?>;"></td>
						<th style="width: <?= $descriptionBlankWidth ?>;">Description</th>
						<td style="width: <?= $columnSpaceWidth ?>;"></td>
						<th style="width: <?= $amountBlankWidth ?>;">Amount</th>
					</tr>
					<tr> 
						<td class="blank account"><?php if ($isPrintView) echo $_REQUEST["accountNumberLine1"]; else echo '<input name="accountNumberLine1" id="accountNumberLine1" type="text" style="width: ' . $accountNumberBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank"><?php if ($isPrintView) echo $_REQUEST["descriptionLine1"]; else echo '<input name="descriptionLine1" id="descriptionLine1" type="text" style="width: ' . $descriptionBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank amount"><?php if ($isPrintView) echo $_REQUEST["amountLine1"]; else echo '<input name="amountLine1" id="amountLine1" type="text" style="width: ' . $amountBlankWidth . ';" onchange="document.getElementById(\'amountLine1\').value = formatCurrency(document.getElementById(\'amountLine1\').value);" />'; ?></td>
					</tr>
					<tr>
						<td class="blank account"><?php if ($isPrintView) echo $_REQUEST["accountNumberLine2"]; else echo '<input name="accountNumberLine2" id="accountNumberLine2" type="text" style="width: ' . $accountNumberBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank"><?php if ($isPrintView) echo $_REQUEST["descriptionLine2"]; else echo '<input name="descriptionLine2" id="descriptionLine2" type="text" style="width: ' . $descriptionBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank amount"><?php if ($isPrintView) echo $_REQUEST["amountLine2"]; else echo '<input name="amountLine2" id="amountLine2" type="text" style="width: ' . $amountBlankWidth . ';" onchange="document.getElementById(\'amountLine2\').value = formatCurrency(document.getElementById(\'amountLine2\').value);" />'; ?></td>
					</tr>
					<tr>
						<td class="blank account"><?php if ($isPrintView) echo $_REQUEST["accountNumberLine3"]; else echo '<input name="accountNumberLine3" id="accountNumberLine3" type="text" style="width: ' . $accountNumberBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank"><?php if ($isPrintView) echo $_REQUEST["descriptionLine3"]; else echo '<input name="descriptionLine3" id="descriptionLine3" type="text" style="width: ' . $descriptionBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank amount"><?php if ($isPrintView) echo $_REQUEST["amountLine3"]; else echo '<input name="amountLine3" id="amountLine3" type="text" style="width: ' . $amountBlankWidth . ';" onchange="document.getElementById(\'amountLine3\').value = formatCurrency(document.getElementById(\'amountLine3\').value);" />'; ?></td>
					</tr>
					<tr>
						<td class="blank account"><?php if ($isPrintView) echo $_REQUEST["accountNumberLine4"]; else echo '<input name="accountNumberLine4" id="accountNumberLine4" type="text" style="width: ' . $accountNumberBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank"><?php if ($isPrintView) echo $_REQUEST["descriptionLine4"]; else echo '<input name="descriptionLine4" id="descriptionLine4" type="text" style="width: ' . $descriptionBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank amount"><?php if ($isPrintView) echo $_REQUEST["amountLine4"]; else echo '<input name="amountLine4" id="amountLine4" type="text" style="width: ' . $amountBlankWidth . ';" onchange="document.getElementById(\'amountLine4\').value = formatCurrency(document.getElementById(\'amountLine4\').value);" />'; ?></td>
					</tr>
					<tr>
						<td class="blank account"><?php if ($isPrintView) echo $_REQUEST["accountNumberLine5"]; else echo '<input name="accountNumberLine5" id="accountNumberLine5" type="text" style="width: ' . $accountNumberBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank"><?php if ($isPrintView) echo $_REQUEST["descriptionLine5"]; else echo '<input name="descriptionLine5" id="descriptionLine5" type="text" style="width: ' . $descriptionBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank amount"><?php if ($isPrintView) echo $_REQUEST["amountLine5"]; else echo '<input name="amountLine5" id="amountLine5" type="text" style="width: ' . $amountBlankWidth . ';" onchange="document.getElementById(\'amountLine5\').value = formatCurrency(document.getElementById(\'amountLine5\').value);" />'; ?></td>
					</tr>
					<tr>
						<td class="blank account"><?php if ($isPrintView) echo $_REQUEST["accountNumberLine6"]; else echo '<input name="accountNumberLine6" id="accountNumberLine6" type="text" style="width: ' . $accountNumberBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank"><?php if ($isPrintView) echo $_REQUEST["descriptionLine6"]; else echo '<input name="descriptionLine6" id="descriptionLine6" type="text" style="width: ' . $descriptionBlankWidth . ';" />'; ?></td>
						<td></td>
						<td class="blank amount"><?php if ($isPrintView) echo $_REQUEST["amountLine6"]; else echo '<input name="amountLine6" id="amountLine6" type="text" style="width: ' . $amountBlankWidth . ';" onchange="document.getElementById(\'amountLine6\').value = formatCurrency(document.getElementById(\'amountLine6\').value);" />'; ?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="width: 100%; padding-top: 2em; text-align: left;">Check One:</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td class="checkbox"><?php if ($isPrintView) {
							if ($_REQUEST["checkDestination"] == "mail") echo "&#9745;";
							else echo "&#9744;";
						}
						else echo '<input name="checkDestination" type="radio" value="mail" style="margin-bottom: ' . $checkboxOffset . ';" />'; ?></td>
						<td colspan="2" style="text-align: left; padding-bottom: <?= $checkboxOffset ?>;">Please Mail Check</td>
					</tr>
					<tr>
						<td class="checkbox"><?php if ($isPrintView) {
							if ($_REQUEST["checkDestination"] == "give") echo "&#9745;";
							else echo "&#9744;";
						}
						else echo '<input name="checkDestination" type="radio" value="give" checked style="margin-bottom: ' . $checkboxOffset . '" />'; ?></td>
						<td style="text-align: left; padding-bottom: <?= $checkboxOffset ?>;">Please give check to</td>
						<td style="width: <?= $pleaseGiveCheckToBlankWidth ?>; padding-bottom: <?= $checkboxOffset ?>;"><?php if ($isPrintView) echo '<div class="blank" style="width:' . $pleaseGiveCheckToBlankWidth .'; text-align: left; height: auto;">' . $_REQUEST["pleaseGiveCheckTo"] . '</div>'; else echo '<input name="pleaseGiveCheckTo" id="pleaseGiveCheckTo" type="text" class="blank" style="width: ' . $pleaseGiveCheckToBlankWidth . '; height: auto; border-bottom: solid black 1px;" />'; ?></td>
					</tr>
				</table>
			</td>
		</tr>
		<?php if (!$isPrintView) echo '<tr><td style="padding: 1em 0px; width: 100%; text-align: center;"><input name="isPrintView" id="isPrintView" type="submit" value="Print"; /></td></td>'; ?>
		<tr>
			<td colspan="3" style="padding-top: 1em;">
				<table>
					<tr style="vertical-align: top;">
						<td class="monospace" style="white-space: nowrap; text-align: left;">***PLEASE NOTE ****&nbsp;&nbsp;&nbsp;</td>
						<td class="monospace" style="width: 100%; text-align:left;">Check requests must be turned in to the Business Office by 4:00 p.m. on Tuesday, in order to receive a check on Friday of the same week. Thank you.</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
</body>
</html>
