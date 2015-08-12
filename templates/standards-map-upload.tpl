{extends file="page.tpl"}
{block name="content"}

<form enctype="multipart/form-data" action="{$formAction}" method="post">
	<input name="csv" type="file" />
	<input type="submit" value="Generate Map" />
</form>

{/block}