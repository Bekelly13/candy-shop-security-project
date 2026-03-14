<!DOCTYPE html>
<html>
<head>
<title>Candy Store</title>
</head>

<body style="background-color: #ffe4e1;">

<h1>Welcome to the Candy Store</h1>

<p><a href="login_secure.php">Staff login</a></p>

<p>Browse our collection!</p>

<ul>
<li>Chocolate Bars - $2.50</li>
<li>Gummy Bears - $1.99</li>
<li>Sour Worms - $2.25</li>
<li>Candy Canes - $0.99</li>
</ul>

<hr>

<p><a href="view_secure.php?file=index_secure.php">Developer file viewer</a></p>

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
SECURITY PATCH: Cross-Site Scripting (XSS)

Before fix:
echo $_GET['review'];

Problem:
User input was printed directly to the page without sanitization,
allowing attackers to inject JavaScript.

Example attack:
<script>alert("XSS Attack")</script>

Fix:
Use htmlspecialchars() to encode special characters before output.
*/

if (isset($_GET['review'])) {

    $safe_review = htmlspecialchars($_GET['review'], ENT_QUOTES, 'UTF-8');

    echo $safe_review;

} else {

    echo "No reviews yet!";

}

?>

</p>

</body>
</html>
