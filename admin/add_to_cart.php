
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	$sql = "SELECT * FROM products";
	$exe = mysqli_query($conn,$sql);

	while($row=mysqli_fetch_array($exe)){
		$id = $row['id'];
        $category = $row['category'];
        $name = $row['name'];
        $image = $row['image'];
        $price = $row['price'];
	 ?>
	
	<form method="post">
		<img src="uploads/<?php echo $image ?>">
		<input type="text" name="image" value="<?php echo $image ?>">
		<input type="text" name="name" value="<?php echo $name ?>">
		<input type="text" name="id" value="<?php echo $id ?>">
		<input type="text" name="price" value="<?php echo $price ?>">
		<input type="number" name="count" value="1"  class="form-control mb-3">
		<button name="add">Add</button>
	</form>
<?php } ?>

</body>
</html>