{extends file="subpage.tpl"}

{block name="subcontent"}

    <div class="container readable-width">
        <p>Your embed code is:</p>
        <p>
            <textarea class="form-control" id="embed" style="font-family: monospace;" rows="5"><iframe id="remind101-widget-0" class="remind101-messages" style="border: 0;" title="Remind messages" src="https://widgets.remind.com/widget?height={$height}&amp;join={$join}&amp;token={$token}" width="100%" height="{$height}px"></iframe></textarea>
        <p>
        <button class="btn btn-primary" type="button" onclick="$(embed).select(); document.execCommand('copy');">Copy Embed Code</button>
    </div>

    <div class="container readable-width">
        <p>In Canvas, in the Rich Content Editor where you would like to place this widget (probably a Page, but maybe a Discussion or an Assignment), switch to the HTML Editor (top-right of the toolbar) and paste in your embed code. Then switch back to Rich Content Editor and continue editing.</p>
    </div>

{/block}
