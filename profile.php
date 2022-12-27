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
    <?php
session_start();
require_once("../db.php");
$pk = $_SESSION['email'];
$selectresult=$conn->query("SELECT * FROM users WHERE email='passantoca@hotmail.com'");
if(!$selectresult)
{
    echo("$conn->error");
}
$row=$selectresult->fetch_assoc();
$_SESSION['email'] = $row['email'];
$_SESSION['username'] = $row['username'];
$_SESSION['pwd'] = $row['password'];
$_SESSION['address'] = $row['address'];
$_SESSION['phone'] = $row['phone'];
$_SESSION['location'] = $row['location'];
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password=$_POST["pwd"];
    $address=$_POST["address"];
    $phone = $_POST["phone"];
    $location=$_POST["location"];
    //$image = $_FILES["img"];
    $sql = "UPDATE users" .
        "SET email = '$email',username = '$name'," .
        "password='$password',address=$address,phone='$phone',location='$location'" .
        "WHERE email='passantoca@gmail.com'";
    $result = $conn->query($sql);
    
    if(!$result)
    {
        echo ("$conn->error");
    }
    else{
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $name;
        $_SESSION['pwd'] = $password;
        $_SESSION['address'] = $address;
        $_SESSION['phone'] = $phone;
        $_SESSION['location'] = $location;
    }
   // elseif($result)
}
//header("location: ../profile/profile.php");
?>
</head>

<body>
    <header>
        <a href="../homepage/homepage.html">
            <h1 class="logo">Click</h1>
        </a>
        <div class="right">
            <a href="favorite.html">Favorite Products</a>
            <a href="markets.html">Liked Markets</a>
            <a href="purchased.html">Purchased Products</a>
            <a href="inprogress.html">In Progress Products</a>
            <a href="cart.html"><i class="fa fa-shopping-cart" style="font-size: 25px;"></i></a>
            <a href="profile.html"><img src="https://i.pinimg.com/600x315/7f/39/f0/7f39f0ad4dd6b777ab72bc7dc3b91958.jpg"
             alt="profile-pic" class="header-profile-pic"></a>
        </div>
    </header>

    <form action="profile.php" id="personal_info" method="post">
        <div class="left">
            <img src="https://i.pinimg.com/600x315/7f/39/f0/7f39f0ad4dd6b777ab72bc7dc3b91958.jpg" alt="profile-pic"
                class="profile-pic">
            <h1>Karim Sonbul</h1>
        </div>
        <div><label for="name">Name: </label><input type="text" name="name" id="name" disabled required
        value = <?php echo $_SESSION['username']?> ></div>
        <div><label for="img">Image: </label><input type="file" name="img" id="img" accept="image/*" disabled required>
        </div>
        <div><label for="email">Email: </label><input type="text" name="email" id="email" 
        value=<?php echo $_SESSION['email']?> disabled required></div>
        <div><label for="pwd">Password: </label><input type="password" name="pwd" id="pwd"
        value=<?php echo $_SESSION['password']?> disabled required> <i
                class="far fa-eye" onclick="showpass()" id="show-btn"></i></div>
        <div><label for="address">Address: </label><input type="text" name="address" id="address" 
        value=<?php echo $_SESSION['address']?> disabled required>
        </div>
        <div><label for="phone">Phone: </label><input type="text" name="phone" id="phone" 
        value=<?php echo $_SESSION['phone']?> disabled required></div>
        <div><label for="location">Location: </label><input type="text" name="location" id="location" 
        value=<?php echo $_SESSION['location']?> disabled></div>
        <div id="edit-btn"><button type="button" onclick="allowEdit()">Edit</button></div>
    </form>
</body>

</html>