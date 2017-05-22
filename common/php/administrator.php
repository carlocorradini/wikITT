
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
     *  1 => Authentication | Sign In
     *  2 => Change password
     *  3 => Sign Out | session_destroy
    */
    $type = filter_input(INPUT_POST, "type");
    
    if(isset($type) && $type != "") {
        switch ($type) {
            case 1:
                //---Authentication | Sign In---
                //Username & Password & Client DateTime
                $username = filter_input(INPUT_POST, "username");
                $password = filter_input(INPUT_POST, "password");
                $accessDateTime = filter_input(INPUT_POST, "accessDateTime");
                if(!validateDate($accessDateTime) || !isset($accessDateTime)) { $accessDateTime = date('Y-m-d H:i:s', time());}
                
                if (!isset($_SESSION["username"])) {
                    if(isset($username) && isset($password)) {
                        if(authentication_param($username, $password)) {
                            //Start Session with username -> NB! Username UNIQUE
                            $_SESSION["username"] = $username;
                            //Store access datetime & increase access counter
                            query("UPDATE amministratore SET DataUltimoAccesso='".$accessDateTime."', CtrAccessi=CtrAccessi+1 WHERE NomeUtente='".$username."' LIMIT 1;");
                            setResponse($data, TRUE, "Autenticazione riuscita");
                        } else { setResponse($data, FALSE, "Username o Password non valide");}
                        connection_close();
                    } else { setResponse($data, FALSE, "Username o Password non impostate");}
                } else if(authentication_session()) {
                    setResponse($data, TRUE, "Autenticazione riuscita");
                } else { setResponse($data, FALSE, "Autenticazione fallita");}
                break;
            case 2:
                //---Change Password---
                //Old & New Password
                $old_password = filter_input(INPUT_POST, "old_password");
                $new_password = filter_input(INPUT_POST, "new_password");
                if(authentication_session()) {
                    if(isset($old_password) && isset($new_password)) {
                        if(strlen($new_password) >= $min_password_length && strlen($new_password) <= $max_password_length) {
                            if(strcmp($old_password, $new_password) !== 0) {
                                if(authentication_param(getUsername(), $old_password)) {
                                    $result = query("UPDATE amministratore SET Password='".createPasswordHash($new_password)."' WHERE NomeUtente='".getUsername()."' LIMIT 1;");
                                    if($result) { setResponse($data, TRUE, "Password cambiata con successo");}
                                    else {
                                        setResponse($data, FALSE, "Errore nel cambiamento della password");
                                        session_destroy();
                                    }
                                } else { setResponse($data, FALSE, "Vecchia Password non valida");}
                            } else { setResponse($data, FALSE, "Nuova e vecchia password sono uguali");}
                        } else { setResponse($data, FALSE, "Nuova Password non rispetta le condizioni di lunghezza: Minimo[".$min_password_length."] & Massimo[".$max_password_length."]");}
                    } else { setResponse($data, FALSE, "Vecchia o nuova Password non impostate");}
                } else { setResponse($data, FALSE, "Non autorizzato");}
                connection_close();
                break;
            case 3:
                //---Sign Out | session_destroy---
                if(authentication_session()) {
                    echo "Attendere prego...";
                    session_destroy();
                    header('Location: /admin/index.php?action=signout');
                    die();
                } else { 
                    echo 'Non sei autenticato | Non puoi disconnetterti';
                    header('Location: /admin/index.php');
                    die();
                }
                break;
            default:
                setResponse($data, FALSE, "Type non riconosciuto");
                break;
        }
    } else { setResponse($data, FALSE, "Type non settato");}
    
    //---RESPONSE DATA---
    if($type != 3) { echo json_encode($data);}