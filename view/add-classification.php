<?php 
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2){
    header('Location: /phpmotors/index.php/');
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car Classification</title>
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
            <h1>Add Car Classification</h1>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <form action="/phpmotors/vehicles/index.php" method="POST">
                <label>Classification Name</label>
                <span id = "pass-label">Classification Name has to have no more than 30 characters</span><br>
                <input type="text" name="newClassification" id="newClassification" <?php if(isset($newClassification)){echo "value='$newClassification'";}  ?> required pattern="[A-Za-z]{1,30}">
                <input type="submit" name="submit" id="button" value="Add Class">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addClass">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>