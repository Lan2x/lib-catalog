<?php
session_start();
include ('../connection.php');
$id = $_SESSION['id'];
$first_name = $_SESSION['first_name'];
if(empty($id))
{
    header("Location: index.php"); 
}
$id = $_GET['id'];
$fetch_query = mysqli_query($data, "select * from tbl_collection where id='$id'");
$row = mysqli_fetch_array($fetch_query);
if(isset($_REQUEST['save-col-btn']))
{
   
	$title = $_POST['title'];
    $author = $_POST['author'];
    $signage = $_POST['signage'];
    $isbn = $_POST['isbn'];
    $call_number = $_POST['call_number'];
    $publisher = $_POST['publisher'];
    $publication_date = $_POST['publication_date'];
    $edition = $_POST['edition'];
    $price = $_POST['price'];
    $accession_num = $_POST['accession_num'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $availability = $_POST['availability'];
    
            
    $update_collection = mysqli_query($data,"update tbl_collection set title='$title', author='$author', signage='$signage', isbn='$isbn', call_number='$call_number', publisher='$publisher', publication_date='$publication_date', edition='$edition', price='$price', accession_num =' $accession_num', quantity='$quantity', location='$location',  availability='$availability' where id='$id'");

    if($update_collection > 0)
    {
?>
<script type="text/javascript">
    alert("Collection updated successfully.");
    window.location.href='view-collection.php';
</script>
<?php
}
}
?>
<?php include('include/header.php'); ?>
<div id="wrapper">
<?php include('include/side-bar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

       
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Edit Collection</a>
          </li>
          
        </ol>

  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Edit Details</div>
             
            <form method="post" class="form-valide">
          <div class="card-body">

                                  
          
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Title <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required value="<?php echo $row['title']; ?>" readonly>
                                       </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Author <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="author" id="author" class="form-control" placeholder="Enter Author" required value="<?php echo $row['author']; ?>" readonly>
                                       </div>
                                  </div>

                                  <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="leave-type">Signage <span class="text-danger">*</span>
                                            </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="signage" name="signage" >
                                        <option value="">Select Signage</option>
                                        <?php 
                                         $fetch_signage = mysqli_query($data, "select * from tbl_signage");
                                         while($rows = mysqli_fetch_array($fetch_signage)){
                                        ?>
                             <option value=<?php echo $rows['id'];?> <?php if($rows['signage']==$row['signage']){ ?>
                                selected="selected"; <?php } ?>><?php echo $rows['signage'];?>
                            </option>
                                    <?php } ?>
                                     </select>
                                </div>
                                  </div>    

                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">ISBN<span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="isbn" id="isbn" class="form-control" placeholder="Enter ISBN" required value="<?php echo $row['isbn']; ?>" readonly>
                                       </div>
                                  </div>

                                  <!-- <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Barcode <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Enter Barcode" required value="<?php echo $row['barcode']; ?>" readonly>
                                       </div>
                                  </div> -->

                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Call Number <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="call_number" id="call_number" class="form-control" placeholder="Enter Call Number"  value="<?php echo $row['call_number']; ?>">
                                       </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Publisher <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="publisher" name="publisher" id="publisher" class="form-control" placeholder="Publisher" required value="<?php echo $row['publisher']; ?>" readonly>
                                       </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Publication Date <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="publication_date" name="publication_date" id="publication_date" class="form-control" placeholder="Enter Publication Date" required value="<?php echo $row['publication_date']; ?>" readonly>
                                       </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Edition <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="edition" id="edition" class="form-control" placeholder="Enter Edition" required value="<?php echo $row['edition']; ?>" readonly>
                                       </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price" required value="<?php echo $row['price']; ?>" readonly>
                                       </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="price">Accession number<span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="accession_num" id="accession_num" class="form-control" placeholder="Enter accession number"  value="<?php echo $row['accession_num']; ?>">
                                       </div>
                                  </div>    

                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="price">Quantity <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter Quantity" required value="<?php echo $row['quantity']; ?>" >
                                       </div>
                                  </div>                                         
                                  <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="leave-type">Location <span class="text-danger">*</span>
                                            </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="location" name="location">
                                        <option value="">Select Location</option>
                                        <?php 
                                         $fetch_signage = mysqli_query($data, "select * from tbl_location");
                                         while($rows = mysqli_fetch_array($fetch_signage)){
                                        ?>
                                        <option value=<?php echo $rows['id'];?>  <?php if($rows['location']==$row['location']){ ?>
                                selected="selected"; <?php } ?>><?php echo $rows['location'];?>
                            </option>
                                    <?php } ?>
                                     </select>
                                </div>
                                  </div> 
                                  <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="status">availability <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="availability" name="availability" >
                                                    <option value="">Select Status</option>
                                                   <option value="1" <?php if($row['availability'] == 1) { ?> selected="selected"; <?php } ?>>Available</option>
                                                   <option value="0" <?php if($row['availability'] == 0) { ?> selected="selected"; <?php } ?>>Not Available</option>
                                                          
                                                </select>
                                            </div>
                                        </div>     
                                                            
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="save-col-btn" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    
                                </div>
                                </form>
                            </div>
                        
    </div>
         
        </div>
     
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 
 <?php include('include/footer.php'); ?>