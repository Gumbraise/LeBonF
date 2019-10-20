<?php
if(isset($_POST['inscription'])) {
    if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['langage']) AND !empty($_POST['format']) AND !empty($_POST['keyboard'])) {
        $pass = md5($_POST['pass']);
        $pass2 = md5($_POST['pass2']);
        $room = $_POST['room'];
        $user = $_POST['user']));
        if($pass == $pass2) {
            $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0) {
                $reqwindows = $bdd->prepare("SELECT * FROM version WHERE id = 1");
                $reqwindows->execute(array());
                $reqver = $reqwindows->fetch();
                if (!empty($_POST['code'])) {
                $insertmbr = $bdd->prepare("INSERT INTO users(ip, installation, langage, format, keyboard, windows_key, windows_version, name, pass, cortana, tracking, oral, diagnostics, diagnostics2, ads, mail, date, code_perso, code_entree) 
                                            VALUES           (?,    5,          ?,        ?,      ?,        0,          ?,               ?,     ?,    1,       1,       0,      1 ,         1,           1,    ?,   UNIX_TIMESTAMP(), ?, ?)");
    $insertmbr->execute(array($_SERVER['REMOTE_ADDR'], $_POST['langage'], $_POST['format'], $_POST['keyboard'], $reqver['version'], $pseudo, $pass, $mail, $pseudo, $_POST['code']));
                } else { 
                    $insertmbr = $bdd->prepare("INSERT INTO users(ip, installation, langage, format, keyboard, windows_key, windows_version, name, pass, cortana, tracking, oral, diagnostics, diagnostics2, ads, mail, date, code_perso, code_entree) 
                    VALUES           (?,    5,          ?,        ?,      ?,        0,          ?,               ?,     ?,    1,       1,       0,      1 ,         1,           1,    ?,   UNIX_TIMESTAMP(), ?, 0)");
    $insertmbr->execute(array($_SERVER['REMOTE_ADDR'], $_POST['langage'], $_POST['format'], $_POST['keyboard'], $reqver['version'], $pseudo, $pass, $mail, $pseudo));

                }
                echo $pass.$mail.$pseudo.$_POST['langage'].$_POST['format'].$_POST['keyboard'].$_POST['code'].$reqver['version'];

                $requser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND pass = ?");
                $requser->execute(array($mail, $pass));
                $userexist = $requser->fetch();
                $_SESSION['id'] = $userexist['id'];

                echo '/'.$_SESSION['id'];

                $insertmbr2 = $bdd->prepare("INSERT INTO item(name, img, user_id, toppos, leftpos) VALUES (?, ?, ?, 0, 0)");
                $insertmbr2->execute(array("Corbeille", "assets/img/item/recyclebin.png", $_SESSION['id']));
        
                
                header("Location: ?");
            } else {
                header("Location: ?page=inscription1");
            }
        } else {
            
        }
    } else {
        header("Location: ?page=inscription2");
    }
} else {
    header("Location: ?page=inscription3");
}
?>