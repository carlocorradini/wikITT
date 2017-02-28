
<?php
    //DB Access
    $dbAddress = "localhost";
    $dbPort = 5432;
    $dbName = "TODO";
    $dbUsername = "postgres";
    $dbPassword = "password";
    
    //Connection
    function connect(&$connection) {
        global $dbAddress,$dbPort,$dbName,$dbUsername,$dbPassword;
        $connectionString = "host=".$dbAddress.
                            " port=".$dbPort.
                            " dbName=".$dbName.
                            " user=".$dbUsername.
                            " password=".$dbPassword;
        $connection = pg_connect($connectionString);
        if(!$connection) {
            die("Failed to connect to PostgreSQL: ".pg_last_error($connection));
        }
    }
    
    //Authentication
    function authentication_param($username, $password) {
        global $connection;
        $toRtn = false;
        $result = pg_query($connection, "SELECT Username,Password FROM TODO WHERE"
                            ." Username='$username' AND Password='$password'");
        if(!$result) {
            die("Error executing query: ".pg_errormessage($connection));
        }
        if(pg_num_rows($result) == 1) {
            $toRtn = true;
        }
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