<?php
require 'connect.php';

$checked = true;
if (isset($_POST["submit"])) {
    if (empty($_POST["email"]) || filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
        $checked = false;
        echo "Email Address is required OR the email is not validet";
    } else if (empty($_POST["fname"])) {
        $checked = false;
        echo "the fname is reqired";
    } else if (empty($_POST["gender"])) {
        $checked = false;
        echo "gender is required";
    } else {
        if ($checked == true) {
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $query = "INSERT INTO `users`  VALUES (Null,'$fname', '$email', '$gender')";
            mysqli_query($conn, $query);
        } else {
            echo "unKnown Error";
        }
    }
}
if ($checked == true) {
    echo "Insert Data Success";
    $sqls = "SELECT * FROM users";
    $result = $conn->query($sqls);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form part 3</title>
</head>

<body>
    <main>
        <form action="" method="Post">
            <!-- userfname -->
            <section>
                <label>userfname</label>
                <input type="text" id="name" placeholder="enter userfname" name="fname" required autofocus />
            </section>
            <br />
            <!-- email -->
            <section>
                <label>email</label>
                <input type="email" id="email" placeholder="enter email" name="email" required />
            </section>
            <br />
            <!-- password -->
            <!-- <section>
                <label>password</label>
                <input type="password" placeholder="enter password" name="pass" required minlength="7" maxlength="12" />
            </section> -->
            <!-- <br /> -->
            <br />
            <section>
                <input type="radio" id="Male" name="gender" required value="Male" />
                <label>Male</label>
                <input type="radio" id="Famale" name="gender" required value="Famale" />
                <label>FeMale</label>
            </section>
            <br />

            <!-- button -->
            <section>
                <input type="submit" name="submit" />
                <input type="reset" />
            </section>
        </form>
    </main>
    <section>
        <?php
        if ($result->num_rows > 0) {
            // Display student data in a table
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Full fname</th>
                    <th>Email</th>
                    <th>Gender</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["fname"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["gender"] . "</td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "No students registered.";
        }

        // Close the connection
        $conn->close();
        ?>
    </section>
</body>

</html>
