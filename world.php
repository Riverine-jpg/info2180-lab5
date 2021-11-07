<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$cquer = htmlentities($_GET['country'],ENT_QUOTES, 'UTF-8');
$citquer = htmlentities($_GET['context'],ENT_QUOTES, 'UTF-8');
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if($citquer == "cities"){
  $stmt = $conn->query("SELECT cities.name,cities.district,cities.population FROM countries INNER JOIN cities ON countries.code=cities.country_code WHERE countries.name LIKE '%$cquer%' ");
}else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$cquer%'");
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<?php if($citquer == "cities"):?>
  <table>
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['district'] ?></td>
        <td><?= $row['population'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

<?php endif;if($citquer != "cities"):?>
  <table>
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of state</th>
    </tr>
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['continent'] ?></td>
        <td><?= $row['independence_year'] ?></td>
        <td><?= $row['head_of_state'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

<?php endif; ?>
