<?php

//Accounts controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the review model
require_once '../model/reviews-model.php';

// Get the array of classifications
$classifications = getClassifications();
//var_dump($classifications);
//	exit;

// Build a navigation bar using the $classifications array
$navList = navbar($classifications);

//echo $navList;
//exit;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

    case 'login':
        include '../view/login.php';
        break;

    case 'registration':
        include '../view/registration.php';
        break;
    case 'register':
        //Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        //Validate email
        $clientEmail = checkEmail($clientEmail);

        // Validate the password
        $checkPassword = checkPassword($clientPassword);

        // Check for existing email 
        $existingEmail = checkExistingEmail($clientEmail);

        // Deal with existing email during registration
        if ($existingEmail) {
            $message = '<p  class="notification">The email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }


        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = '<p class="notification">Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "<p class='notification'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            header('Location: /phpmotors/accounts/?action=login');
            exit;
        } else {
            $message = "<p class='notification'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }
        break;

    case 'updateInfo':
        include '../view/client-update.php';
        break;

    case 'updatePersonal':
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $clientEmail = checkEmail($clientEmail);
        $existingEmail = checkUpdatingEmail($clientEmail, $clientId);
        if ($existingEmail) {
            $message = "<p class='notification'>Email already exist, please try a different one.</p>";
            include '../view/client-update.php';
            exit;
        } else
            if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
                $message = '<p class="notification">Please provide information for all empty form fields.</p>';
                include '../view/client-update.php';
                exit;
            }
        $resultPersonal = updatePersonal($clientFirstname, $clientLastname, $clientEmail, $clientId);

        $clientData = getClientId($clientId);
        array_pop($clientData);
        $_SESSION['clientData'] = $clientData;

        if ($resultPersonal === 1) {
            $message = "<p class='notification'>$clientFirstname, information update was successful.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $message = "<p class='notification'>Sorry, but information update failed. Please try again.</p>";
            include '../view/client-update.php';
            exit;
        }
        break;

    case 'updatePassword':
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $checkPassword = checkPassword($clientPassword);
        if (empty($checkPassword)) {
            $message = '<p class="notification">Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit;
        }
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        $resultPassword = updateNewPassword($hashedPassword, $clientId);
        if ($resultPassword === 1) {
            $message = "<p class='notification'>Password update was successful.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $message = "<p class='notification'>Sorry, but password update failed. Please try again.</p>";
            include '../accounts/client-update.php';
            exit;
        }
        break;

    case 'Login':

        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        // Validate the email
        $clientEmail = checkEmail($clientEmail);

        // Validate the password
        $checkPassword = checkPassword($clientPassword);

        // Check for missing data
        if (empty($clientEmail) || empty($checkPassword)) {
            $message = '<p class="notification">Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notification">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;

         // The list of reviews for the client.
         $reviewList = getClientReviews($_SESSION['clientData']['clientId']);
         $reviewHTML = '<ul>';
         foreach($reviewList as $review){
             $reviewHTML .= buildReviewItem($review['reviewDate'], $review['reviewId']);
         }
         $reviewHTML .= '</ul>';

        // Send them to the admin view
        include '../view/admin.php';
        exit;
        break;

    case 'Logout':
        session_destroy();
        header('Location: /phpmotors/accounts/?action=login');
        break;

    default:

     // The list of reviews for the client.
     $reviewList = getClientReviews($_SESSION['clientData']['clientId']);
     $reviewHTML = '<ul>';
     foreach($reviewList as $review){
         $reviewHTML .= buildReviewItem($review['reviewDate'], $review['reviewId']);
     }
     $reviewHTML .= '</ul>';
        include '../view/admin.php';
        break;
}

?>