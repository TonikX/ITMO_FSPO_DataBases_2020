<?php 

function fetchTableData($req) {
  global $pdo;

  $res = $pdo->query($req);
  $d = $res->fetchAll(PDO::FETCH_ASSOC);

  $result;

  foreach ($d as $line) {
    $result .= '<tr>';
    foreach ($line as $col_value) {
      $result .= "<td>$col_value</td>";
    }
    $result .= '</tr>';
  }

  return $result;
}

?>