<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
  <thead>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of state</th>
  </thead>
  <tbody>
    <?php foreach ($results as $result): ?>
    <tr>
      <td><?= $result['name']; ?></td>
      <td><?= $result['continent']; ?></td>
      <td><?= $result['independence_year']; ?></td>
      <td><?= $result['head_of_state']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>




<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
