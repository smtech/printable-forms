{extends file="subpage.tpl"}
{block name="subcontent"}

<div class="container">
	<p>The process for generating a "nice" standards map is:</p>
	
	<ol>
		<li>Install the bookmarklet, by dragging this bookmarklet to your bookmarks bar: <span class="label label-primary bookmarklet"><a href="{$bookmarklet}">Generate Map</a></span></li>
		<li>Browse <a href="http://curricuplan.stmarksschool.org">CurricUplan</a> and&hellip;</li>
		<li>&hellip;while viewing an analysis, click the bookmarklet.</li>
	</ol>
	
	<p><em>Nota bene:</em> the first time you click the bookmarklet, probably nothing will happen, because the browser is blocking pop-ups from CurricUplan. Look in your browser's location bar for an icon or message indicating that pop-up window was blocked and then allow pop-ups from CurricUplan.</p>
	
	<p>Your mileage may vary, depending on what browser you use, as to what your print-outs look like. Chrome <em>seems</em> to be most reliable, as of August 2015, but that may vary wildly as time progresses.</p>
	
	<p>Et voil&#224;!</p>
</div>

{/block}