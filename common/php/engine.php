
<?php
    //DB Access
    $dbAddress = "mysql.stackcp.com:21274";
    $dbUsername = "perenzoni98";
    $dbPassword = "1234password";
    $dbName = "wikitt-355d4a";

    function connect(&$connection) {
        global $dbAddress,$dbUsername,$dbPassword,$dbName;
        $connection = mysqli_connect($dbAddress,$dbUsername,$dbPassword,$dbName);
        if(!$connection) {
            mysqli_close();
            die("Failed to connect to MySQL: " + mysqli_connect_error());
        }
    }
    /*Authentication*/
    function authentication_param($username, $password) {
        global $connection;
        $toRtn = false;
        $result = mysqli_query($connection, "SELECT Username,Password FROM login WHERE"
                ." Username='$username' and Password='$password'");
        if($result === FALSE) {
            die(mysqli_error());
        }
        if(mysqli_num_rows($result) == 1) {
            $toRtn = true;
        }
        return $toRtn;
    }
    function authentication_session() {
        $toRtn = false;
        if(isset($_SESSION["credentials"])) {
            $toRtn = authentication_param(getUsername(), getPassword());
        }
        return $toRtn;
    }
    function getUsername() {
        if(isset($_SESSION["credentials"])) {
            return $_SESSION["credentials"]["username"];
        }
    }
    function getPassword() {
        if(isset($_SESSION["credentials"])) {
            return $_SESSION["credentials"]["password"];
        }
    }
    /*END Authentication*/
