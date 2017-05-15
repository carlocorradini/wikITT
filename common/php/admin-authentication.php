
<?php
    //Require engine PHP page
    require 'engine.php';
    session_start();
    //Prepare response for JS
    header('Content-Type: application/json');
    $data = array(
        "status" => null,
        "message" => null
    );
    //Username & Password
    $username = filter_input(INPUT_POST, "username");
    $password = md5(filter_input(INPUT_POST, "password"));

    if (!isset($_SESSION["username"])) {
        if(isset($username) && isset($password)) {
            if(authentication_param($username, $password)) {
                //Start Session with username -> NB! Username UNIQUE
                $_SESSION["username"] = $username;
                setResponse($data, TRUE, "Autenticazione riuscita");
            } else { setResponse($data, FALSE, "Username o Password non valide");}
            connection_close();
        } else { setResponse($data, FALSE, "Username o Password non impostate");}
    } else {
        if(authentication_session()) {
            setResponse($data, TRUE, "Autenticazione riuscita");
        } else { setResponse($data, FALSE, "Autenticazione fallita");}
    }
    echo json_encode($data);