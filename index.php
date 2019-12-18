<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=examples', 'root', '');
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
//select all the certificates
$query = "SELECT * FROM certificates";
$resultset = $conn->query($query);
$certificates = $resultset->fetchAll();

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Filter films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<h1>Filter Films Using Ajax</h1>
<?php
//for each certificate create a radio button
//e.g. <label for="18"><input type="radio" name="certificates" class="certBtn" value="5" id="18">18</label>
foreach($certificates as $certificate){
	echo "<label for='{$certificate["name"]}'>";
  echo "<input type='radio' name='certificates' class='certBtn' value='{$certificate["id"]}' id='{$certificate["name"]}'>";
  echo "{$certificate["name"]}";
  echo "</label>";
}
?>
<div id="matching-films">
<!-- matching films will be displayed in here -->
</div>
<script src="js/films-ajax.js"></script>
</body>
</html>
