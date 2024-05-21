<?php
session_start();
include('../connection.php');
$first_name = $_SESSION['first_name'];
$id = $_SESSION['id'];

if (empty($id)) {
    header("Location: index.php");
    exit();
}

include('include/header.php');

?>

<div id="wrapper">
    <?php include('include/side-bar.php'); ?>
    <div id="content-wrapper">
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <form method="POST" action="">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="leave-type">New arrival
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control form-control-sm" name="new_arrival" required>
                                                <option value="">Select new arrival</option>
                                                <option value="1">Last 24 Hours</option>
                                                <option value="7">Last 7 Days</option>
                                                <option value="30">Last 30 Days</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ISBN</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Signage</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_POST['new_arrival'])) {
                                        $new_arrival = $_POST['new_arrival'];
                                        // Adjust the SQL query based on your database schema
                                        $query = "SELECT * FROM tbl_collection WHERE created_at >= NOW() - INTERVAL $new_arrival DAY ";
                                        $result = mysqli_query($data, $query);
                                        $sn = 1;

                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $sn; ?></td>
                                                <td><?php echo $row['isbn']; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['author']; ?></td>
                                                <td><?php echo $row['signage']; ?></td>
                                                <td><a href="view-collection_details.php?ID=<?php echo $row['id']; ?>">View</a></td>
                                            </tr>
                                    <?php
                                            $sn++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php include('include/footer.php'); ?>
