<html>
	<head>
		<link rel="stylesheet" href="stylesheets/standards-map.css" />
	</head>
	<body>
		<div id="wrapper">
			<div id="content">
				
				<table>
					<thead>
						<tr class="courses">
							<td>
								<h1>{$dept}</h1>
							</td>
							{foreach $courses as $course}
								<th class="course">{$course}</th>
							{/foreach}
						</tr>
					</thead>
					<tbody>
						{assign var="group" value=0}
						{foreach $map as $row}
							{if strpos($row[0], '.') == false}
								{assign var="groupHead" value=true}
								{assign var="group" value=$group+1}
							{else}
								{assign var="groupHead" value=false}
							{/if}
							<tr class="standards-group {if $group % 2 == 1}odd{else}even{/if}{if $groupHead} head{/if}">
								{for $i=0 to count($row)-1}
									{if $i == 0}
										<th><div class="standard"><span class="code">{$row[$i]}</span>
									{elseif $i == 1}
										<span class="description">{$row[$i]}</span></div></th>
									{else}
										<td {if !empty($row[$i])}class="marked"><span class="marker"></span{/if}></td>
									{/if}
								{/for}
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>