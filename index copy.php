<?php include 'header.php'; ?>
<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["us-cdbr-east-03.cleardb.com"];
$cleardb_username = $cleardb_url["b77f4462373524"];
$cleardb_password = $cleardb_url["0303303f"];
$cleardb_db = substr($cleardb_url["testphp"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$mysqli = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if ($mysqli->connect_error) {

  printf("can not connect databse %s\n", $mysqli->connect_error);
  exit();
}

$query = "SELECT * FROM `User`";
$read = $mysqli->query($query);

?>

<div class="container-fluid">
  <div class="banner">
    <img src="images/banner.jpg">
  </div>
  <div class="container">
    <h2>User </h2>
    <hr>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>id</th>
          <th>Name</th>
          <th>Age</th>
          <th>Text</th>
          <th>image</th>
          <th>details</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $read->fetch_assoc()) { ?>
          <?php if(isset($_GET['posts'])){ ?>
            <form>
            <tr class="table-active">
              <th><?php echo $row['id']; ?></th>
              <th></th>
              <td><?php echo $row['age']; ?></td>
              <td><?php echo $row['text_user']; ?></td>
              <td class="w-25 ">  <img src="uploads/<?php echo  $row['images'] ."\" height=\"130\" width=\"150\> "; ?>">  </td>
              <td><a href="index.php?posts=<?php echo  $row['id'];  ?>">Details</a></td>
            </tr>
            </form>
          <?php } else {?>
            <tr class="table-active">
              <th><?php echo $row['id']; ?></th>
              <th><?php echo $row['name']; ?></th>
              <td><?php echo $row['age']; ?></td>
              <td><?php echo $row['text_user']; ?></td>
              <td class="w-25 ">  <img src="uploads/<?php echo  $row['images'] ."\" height=\"130\" width=\"150\> "; ?>">  </td>
              <td><a href="index.php?posts=<?php echo  $row['id'];  ?>">Details</a></td>
            </tr>
          <?php } ?>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php 
 if(isset($_GET['posts'])){

	$id=$_GET['posts'];
}
echo "<h1> $id </h1>"

?>

<?php include 'footer.php'; ?>