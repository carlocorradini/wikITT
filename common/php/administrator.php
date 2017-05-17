
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
    /*Request Type
     *  1 => authentication
     *  2 => change password
    */
    $type = filter_input(INPUT_POST, "type");
    //Username & Password
    $username = filter_input(INPUT_POST, "username");
    $password = filter_input(INPUT_POST, "password");
    
    if(isset($type) && $type != "") {
        switch ($type) {
            case 1:
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
                break;
            case 2:
                if(authentication_session()) {
                    
                } else { setResponse($data, FALSE, "Non autorizzato");}
                break;
            default:
                setResponse($data, FALSE, "Type non riconosciuto");
                break;
        }
    } else { setResponse($data, FALSE, "Type non settato");}
    echo json_encode($data);