##################
#TESTDATEN
################


###ADRESS
INSERT INTO `address`(`id`, `createdAt`, `updatetAt`, `zipCode`, `city`, `street`, `strNo`) VALUES (NULL,NULL,NULL,'99045','Erfurt','Teststr.','5');
INSERT INTO `address`(`id`, `createdAt`, `updatetAt`, `zipCode`, `city`, `street`, `strNo`) VALUES (NULL,NULL,NULL,'12384','Wunderland','Warmstr.','24');
INSERT INTO `address`(`id`, `createdAt`, `updatetAt`, `zipCode`, `city`, `street`, `strNo`) VALUES (NULL,NULL,NULL,'12612','Elisendorf','Burgstr.','44');
INSERT INTO `address`(`id`, `createdAt`, `updatetAt`, `zipCode`, `city`, `street`, `strNo`) VALUES (NULL,NULL,NULL,'99540','Testcity','Teststr.','12');
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
INSERT INTO `cheese`(`id`, `createdAt`, `updatetAt`, `cheeseName`, `sort_id`, `price_id`, `qtyInStock`, `descrip`, `recipe`, `taste`, `lactose`, `milkType`, `rawMilk`, `pictureName`) VALUES (NULL,NULL,NULL,'Gouda',4,1,133,'Der goto der Käsesorten.','Schneiden und aufs Brot legen.','M',1,'K',2,'Gouda.jpg');
INSERT INTO `cheese`(`id`, `createdAt`, `updatetAt`, `cheeseName`, `sort_id`, `price_id`, `qtyInStock`, `descrip`, `recipe`, `taste`, `lactose`, `milkType`, `rawMilk`, `pictureName`) VALUES (NULL,NULL,NULL,'Parmesan',1,2,44,'Ein reibbarer Käse .','Am besten für Pasta geeignet.','W',2,'S',1,'parmesan.jpg');
INSERT INTO `cheese`(`id`, `createdAt`, `updatetAt`, `cheeseName`, `sort_id`, `price_id`, `qtyInStock`, `descrip`, `recipe`, `taste`, `lactose`, `milkType`, `rawMilk`, `pictureName`) VALUES (NULL,NULL,NULL,'Pecorino',1,4,23,'Ein traditionell italienischer Käse, welcher aus Schafsmilch hergestellt wird.','essen','M',1,'B',2,'pecorino.jpg');
INSERT INTO `cheese`(`id`, `createdAt`, `updatetAt`, `cheeseName`, `sort_id`, `price_id`, `qtyInStock`, `descrip`, `recipe`, `taste`, `lactose`, `milkType`, `rawMilk`, `pictureName`) VALUES (NULL,NULL,NULL,'Camembert',3,2,20,'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','W',2,'Z',1,'Camembert.jpg');

INSERT INTO `cheese`(`id`, `createdAt`, `updatetAt`, `cheeseName`, `sort_id`, `price_id`, `qtyInStock`, `descrip`, `recipe`, `taste`, `lactose`, `milkType`, `rawMilk`, `pictureName`) VALUES (NULL,NULL,NULL,'Test',4,1,133,'test.','test.','M',1,'K',2,'dummy.jpg');