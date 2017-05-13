
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
    $email = filter_input(INPUT_POST, "email");
    
    if(isset($email) && $email != "") {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = query("SELECT Email FROM newsletter WHERE Email='$email' LIMIT 1;");
            if(mysqli_num_rows($result) === 0) {
                $result = query("INSERT INTO newsletter(Email) VALUES ('$email');");
                setResponse($data, TRUE, "Email inserted correctly!");
            } else { setResponse($data, TRUE, "Email Address already registered!");}
            connection_close();
        } else { setResponse($data, FALSE, "Email Address in invalid format!");}
    } else { setResponse($data, FALSE, "Email is not set!");}
    
    echo json_encode($data);
    