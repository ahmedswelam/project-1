<?php 
  session_start();
require '../helpers/dbConnection.php';
require '../helpers/functions.php';
//require '../checkLogin.php';
//require '../checkadmin.php';



  # DB OP
  $sql = "SELECT * FROM users";
  /*'select seller.* , category.title as CatTitle , users.name from seller  inner join category  on articles.cat_id = category.id 
  inner  join users on articles.added_by = users.id';*/
  
  
  $op = mysqli_query($con, $sql);
 

  require '../layouts/header.php';
  require '../layouts/navbar.php';
  require '../layouts/sidebar.php';



?>
<div class="container-fluid">
  <div class="row">

    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <h2>Users Data</h2>
      <div class="btn-group me-2">
          <a href='create.php' class="btn btn-sm btn-outline-secondary">Add New User</a>
      </div>
      <div class="table-responsive">

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">email</th>
              <th scope="col">phone</th>
              <th scope="col">address</th>
              <th scope="col">image</th>
              <th scope="col">info</th>
              <th scope="col">Roles</th>
              <th scope="col">Edit/Delete</th>
            </tr>
          </thead>
          <tbody>
          <?php 
                                            
            while($data = mysqli_fetch_assoc($op)){
                                               
           ?>
            <tr>

            <td><?php echo $data['id']; ?></td>
              <td><?php echo $data['name']; ?></td>
              <td><?php echo $data['email']; ?></td>
              <td><?php echo $data['phone']; ?></td>
              <td><?php echo $data['address']; ?></td>
              <td><img src="./uploads/<?php echo $data['image']; ?>" width="45" height="45"></td>
              <td><?php echo $data['about']; ?></td>
              <td><?php echo $data['roles_id']; ?></td>
              <td>
                <a href='delete.php?id=<?php echo $data['id']; ?>'
                  class='btn btn-danger m-r-1em'>Delete</a>
                <a href='edit.php?id=<?php echo $data['id']; ?>'
                  class='btn btn-primary m-r-1em'>Edit</a>
              </td>
            </tr>
            <?php } ?>

          </tbody>
        </table>

      </div>
    </main>

  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
