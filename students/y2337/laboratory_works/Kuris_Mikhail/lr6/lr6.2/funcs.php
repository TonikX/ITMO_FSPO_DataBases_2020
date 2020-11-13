<?php 

function table($query, $db)
{
        $result = pg_query($db, $query);

        while ($row = pg_fetch_row($result)) {
                echo '<tr>';
                foreach ($row as $field) {
                        echo '<td>' . $field . '</td>';
                }
        echo '</tr>';
        }

}

?>