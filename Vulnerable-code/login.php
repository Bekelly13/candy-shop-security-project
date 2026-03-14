<?php

$db = new SQLite3('users.db');
$message = "";

if (isset($_POST['username']) && isset($_POST['password'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    /*
    VULNERABILITY: SQL Injection

    User input is directly inserted into the SQL query string without
    sanitization or parameterization.

    Because the username and password are concatenated directly into the query,
    an attacker can modify the logic of the query and bypass authentication.

    Example attack:

    Username: ' OR '1'='1
    Password: anything

    Resulting query becomes:

    SELECT * FROM users WHERE username = '' OR '1'='1' AND password = 'anything'

    This may cause the query to always evaluate as true, allowing login
    without valid credentials.
    */

    // Vulnerable SQL query
    $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";

    $result = $db->query($query);

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

<h2>Login</h2>

<form method="POST">
Username: <input type="text" name="username"><br><br>
Password: <input type="text" name="password"><br><br>
<button type="submit">Login</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
