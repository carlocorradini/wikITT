<?php
$dbAddress = "mysql.stackcp.com";
    $dbPort = 21257;
    $dbName = "wikitt-355d4a";
    $dbUsername = "wikitt-355d4a";
    $dbPassword = "1234password";
    //---DB Usage---
    connect($connection);
    //---Encryption--
    //Options for password
    $min_password_length = 6;
    $max_password_length = 20;
    $password_hash_options = [
        'cost' => 12,
        //PHP 5
        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        //PHP 7
        //'salt' => random_bytes(22)
    ];
    //---GENERAL---
    //Set encoding UTF-8 -> Italian
    query("SET character_set_results=utf8");
    mb_language("uni");
    mb_internal_encoding("UTF-8");
    //---Connection---
    function connect(&$connection) {
        global $dbAddress, $dbUsername, $dbPassword, $dbName, $dbPort;
        $connection = mysqli_connect($dbAddress, $dbUsername, $dbPassword, $dbName, $dbPort);
        if(!$connection) {
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
