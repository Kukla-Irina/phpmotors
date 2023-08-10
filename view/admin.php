<?php 
if (!$_SESSION['loggedin']){
    header('Location: /phpmotors/index.php/');
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Share+Tech&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "/phpmotors/css/normalize.css">
    <link rel = "stylesheet" media="screen" href = "/phpmotors/css/main.css">
    <link rel = "stylesheet" media="screen" href = "/phpmotors/css/large.css">
</head>
<body>
    <div class = "main">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main>
        <h1><?php echo $_SESSION['clientData']['clientFirstname'].' '.$_SESSION['clientData']['clientLastname']; ?></h1>
            <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
            ?>
            <p>You are logged in.</p>
            <ul>
                <li><?php echo "First Name: ".$_SESSION['clientData']['clientFirstname']; ?></li>
                <li><?php echo "Last Name: ".$_SESSION['clientData']['clientLastname'] ?></li>
                <li><?php echo "Email: ".$_SESSION['clientData']['clientEmail']; ?></li>
            </ul>
            <h2>Account Management</h2>
            <p>Use this link to update account information</p>
            <p><a href = "/phpmotors/accounts/index.php/?action=updateInfo">Update Account Information</a></p>
            <?php
            if (intval($_SESSION['clientData']['clientLevel']) > 1){
                echo "<h2>Inventory Management</h2>";
                echo "<p>Use this link to manage the inventory</p>";
                echo "<p><a href = '/phpmotors/vehicles/'>Vehicle Management</a></p>";
            }
            ?>
            <h2>Your Reviews</h2>
            <?php echo $reviewHTML; ?>
        </main>
        <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>
</html><?php unset($_SESSION['message']); 
?>