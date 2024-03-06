<?php
require_once "connection.php";
$id = '';
$name = '';
$email = '';
$pname = '';
$class = '';
$section = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: home.php");
        exit;
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM Student WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: home.php");
        exit;
    }
    $name = $row["name"];
    $email = $row["email"];
    $pname = $row["pname"];
    $class = $row["class"];
    $section = $row["section"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pname = $_POST["pname"];
    $class = $_POST["class"];
    $section = $_POST["section"];
        $sql = "UPDATE Student SET name = '$name', email = '$email', pname = '$pname',  class = '$class', section = '$section' WHERE id = $id";
        $result = $connection->query($sql);
            header("location: home.php");
            exit;
}
?>
<html lang="en">
<head>
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"],
        a {
            display: inline-block;
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="container"> <h2>edit Student</h2>
        <form method="post"> 
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="name"> <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="email">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="pname">
                <label for="pname">Parent's Name</label>
                <input type="text" id="pname" name="pname" value="<?php echo $pname; ?>">
            </div>
            <div class="class">
                <label for="class">Class</label>
                <input type="text" id="class" name="class" value="<?php echo $class; ?>">
            </div>
            <div class="section">
                <label for="section">Section</label>
                <input type="text" id="section" name="section" value="<?php echo $section; ?>">
            </div>
            <button type="submit">Submit</button>
            <a href="Home.php">Cancel</a>
        </form>
</body>
</html>