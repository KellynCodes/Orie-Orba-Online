<?php include 'header.php';


 ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>List of Products for sale</h1>
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
          <div class="">
            <div class="">
              <div class="alert alert-<?php echo $msgtype ?>"><?php echo $msg ?></div>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $sn = 1;
                  $sql = "SELECT * FROM products order by id desc";
                  $exe = mysqli_query($conn,$sql);

                  while($row=mysqli_fetch_array($exe)){
                    $id = $row['id'];
                    $category = $row['category'];
                    $name = $row['name'];
                    $image = $row['image'];
                    $price = $row['price'];
                    $date_view = $row['date_view'];
                   ?>
                  
                  <tr>
                    <th scope="row"><?php echo $sn++ ?></th>
                    <td><?php echo $category ?></td>
                    <td><?php echo $name ?></td>
                    <td><img src="uploads/<?php echo $image ?>" style="height: 100px; widows: 100px;"></td>
                    <td><?php echo $price ?></td>
                    <td><?php echo $date_view ?></td>
                    <td>
                      <form method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button class="btn btn-danger" name="delete"><i class="bi bi-archive"></i></button>
                      </form>                      
                    </td>
                  </tr>
                <?php } ?>
                  
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
      </div>
    </div>

  </main><!-- End #main -->

  <?php include 'footer.php' ?>