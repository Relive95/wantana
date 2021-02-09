<?php include 'header.php' ?>
<pre><?php print_r($_POST) ?> </pre>


<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["us-cdbr-east-03.cleardb.com"];
$username = $url["user"];
$password = $url["b77f4462373524"];
$db = substr($url["testphp"], 1);

$mysqli = new mysqli($server, $username, $password, $db);

if (isset($_POST['submit'])) {


  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $tel = $_POST['tel'];
  $address = $_POST['address'];

  $query = "INSERT INTO `User`(`id`, `name`, `lastname`, `tel`, `address`) VALUES (null,'$name','$lastname','$tel','$address')";
  $insert = $mysqli->query($query);
}
?>
<div class="container">
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <legend>Add a something</legend>
    <hr>
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter Name">
    </div>

    <div class="form-group">
      <label>LastName</label>
      <input type="text" class="form-control" name="lastname" placeholder="Enter LastName">
    </div>

    <div class="form-group">
      <label>Tel</label>
      <input type="number" class="form-control" name="tel" placeholder="Enter Tel">
    </div>

    <div class="form-group">
      <label>address</label>
      <textarea class="form-control" name="address" rows="3"></textarea>
    </div>
    <button type="reset" class="btn btn-danger">Cancel</button>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include 'footer.php' ?>