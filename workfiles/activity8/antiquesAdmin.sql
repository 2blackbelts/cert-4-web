-- -------------------------------------------------------- 
-- Use the Antiques database (you created this in Lesson 8)
-- --------------------------------------------------------

USE dbAntiques;  


-- ----------------------------------------- 
-- Get rid of old Admin table, if it exists 
-- -----------------------------------------

DROP TABLE IF EXISTS Admin;


-- -----------------------
-- Create the Admin table 
-- -----------------------

CREATE TABLE Admin (
	adminID		varchar(16) 	NOT NULL COMMENT 'this is the username',
	aPassword	varchar(40) 	NOT NULL,
	PRIMARY KEY	(adminID)
);


-- -------------------------------------------------------------------- 
-- Create admin user for online update (to be used in adminConnect.php)
-- --------------------------------------------------------------------
 
GRANT SELECT, INSERT, UPDATE, DELETE ON dbAntiques.* TO 'webBoss'@'localhost' IDENTIFIED BY 'webRhubarb';
