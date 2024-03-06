User
<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    require_once "connection.php";
    $sql = "DELETE FROM Student WHERE id=$id";
    $connection->query($sql);
}
header("Location:Home.php");
exit;

?>