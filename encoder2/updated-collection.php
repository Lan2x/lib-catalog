<?php
session_start();
include ('../connection.php');
$first_name = $_SESSION['first_name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
?>

<?php include('include/header.php'); ?>
  <div id="wrapper">

    <?php include('include/side-bar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

       
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Updated collection</a>
          </li>
          
        </ol>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Updated Collection Details</div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                            <tr>
                                                <th>No.</th>                                               
                                                <th>Title</th>
                                                <th>Author</th>                                               
                                                <th>Signage</th>
                                                <th>ISBN</th>
                                                <th>Call Number</th>
                                                <th>Publisher</th>
                                                <th>Publication Date</th>
                                                <th>Edition</th>
                                                <th>Price</th>
                                                <th>Accession number</th>
                                                <th>Quantity</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
                    if(isset($_GET['ids'])){
                      $id = $_GET['ids'];
                      $delete_query = mysqli_query($data, "delete from tbl_collection where id='$id'");
                      }
										$select_query = mysqli_query($data, "select * from tbl_collection");
										$sn = 1;
										while($row = mysqli_fetch_array($select_query))
										{ 
										    ?>

                        
                                            <tr>
                                                <td><?php echo $sn; ?></td>                                               
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['author']; ?></td>
                                                <td><?php echo $row['signageid']; ?></td>
                                                <td><?php echo $row['isbn']; ?></td>
                                                <td><?php echo $row['call_number']; ?></td>
                                                <td><?php echo $row['publisher']; ?></td>
                                                <td><?php echo $row['publication_date']; ?></td>
                                                <td><?php echo $row['edition']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['accession_num']; ?></td>
                                                <td><?php echo $row['quantity']; ?></td>
                                                <td><?php echo $row['location']; ?></td>
                                                
                                                <?php if($row['availability']==1){
                                                  ?><td><span class="badge badge-success">Available</span></td>
                                        <?php } else { ?><td><span class="badge badge-danger">Not Available</span></td>
                                           <?php } ?>   
                                               
                                            </tr>
										<?php $sn++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                   
                        </div>
                    </div>
                </div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<?php include('include/footer.php'); ?>
 
</script>