<h2>Edit an event</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('events/edit/'.$events_item['id']) ?>

	<label for="title">Title</label> 
	<input type="input" name="title" value="<?php echo $events_item['title']; ?>"/><br />

	<label for="date">Date</label>
	<input type="date" name="date" value="<?php echo $events_item['date']; ?>"></input><br />
	
	<label for="description">Description</label>
	<textarea name="description"><?php echo $events_item['description']; ?></textarea><br />
	
	<input type="hidden" name="id" value="<?php echo $events_item['id']; ?>" /><br />
	
	<input type="submit" name="submit" value="Done editing event" /> 

</form>

<?php echo form_open('events/delete/'.$events_item['id']) ?>
<input type="submit" name="submit" value="Delete this event" />
