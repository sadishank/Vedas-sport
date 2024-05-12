<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            /* Adjust width as needed */
            margin: 50px auto;
            /* Center the table */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .delete-btn {
            background-color: #ff4d4d;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>

<body>
    <h1>User List</h1>
    <?php
    $get = "SELECT * FROM `register`";
    $result = mysqli_query($con, $get);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
        echo "<h3>No users Registered yet</h3>";
    } else {
        echo "<table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>";
        $number = 0;
        while ($row_data = mysqli_fetch_assoc($result)) {
            $user_id = $row_data['user_id'];
            $firstname = $row_data['firstname'];
            $lastname = $row_data['lastname'];
            $email = $row_data['email'];
            $number++;
            echo "<tr>
                    <td>$number</td>
                    <td>$firstname</td>
                    <td>$lastname</td>
                    <td>$email</td>
                    <td><a href='delete_users.php?id=<?php echo $user_id ?>' class='delete-btn'>Delete</a></td>

                  </tr>";
        }
        echo "</tbody></table>";
    }
    ?>
</body>

</html>