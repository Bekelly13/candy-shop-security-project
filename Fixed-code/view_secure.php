<?php

$filename = isset($_GET['file']) ? $_GET['file'] : "";

echo "<h1>View Server File</h1>";

echo "<p>File: " . htmlspecialchars($filename) . "</p>";

if ($filename) {

    /*
    SECURITY PATCH: Directory Traversal / Insecure File Access

    Before fix:
    $content = file_get_contents($filename);

    Problem:
    User input was used directly as a file path, allowing attackers to access
    arbitrary files on the server.

    Example attack:
    view.php?file=../../etc/passwd

    Fix:
    1. Restrict file access to a specific allowed directory.
    2. Use basename() to strip directory traversal attempts.
    3. Build a safe full path before reading the file.
    */

    $baseDir = "/var/www/html/devfiles/";   // allowed directory

    $cleanName = basename($filename);       // remove traversal attempts

    $fullPath = $baseDir . $cleanName;      // build safe path

    if (file_exists($fullPath)) {

        $content = file_get_contents($fullPath);

        echo "<pre>$content</pre>";

    } else {

        echo "<p>Invalid file.</p>";

    }

} else {

    echo "<p>No file selected.</p>";

}

?>

<p><a href="index_secure.php">Back to Candy Store</a></p>
