<?php
  $p_title = $_REQUEST['ptitle'];
  require_once 'login_doctors.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) 
      die($conn->connect_error);
$query  = "SELECT * FROM physicians_table where name like '%$p_title%'";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
$rows = $result->num_rows;
echo '<body> <div id="table_ajax"> <table> <thead> <tr> <td>';
echo 'Name </td>  <td> Specialization</td> </tr></thead> <tbody>';
for ($j = 0 ; $j < $rows ; ++$j)
  { echo '<tr>';
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo '<td>'   . $row['name']   . '</td>';
    echo '<td>'    . $row['specialization']    . '</td>';
    echo '</tr>';
  }
 echo '</div> </tbody> </table>'; 
  $result->close();
  $conn->close();
?>
