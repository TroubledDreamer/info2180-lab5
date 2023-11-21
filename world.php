<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$country = $_GET['country'];
$city = isset($_GET['lookup']) ? isset($_GET['lookup']): "";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);



if(strlen($city) > 0)
{

  $stmt = $conn->query("SELECT * FROM countries as c join cities as cs on c.code = cs.country_code WHERE c.name LIKE '%$country%';");

}
else{

  $stmt = $conn->query("SELECT * FROM countries as c WHERE name LIKE '%$country%';");

}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);




?>


<?php if (!(strlen($city) > 0)): ?>
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

<?php else: ?>

<table>
  <thead>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
  </thead>
  <tbody>
    <?php foreach ($results as $result): ?>
    <tr>
      <td><?= $result['name']; ?></td>
      <td><?= $result['district']; ?></td>
      <td><?= $result['population']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>




