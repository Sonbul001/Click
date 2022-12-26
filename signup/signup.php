<?php
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($sql) == 1) {
        echo 'email already exists';
    } else {
        $sql = "INSERT INTO users(username, email, password,address,location,phone) VALUES ('$username','$email', '$password','$address','$location','$phone')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<p class="regsucces">Record added successfully</p>';
        } else {
            echo '<p class="errorMsg">There was error while adding record</p>';
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
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script type="text/javascript" src="signup.js"></script>
    <title>Sign up page</title>
</head>

<body>
    <header>
        <a href="../homepage/homepage.html">
            <h2 class="logo">Click</h2>
        </a>
    </header>
    <table>
        <form name="sign up form" class="signup-form" action="signup.php" method="post">
            <tr>
                <td>
                    <strong><span class="welcome">Welcome to<span class="market"> click</span></span></strong>
                    <div class="required">
                        <label> Fields with * are <i>required</i></label>
                    </div>

                    <div>
                        <label><input type="text" name="username" placeholder="Username"><span
                                class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="password" placeholder="Password" name="password" id="id_password"><span
                                class="astrisk">*</span></label>
                        <i class="far fa-eye" id="togglePassword" style="cursor: pointer;" onclick="showpass()"></i>
                    </div>
                    <br>
                    <div>
                        <label><input type="text" placeholder="Email" name="email" required><span
                                class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="text" placeholder="Address" name="address" required><span
                                class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="text" placeholder="Location" name="location"></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="tel" placeholder="Phone" name="phone" required><span
                                class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div><a class="references" href="marketsignup.html">Are you a market?</a>
                        <div>
                            <div><a class="references" href="../login/login.html">Login ?</a>
                                <div></div>
                            </div>
                            <div class="create-acc-btn"><button type="submit">create acount</button></div>
                </td>
                <td>
                    <div>
                        <input type="file" accept="image/*" id="img" alt="can't upload image" style="display: none;"
                            onchange="previewImage(event)">
                    </div>
                    <label for="img"><img src="profilepic.jpg" alt="choose your profile pic here" id="picId"></label>
                    <br>
                    <label>add a profile picture above</label>
                    <br>
                </td>

            </tr>
    </table>
    </form>
</body>

</html>