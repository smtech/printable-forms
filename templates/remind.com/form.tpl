{extends file="form.tpl"}

{block name="form-content"}

    <div class="container readable-width">
        <div class="form-group">
            <textarea class="form-control" name="embed" style="font-family: monospace;" rows="5"></textarea>
            <p class="help-block">Paste the embed code from Remind.com in the text box.</p>
        </div>

        <div class="form-group">
            <button type="submit">Convert</button>
        </div>
    </div>

{/block}

{block name="form-buttons"}{/block}
