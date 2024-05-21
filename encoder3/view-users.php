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
            <a href="#">View Users</a>
          </li>
          
        </ol>

  <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            View Details</div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                            <tr>
                                                <th>No.</th>                                            
                                                <th>First name</th>
                                                <th>Middle name</th>
                                                <th>Last name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>College</th>
                                                <th>Gender</th>
                                                <th>User_type</th>                                         
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
                    if(isset($_GET['ids'])){
                      $id = $_GET['ids'];
                      $delete_query = mysqli_query($data, "delete from tbl_user where id='$id'");
                      }
										$select_query = mysqli_query($data, "SELECT * FROM tbl_user WHERE role='2'");
										$sn = 1;
										while($row = mysqli_fetch_array($select_query))
										{ 
										    
										?>
                                            <tr>
                                                <td><?php echo $sn; ?></td>                                              
                                                <td><?php echo $row['first_name']; ?></td>
                                                <td><?php echo $row['middle_name']; ?></td>
                                                <td><?php echo $row['last_name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                               

                                                <?php if($row['role']==1){
                                                  ?><td>Personal Only</td>
                                        <?php } else { ?><td><?php echo $row['password']; ?></td>
                                           <?php } ?>   

                                                <td><?php echo $row['college']; ?></td>

                                                <?php if($row['gender']==1){
                                                  ?><td>Male</td>
                                        <?php } else { ?><td>Female</td>
                                           <?php } ?>   

                                           <td><?php echo $row['user_type']; ?></td>

                                                <?php if($row['role']==1){
                                                  ?><td>Admin</td>                                                  
                                                <?php } elseif ($row['role']==2) {
                                                  ?><td>User</td>
                                                <?php }  elseif ($row['role']==3){ 
                                                  ?><td>Encoder1</td>
                                                   <?php }  elseif ($row['role']==4){ 
                                                  ?><td>Encoder2</td>
                                                <?php } else { ?><td>Encoder3</td>
                                                <?php } ?>


                                  

                                           <?php if($row['status']==1){
                                                  ?><td><span class="badge badge-success">Active</span></td>
                                        <?php } else { ?><td><span class="badge badge-danger">Inactive</span></td>
                                           <?php } ?>  
                                           
                                           <td>
                                                  <a href="edit-user.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                  <a href="view-users.php?ids=<?php echo $row['id'];?>" onclick="return confirmDelete()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                  </td>
                                                 
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
