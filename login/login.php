<?php
require_once("../db.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $sql = "SELECT * FROM markets WHERE email='$email' and password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0)
            echo "<p>Wrong credentials please try again</p>";
        else {
            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['username'] = $row["username"];$_SESSION['username'];
                $_SESSION['email'] = $row["email"];
                $_SESSION['password'] = $row["password"];
                $_SESSION['address'] = $row["address"];
                $_SESSION['location'] = $row["location"];
                $_SESSION['phone'] = $row["phone"];
                $_SESSION['image'] = $row["image"];
                header('Location:../marketprofile/marketprofile.php');
            }
        }
    }
    else{
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['username'] = $row["username"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['password'] = $row["password"];
            $_SESSION['address'] = $row["address"];
            $_SESSION['location'] = $row["location"];
            $_SESSION['phone'] = $row["phone"];
            $_SESSION['image'] = $row["image"];
            $n = $_SESSION['username'];
            header('Location:../homepage/homepage.php');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script type="text/javascript" src="login.js"></script>
    <title>Login page</title>
</head>

<body>
    <header>
        <a href="../homepage/homepage.php">
            <h2 class="logo">Click</h2>
        </a>
    </header>
    <table>
        <form name="login form" class="login-form" action="login.php" method="post">
            <tr>
                <td>
                    <div class="required">
                        <label> Fields with * are <i>required</i></label>
                    </div>

                    <div>
                        <label><input type="text" name="email" placeholder="Email" required><span
                                class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="password" placeholder="Password" name="password" id="id_password"
                                required><span class="astrisk">*</span></label>
                        <i class="far fa-eye" id="togglePassword" style="cursor: pointer;" onclick="showpass()"></i>
                    </div>
                    <br>
                    <div class="create-acc-btn"><button type="submit">Sign In</button></div>
                    <div><a class="references" href="../signup/signup.php">Sign Up As User</a></div>
                    <div><a class="references" href="../signup/marketsignup.php">Sign Up As Market</a></div>
                </td>
            </tr>
        </form>
    </table>
</body>

</html>