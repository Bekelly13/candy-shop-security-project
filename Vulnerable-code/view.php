<?php

$filename = isset($_GET['file']) ? $_GET['file'] : "";

echo "<h1>View Server File</h1>";

echo "<p>File: " . htmlspecialchars($filename) . "</p>";

if ($filename) {

    /*
    VULNERABILITY: Insecure File Access / Directory Traversal

    The application directly uses user input as a file path without validating
    or restricting it to a safe directory.

    Because the filename comes directly from the URL parameter:

        view.php?file=somefile

    An attacker could request sensitive files such as:

        view.php?file=../../etc/passwd
        view.php?file=../config.php

    This allows attackers to read arbitrary files from the server.
    */

    // Vulnerable line: user input used directly as file path
    $content = @file_get_contents($filename);

    if ($content !== false) {
        echo "<pre>$content</pre>";
    } else {
        echo "<p>Could not open file.</p>";
    }

} else {

    echo "<p>No file selected.</p>";

}

?>

<p><a href="index.php">Back to Candy Store</a></p>
