<?php

$comming=$_COOKIE['username'];


if($comming == "hassan"){

?>

<!DOCTYPE html>

<html>
<head>
    
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}

tr:hover {
  background-color: #f5f5f5;
}

</style>

    </head>
<body>

<table>
  <thead>
    <tr>
      <th> Program</th>
      <th> grade</th>
      <th>Graduation Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Html</td>
      <td>good</td>
      <td> feb 2023</td>
    </tr>
    <tr>
      <td>Css</td>
      <td>very good</td>
      <td>August 2023</td>
    </tr>
    <tr>
      <td>JavaScript</td>
      <td>exellent</td>
      <td>Octbor 2024</td>
    </tr>
  </tbody>
</table>
</body>
</html>

<?php

}

?>