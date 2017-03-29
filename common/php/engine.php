
<?php
    //DB Access
    $dbAddress = "mysql.stackcp.com:21257";
    $dbUsername = "wikitt-355d4a";
    $dbPassword = "1234password";
    $dbName = "wikitt-355d4a";
    //DB Usage
    connect($connection);

    /*Connection*/
    function connect(&$connection) {
        global $dbAddress,$dbUsername,$dbPassword,$dbName;
        $connection = mysqli_connect($dbAddress,$dbUsername,$dbPassword,$dbName);
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
