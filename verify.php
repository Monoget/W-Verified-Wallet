<?php
if($_POST['wallet_address']=="0xc85ECe92db84eCeE699954DB8717AbA03d5fA904"){
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Success Verified</title>

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    </head>
    <body>

    <div class="container">
        <form action="Email" method="post">
            <div class="row mt-5">
                <div class="col-12">
                    <h1 class="text-success mb-3">Success</h1>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name"
                               placeholder="Name" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="Phone" name="Phone"
                               placeholder="Phone" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address"
                               placeholder="Address" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-info btn-lg text-white" name="submit">CLAIM</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- SWEET Alert 2 JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
    </html>
<?php
}else{
    echo "<script>
                document.cookie = 'alert = 2;';
                window.location.href='Home';
                </script>";

}
