<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            <section>
                <h1>Welcome to PHP Motors!</h1>
                <div class = "container">
                    <h2>DMC Delorean</h2>
                    <p>
                        3 Cup holders<br>
                        Superman doors<br>
                        Fuzzy dice!<br>
                    </p>
                </div>
                    <div class="container2">
                    <img src = "/phpmotors/images/vehicles/delorean.jpg" alt = "Delorean">  
                    <a href = "#" class = "button">
                        Own Today
                    </a> 
                </div>
            </section>
            <section class="section">
                <div class = "reviews">
                <h2>DMC Delorean Reviews</h2>
                <ul>
                    <li>"So fast its almost like traveling in time." (4/5)</li>
                    <li>"Coolest ride on the road." (4/5)</li>
                    <li>"I'm feeling Marty McFly!" (5/5)</li>
                    <li>"The most futuristic ride of our day." (4.5/5)</li>
                    <li>"80's livin and I love it!" (5/5)</li>
                </ul>
            </div>
                <div class = "upgrades">
                    <div class="up">
                    <h2>Delorean Upgrades</h2>
                </div>
                    <div class = "item">
                        <img src = "/phpmotors/images/upgrades/flux-cap.png" alt = "Flux Capacitor">
                        <a href = "#">Flux Capacitor</a>
                    </div>
                    <div class = "item">
                        <img src = "/phpmotors/images/upgrades/flame.jpg" alt = "Flame Decals">
                        <a href = "#">Flame Decals</a>
                    </div>
                    <div class = "item">
                        <img src = "/phpmotors/images/upgrades/bumper_sticker.jpg" alt = "Bumper Sticker">
                        <a href = "#">Bumper Sticker</a>
                    </div>
                    <div class = "item">
                        <img src = "/phpmotors/images/upgrades/hub-cap.jpg" alt = "Hub Caps">
                        <a href = "#">Hub Caps</a>
                    </div>
            </div>
            </section>
        </main>
        <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>