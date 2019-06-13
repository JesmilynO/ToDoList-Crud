<?php
require_once('db_connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>My todo list</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>What to do next:</h2>

	<p><a href="create.php">Add todo</a></p>

	<?php
	db();
	global $link;
	$query = "SELECT id, todoTitle, todoDescription, date FROM todo";
	$result = mysqli_query($link, $query);
	//check if there's any data inside the table
	if(mysqli_num_rows($result) >=1){
		while($row = mysqli_fetch_array($result)){
		$id = $row['id'];
		$title = $row['todoTitle'];
		$date = $row['date'];
	?>

	<ul>
		<li><a href="detail.php?id=<?php echo $id?>"><?php echo $title ?></a></li> <?php echo "[$date]<br><br>"; ?>
	</ul>

	<?php 
}
}
	?>

</body>
</html>