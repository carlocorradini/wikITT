
<?php
//Start Session
if (session_status() == PHP_SESSION_NONE) { session_start();}
require_once $_SERVER["DOCUMENT_ROOT"].'/common/php/engine.php';

if(authentication_session()) { ?>
    <style>
        #admin-navigator {
            width: 1000px;
            max-width: 100%;
            margin: 25px auto;
        }
    </style>
    <div class="ui menu stackable large" id="admin-navigator">
        <div class="item" style="padding: 1px;">
            <img src="/common/image/profile/terminal.png" alt="administrator" class="ui centered image" style="width: 70px; height: 70px;">
        </div>
        <div class="item">
            <a href="/admin/index.php" class="ui labeled teal icon button fluid">
                <i class="block layout icon"></i>
                Pannello di Controllo
            </a>
        </div>
        <div class="right item">
            <form action="/common/php/administrator.php" method="POST" id="sign-out" style="width: 100%;">
                <input type="hidden" name="type" value="3">
                <button type="submit" class="ui labeled red icon button fluid">
                    <i class="power icon"></i>
                    Disconnetti
                </button>
            </form>
        </div>
    </div>
<?php } else {
    echo 'Non sei autenticato | Non puoi visualizzare questa pagina';
    header('Location: /admin/index.php');
    die();
}