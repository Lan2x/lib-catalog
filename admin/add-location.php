<?php
session_start();
include ('../connection.php');
$first_name = $_SESSION['first_name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
if(isset($_REQUEST['sbt-location']))
{
   
	$location = $_POST['location'];
 

  $insert_location = mysqli_query($data,"insert into tbl_location set location='$location'");

    if($insert_location > 0)
    {
        ?>
<script type="text/javascript">
    alert("Location added successfully.")
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
            <a href="#">Add Location</a>
          </li>
          
        </ol>

  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Submit Details</div>
             
            <form method="post" class="form-valide">
          <div class="card-body">
                                      
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Location <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="location" id="location" class="form-control" placeholder="Enter Location" required>
                                       </div>
                                  </div>
                                  
                                      
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="sbt-location" class="btn btn-primary">Submit</button>
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