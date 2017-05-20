
<?php  
    //---DB Access---
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
            mysqli_close();
            die("Failed to connect to MySQL: " + mysqli_connect_error());
        }
    }
    //Close Connection
    function connection_close() {
        global $connection;
        mysqli_close($connection);
    }
    //Query Execution
    function query($query) {
        global $connection;
        $result = mysqli_query($connection, $query);
        if ($result === FALSE) { die(mysqli_error($connection));}
        else { return $result;}
    }
    //---END Connection---
    
    //---Authentication---
    function authentication_param($username, $password) {
        global $connection;
        $toRtn = false;
        $stmt = mysqli_prepare($connection, "SELECT Password FROM amministratore WHERE BINARY NomeUtente=? LIMIT 1;");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) === 1
                && password_verify($password, mysqli_fetch_assoc($result)["Password"])) {
            $toRtn = true;
        }
        mysqli_stmt_close($stmt);
        return $toRtn;
    }
    function authentication_session() {
        $toRtn = false;
        if(isset($_SESSION["username"])) {
            $result = query("SELECT NomeUtente FROM amministratore WHERE BINARY NomeUtente='".getUsername()."' LIMIT 1;");
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
    function createPasswordHash($password) {
        global $password_hash_options;
        return password_hash($password, PASSWORD_BCRYPT, $password_hash_options);
    }
    //Administrator
    function getAdminInfo() {
        return query("SELECT NomeUtente,DataCreazione,DataUltimoAccesso,CtrAccessi FROM amministratore WHERE NomeUtente='".getUsername()."' LIMIT 1;");
    }
    function getAdminCreationDate() {
        $result = getAdminInfo();
        return date('d/m/Y', strtotime(mysqli_fetch_array($result)["DataCreazione"]));
    }
    function getAdminCreationTime() {
        $result = getAdminInfo();
        return date('H:i:s', strtotime(mysqli_fetch_array($result)["DataCreazione"]));
    }
    function getAdminLastAccessDate() {
        $result = getAdminInfo();
        return date('d/m/Y', strtotime(mysqli_fetch_array($result)["DataUltimoAccesso"]));
    }
    function getAdminLastAccessTime() {
        $result = getAdminInfo();
        return date('H:i:s', strtotime(mysqli_fetch_array($result)["DataUltimoAccesso"]));
    }
    function getAdminAccessCounter() {
        $result = getAdminInfo();
        return mysqli_fetch_array($result)["CtrAccessi"];
    }
    function getAdminVideoCount() {
        $result = query("SELECT COUNT(*) AS VideoCount FROM video V WHERE V.NomeAmm='".getUsername()."';");
        return mysqli_fetch_array($result)["VideoCount"];
    }
    function getAdminUserCount() {
        $result = query("SELECT COUNT(*) AS UserCount FROM autore A WHERE A.NomeAmm='".getUsername()."';");
        return mysqli_fetch_array($result)["UserCount"];
    }
    //---END Authentication---
    
    //---Response---
    //Set Response
    function setResponse(&$response = null, $status = null, $message = null) {
        $response["status"] = $status;
        $response["message"] = $message;
    }
    //---END Response---

    //---UTILITY---
    function validateDate($date, $format = 'Y-m-d H:i:s') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }