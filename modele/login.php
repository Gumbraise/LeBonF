<?php
echo '<div id="login" class="modal fade index" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Se Connecter</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
    <form action="actions/login.php" method="POST" name="connexion">
            <input type="email" placeholder="Mail" name="email" required>
            <input type="password" placeholder="Mot de passe" name="pass" required>
    </div>
    <div class="modal-footer">
            <button type="submit" class="btn btn-default" name="connexion">Se Connecter</button>
        </form>
    </div>
    </div>
</div>
</div>';
?>