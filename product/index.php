<?php 

require '../helpers/dbConnection.php';
require '../helpers/functions.php';



  # DB OP

  //$sql = 'select product.* , category.title as CatTitle , seller.seller_name from product  inner join category  on prodcut.cat_id = category.id 
  //inner  join seller on prduct.added_by = users.id';
# DB OP

$sql ='SELECT * FROM `product` INNER JOIN users ON product.seller_id = users.id';
  
  $sql = 'select * from product';
  $op = mysqli_query($con, $sql);

  require '../layouts/header.php';
  require '../layouts/navbar.php';
  require '../layouts/sidebar.php';



?>

<div class="container-fluid">
  <div class="row">

    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <h2>Products Data</h2>
      <div class="btn-group me-2">
          <a href='create.php' class="btn btn-sm btn-outline-secondary">Add New product</a>
      </div>
      <div class="table-responsive">

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
              <th scope="col">category ID</th>
              <th scope="col">Seller ID</th>
              <th scope="col">Date Added</th>
              <th scope="col">Added By </th>
              <th scope="col">Image</th>
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
              <td><?php echo $data['quantity']; ?></td>
              <td><?php echo $data['price']; ?></td>
              <td><?php echo $data['description']; ?></td>
              <td><?php echo $data['category_id']; ?></td>
              <td><?php echo $data['seller_id']; ?></td>
              <td><?php echo $data['date_added']; ?></td>
              <td><?php echo $data['added_by']; ?></td>
              <td><img src="./uploads/<?php echo $data['image']; ?>" width="45" height="45"></td>
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

<?php 
require '../layouts/footer.php';
?>