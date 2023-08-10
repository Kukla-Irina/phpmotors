--Insert Tony Stark
INSERT INTO clients
(clientFirstname, clientLastname, clientEmail, clientPassword, comment)
VALUES
("Tony", "Stark", "tony@starkent.com", "Iam1ronM@n", "I am the real Ironman");

--Update Tony Stark from level 1 to level 3
Update clients SET clientLevel = '3' WHERE clientFirstname = 'Tony';

--Update the GM Hummer description
UPDATE inventory SET invDescription = REPLACE(invDescription, 'small interior', 'spacious interior');

--Find the SUV
SELECT carclassification.classificationId, carclassification.classificationName, inventory.invMake, inventory.invModel FROM inventory INNER JOIN carclassification ON inventory.classificationId = carclassification.classificationId WHERE carclassification.classificationName = 'SUV';

--Delete the Jeep
DELETE FROM inventory WHERE invId = 1;

--Update Images and Thumbnails
UPDATE inventory SET invImage = CONCAT('/phpmotors', invImage), invThumbnail = CONCAT('/phpmotors', invThumbnail);