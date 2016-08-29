{extends file="subpage.tpl"}
{block name="subcontent"}

<div class="container">
	<div class="readable-width">
		<p>Use this to generate printable book lists for each class.</p>
	</div>
</div>

{assign var="formFileUpload" value=true}
{include file="book-list/form.tpl"}

<div class="container">
    <div class="readable-width">
        <p>To see a preview of what a book list looks like, <a href="book-list-example.php">click here</a></p>
    </div>
</div>

{/block}
