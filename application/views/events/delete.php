<h2>Delete an event</h2>

<?php
$id = $events_item['id'];
$id *= -1;
?>

Are you sure you want to delete the event titled "<? echo $events_item['title'] ?>"? It can never be recovered.

<?php echo form_open("events/delete/$id") ?>

<input type="submit" name="submit" value="Yes, delete it forever and ever" /> 

</form>

<?php echo form_open("events/") ?>

<input type="submit" name="submit" value="No! I didn't mean to hit delete" />

</form>


