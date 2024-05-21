<?php
session_start();
include('connection.php');

if(isset($_POST['login_btn']))
{
    $uemail = mysqli_real_escape_string($data, $_POST['email']);
    $upassword = mysqli_real_escape_string($data, $_POST['password']);

    $select_query = mysqli_query($data, "SELECT id, first_name, role FROM tbl_user WHERE email='$uemail' AND password='$upassword' AND status=1");

    $user_data = mysqli_fetch_assoc($select_query);

    if(!empty($user_data))
    {
        $_SESSION['id'] =  $user_data['id']; 
        $_SESSION['first_name'] = $user_data['first_name'];
        
        if ($user_data['role'] == 1) {
           
            header("Location: admin/dashboard1.php");
        } elseif ($user_data['role'] == 2) {
           
            header("Location: dashboard2.php");
        }
       elseif ($user_data['role'] == 3) {
           
           header("Location: encoder1/dashboard3.php");
       }
       elseif ($user_data['role'] == 4) {
           
          header("Location: encoder2/dashboard4.php");
       }
       elseif ($user_data['role'] == 5) {
           
        header("Location: encoder3/dashboard5.php");
     }
    }
    else
    {
        ?>
        <script>
            alert("You have entered wrong email or password.");           
        </script>
        <?php
    }

    mysqli_close($data);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  
  <title>Uep Main Library Holding Cataloging System</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

 <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/custom_style.css?ver=1.1" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body class="bg-dark"style="background: url(img/1.jpeg) no-repeat;  background-size:cover">


  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
    
       <h2><center style="color: blue;">LOGIN</center></h2>
        </div>
      <div class="card-body">

        <form name="login"  method="post" action="">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required="required" autofocus="autofocus" >
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="required">
              <label for="inputPassword">Library number</label>
            </div>
          </div>
          
          <input type="submit"  class="btn btn-primary btn-block" name="login_btn" value="Login">
         
          <center>
             <a href="guest.html" class="btn btn-primary " style="margin-top: 10px; border: 1px solid blue; padding: 5px 100px; display: inline-block; border-radius: 5px;">Guest</a>
          </center>

        </form>
        
      </div>
    </div>
  </div>


</body>

</html>

        




