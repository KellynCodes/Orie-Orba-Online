<?php include 'header.php';


 ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>List of registered members</h1>
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
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $sn = 1;
                  $sql = "SELECT * FROM users order by id desc";
                  $exe = mysqli_query($conn,$sql);

                  while($row=mysqli_fetch_array($exe)){
                    $user_id = $row['id'];
                    $email = $row['email'];
                    $date = $row['date'];
                    $status = $row['status'];
                   ?>
                  
                  <tr>
                    <th scope="row"><?php echo $sn++ ?></th>
                    <td><?php echo $email ?></td>
                    <td><?php echo $status ?></td>
                    <td><?php echo $date ?></td>
                    <td>
                      
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