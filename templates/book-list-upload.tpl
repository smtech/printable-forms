{extends file="page.tpl"}
{block name="content"}

<h1>Generate Book List Forms</h1>

<form action="{$formAction}" method="post" enctype="multipart/form-data">
	<input type="file" name="csv" />
	<input type="text" name="blanks" placeholder="Number of blank rows" />
	<input type="submit" value="Generate Book Lists" />
</form>

{/block}