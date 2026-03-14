<!DOCTYPE html>
<html>
<head>
<title>Candy Store</title>
</head>

<body style="background-color: #ffe4e1;">

<h1>Welcome to the Candy Store</h1>

<p><a href="login.php">Staff login</a></p>

<p>Browse our collection!</p>

<ul>
<li>Chocolate Bars - $2.50</li>
<li>Gummy Bears - $1.99</li>
<li>Sour Worms - $2.25</li>
<li>Candy Canes - $0.99</li>
</ul>

<hr>

<p><a href="view.php?file=index.php">Developer file viewer</a></p>

<h2>Leave a review</h2>

<form method="GET" action="">
<label for="review">Your review:</label>
<input type="text" id="review" name="review" size="60">
<button type="submit">Submit</button>
</form>

<h3>Latest review:</h3>
<p>

<?php

/*
VULNERABILITY: Cross-Site Scripting (XSS)

User input from the "review" parameter is printed directly to the page
without any sanitization or escaping.

Because the input is echoed directly, an attacker can inject JavaScript
into the page.

Example attack:
<script>alert("XSS Attack")</script>
*/

if (isset($_GET['review'])) {

    // Vulnerable line: unsanitized user input
    echo $_GET['review'];

} else {

    echo "No reviews yet!";

}

?>

</p>

</body>
</html>
