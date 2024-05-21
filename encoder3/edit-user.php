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
$fetch_query = mysqli_query($data, "select * from tbl_user where id='$id'");
$row = mysqli_fetch_array($fetch_query);
if(isset($_REQUEST['sv-user']))
{
   
  
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $password = ($_POST['password']);
  $college = $_POST['college'];
  $gender = $_POST['gender'];
  $user_type = $_POST['user_type'];
  $role = $_POST['role'];
  $status = $_POST['status'];


  $update_user = mysqli_query($data,"update tbl_user set first_name='$first_name', middle_name='$middle_name', last_name='$last_name', email='$email', password='$password', college='$college',  gender='$gender',  user_type='$user_type', role='$role', status='$status' where id='$id'");


    if($update_user > 0)
    {
        ?>
<script type="text/javascript">
    alert("User Updated successfully.");
    window.location.href='view-users.php';
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
            <a href="#">Edit User</a>
          </li>
          
        </ol>

  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Edit Details</div>
             
            <form method="post" class="form-valide">
          <div class="card-body">
                                      
          
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">First Name <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name" required value="<?php echo $row['first_name']; ?>">
                                       </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Middle Name <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Enter Middle Name" required value="<?php echo $row['middle_name']; ?>">
                                       </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Last Name <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" required value="<?php echo $row['last_name']; ?>">
                                       </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Email <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required value="<?php echo $row['email']; ?>">
                                       </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Password <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required value="<?php echo $row['password']; ?>">
                                       </div>
                                  </div>

                                  
                                  <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="leave-type">College <span class="text-danger">*</span>
                                            </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="college" name="college" required >
                                        <option value="<?php echo $row['college']; ?>">Select College</option>
                                        <?php 
                                         $fetch_college = mysqli_query($data, "select * from tbl_college");
                                         while($rows = mysqli_fetch_array($fetch_college)){
                                        ?>
                             <option <?php if($rows['college']==$row['college']){ ?>
                                selected="selected"; <?php } ?>><?php echo $rows['college'];?> 
                            </option>
                                    <?php 
                                } 
                                ?>
                                     </select>
                                </div>
                                  </div>    
                                  

                                  <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="status">Gender<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="gender" name="gender" required value="<?php echo $row['gender']; ?>">
                                                    <option value="">Select Gender</option>
                                                    <option  value="1" <?php if($row['gender'] == 1) { ?> selected="selected"; <?php } ?>>Male</option>
                                                    <option  value="2" <?php if($row['gender'] == 2) { ?> selected="selected"; <?php } ?>>Female</option>
                                                          
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="leave-type">User_type <span class="text-danger">*</span>
                                            </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="user_type" name="user_type" required>
                                        <option value="">Select User_type</option>
                                        <?php 
                                         $fetch_user_type = mysqli_query($data, "select * from tbl_user_type");
                                         while($rows = mysqli_fetch_array($fetch_user_type)){
                                        ?>
                             <option <?php if($rows['user_type']==$row['user_type']){ ?>
                                selected="selected"; <?php } ?>><?php echo $rows['user_type'];?>
                            </option>
                                    <?php } ?>
                                     </select>
                                </div>
                                  </div>    

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="status">Role <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="role" name="role" required>
                                                    <option value="">Select Role</option>                                         
                                                    <option value="2" <?php if($row['role'] == 2) { ?> selected="selected"; <?php } ?>>User</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="status">Status <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="">Select Status</option>
                                                   <option value="1" <?php if($row['status'] == 1) { ?> selected="selected"; <?php } ?>>Active</option>
                                                   <option value="0" <?php if($row['status'] == 0) { ?> selected="selected"; <?php } ?>>Inactive</option>
                                                          
                                                </select>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="sv-user" class="btn btn-primary">Save</button>
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