<div style="float:left">
<h2>Create a new event</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('events/create') ?>

	<label for="title">Title</label> 
	<input type="input" name="title" value="<?php if (isset($_POST['title'])) { echo $_POST['title']; }?>"/><br />
	
	<label for="date">Date</label>
	<input type="date" name="date" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>"</input> <br />
	
	<label for="description">Description</label>
	<textarea name="description" rows=10 cols=50><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea><br />
	
	<input type="submit" name="submit" value="Create event" /> 

</form>
</div>
<div style="float:right">
<img src="/images/pirate_blast.jpg">
</div>
