<?php
require_once('Classes/UserModel.php');
require_once('Classes/User.php');

try {
  $userModel = new UserModel;

  if(!empty($_GET['user'])) {
    if(ctype_digit($_GET['user'])) {
      $user = $userModel->read($_GET['user']);
      var_dump($user);
    } else {
      $users = $userModel->readAll();
      var_dump($users);
    }
  }

  if(isset($_POST['addUser'])) {
    if(!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['role'])) {
      $user = new User($_POST);
      $id = $userModel->create($user);
      $user->set_id($id);
    }
  }
  unset($userModel);
} catch(Exception $e) {
  header('Location: 500');
  exit;
}
?><!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion utilisateur</title>
  </head>
  <body>
    <form action="" method="post">
      <input type="text" name="login" placeholder="Identifiant" aria-label="Identifiant"<?php if(isset($user)) echo ' value="' . $user->get_login() . '"'; ?>>
      <input type="text" name="prenom" placeholder="Prénom" aria-label="Prénom"<?php if(isset($user)) echo ' value="' . $user->get_prenom() . '"'; ?>>
      <input type="text" name="nom" placeholder="Nom" aria-label="Nom"<?php if(isset($user)) echo ' value="' . $user->get_nom() . '"'; ?>>
      <input type="text" name="naissance" placeholder="Date de naissance" aria-label="Date de naissance"<?php if(isset($user)) echo ' value="' . $user->get_naissance() . '"'; ?>>

      <label for="role">Rôle
        <select name="role" id="role">
          <option<?php if(isset($user) && $user->get_rank()===1) echo ' selected="selected"'; ?> value="1">SuperAdmin</option>
          <option<?php if(isset($user) && $user->get_rank()==2) echo ' selected="selected"'; ?> value="2">Admin</option>
          <option<?php if(isset($user) && $user->get_rank()==3) echo ' selected="selected"'; ?> value="3">Invité</option>
        </select>
      </label>
      <button name="addUser" type="submit">Ajouter</button>
    </form>
  </body>
</html>