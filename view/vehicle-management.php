<?php 
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2){
    header('Location: /phpmotors/index.php/');
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management</title>
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
            <h1>Vehicle Management</h1>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <p><a href = "/phpmotors/vehicles/index.php/?action=classifcation">Add a car classifcation</a></p>
            <p><a href = "/phpmotors/vehicles/index.php/?action=vehicle">Add a vehicle to inventory</a></p>
            <?php
            if (isset($classificationList)) { 
                echo '<h2>Vehicles By Classification</h2>'; 
                echo '<p>Choose a classification to see those vehicles</p>'; 
                echo $classificationList; 
            }
            ?>
            <noscript>
            <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
            </noscript>
            <table id="inventoryDisplay"></table>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
    <script src="../js/inventory.js"></script>
</body>
</html>
<?php unset($_SESSION['message']); ?>