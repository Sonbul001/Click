<?php
require_once '../db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $image = $_POST['image'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $userid = $_POST['userid'];
    $balance = $_POST['balance'];
    $balanceno = $_POST['balanceno'];
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    if ($filename == "")
        $folder = "../image/profilepic.jpg";
    else
        $folder = "../image/" . $filename;
    $sql = mysqli_query($conn, "SELECT * FROM markets WHERE email = '$email'");

    if (mysqli_num_rows($sql) == 1) {
        echo 'market already exists';
    } else {
        $sql = "INSERT INTO markets(username, image, email, password,address,location,phone,userid,balance,balance_no) VALUES ('$username', '$folder', '$email', '$password','$address','$location','$phone','$userid','$balance','$balanceno')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            move_uploaded_file($tmpname, $folder);
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['address'] = $address;
            $_SESSION['location'] = $location;
            $_SESSION['phone'] = $phone;
            $_SESSION['image'] = $folder;
            $_SESSION['balance'] = $balance;
            header('Location:../marketprofile/marketprofile.php');
        } else {
            echo '<p class="result">There was error while adding record</p>';
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
    <title>Market sign up</title>
</head>

<body>
    <header>
        <a href="../homepage/homepage.php">
            <h2 class="logo">Click</h2>
        </a>
    </header>
    <table>
        <form name="sign up form" action="marketsignup.php" method="post" class="signup-form" enctype="multipart/form-data">
            <tr>
                <td>
                    <strong><span class="welcome">Welcome to </span><span class="market">click market</span></strong>
                    <br>
                    <div class="required">
                        <label> Fields with * are <i>required</i></label>
                    </div>
                    <div>
                        <label><input type="text" name="username" placeholder="Username" required><span class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="password" placeholder="Password" name="password" id="id_password" required><span
                                class="astrisk">*</span></label>
                        <i class="far fa-eye" id="togglePassword" style="cursor: pointer;" onclick="showpass()"></i>
                    </div>
                    <br>
                    <div>
                        <label><input type="text" placeholder="Email" name="email" required><span class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="text" placeholder="Address" name="address" required><span class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="text" placeholder="Location" name="location"></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="text" placeholder="Phone" name="phone" required><span class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="text" placeholder="User ID " name="userid" required><span class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="text" placeholder="Balance" name="balance" required><span class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <label><input type="text" placeholder="Balance number" name="balanceno" required><span
                                class="astrisk">*</span></label>
                    </div>
                    <br>
                    <div>
                        <a class="references" href="signup.php">return to consumer sign up page</a>
                    </div>
                    <div><a class="references" href="../login/login.php">Login ?</a>
                        <div></div>
                        <div class="create-acc-btn"><button type="submit">create acount</button></div>
                        <div class="references"><label>Want to add your paypal account?</label></div>
                </td>
                <td>
                    <div>
                        <input type="file" accept="image/*" id="img" name="image" alt="can't upload image" style="display: none;"
                            onchange="previewImage(event)">
                    </div>
                    <label for="img"><img src="profilepic.jpg" alt="choose your profile pic here" id="picId"></label>
                    <br>
                    <label>add a profile picture above</label>
                </td>

            </tr>
    </table>
    </form>
</body>

</html>