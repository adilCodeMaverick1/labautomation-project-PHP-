<?php 
include ('db.php');

// Check if product_id is set
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from the database
    $select_product = "SELECT * FROM product_testing WHERE product_id = $product_id";
    $run_product = mysqli_query($con, $select_product);
    $row_product = mysqli_fetch_assoc($run_product);

    if($row_product) {
        // Get the current status
        $status = $row_product['status'];

        // Display the form
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Status</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>
            <div class="container mt-5">
                <h2>Update Status</h2>
                <form id="update-status-form" action="update_status.php" method="post">

                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-select" id="status" name="status">
                            <option value="1" <?php if($status == 1) echo 'selected'; ?>>Pending</option>
                            <option value="2" <?php if($status == 2) echo 'selected'; ?>>Testing Success</option>
                            <option value="3" <?php if($status == 3) echo 'selected'; ?>>Testing Failed</option>
                        </select>
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
    $(document).ready(function () {
        $('#update-status-form').submit(function (e) {
            e.preventDefault(); // Prevent default form submission
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(), // Serialize form data
                success: function (response) {
                    alert('Status updated successfully.'); // Display success message
                    window.location.href = 'new_approvals.php'; // Redirect to the desired page
                },
                error: function (xhr, status, error) {
                    alert('Failed to update status.'); // Display error message
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

        </body>
        </html>
        <?php
    } 
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate product_id and status
  $product_id = $_POST['product_id'];
  $status = $_POST['status'];

  // Update status in the database
  $update_query = "UPDATE product_testing SET status = '$status' WHERE product_id = $product_id";
  $run_update = mysqli_query($con, $update_query);

  if ($run_update) {
    // Alert with JavaScript animation
    echo "<script>
        alert('Status updated successfully.');
        window.location.href = 'new_approvals.php';
    </script>";
} else {
    echo "<script>
        alert('Failed to update status.');
        window.location.href = 'new_approvals.php';
    </script>";
}
}
?>
