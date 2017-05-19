
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
    
    if(isset($type) && $type != "") {
        switch ($type) {
            case 1:
                //Username & Password
                $username = filter_input(INPUT_POST, "username");
                $password = filter_input(INPUT_POST, "password");
                if (!isset($_SESSION["username"])) {
                    if(isset($username) && isset($password)) {
                        if(authentication_param($username, $password)) {
                            //Start Session with username -> NB! Username UNIQUE
                            $_SESSION["username"] = $username;
                            setResponse($data, TRUE, "Autenticazione riuscita");
                        } else { setResponse($data, FALSE, "Username o Password non valide");}
                        connection_close();
                    } else { setResponse($data, FALSE, "Username o Password non impostate");}
                } else if(authentication_session()) {
                    setResponse($data, TRUE, "Autenticazione riuscita");
                } else { setResponse($data, FALSE, "Autenticazione fallita");}
                break;
            case 2:
                //Old & New Password 
                $old_password = filter_input(INPUT_POST, "old_password");
                $new_password = filter_input(INPUT_POST, "new_password");
                if(authentication_session()) {
                    if(isset($old_password) && isset($new_password)) {
                        if(authentication_param(getUsername(), $old_password)) {
                            if(strlen($new_password) >= $min_password_length && strlen($new_password) <= $max_password_length) {
                                $result = query("UPDATE amministratore SET Password='".createPasswordHash($new_password)."' WHERE NomeUtente='".getUsername()."';");
                                if($result) { setResponse($data, TRUE, "Password cambiata con successo");}
                                else {
                                    setResponse($data, FALSE, "Errore nel cambiamento della password");
                                    session_destroy();
                                }
                            } else { setResponse($data, FALSE, "Nuova Password non rispetta le condizioni di lunghezza: Minimo[".$min_password_length."] & Massimo[".$max_password_length."]");}
                        } else { setResponse($data, FALSE, "Vecchia Password non valida");}
                    } else { setResponse($data, FALSE, "Vecchia o nuova Password non impostate");}
                } else { setResponse($data, FALSE, "Non autorizzato");}
                connection_close();
                break;
            default:
                setResponse($data, FALSE, "Type non riconosciuto");
                break;
        }
    } else { setResponse($data, FALSE, "Type non settato");}
    echo json_encode($data);