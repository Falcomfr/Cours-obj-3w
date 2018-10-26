
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

<table colspan="0">
    <tr>
        <th>ID de la conversation</th>
        <th>Date de la conversation</th>
        <th>Heure de la conversation</th>
        <th>Nombre de messages</th>
    </tr>
        <?php  
    
        foreach ($tab['conversations'] as $key => $value) {

            if($value->get_c_termine() == 1) {
                echo '<tr class="opened">';
            } else {
                echo '<tr class="closed">';
            }
                echo'<td>'.$value->get_c_id(). '</td>
                    <td>'.$value->get_c_date(). '</td>
                    <td>'.$value->get_c_heure(). '</td>
                    <td>'.$value->get_nbMessages(). '</td>
                    <td><a href="?c=message&a=index&id='.$value->get_c_id(). '" >Afficher</a></td>
                </tr>';
        }
        ?>
</table>