
<?php
    //Require engine PHP page
    require 'engine.php';
    //Prepare response for JS
    header('Content-Type: application/json');
    $data = array(
        "status" => null,
        "message" => null
    );
    //Email
    $email = filter_input(INPUT_GET, "email");
    
    if(isset($email)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = query("SELECT Email FROM newsletter WHERE Email='$email' LIMIT 1;");
            if(mysqli_num_rows($result) === 0) {
                $result = query("INSERT INTO newsletter(Email) VALUES ('$email');");
                setResponse(TRUE, "Email inserted correctly!");
            } else { setResponse(TRUE, "Email Address already registered!");}
            connection_close();
        } else { setResponse(FALSE, "Email Address in invalid format!");}
    } else { setResponse(FALSE, "Email is not set!");}
    
    function setResponse($status = null, $message = null) {
        global $data;
        $data["status"] = $status;
        $data["message"] = $message;
    }
    
    echo json_encode($data);
    