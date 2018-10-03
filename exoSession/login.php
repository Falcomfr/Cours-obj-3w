<?php
session_start();
$ok = 1;
if(isset($_GET['deco'])) {
    unset($_SESSION['comptes']);
    echo 'Déconnexion !';
    header('Refresh:2;url= index.php');
    exit;
}

$tab = array(
        array(
            'id'=>'Roby',
            'pass'=>'123',
            'prenom'=>'Robert',
            'nom'=>'Dupont',
            'role'=>'superadmin'
        ),
        array(
            'id'=>'Marcelus',
            'pass'=>'000',
            'prenom'=>'Marcel',
            'nom'=>'Delacour',
            'role'=>'admin'
        ),
        array(
            'id'=>'Jacky',
            'pass'=>'321',
            'prenom'=>'Jack',
            'nom'=>'Ouille',
            'role'=>'invité'
        )
);

$idProtect = htmlspecialchars($_POST['id']); 
$mdpProtect = htmlspecialchars($_POST['mdp']); 

if(isset($idProtect, $mdpProtect)) {
    if(!empty($idProtect) && !empty($mdpProtect)) {
        foreach($tab as $test) {
            if($test['id'] == $idProtect) {
                if($test['pass'] ==  $mdpProtect) {
                    echo "Vous êtes connecté !";
                    $_SESSION['comptes']['id'] = $idProtect;
                    $_SESSION['comptes']['mdp'] = $mdpProtect;
                    $_SESSION['comptes']['prenom'] = $test['prenom'];
                    $_SESSION['comptes']['nom'] = $test['nom'];
                    $_SESSION['comptes']['role'] = $test['role'];
                    header('Refresh:2;url= index.php');
                    exit;
                } else {
                    echo 'Mauvaise mot de passe';
                    header('Refresh:2;url= index.php');
                    exit;
                }
            } else {
                $ok = 1;
            }
        }
        if($ok == 0) {
            echo 'Aucun utilisateur avec ce pseudonyme';
            header('Refresh:2;url= index.php');
            exit;
        }
    } else {
        echo 'Login ou mdp vide !';
        header('Refresh:2;url= index.php');
        exit;
    }
}