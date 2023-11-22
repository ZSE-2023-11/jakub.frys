<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Zadanko1</title>
</head>
<body>

<form method="post">

    <h2>Podaj Login oraz Hasło</h2>
    

    <label for="username" placeholder="login">Login</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password" placeholder="password">Hasło</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Zaloguj</button>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $usernameInput = $_POST["username"];
        $passwordInput = $_POST["password"];

      
        if($usernameInput === "admin" && $passwordInput === "test") {
            $message = "Zalogowano";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } 
        else {
            $message = "Złe dane logowania";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
?>

</form>
</div>

</body>
</html>