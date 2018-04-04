DROP DATABASE IF EXISTS shop;
CREATE DATABASE shop;
USE shop;

DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS purchases;

CREATE TABLE items(
	ItemID INT NOT null AUTO_INCREMENT,
	Category VARCHAR(255) NOT null,
	Name VARCHAR(255) NOT null,
	Title TEXT NOT null,
	Description Text NOT null,
	Link CHAR(255) NOT null,
	Price INT NOT null,
	PRIMARY KEY(ItemID)
);

CREATE TABLE users(
	Username VARCHAR(255) NOT null,
	Password CHAR(128) NOT null,
	Salt INT NOT null,
	IsAdmin BOOLEAN DEFAULT false,
	PRIMARY KEY(Username)
);

CREATE TABLE purchases(
	PurchaseID INT NOT null AUTO_INCREMENT,
	Username VARCHAR(255) NOT null,
	CartID INT NOT null,
	ItemID INT NOT null,
	Amount INT NOT null,
	Valid BOOLEAN default false,
	PRIMARY KEY(PurchaseID)
);

INSERT INTO users (Username, Password, Salt, IsAdmin) VALUES (
	'root',
	'0a6f2c5d1718b02617cabbf82fe237e840cfeb6a78d700b5bbbd1a827ea7f569db8f8bdbfe0dbfe209faaa1a5ea83657fa87379a622fe1986ae21fbfcf4f8942',
	'1522577201',
	'1'
);


INSERT INTO `items`(`ItemID`, `Category`, `Name`, `Title`, `Description`, `Link`, `Price`)
 VALUES (1,'feu terre','Le Piton de la Fournaise','le piton de la fournaise','Le Piton de la Fournaise - La Réunion','https://www.reunion.fr/sites/crt-reunion/files/styles/contenu_slider/public/content/images/volcan51_-_credit_irt_-_serge_gelabert_dts_12_2014_3.jpg?itok=ZrwloPf3','300'),
(2,'feu terre','Vésuve','vesuve','Vésuve - Naples','http://www.arkadias.fr/_media/img/medium/vesuvio4.jpg','200'),
(3,'terre eau','Canigou','canigou','Canigou - Pyrénées-Orientales','https://france3-regions.francetvinfo.fr/occitanie/sites/regions_france3/files/styles/top_big/public/assets/images/2015/06/15/canigoumaxppp.jpg?itok=XOO4FrDj','20'),
(4,'air','Ouragan de Thaïlande','ouragan','Ouragan de Thaïlande - Thaïlande','https://i.ytimg.com/vi/_7tO5gB_6i4/hqdefault.jpg','600'),
(5,'eau','Lac d\'Annecy','lac','Lac - Annecy','http://www.proprietes-privees.org/wp-content/uploads/2014/07/74-annecy.jpg','6000');
