<?php
session_start();

$username = "admin";
$password = "123";


if (isset($_GET['logout'])) {
    session_destroy();
    header('Location:exception.php');
    exit();
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            throw new Exception("Username dan password tidak boleh kosong.");
        }

        $user = trim($_POST["username"]);
        $pass = trim($_POST["password"]);

     
        if ($user === $username && $pass === $password) {
            $_SESSION["login"] = true;
            $_SESSION["user"] = $user;
        } else {
            throw new Exception("Username atau password salah.");
        }
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with Exception Handling</title>
</head>
<body>
    <?php if (!isset($_SESSION["login"])): ?>
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    <?php else: ?>
        <h2>Halo <?php echo $_SESSION['user']; ?>!</h2>
        <p>Selamat datang di halaman dashboard</p>
        <a href="?logout=true">Logout</a>
    <?php endif; ?>
</body>
</html>
