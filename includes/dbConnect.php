<?php
class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "wallet_verify";
    private $from_email= "noreply@verify.nfthulk.net";
    private $conn;

    function __construct() {
        if($_SERVER['SERVER_NAME']=="verify.nfthulk.net"||$_SERVER['SERVER_NAME']=="www.verify.nfthulk.net"){
            $this->host = "premium11";
            $this->user = "biplgmwr_verify";
            $this->password = "n4p]}}{u(fA1";
            $this->database = "biplgmwr_verify";
        }

        $this->conn = $this->connectDB();
    }

    function connectDB() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }

    function checkValue($value) {
        $value=mysqli_real_escape_string($this->conn, $value);
        return $value;
    }

    function runQuery($query) {
        $result = mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }

    function insertQuery($query) {
        $result = mysqli_query($this->conn,$query);
        return $result;
    }

    function from_email(){
        return $this->from_email;
    }

    function numRows($query) {
        $result  = mysqli_query($this->conn,$query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
?>