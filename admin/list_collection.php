<?php
session_start();
include ('../connection.php');
$first_name = $_SESSION['first_name'];
$id = $_SESSION['id'];
if(empty($id)) {
    header("Location: index.php"); 
}

// Function to encode array into an Excel file
function arrayToExcel($data, $filename) {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="' . $filename . '.xls"');

    $output = fopen("php://output", "w");

    // Add headers
    fputcsv($output, array('No.', 'title', 'author', 'signage', 'isbn', 'call_call', 'publisher','publication_date','edition','price','accession_num','quantity'));

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
            $row['title'],
            $row['author'],
            $row['signage'],
            $row['isbn'],
            $row['call_number'],
            $row['publisher'],
            $row['publication_date'],
            $row['edition'],
            $row['price'],
            $row['accession_num'],
            $row['quantity'],
        );
    }

    // Generate Excel file
    arrayToExcel($excel_data, 'list_of_collection');
}
?>


<?php include('include/header.php'); ?>
  <div id="wrapper">

    <?php include('include/side-bar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

       
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">List of collections</a>
          </li>
          
        </ol>

        <div class="card mb-3">
       <div class="card-header">
        </div>
            <div class="card-body">
            <form method="post">
                        <button type="submit" name="save" class="btn btn-primary mb-3">Save to Excel</button>
                    </form>
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
                                   
                                             
                                </tr>
                                    
										<?php $sn++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                   
                        </div>
                    </div>
                
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<?php include('include/footer.php'); ?>
 