{extends file="page.tpl"}
{block name="content"}

<h1>Generate Book List Forms</h1>

<form action="{$formAction}" method="post" enctype="multipart/form-data">
	<p><input type="file" name="csv" /></p>
	<p><input type="text" name="blanks" placeholder="Number of blank rows" /></p>
	<p><input type="submit" value="Generate Book Lists" /></p>
</form>

{/block}