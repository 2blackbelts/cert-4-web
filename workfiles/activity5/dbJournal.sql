DROP DATABASE IF EXISTS dbJournal;
CREATE DATABASE dbJournal;  
USE dbJournal;
  
CREATE TABLE Journal (
	journalID 	integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	jDateTime	DATETIME COMMENT 'date/time of journal entry YYYY-MM-DD HH-mm-ss',
	jHeading	varchar(30) NOT NULL,
	jDetail		varchar(255)
	
) ENGINE = InnoDB;


INSERT INTO Journal VALUES 
	(1, now(), 'Client meeting', 'Met with client on Mon 5 Aug to discuss layout ideas. '),
	(2, now(), 'Email to client', 'Follow-up from meeting.  Set date for review (12 Aug)'),
	(3, now(), 'Email from client', 'Confirmed that review date is suitable.'),
	(4, now(), 'Email to client', 'Had a brilliant idea for website layout. Emailed a sample to client on 18 Aug'),
	(5, now(), 'Note to self', 'Don\'t forget responsive layout!');

GRANT SELECT, INSERT, UPDATE, DELETE ON dbJournal.* TO 'webBoss'@'localhost' IDENTIFIED BY 'webRhubarb';