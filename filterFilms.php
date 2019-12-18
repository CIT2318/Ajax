<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=examples', 'root', '');
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
$certId = $_GET["id"];
//select all the certificates
$stmt = $conn->prepare("SELECT * FROM films
INNER JOIN certificates on films.certificate_id = certificates.id
WHERE certificates.id = :id");
$stmt->bindValue(':id',$certId);
$stmt->execute();
$films=$stmt->fetchAll();
$conn=NULL;
echo json_encode($films);
?>
