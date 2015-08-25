<html>
	<head>
		<title>Book Lists</title>
		<link rel="stylesheet" href="stylesheets/book-list.css" />
	</head>
	<body>
		<div id="wrapper">
		
		{foreach $sections as $s}
			<div class="section">
				<div class="page page-1">
					<div class="metadata">
						<div class="name">{$s['metadata']['name']}</div>
						<div class="id">{$s['metadata']['id']}</div>
						<div class="teacher">{$s['metadata']['teacher']}</div>
						<div class="count books">{count($s['books'])} books</div>
						<div class="count students">{count($s['students'])} students</div>
					</div><!-- metadata -->
					
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
								<th class="count">Issued to Teacher</th>
								{for $j = 1 to count($s['books'])}
									<td class="count">&nbsp;</td>
								{/for}
							</tr>
							<tr>
								<th class="count">Returned by Teacher</th>
								{for $j = 1 to count($s['books'])}
									<td class="count">&nbsp;</td>
								{/for}
							</tr>
						</tfoot>
					</table><!-- book-list-->
	
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
					</table><!-- initials -->
				</div><!-- page-1 -->
	
				<div class="page page-2">
					<div class="instructions">
		
						<h3>Instructions for Students</h3>
		
						<ul>
							<li>Please initial under the column of each book or supply received in your row.</li>
							<li>If you later need to return your book or supply, please return it directly to the Book Store.</li>
							<li>The Book Store can only accept unmarked books and supplies. If you think that you may drop this class, please do not put your name on anything... yet.</li>
							<li>If you have been added to this class after books and supplies have been distributed, you may purchase them directly from the Book Store.</li>
						</ul>
						
						<h3>Instructions for Teachers</h3>
		
						<ul>
							<li>Upon receiving your books and supplies from your department chair, count to be sure that the number you have been issued matches the number listed on your sheet in the "Issued to Teacher" row.</li>
							<li>On the first day of class:
								<ol>
									<li>Issue books and supplies to your students.</li>
									<li>Ensure that every student initials in the columns corresponding to the books and supplies that they have received.</li>
									<li>Count your remaining books and supplies and enter those tallies in the "Returned by Teacher" row.</li>
									<li>Initial this sheet to indicate that it is correct (students have initialed, tallies are accurate) to the best of your knowledge.</li>
									<li>Return this sheet (with all extra books and supplies) to your department chair immediately after classes on <strong>{$teacherDeadline}</strong>.</li>
								</ol>
							</li>
							<li>Students who drop your class must return their unused, unmarked books and supplies directly to the Book Store.</li>
							<li>Students who add your class must purchase necessary books and supplies directly from the Book Store.</li>
						</ul>
		
						<h3>Instructions for Department Chairs</h3>
		
						<ul>
							<li>Upon receiving books and supplies from the Book Store
								<ol>
									<li>Count to be sure that the number you have been issued matches the number in your email from the Book Store.</li>
									<li>For each section, please indicate how many of each book and supply is being issued to that teacher for that section in the "Issued to Teacher" row.</li>
									<li>Distribute books, supplies and this sheet to each teacher in your department for each of the sections that they teach prior to the first day of classes.</li>
								</ol>
							</li>
							<li>Teachers will return their spare books and supplies and initialed sheets to you after classes on <strong>{$teacherDeadline}</strong>.
								<ol>
									<li>Count to be sure that the number of books and supplies returned for each section matches the tallies indicated in the "Returned by Teacher".</li>
									<li>Initial this sheet to indicate that it is correct (students have initialed, tallies are accurate, teacher has initialed) to the best of your knowledge.</li>
									<li>Return this sheet (with all extra books and supplies) to the Book Store by <strong>9:00am, {$deptDeadline}</strong>.</li>
								</ol>
							</li>
							<li>Students who drop a class must return their unused, unmarked books and supplies directly to the Book Store.</li>
								<li>Students who add a class must purchase necessary books and supplies directly from the Book Store.</li>
						</ul>
					</div><!-- instructions -->
				</div><!-- page-2 -->
			</div><!-- section -->
						
		{/foreach}
		
		</div><!-- wrapper -->
	</body>
</html>