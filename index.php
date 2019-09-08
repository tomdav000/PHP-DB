<!DOCTYPE html>
<html>
<head>
	<title>:::APP09:::</title>
</head>
<body>
<?php require_once 'routes/routes.php' ;?>
<?php
	$mysqli = new mysqli('localhost', 'root', 'root', 'crud') or die(mysqli_error($mysqli));
	$result = $mysqli->query(" SELECT * FROM data ") or die($mysqli->error);
?>
<?php
	while($row = $result->fetch_assoc()):
?>
<p><?php echo $row['name']; ?></p>

<a href="index.php?edit=<?php echo $row['id']; ?>">edit</a>

<a href="routes/routes.php?delete=<?php echo $row['id']; ?>">delete</a>

<?php endwhile; ?>

<form action='routes/routes.php' method='POST'>
	<input type='hidden' name='id' value='<?php echo $id; ?>'>

	<input type='text' name='name' value='<?php echo $name; ?>'>
	<input type='text' name='location' value='<?php echo $location; ?>'>
	<?php if($update == true):?>
		<input type='submit' name='update' value='update'>
	<?php else:?>
		<input type='submit' name='add' value='add'>
	<?php endif; ?>
</form>
</body>
</html>