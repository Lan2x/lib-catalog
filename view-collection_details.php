<?php
session_start();
include ('./connection.php');
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
      
     <div class="card mb-3">
       <div class="card-header">
         <i class="fa fa-info-circle"></i>
            View Collection Details</div>
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" width="100%" cellspacing="0">
                  
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
                             
                             $id = $_GET['ID'];
                             $sql = "SELECT * FROM tbl_collection WHERE id = '$id'";
                             $collection = $data->query($sql) or die ($data->error);
                             $row = $collection->fetch_assoc();
                             
                             $sn = 1;
                             ?>
                         
                                <tr>
                                    <td><?php echo $sn; ?></td>                                               
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['author']; ?></td>
                                    <td><?php echo $row['signage']; ?></td>
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
                                   
                                <?php $sn++;  ?>
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

