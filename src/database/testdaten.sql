##################
#TESTDATEN
################


###ADRESS
INSERT INTO `address`(`id`, `createdAt`, `updatetAt`, `zipCode`, `city`, `street`, `strNo`, `strAdd`) VALUES (NULL,NULL,NULL,'99045','Erfurt','Teststr.','5','a');
INSERT INTO `address`(`id`, `createdAt`, `updatetAt`, `zipCode`, `city`, `street`, `strNo`, `strAdd`) VALUES (NULL,NULL,NULL,'12384','Wunderland','Warmstr.','24',null);
INSERT INTO `address`(`id`, `createdAt`, `updatetAt`, `zipCode`, `city`, `street`, `strNo`, `strAdd`) VALUES (NULL,NULL,NULL,'12612','Elisendorf','Burgstr.','44',null);
INSERT INTO `address`(`id`, `createdAt`, `updatetAt`, `zipCode`, `city`, `street`, `strNo`, `strAdd`) VALUES (NULL,NULL,NULL,'99540','Testcity','Teststr.','12','b');
###SORT
INSERT INTO `sort`(`id`, `createdAt`, `updatetAt`, `sortName`) VALUES (NULL,NULL,NULL,'Hartkäse');
INSERT INTO `sort`(`id`, `createdAt`, `updatetAt`, `sortName`) VALUES (NULL,NULL,NULL,'Sauermilchkäse');
INSERT INTO `sort`(`id`, `createdAt`, `updatetAt`, `sortName`) VALUES (NULL,NULL,NULL,'Weichkäse');
INSERT INTO `sort`(`id`, `createdAt`, `updatetAt`, `sortName`) VALUES (NULL,NULL,NULL,'Schnittkäse');
INSERT INTO `sort`(`id`, `createdAt`, `updatetAt`, `sortName`) VALUES (NULL,NULL,NULL,'Frischkäse');
INSERT INTO `sort`(`id`, `createdAt`, `updatetAt`, `sortName`) VALUES (NULL,NULL,NULL,'Filata-Käse');
###PRICE
INSERT INTO `price`(`id`, `createdAt`, `updatetAt`, `pricePerUnit`) VALUES (NULL,NULL,NULL,2.99);
INSERT INTO `price`(`id`, `createdAt`, `updatetAt`, `pricePerUnit`) VALUES (NULL,NULL,NULL,5.99);
INSERT INTO `price`(`id`, `createdAt`, `updatetAt`, `pricePerUnit`) VALUES (NULL,NULL,NULL,7.99);
INSERT INTO `price`(`id`, `createdAt`, `updatetAt`, `pricePerUnit`) VALUES (NULL,NULL,NULL,18.99);
INSERT INTO `price`(`id`, `createdAt`, `updatetAt`, `pricePerUnit`) VALUES (NULL,NULL,NULL,23.99);
###ACCOUNT
INSERT INTO `account`(`id`, `createdAt`, `updatetAt`, `email`, `firstName`, `lastName`, `address_id`, `isAdmin`, `passwordHash`) VALUES (NULL,NULL,NULL,'admin@testmail.de','firstAdmin','lastAdmin',1,1,'25d55ad283aa400af464c76d713c07ad');
##das passwort ist ultrasicher: 12345678
###CHEESE
INSERT INTO `cheese`(`id`, `createdAt`, `updatetAt`, `cheeseName`, `sort_id`, `price_id`, `qtyInStock`, `descrip`, `recipe`, `taste`, `lactose`, `milkType`, `rawMilk`, `pictureName`) VALUES (NULL,NULL,NULL,'Gouda',4,1,133,'Der goto der Käsesorten.','Schneiden und aufs Brot legen.','M',0,'K',0,'Gouda.jpg');
INSERT INTO `cheese`(`id`, `createdAt`, `updatetAt`, `cheeseName`, `sort_id`, `price_id`, `qtyInStock`, `descrip`, `recipe`, `taste`, `lactose`, `milkType`, `rawMilk`, `pictureName`) VALUES (NULL,NULL,NULL,'Parmesan',1,2,44,'Ein reibbarer Käse .','Am besten für Pasta geeignet.','M',0,'K',0,'parmesan.jpg');
INSERT INTO `cheese`(`id`, `createdAt`, `updatetAt`, `cheeseName`, `sort_id`, `price_id`, `qtyInStock`, `descrip`, `recipe`, `taste`, `lactose`, `milkType`, `rawMilk`, `pictureName`) VALUES (NULL,NULL,NULL,'Pecorino',1,4,23,'Ein traditionell italienischer Käse, welcher aus Schafsmilch hergestellt wird.','essen','M',0,'S',1,'pecorino.jpg');
