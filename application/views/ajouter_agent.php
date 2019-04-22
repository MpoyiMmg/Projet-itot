<div>
<h3 >Ajouter Agent</h3>
<?php echo form_open('agent/AgentController/ajouter_agent'); ?>
<div>
    <p>Nom :</p>
    <input type="text" name="nomAgent"  class="champ" required>
    <p>Telephone :</p>
    <input type="text" name="telephone" required>
    <p>Email :</p>
    <input type="text" name="email">
    <p>Photo :</p>
    <input type="text" name="photo">
    <p>Nom utilisateur :</p>
    <input type="text" name="username">
    <p>Mot de passe :</p>
    <input type="text" name="pwd">
    <p>Confirmer mot de passe :</p>
    <input type="text" name="confpwd">
    
</div>
<br>
<input type="submit" value="Envoyer">
<?php echo form_close() ?>
</div>