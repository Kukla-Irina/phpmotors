<picture>
    <img src="/phpmotors/images/site/logo.png" alt="logotype">
</picture>
<div class="account">
<?php 
if ($_SESSION['loggedin']){
    echo "<a href = '/phpmotors/accounts/index.php?action=Logout' class = 'accountlink'>Log Out</a><br>";
} else {
    echo "<a href = '/phpmotors/accounts/index.php?action=login' class = 'accountlink'>My Account</a>";
}
?>

<?php
if($_SESSION['loggedin']){
    echo "<a href = '/phpmotors/accounts/index.php/?action=none' class = 'accountlink'>Welcome ".$_SESSION['clientData']['clientFirstname']."</a>";
} ?>
</div>