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
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $u = $_SESSION["username"];
    if ($filename == "")
        $folder = $_SESSION['image'];
    else
        $folder = "../image/" . $filename;
    $curr_email = $_SESSION['email'];
    $sql = "UPDATE users SET username='$username', image='$folder', email='$email', password='$password', address='$address', location='$location', phone='$phone' WHERE email='$curr_email' ";
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
    } else {
        echo '<p class="result">There was error while adding record</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">
    <script type="text/javascript" src="../marketprofile/marketprofile.js"></script>
    <title>Profile</title>
</head>

<body>
    <header>
        <a href="../homepage/homepage.php">
            <h1 class="logo">Click</h1>
        </a>
        <div class="right">
            <a href="favorite.php">Favorite Products</a>
            <a href="markets.php">Liked Markets</a>
            <a href="purchased.php">Purchased Products</a>
            <a href="inprogress.php">In Progress Products</a>
            <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size: 25px;"></i></a>
            <a href="profile.php"><img src="<?php echo $_SESSION['image'] ?>" alt="profile-pic"
                class="header-profile-pic"></a>
        </div>
    </header>

    <form action="profile.php" method="post" id="personal_info" enctype="multipart/form-data">
        <div class="left">
            <img src="<?php echo $_SESSION['image'] ?>" alt="profile-pic"
                class="profile-pic">
            <h1><?php echo $_SESSION['username'] ?></h1>
        </div>
        <div><label for="name">Name: </label><input type="text" name="name" id="name" value="<?php echo $_SESSION['username'] ?>" disabled required></div>
        <div><label for="img">Image: </label><input type="file" name="img" id="img" accept="image/*" disabled required>
        </div>
        <div><label for="email">Email: </label><input type="text" name="email" value="<?php echo $_SESSION['email'] ?>" id="email" disabled required></div>
        <div><label for="pwd">Password: </label><input type="password" name="pwd" value="<?php echo $_SESSION['password'] ?>" id="pwd" disabled required> <i
                class="far fa-eye" onclick="showpass()" id="show-btn"></i></div>
        <div><label for="address">Address: </label><input type="text" value="<?php echo $_SESSION['address'] ?>" name="address" id="address" disabled required>
        </div>
        <div><label for="phone">Phone: </label><input type="text" name="phone" value="<?php echo $_SESSION['phone'] ?>" id="phone" disabled required></div>
        <div><label for="location">Location: </label><input type="text" name="location" value="<?php echo $_SESSION['location'] ?>" id="location" disabled></div>
        <div id="edit-btn"><button type="button" onclick="allowEdit()">Edit</button></div>
    </form>
</body>

</html>