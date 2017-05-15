
<?php
    //DB Access
    /*$dbAddress = "mysql.stackcp.com:21257";
    $dbUsername = "wikitt-355d4a";
    $dbPassword = "1234password";
    $dbName = "wikitt-355d4a";*/
    $dbAddress = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "wikitt";
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
        global $connection;
        $toRtn = false;
        $stmt = mysqli_prepare($connection, "SELECT * FROM amministratore WHERE BINARY NomeUtente=? and Password=? LIMIT 1;");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) === 1) {
            $toRtn = true;
        }
        mysqli_stmt_close($stmt);
        return $toRtn;
    }
    function authentication_session() {
        $toRtn = false;
        if(isset($_SESSION["username"])) {
            $result = query("SELECT * FROM amministratore WHERE BINARY NomeUtente='".getUsername()."' LIMIT 1;");
            if(mysqli_num_rows($result) == 1) {
               $toRtn = true;
            }
        }
        return $toRtn;
    }
    function getUsername() {
        if(isset($_SESSION["username"])) {
            return $_SESSION["username"];
        }
    }
    //Administrator Info
    function getAdminCreationDateTime() {
        $result = query("SELECT DataCreazione FROM amministratore WHERE NomeUtente='".getUsername()."' LIMIT 1;");
        return mysqli_fetch_array($result)["DataCreazione"];
    }
    function getAdminVideoCount() {
        $result = query("SELECT COUNT(*) AS VideoCount FROM video V WHERE V.NomeAmm='".getUsername()."';");
        return mysqli_fetch_array($result)["VideoCount"];
    }
    function getAdminUserCount() {
        $result = query("SELECT COUNT(*) AS UserCount FROM autore A WHERE A.NomeAmm='".getUsername()."';");
        return mysqli_fetch_array($result)["UserCount"];
    }
    /*END Authentication*/
    
    /*Set Response*/
    function setResponse(&$response = null, $status = null, $message = null) {
        $response["status"] = $status;
        $response["message"] = $message;
    }
