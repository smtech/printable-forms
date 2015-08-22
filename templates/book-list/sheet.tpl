<html>
	<head>
		<title>Book Lists</title>
		<link rel="stylesheet" href="stylesheets/book-list.css" />
	</head>
	<body>
		<div id="wrapper">
		
		{foreach $sections as $s}
			<div class="section">
				<div class="metadata">
					<div class="name">{$s['metadata']['name']}</div>
					<div class="id">{$s['metadata']['id']}</div>
					<div class="teacher">{$s['metadata']['teacher']}</div>
					<div class="count books">{count($s['books'])} books</div>
					<div class="count students">{count($s['students'])} students</div>
				</div>
				
				<div class="instructions">
					<p>Please follow these directions exactly (and promptly):</p>
					<ol>
						<li>Distribute books to your students on the first day of class</li>
						<li>Ask your students, <em>on that day</em> to initial the books that they have received on this form.</li>
						<li>Double-check your book count, books distributed and books remaining and initial this form.</li>
						<li>Return this form and any remaining books to your department chair by the end of the first day of classes.</li>
					</ol>
					<p>Students who drop the class may return their books directly to the bookstore. Students who are added to the class later may purchase their books at the bookstore.</p>
				</div>
			
				<table class="book-list">
					<thead>
						<tr class="books">
							<td/>
							{foreach $s['books'] as $book}
								<th class="book">{$book}</th>
							{/foreach}
						</tr>
					</thead>
					<tbody>
						{foreach $s['students'] as $student}
							<tr>
								<th class="student">{$student}</th>
								{for $i = 1 to count($s['books'])}
									<td class="initial">&nbsp;</td>
								{/for}
							</tr>
						{/foreach}
						{for $i = 1 to $blanks}
							<tr>
								<th class="student">&nbsp;</th>
								{for $j = 1 to count($s['books'])}
									<td class="initial">&nbsp;</td>
								{/for}
							</tr>
						{/for}
					</tbody>
					<tfoot>
						<tr>
							<th class="count">Bookstore Dist. Count</th>
							{for $j = 1 to count($s['books'])}
								<td class="count">&nbsp;</td>
							{/for}
						</tr>
						<tr>
							<th class="count">Dept. Dist. Count</th>
							{for $j = 1 to count($s['books'])}
								<td class="count">&nbsp;</td>
							{/for}
						<tr>
							<th class="count">Teacher Dist. Count</th>
							{for $j = 1 to count($s['books'])}
								<td class="count">&nbsp;</td>
							{/for}
						</tr>
						</tr>
						<tr>
							<th class="count">Teacher Returned Count</th>
							{for $j = 1 to count($s['books'])}
								<td class="count">&nbsp;</td>
							{/for}
						</tr>
						<tr>
							<th class="count">Dept. Dist. Count</th>
							{for $j = 1 to count($s['books'])}
								<td class="count">&nbsp;</td>
							{/for}
						</tr>
						<tr>
							<th class="count">Bookstore Received Count</th>
							{for $j = 1 to count($s['books'])}
								<td class="count">&nbsp;</td>
							{/for}
						</tr>
					</tfoot>
				</table>

				<table class="initials">
					<caption>Initials</caption>
					<tbody>
						<tr>
							<th>Teacher</th>
							<td class="initial">&nbsp;</td>
						</tr>
						<tr>
							<th>Dept. Chair</th>
							<td class="initial">&nbsp;</td>
						</tr>
					</tbody>
				</table>				
			</div>
		{/foreach}
		
		</div>
	</body>
</html>