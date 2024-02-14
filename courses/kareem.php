<?php

$comming=$_COOKIE['username'];


if($comming == "kareem"){

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
      <td>PHP</td>
      <td>exellent</td>
      <td>Feb 2023</td>
    </tr>
    <tr>
      <td>Agular</td>
      <td>good</td>
      <td>October 2023</td>

    </tr>
    <tr>
      <td>Linux</td>
      <td>good</td>
      <td>jan 2024</td>

    </tr>
  </tbody>
</table>
</body>
</html>

<?php

}

?>