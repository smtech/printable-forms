{extends file="form.tpl"}
{block name="form-content"}
	
	<div class="form-group">
		<label for="csv" class="control-label col-sm-2">Book list CSV file</label>
		<div class="col-sm-3">
			<input name="csv" id="csv" type="file" class="form-control"/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="blanks" class="control-label col-sm-2">Blanks</label>
		<div class="col-sm-3">
			<input name="blanks" id="blanks" type="text" class="form-control" placeholder="Number of blank rows on each sheet" autofocus="autofocus" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4">
			<button type="submit" class="btn btn-primary">Generate Book Lists</button>
		</div>	
	</div>
	
{/block}