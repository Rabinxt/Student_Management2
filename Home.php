<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .section {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;

            
        }

        h2, h3, h5 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="section">
        <h2>Student Management System</h2>
        <h3>NIST , Lainchour</h3>
        <h5>List of students</h5>
        <a href="add.php">Add Student</a>
        <table>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Parent Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
            <tbody>
                <?php
                require_once "connection.php";
                $sql = "SELECT *, ROW_NUMBER() OVER () AS sn FROM Student";
                $result = $connection->query($sql);
    
                if (!$result) {
                    die("Invalid: " . $connection->error);
                }
    
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['sn']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['pname']}</td>
                        <td>{$row['class']}</td>
                        <td>{$row['section']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a>
                            <a href='deleteimf.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
    
                $connection->close();
                ?>  
            </tbody>
        </table>
    </div>
</body>
</html>
