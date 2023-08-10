<?php
// The Vehicles Controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model
require_once '../model/vehicles-model.php';
// Get the account model.
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the uploads model
require_once '../model/uploads-model.php';
// Get the review model
require_once '../model/reviews-model.php';

// Get the array of classifications
$classifications = getClassifications();
//var_dump($classifications);
//	exit;

// Build a navigation bar using the $classifications array
$navList = navBar($classifications);

//Build the select list
// $classificationList = '<select name="classificationId">';
// foreach ($classifications as $classification) {
//     $classificationList .="<option value='$classification[classificationId]'>$classification[classificationName]</option>";
// }
// $classificationList .= '</select>';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

    case 'classifcation':
        include "../view/add-classification.php";
        break;

    case 'vehicle':
        include "../view/add-vehicle.php";
        break;

    case 'addVehicle':
        // Filter the input
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
        $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        // Check for missing data
        if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
            $message = '<p class="notification">Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit;
        }

        // Add Data to database
        $AddVehicleOutcome = newVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
        // Check and report the result
        if ($AddVehicleOutcome === 1) {
            $message = '<p class="notification">Vehical registration was successful.</p>';
            include '../view/vehicle-management.php';
            exit;
        } else {
            $message = '<p class="notification">Sorry, but the registration failed. Please try again.</p>';
            include '../view/add-vehicle.php';
            exit;
        }
        break;

    case 'addClass':
        // Filter the input
        $newClass = filter_input(INPUT_POST, 'newClassification');

        // Check for missing data
        if (empty($newClass)) {
            $message = '<p class="notification">Please provide information for all empty form fields.</p>';
            include '../view/add-classification.php';
            exit;
        }

        // Add Data to database
        $AddClassOutcome = newClassification($newClass);
        // Check and report the result
        if ($AddClassOutcome === 1) {
            $message = '<p class="notification">Classification registration was a success.</p>';
            include '../view/vehicle-management.php';
            exit;
        } else {
            $message = '<p class="notification">Sorry, add classification failed. Please try again.</p>';
            include '../view/add-classification.php';
            exit;
        }
        break;

    /* * ********************************** 
     * Get vehicles by classificationId 
     * Used for starting Update & Delete process 
     * ************************************/
    case 'getInventoryItems':
        // Get the classificationId 
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        // Fetch the vehicles by classificationId from the DB 
        $inventoryArray = getInventoryByClassification($classificationId);
        // Convert the array to a JSON object and send it back 
        echo json_encode($inventoryArray);
        break;

    case 'mod':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = '<p class="notification">Sorry, no vehicle information could be found.</p>';
        }
        include '../view/vehicle-update.php';
        exit;
        break;

    case 'del':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = '<p class="notification">Sorry, no vehicle information could be found.</p>';
        }
        include '../view/vehicle-delete.php';
        exit;
        break;

    case 'updateVehicle':
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        if (
            empty($classificationId) || empty($invMake) || empty($invModel)
            || empty($invDescription) || empty($invImage) || empty($invThumbnail)
            || empty($invPrice) || empty($invStock) || empty($invColor)
        ) {
            $message = '<p class="notification">Please complete all information for the item! Double check the classification of the item.</p>';
            include '../view/vehicle-update.php';
            exit;
        }

        $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
        if ($updateResult) {
            $message = "<p class='notification'>Congratulations, the $invMake $invModel was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "<p class='notification'>Error. the $invMake $invModel was not updated.</p>";
            include '../view/vehicle-update.php';
            exit;
        }
        break;

    case 'deleteVehicle':
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        $deleteResult = deleteVehicle($invId);
        if ($deleteResult) {
            $message = "<p class='notification'>Congratulations the, $invMake $invModel was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "<p class='notification'>Error: $invMake $invModel was not deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        }
        break;

    case 'classification':
        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $vehicles = getVehiclesByClassification($classificationName);
        if (!count($vehicles)) {
            $message = "<p class='notification'>Sorry, no $classificationName could be found.</p>";
        } else {
            $vehicleDisplay = buildVehiclesDisplay($vehicles);
        }
        include '../view/classification.php';
        break;


    case 'vehicleView':
        $invId = filter_input(INPUT_GET, 'Vehicle', FILTER_SANITIZE_NUMBER_INT);
        $vehicle = getInvItemInfo($invId);

        $thumbnailsPath = getThumbnails($vehicle);

        // Get the vehicle reviews.
        $reviewList = getInventoryReviews($invId);

        // Build the html for the review list.
        $reviewHTML = '<div class = "reviewstable">';
        foreach($reviewList as $review){
            $reviewHTML .= buildReview($review['clientFirstname'], $review['clientLastname'], $review['reviewDate'], $review['reviewText']);
        }
        $reviewHTML .= "</div>";

        if (empty($vehicle)) {
            $message = "<p class='notification'>Sorry, no information could be found.</p>";
        } else {
            $vehicleHTML = buildVehiclesHTML($vehicle);
        }
        include '../view/vehicle-detail.php';
        break;


    default:
        $classificationList = buildClassificationList($classifications);
        include "../view/vehicle-management.php";
        break;
}
?>