
<?php
    //Require engine PHP page
    require 'engine.php';
    //Prepare response for JS
    header('Content-Type: application/json');
    $data = array(
        "status" => null,
        "message" => null
    );
    //DB usage
    $connection = null;
    //Email
    $email = filter_input(INPUT_GET, "email");
    
    if(isset($email)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            connect($connection);
            $result = mysqli_query($connection, "INSERT INTO newsletter(Email) VALUES ('$email');");
            if ($result === FALSE) { die(mysqli_error($connection));}
            setResponse(TRUE, "Email inserted correctly!");
            mysqli_close($connection);
        } else { setResponse(FALSE, "Email Address in invalid format!");}
    } else { setResponse(FALSE, "Email is not set!");}
    
    function setResponse($status = null, $message = null) {
        global $data;
        $data["status"] = $status;
        $data["message"] = $message;
    }
    
    echo json_encode($data);
    