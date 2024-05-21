<?php
session_start();
include ('../connection.php');
$first_name = $_SESSION['first_name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}

// Function to encode array into an Excel file
function arrayToExcel($data, $filename) {
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename="' . $filename . '.xls"');

  $output = fopen("php://output", "w");

  // Add headers
  fputcsv($output, array('No.', 'author'));

  // Add data
  foreach ($data as $row) {
      fputcsv($output, $row);
  }

  fclose($output);
  exit();
}

if(isset($_POST['save'])) {
  // Fetch data from the database
  $select_query = mysqli_query($data, "SELECT * FROM tbl_collection");
  $excel_data = array();

  // Prepare data for Excel
  while($row = mysqli_fetch_assoc($select_query)) {
      $excel_data[] = array(
          $row['id'],
          $row['publisher'],
         
      );
  }

  // Generate Excel file
  arrayToExcel($excel_data, 'list_of_publishers');
}
?>

<?php include('include/header.php'); ?>
  <div id="wrapper">

    <?php include('include/side-bar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

       
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">List of publishers</a>
          </li>
          
        </ol>

        <div class="card mb-3">
         
            <div class="card-body">
            <form method="post">
                        <button type="submit" name="save" class="btn btn-primary mb-3">Save to Excel</button>
                    </form>
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                     <thead>
                           <tr>
                                <th>No.</th>                                               
                                <th>Publisher</th>
                           </tr>
                     </thead>
                        <tbody>
										<?php
                    if(isset($_GET['ids']))
                     $id = $_GET['ids'];                      
										$select_query = mysqli_query($data, "select * from tbl_collection");
										$sn = 1;
										while($row = mysqli_fetch_array($select_query))
										{ 
										    ?>

                        
                                            <tr>
                                                <td><?php echo $sn; ?></td>                                               
                                                <td><?php echo $row['publisher']; ?></td>
                                             
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
 