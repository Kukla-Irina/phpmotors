<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account Information</title>
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
        <h1>Update Account Information</h1>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <h2>Update Account Info</h2>
            <form action="/phpmotors/accounts/index.php" method="POST">
                <label for="clientFirstname">First Name</label>
                <input type="text" name="clientFirstname" id="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} elseif(isset($_SESSION['clientData']['clientFirstname'])){echo "value='".$_SESSION['clientData']['clientFirstname']."'";} ?> required>
                <label for="clientLastname">Last Name</label>
                <input type="text" name="clientLastname" id="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} elseif(isset($_SESSION['clientData']['clientLastname'])){echo "value='".$_SESSION['clientData']['clientLastname']."'";} ?> required>
                <label for="clientEmail">Email</label>
                <input type="email" name="clientEmail" id="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} elseif(isset($_SESSION['clientData']['clientEmail'])){echo "value='".$_SESSION['clientData']['clientEmail']."'";} ?> required>
                <input type="submit" name="submit" id="button" value="Update Information">
                <input type="hidden" name="action" value="updatePersonal">
                <input type="hidden" name="clientId" <?php if(isset($_SESSION['clientData']['clientId'])){echo "value='".$_SESSION['clientData']['clientId']."'";} ?>>
            </form>
            <h2>Update Password</h2>
            <p>
                Passwords must be at least 8 characters and contain at least 1
                number, 1 capital letter, and 1 special character.
            </p>
            <form action="/phpmotors/accounts/index.php" method="POST">
                <label for="clientPassword">New Password</label>
                <input name="clientPassword" id="clientPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <input type="submit" name="submit" id="button2" value="Update Password">
                <input type="hidden" name="action" value="updatePassword">
                <input type="hidden" name="clientId" <?php if(isset($_SESSION['clientData']['clientId'])){echo "value='".$_SESSION['clientData']['clientId']."'";} ?>>
            </form>
        </main>
        <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>
<?php 
session_start();
?>