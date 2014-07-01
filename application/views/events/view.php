<?php 
echo "When: " . $events_item['date'] . "<p />";
echo '<h2>'.$events_item['title'].'</h2>';
echo $events_item['description'] . "<p />";
echo "<a href=../edit/".$events_item['id'].">Edit</a><p />"; /**/
