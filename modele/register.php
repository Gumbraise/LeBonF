<?php
echo '<div id="register" class="modal fade index" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">S\'Inscrire</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
        <form action="actions/register.php" method="POST" name="inscription">
            <input type="text" placeholder="Prénom + Nom" name="name" required>
            <input type="text" placeholder="Classe (1STI2D2)" name="classe" required>
            <input type="email" placeholder="Mail" name="email" required>
            <input type="password" placeholder="Mot de passe" name="pass" required>
            <input type="password" placeholder="Répétez le mot de passe" name="pass2" required>
    </div>
    <div class="modal-footer">
            <button type="submit" class="btn btn-default" name="inscription">S\'Inscrire</button>
        </form>
    </div>
    </div>
</div>
</div>';
?>