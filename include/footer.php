<script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
   <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="plugins/validation/jquery.validate.min.js"></script>
  <script src="plugins/validation/jquery.validate-init.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
   
  <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        //signage selection change
        $("#signageid").on("change", function () {
            var selectedSignageid = $(this).val();
            // AJAX request to fetch collections based on the selected signage
            $.ajax({
                url: "fetch_collections.php", // Create this PHP file to handle the database query
                method: "GET",
                data: { signageid: selectedSignageid },
                dataType: "json",
                success: function (data) {
                    // Clear the table body
                    $("#collection_data").empty();
                    // Populate the table with the fetched data
                    $.each(data, function (index, item) {
                        var row = `<tr>
                            <td>${index + 1}</td>
                            <td>${item.isbn}</td>
                            <td>${item.title}</td>
                            <td>${item.author}</td>
                            <td>${item.signageid}</td>
                            <td><a href="view-collection_details.php?ID=${item.id}">View</a></td>
                        </tr>`;
                        $("#collection_data").append(row);
                    });
                },
                error: function () {
                    alert("Error fetching collections");
                },
            });
        });
    });
</script>
