{extends file="form.tpl"}

{block name="form-content"}

	<div class="form-group">
		<label for="csv" class="control-label col-sm-{$formLabelWidth}">Book list CSV file</label>
		<div class="col-sm-3">
			<input name="csv" id="csv" type="file" class="form-control"/>
		</div>
	</div>

	<div class="form-group">
		<label for="teacher-deadline" class="control-label col-sm-{$formLabelWidth}">Teacher Deadline</label>
		<div class="col-sm-4">
			<div class="input-group date">
				<input type="text" class="form-control" name="teacher-deadline" id="teacher-deadline" placeholder="When is the form due from teachers?" /><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="dept-deadline" class="control-label col-sm-{$formLabelWidth}">Dept. Deadline</label>
		<div class="col-sm-4">
			<div class="input-group date">
				<input type="text" class="form-control" name="dept-deadline" id="dept-deadline" placeholder="When is the form due from dept. heads?" /><div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="blanks" class="control-label col-sm-{$formLabelWidth}">Blanks</label>
		<div class="col-sm-3">
			<input name="blanks" id="blanks" type="text" class="form-control" placeholder="Number of blank rows on each sheet" autofocus="autofocus" />
		</div>
	</div>
	
	{assign var="formButton" value="Generate Book List Sheets"}

{/block}