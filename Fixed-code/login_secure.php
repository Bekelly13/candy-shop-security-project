<?php

$db = new SQLite3('users.db');
$message = "";

if (isset($_POST['username']) && isset($_POST['password'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    /*
    SECURITY PATCH: SQL Injection

    Before fix:
    $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $db->query($query);

    Problem:
    User input was directly concatenated into the SQL query,
    allowing attackers to manipulate the query logic.

    Example attack:
    Username: ' OR '1'='1

    Fix:
    Use prepared statements with bound parameters so user input
    cannot modify the SQL query structure.
    */

    $stmt = $db->prepare("SELECT * FROM users WHERE username = :user AND password = :pass");

    $stmt->bindValue(':user', $user, SQLITE3_TEXT);
    $stmt->bindValue(':pass', $pass, SQLITE3_TEXT);

    $result = $stmt->execute();

    if ($result && $result->fetchArray()) {
        $message = "Login successful! Welcome, $user";
    } else {
        $message = "Login failed.";
    }
}

?>

<!DOCTYPE html>
<html>
<body>

<h1>Login</h1>

<form method="POST">
Username: <input type="text" name="username"><br><br>
Password: <input type="text" name="password"><br><br>
<button type="submit">Login</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
