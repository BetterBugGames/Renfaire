<div style="float:left">
<a href="/index.php/events/create/">Create a new event</a><br />

<?php foreach ($events as $events_item): ?>
	
    <h2><?php echo $events_item['title'] ?></h2>
    <h3><?php echo $events_item['date'] ?></h3>
    <div id="main">
        <?php echo $events_item['description'] ?>
    </div>
    <p><a href="/index.php/events/view/<?php echo $events_item['id'] ?>">View event</a></p>

<?php endforeach ?>

<?php 
	$query = $this->db->query("SELECT COUNT(*) as c FROM events WHERE unix_timestamp( ) < unix_timestamp( replace( events.date, '-', '' ) )");
	$num = $query->row_array();
	if($num['c'] % 5 == 0){
		$pages = $num['c'] / 5;
	}else{
		$pages = (int)($num['c'] / 5) + 1;
	}
	if($pages > 1){
		echo "Pages: ";
		for($i = 1; $i <= $pages; $i++){
			echo "<a href=/index.php/events/index/$i>$i</a> | ";
		}
	}
?>

</div>
<div style="height:533px;width:400px;float:right">
<img src="/images/event_pirate.jpg">
</div>
