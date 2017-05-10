
<?php
    //DB Access
    $dbAddress = "mysql.stackcp.com:21257";
    $dbUsername = "wikitt-355d4a";
    $dbPassword = "1234password";
    $dbName = "wikitt-355d4a";
    //DB Usage
    connect($connection);
    //Set encoding UTF-8 -> Italian
    query("SET character_set_results=utf8");
    mb_language("uni");
    mb_internal_encoding("UTF-8");

    /*Connection*/
    function connect(&$connection) {
        global $dbAddress, $dbUsername, $dbPassword, $dbName;
        $connection = mysqli_connect($dbAddress, $dbUsername, $dbPassword, $dbName);
        if(!$connection) {
            mysqli_close();
            die("Failed to connect to MySQL: " + mysqli_connect_error());
        }
    }
    /*Close Connection*/
    function connection_close() {
        global $connection;
        mysqli_close($connection);
    }
    /*Query Execution*/
    function query($query) {
        global $connection;
        $result = mysqli_query($connection, $query);
        if ($result === FALSE) { die(mysqli_error($connection));}
        else { return $result;}
    }
    /*END Connection*/
    
    /*Authentication*/
    function authentication_param($username, $password) {
        $toRtn = false;
        $result = query("SELECT * FROM amministratore WHERE"
                ." NomeUtente='$username' and Password='$password' LIMIT 1;");
        if(mysqli_num_rows($result) === 1) {
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
    
    /*Set Response*/
    function setResponse(&$response = null, $status = null, $message = null) {
        $response["status"] = $status;
        $response["message"] = $message;
    }
