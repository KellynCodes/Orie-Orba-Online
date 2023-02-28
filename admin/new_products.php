<?php include 'header.php';

if(isset($_POST['upload'])){
	$category = $_POST['category'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$date_view = date("Y.m.d");

	$allowed = array('gif', 'png', 'jpg', 'jpeg', 'jiff','mp4','webp');
   $filename = $_FILES['image']['name'];
   $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (in_array($ext, $allowed)){
	       $location = "uploads/".$filename;
           move_uploaded_file($_FILES['image']['tmp_name'],$location);

          $sql = "INSERT INTO products(category,name,image,price,date_view) values('$category','$name','$filename','$price','$date_view')";

          $execute = mysqli_query($conn,$sql) or die(mysqli_error($conn));

           if($execute){
    	        $msg =  'Successfully uploaded new product';
    	        $msgtype = 'primary';
           }
  }
}


 ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Upload new products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
        	<form method="post" enctype="multipart/form-data">
        		<div class="alert alert-<?php echo $msgtype ?> text-center"><?php echo $msg ?></div>
        		<label>Category</label>
        		<select name="category" class="form-control mb-3">
        			<option value="electronics">Electronics</option>
        			<option value="food_stuffs">Food stuffs</option>
        			<option value="clothings">Clothings</option>
        			<option value="timber">Timber</option>
        			<option value="books">Books</option>
        		</select>
        		<label>Name</label>
        		<input type="text" name="name" class="form-control mb-3">
        		<label>Image</label>
        		<input type="file" name="image" class="form-control mb-3">
        		<label>Price</label>
        		<input type="number" name="price" class="form-control mb-3">
        		<input type="submit" name="upload" class="form-control bg-primary text-white mb-3" value="UPLOAD">
        	</form>
        </div>
      </div>
    </div>

  </main><!-- End #main -->

  <?php include 'footer.php' ?>