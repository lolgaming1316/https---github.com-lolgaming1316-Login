<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<?php
// signup.php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    $email = $_POST['email'];

    if ($password === $repeatPassword) {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $connect->prepare('INSERT INTO login (username, password, mail) VALUES (:username, :password, :mail)');
        $stmt->execute([
            'username' => $username,
            'password' => $hashPassword,
            'mail' => $email
        ]);

        echo "Account created successfully";
    } else {
        echo "Passwords do not match";
    }
}
?>


<body>
    <div class="wrapper">
        <form action="signup.php" method="post">
            <h1>Signup</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="password" name="repeatPassword" placeholder="Repeat password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <button type="submit" class="btn">Signup</button>
        </form>

    </div>
</body>

</html>