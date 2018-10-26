<style>
    table {
        border-collapse:collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
    }

    .opened {
        color: green;
    }
    .closed {
        color: red;
    }
</style>

<?php
    if(!isset($_GET['offset'])) {
        $offset = 0;} 
      else {
        $offset = $_GET['offset'];
      }
      if(!isset($_GET['order'])) {
        $order = "m_date";} 
      else {
        $order = $_GET['order'];
      }
      if(isset($_GET['id'])) {
        $id = $_GET['id'];
      } else {
        $id = 0;
      } 

echo '
<form action="MessageAdd.php" method="post">
    <textarea rows="4" cols="50"></textarea> 
    <input type="submit" value="Ajouter un message">
</form>';

echo "<a href='index.php'>Retour</a>";
if($tab['message'] === false) {
    echo "<br/> Page 404"; }
else if(count($tab['message']) < 1) {
    echo "<br/> <b>Aucun message dans cette conversation</b>";
}
else {
    echo '<table colspan="0">
        <tr>
            <th><a href="?c=message&a=index&id='.$_GET['id'];
            echo '&order=date">Date du message</a></th>
            <th>Heure du message</th>
            <th><a href="?c=message&a=index&id='.$_GET['id'];
            echo '&order=nom">Nom Prénom</a></th>
            <th><a href="?c=message&a=index&id='.$_GET['id'];
            echo '&order=id">Message</a></th>
        </tr>';

        foreach ($tab['message'] as $key => $value) {
            
            echo "<tr>
            <td>". $value->get_date() ." </td>
            <td>". $value->get_heure() ." </td>
            <td>". $value->get_nom() . " " . $value->get_prenom() . " </td>
            <td>". $value->get_message() ." </td>
            </tr>";
    }
    echo '</table>';

    $offsetMore = $offset + 20;
    $offsetLess = $offset - 20;

    if($offset > 0) {
        echo '<a href="?c=message&a=index&id='.$_GET['id'].'&offset='.$offsetLess;
            if(isset($_GET['order'])) {
                echo "&order=".$_GET['order'];
            }
        echo '">Précedent</a> ';
    }
    if(count($tab['message']) > 19){
        echo '<a href="?c=message&a=index&id='.$_GET['id'].'&offset='.$offsetMore;
            if(isset($_GET['order'])) {
                echo "&order=".$_GET['order'];
            }
    echo '">Suivant</a>';
    }
}