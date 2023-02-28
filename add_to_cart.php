<?php include 'conn.php';

if(isset($_POST['add'])){
	$name = $_POST['name'];
	$product_id = $_POST['id'];
	$count = $_POST['count'];
	$image = $_POST['image'];
	$price = $_POST['price'];
	$user_id = 1;

	$sqq = "INSERT INTO cart(name,user_id,product_id,count,price) values(?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sqq);
	$stmt->bind_param("sssss", $name, $user_id, $product_id, $count, $price);
	$stmt->execute();

	if($stmt){
		echo 'Added';
	}



}


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	$sql = "SELECT * FROM products";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();

	while($row = $result->fetch_array()){
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