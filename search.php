<?php
session_start();
include ('./connection.php');
$first_name = $_SESSION['first_name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
include('include/header.php'); 
?>

<div id="wrapper">

    <?php include('include/side-bar.php'); ?>
    <div id="content-wrapper">

        <div class="container">
            <div class="row"> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" id="searchInput" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search collection"  >
                                    <div class="input-group-append" id="clearSearch" style="display: none;">
                                        <button type="button" class="btn btn-outline-secondary" onclick="clearSearchInput()"><i class="fas fa-times"></i></button>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="leave-type">Signage <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control form-control-sm" id="signage" name="signage" required>
                                                <option value="">Select Signage</option>
                                                <?php 
                                                $fetch_signage = mysqli_query($data, "select * from tbl_signage");
                                                while($row = mysqli_fetch_array($fetch_signage)){
                                                ?>
                                                <option><?php echo $row['signage']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  width="100%" cellspacing="0">
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
                                    <tbody id="collection_data">
                                        <?php 
                                        if(isset($_GET['search']))
                                        {
                                            $filtervalues = $_GET['search'];
                                            $query = "SELECT * FROM tbl_collection WHERE CONCAT(isbn,title,author,signage) LIKE '%$filtervalues%' ORDER BY id DESC";
                                            $query_run = mysqli_query($data, $query);
                                            $sn = 1;
                                            if(mysqli_num_rows($query_run) > 0) {
                                                foreach($query_run as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn; ?></td>   
                                                        <td><?php echo  $row['isbn']; ?></td>
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><?php echo  $row['author']; ?></td>
                                                        <td><?php echo  $row['signage']; ?></td>
                                                        <td><a href="view-collection_details.php?ID=<?php echo $row['id'];?>">View</a></td>
                                                    </tr>
                                                    <?php $sn++;?>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <tr>
                                                    <td colspan="4">No record found</td>
                                                </tr>
                                                <?php
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

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
            <script>
                function clearSearchInput() {
                    document.getElementById('searchInput').value = '';
                    document.getElementById('clearSearch').style.display = 'none';
                }

                document.getElementById('searchInput').addEventListener('input', function() {
                    document.getElementById('clearSearch').style.display = this.value ? 'block' : 'none';
                });
            </script>
            <?php include('include/footer.php'); ?>
