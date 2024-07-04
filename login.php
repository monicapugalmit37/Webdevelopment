<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url("fd.jpg");
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        h1 {
            background-color: red;
        }

        h3 {
            color: #6600cc;
        }

        div {
            width: 300px;
            border: 15px groove #4dff4d;
            margin: 100px auto;
            padding: 50px;
        }
    </style>
</head>
<body>
<h1><center>SIGN UP PAGE</center></h1><br>
<center>
    <div>
        <form method="POST">
            Name: <input type="text" name="name" required><br><br>
            Email Address: <input type="email" name="emailid" required><br><br>
            Phone Number: <input type="text" name="phno" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            Date of Birth: <input type="date" name="dob" required><br><br>
            <input type="submit" value="Signup">
        </form>
    </div>
</center>

<?php
error_reporting(E_ERROR | E_PARSE);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST['name'];
    $em = $_POST['emailid'];
    $ph = $_POST['phno'];
    $p = $_POST['password'];
    $db = $_POST['dob'];

    // Connect to MySQL
    $link = @mysqli_connect("localhost", "root", "", "project");

    // Check connection
    if (!$link) {
        die("Error: Could not connect to the database. " . mysqli_connect_error());
    }

    // Form validation
    if (!is_numeric($ph)) {
        echo "Phone Number should be an integer";
    } elseif (strlen($ph) != 10) {
        echo "Phone number should be 10 digits";
    } elseif (strlen($p) < 6 || strlen($p) > 12) {
        echo "Password should be 6 to 12 characters";
    } elseif (!preg_match("#[0-9]+#", $p) || !preg_match("#[a-zA-Z]+#", $p) || !preg_match("#\W+#", $p)) {
        echo "Password must have at least one uppercase letter, one lowercase letter, one number, and one special character";
    } else {
        // Insert data into MySQL
        $query = "INSERT INTO menus (name, email, phone, password, dob) VALUES ('$n', '$em', '$ph', '$p', '$db')";
        if (mysqli_query($link, $query)) {
            echo "<h3>ACCOUNT CREATED</h3>";
            echo "<a href='logg.php'>Go back to log in to order the delicious food</a>";
        } else {
            echo "<h3>Could not create account. Try again!</h3>" . mysqli_error($link);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>
</body>
</html>
