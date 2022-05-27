<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success Verified</title>

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-12 mb-3">
            <h1 class="text-primary text-center">Request Wallet Data</h1>
        </div>
        <div class="col-12">
            <div class="card p-5">
                <table class="table" id="table_id">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once("includes/dbConnect.php");
                    $db_handle = new DBController();

                    $data = $db_handle->runQuery("SELECT * FROM wallet_data order by id desc");
                    $row_count = $db_handle->numRows("SELECT * FROM wallet_data order by id desc");

                    for ($i = 0; $i < $row_count; $i++) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i + 1; ?></th>
                        <td><?php echo $data[$i]["name"]; ?></td>
                        <td><?php echo $data[$i]["phone"]; ?></td>
                        <td><?php echo $data[$i]["address"]; ?></td>
                        <td><?php echo $data[$i]["time"]; ?></td>
                    </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JQuery JS -->
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

<!-- Datatable JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- SWEET Alert 2 JS -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>
</body>
</html>