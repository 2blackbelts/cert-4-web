DROP DATABASE IF EXISTS dbTourist;   
CREATE DATABASE dbTourist;
USE dbTourist;
   
CREATE TABLE Location (
	locationID 	integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	locName		varchar(30) NOT NULL,
	locImageName	varchar(30)     COMMENT 'includes file extension eg sydney.jpg',
	locImageWidth	integer(4),
	locImageHeight	integer(4),
	locArea		varchar(50) 	COMMENT 'brief description of locality',
	locAttraction	text,
	locEvents	varchar(80) 	COMMENT 'brief description of special events',
	locUpdate	DATE  		COMMENT 'YYYY-MM-DD date last updated - from system date'
);
-- ------------------
-- Create a web user
-- ------------------
GRANT SELECT ON dbTourist.* TO 'visitor'@'localhost' IDENTIFIED BY 'justlook';
 
-- --------------------------------
-- Insert some data into the table
-- --------------------------------

INSERT INTO Location (locName, locImageName, locImageWidth, locImageHeight, locArea, locAttraction, locEvents, locUpdate) VALUES 
	('Outback NSW','outback.jpg', 379, 415, 'Broken Hill district and beyond', 'Rugged hills, wildlife, bushwalking. Watch the sunset, then enjoy some star gazing in the spectacular, clear outback night sky.', 'Wildflower Tour', CURDATE()),
	('Florence (Firenze)','firenze.jpg', 411, 348, 'Tuscany, Italy', 'Home of Michelangelo\'s David and Ponte Veccio medieval bridge. Explore the Tuscan countryside and stay in one of our lovely old stone villas, surrounded by vineyards and rolling hills. Ask about our walking tours.', 'Fashion shows and so on', CURDATE()),
	('Flinders Ranges','flindersranges.jpg', 315, 290, 'South Aust, only 4 hours drive from the Dungeon', 'Spectacular bushwalking and car treks. Wilpena Pound and Arkaroola have some of South Australia\'s most spectacular scenery.', 'Escorted 4x4 Trek in April', CURDATE()),
	('London','london.jpg', 340, 429, 'Located on an island off mainland Europe', 'Ride the London Underground and mind the gap, call into Buckingham Palace and have afternoon tea with the Queen.', 'Aussie Cricket Team summer tour', CURDATE()),
	('Melbourne','melbourne.jpg', 241, 258, 'near Geelong', 'Mecca for sports fans... the Melbourne Cup, Australian Open tennis, and of course the AFL grand final, to name just a few.  Catch a tram and visit the MCG.  Lots of great restaurants to choose from.', 'Australian Open Tennis (January)', CURDATE()),
	('Mutawintji','mutawintji.jpg', 342, 476, 'Far West NSW', 'One of NSW National Park\'s best kept secrets. Be awed by the stunning scenery, hidden rock holes, and Aboriginal rock art that\'s more than twice as old as the pyramids of Egypt.', 'Bush tucker and cultural tours during school holidays', CURDATE()),
	('Nine Mile Creek','ninemilecreek.jpg', 99, 378, 'Far West NSW, 9 miles from somewhere...', 'A great place to get away from it all.  Go bushwalking, keep a lookout for emus and kangaroos, explore the old mine shafts, and see how many varieties of birds you can spot.',' Watch the full moon rise over the hills', CURDATE()),
	('New York','ny.jpg', 382, 450, 'USA East Coast', 'Take a ferry to the Statue of Liberty and Ellis Island, watch the sunset from the top of the Empire State Building, walk through Central Park and across Brooklyn Bridge, and if you\'ve still got time, take in a show on Broadway or visit one of the many art galleries. ', 'Early Bird Special for next year\'s Fall Tour', CURDATE()),
	('Paris','paris.jpg', 379, 407, 'Europe, of course', 'A trip to Paris wouldn\'t be complete without a visit to the Louvre and the Eiffel Tower. Then take a stroll down the Champs Elysee and sample the gastronomic delights of Paris along the way.  A cruise along the Seine is a great way to see the city. Don\'t miss Sacre-Coeur cathedral and the winding, cobblestone streets of Montmartre. ', 'Tour de France', CURDATE()),
	('Pisa','pisa.jpg', 346, 461, 'Tuscany, Italy', 'Home of the famous Leaning Tower. If you\'re feeling energetic, climb to the top, just like Galileo did.', 'Included in our 2015 Tuscany tour', CURDATE()),
	('Quebec City','quebec.jpg', 345, 434, 'East coast of Canada, on St Lawrence River', 'The only walled city in North America, this French Canadian gem is steeped in history.  Explore Chateau Frontenac, the old citadel and the streets of Vieux-Quebec, or go further afield and visit a traditional Huron-Wendake Indian village. A scenic drive along the St Lawrence takes in picturesque villages, spectacular waterfalls and national parks.  See the dazzling autumn colours, or visit in winter and go for a sleigh ride.', 'International Flying Monkey Conference in Oct 2016', CURDATE()),
	('Rome','rome.jpg', 386, 461, 'Italy', 'Rome is steeped in history, including the Colusseum, the Forum of the Ancient Roman Empire, the catacombs and St Peter\s Cathedral and the Vatical, where you can see some of Michaelangelo\'s masterpeices, his sculpture of the Pieta and his famous ceiling in the Sistene Chapel.', 'Enquire about our 2015 food-lovers\' tour of Italy', CURDATE()),
	('Silverton','silverton.jpg', 296, 354, 'Far West NSW', 'A highlight of any trip to Silverton is a visit to Mundi Mundi Lookout to watch the sun set over the vast Mundi Mundi Plain.  Other attractions include camel rides, the Silverton Pub (made famous in many movies) and art galleries. Why not enjoy a picnic in the creek, surrounded by ancient gum trees.', 'Regular Bush tucker guided tours', CURDATE()),
	('Sydney','sydney.jpg', 404, 467, 'Far East NSW', 'Attractions include the Opera House, the historic "Rocks" area, the Harbour Bridge, and of course the harbour itself, one of the most magnificent in the world. For a unique experience of Sydney, book in for one of our discounted Bridge Climb tours.', 'Summer Food and Wine festival', CURDATE()),
	('Townsville','townsville.jpg', 412, 438, 'North Queensland', 'A great place to escape for the winter. There are lots of beaches lined with palm trees, as well as mountain forests and waterfalls, and beautiful Magnetic Island only 25 minutes away by ferry. Townsville is a large vibrant city with lots of great restaurants as well as a casino.', 'Chamber Music Festival every July', CURDATE()),
	('Venice','venice.jpg', 377, 386, 'Northern coast of Italy', 'A city like no other in the world. Experience it for yourself, before global warming gets the upper hand...', 'Spectacular festival each year', CURDATE());