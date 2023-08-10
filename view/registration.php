<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
        <div class="accountform">
            <h1>Registration</h1>
            <?php
            if (isset($message)) {
            echo $message;
            }
            ?>
            <form action="/phpmotors/accounts/index.php" method="post">
                <label for="clientFirstname">First Name</label>
                <input name="clientFirstname" id="clientFirstname" type="text" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required>
                <label for="clientLastname">Last Name</label>
                <input name="clientLastname" id="clientLastname" type="text" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> required>
                <label for="clientEmail">Email</label>
                <input name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
                <label for="clientPassword">Password</label>
                <span id = "pass-label">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
                <input name="clientPassword" id="clientPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <input type="submit" name="submit" id="button" value="Register">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="register">
            </form>
            </div>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>