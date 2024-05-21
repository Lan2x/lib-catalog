<?php
session_start();
include ('../connection.php');
$first_name = $_SESSION['first_name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
$id = $_GET['id'];
$fetch_query = mysqli_query($data, "select * from tbl_signage where id='$id'");
$row = mysqli_fetch_array($fetch_query);
if(isset($_REQUEST['sv-cat']))
{
   
	$signage = $_POST['signage'];
  
  $update_signage = mysqli_query($data,"update tbl_signage set signage='$signage' where id='$id'");

    if($update_signage > 0)
    {
        ?>
<script type="text/javascript">
    alert("Signage Updated successfully.")
    window.location.href='view-signage.php';
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
            <a href="#">Edit Signage</a>
          </li>
          
        </ol>

  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Edit Details</div>
             
            <form method="post" class="form-valide">
          <div class="card-body">
                                      
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Signage Name <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="signage" id="signage" class="form-control" placeholder="Enter Signage " value="<?php echo $row['signage']; ?>" required>
                                       </div>
                                  </div>
                                
                           
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="sv-cat" class="btn btn-primary">Save</button>
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