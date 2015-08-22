<html>
	<head>
		<link rel="stylesheet" href="stylesheets/standards-map/sheet.css" />
	</head>
	<body>
		<div id="wrapper">
			<div id="content">
				
				<h1>{$title}</h1>
				
				<table>
					<thead>
						<tr class="courses">
							<td/>
							{foreach $courses as $course}
								<th><div class="course">{$course}</div></th>
							{/foreach}
						</tr>
					</thead>
					<tbody>
						{assign var="group" value=0}
						{foreach $map as $level}
							{if strpos($level['standard']['code'], '.') == false}
								{assign var="groupHead" value=true}
								{assign var="group" value=$group+1}
							{else}
								{assign var="groupHead" value=false}
							{/if}
							<tr class="standards-group {if $group % 2 == 1}odd{else}even{/if}{if $groupHead} head{/if}">
								<th>
									<div class="standard">
										<span class="code">{$level['standard']['code']}</span>
										<span class="description">{$level['standard']['description']}</span>
									</div>
								</th>
								{foreach $level['marks'] as $mark}
									<td {if $mark > 0}class="marked"><span class="marker"></span{/if}></td>
								{/foreach}
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>