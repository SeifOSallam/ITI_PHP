<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php 
        echo "<table>";
        echo "<tr>
            <th>Email</th>
            <th>Password</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Country</th>
            <th>Department</th>
            <th>Skills</th>
            <th>Gender</th>
        </tr>";
        $file_data = file("users.txt");

        foreach ($file_data as $line){
            $info = json_decode($line);
            echo "<tr>";
            foreach ($info as $item){
                if (is_array($item)) {
                    $all = "";
                    foreach($item as $mini) {
                        if (strlen($all)) {
                            $all = $all . ", " . $mini;
                        }
                        else {
                            $all = $all . $mini;
                        }
                    }
                    echo "<td> {$all} </td>";
                }
                else {
                    echo "<td> {$item} </td>";
                }
            }
            echo "</tr>";
        }
    
        echo "</table>";
    ?>
</body>
</html>