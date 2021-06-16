DROP DATABASE IF EXISTS dbAntiques;
CREATE DATABASE dbAntiques;
USE dbAntiques;
CREATE TABLE Category (
	categoryID	tinyint PRIMARY KEY NOT NULL,
	cDesc		varchar(25)
) ENGINE = InnoDB;
      
CREATE TABLE Product (
	productID	integer(5) PRIMARY KEY NOT NULL,
	categoryID 	tinyint NOT NULL,
	pName		  varchar(40),
	pPrice		float(6,2),
	pImage		varchar(30) COMMENT 'image filename',
	FOREIGN KEY (categoryID) REFERENCES Category(categoryID)
);
 
-- ------------------
-- Create a web user
-- ------------------
GRANT SELECT ON dbAntiques.* TO 'visitor'@'localhost' IDENTIFIED BY 'justlook';


-- --------------------------------
-- Insert some data into the tables
-- --------------------------------
INSERT INTO Category VALUES 
	(1,'Printers'),
	(2,'Vehicles'),
	(3,'Curios');

INSERT INTO Product VALUES 
	(1001, 1, 'Non-stapling inkjet printer', 99.95, 'printer1.jpg'),
	(1002, 1, 'Robynne\'s rotary laser printer', 878.50, 'printer2.jpg'),
	(1003, 1, 'Stapling printer-copier', 917.25, 'printer3.jpg'),
	(2010, 2, 'Steam-powered fire engine', 1225.75, 'fireEngine.jpg'),
	(2020, 2, 'Locomotive', 9995.85, 'loco.jpg'),
	(2030, 2, 'Road steamer', 4995.85, 'roadSteamer.jpg'),
	(3001, 3, 'Mechanical flower cutter', 385, 'flowerCutter.jpg'),
	(3002, 3, 'Time-zone watch', 47, 'watch.jpg'),
	(3003, 3, 'Estonian steam-powered widget', 4732, 'placeholder.jpg');