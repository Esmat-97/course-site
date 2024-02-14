<?php

$comming=$_COOKIE['username'];


if($comming == "dalia"){

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
  width: 100%;
  border-collapse: collapse;
}

th,
td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
    </style>
</head>
<body>

<table>
  <thead>
    <tr>
      <th>Subject</th>
      <th>Grade</th>
      <th>Class Time</th>
      <th>Class Duration</th>
      <th>Class Days</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>PHP</td>
      <td>Grade 7</td>
      <td>10:00 AM</td>
      <td>1 hour</td>
      <td>Monday, Wednesday, Friday</td>
    </tr>
    <tr>
      <td>Linux</td>
      <td>Grade 8</td>
      <td>11:00 AM</td>
      <td>1 hour</td>
      <td>Tuesday, Thursday</td>
    </tr>
    <tr>
      <td>Aphece http server</td>
      <td>Grade 9</td>
      <td>1:00 PM</td>
      <td>1 hour</td>
      <td>Monday, Wednesday, Friday</td>
    </tr>
    <tr>
      <td>OOP</td>
      <td>Grade 10</td>
      <td>2:00 PM</td>
      <td>1 hour</td>
      <td>Tuesday, Thursday</td>
    </tr>
  </tbody>
</table>
    
</body>
</html>


<?php

}

?>