<?php
 
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2){
    header('Location: /phpmotors/index.php/');
}

// Build the classifications option list
$classificationList = '<select name="classificationId" id="classificationId">';
$classificationList .= "<option>Choose a Car Classification</option>";
foreach ($classifications as $classification) {
 $classificationList .= "<option value='$classification[classificationId]'";
 if(isset($classificationId)){
  if($classification['classificationId'] === $classificationId){
   $classificationList .= ' selected ';
  }
 } elseif(isset($invInfo['classificationId'])){
 if($classification['classificationId'] === $invInfo['classificationId']){
  $classificationList .= ' selected ';
 }
}
$classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';

?><!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
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
        <h1><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>
            <p>Confirm Vehicle Deletion. The delete is permanent.</p>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <form action="/phpmotors/vehicles/index.php" class="addVehicle" method="post">
                <label for="invMake">Make</label>
	            <input type="text" readonly name="invMake" id="invMake" <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>
                <label for="invModel">Model</label>
	            <input type="text" readonly name="invModel" id="invModel" <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
                <label for="invDescription">Description</label>
	            <textarea name="invDescription" rows="10" cols="30" readonly id="invDescription"><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea>
                <input type="submit" name="submit" id="button" value="Delete Vehicle">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="deleteVehicle">
                <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>