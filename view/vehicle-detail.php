<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$vehicle[invMake] $vehicle[invModel]"; ?> | PHP Motors, Inc.</title>
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
        <h1><?php echo "$vehicle[invMake] $vehicle[invModel]"; ?></h1>
            <?php if(isset($message)){
                    echo $message; }
            ?>
            <?php if(isset($vehicleHTML)){
                    echo $vehicleHTML; } 
            ?>
            <h2>Customer Reviews</h2>
            <?php 
                if (!$_SESSION['loggedin']){
                    echo '<p>You can <a href = "/phpmotors/accounts/index.php?action=login">login</a> to create a review.</p>';
                }
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
            ?>
            <form action="/phpmotors/reviews/index.php" method="POST" <?php if (!$_SESSION['loggedin']){echo "hidden";} ?>>
                <label for="clientname">Name</label>
                <input name="clientname" id="clientname" type="text" <?php echo 'value="'.substr($_SESSION['clientData']['clientFirstname'], 0, 1).". ".$_SESSION['clientData']['clientLastname'].'"'; ?> readonly>
                <label for="review">Review</label>
                <textarea id="review" name="newReview" rows="4" cols="50" required></textarea>
                <input type="submit" name="submit" id="button" value="Add Review">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addReview">
                <input type="hidden" name="userId" <?php echo 'value="'.$_SESSION['clientData']['clientId'].'"' ?>>
                <input type="hidden" name="carId" <?php echo 'value="'.$invId.'"' ?>>
            </form>
            <?php 
                // Put the reviews on the page.
                if (isset($reviewHTML)){
                    echo $reviewHTML;
                }
            ?>
        </main>
        <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html><?php unset($_SESSION['message']); 
?>