CREATE DATABASE gugong;
GRANT USAGE ON *.* TO gugong@localhost IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON gugong.* TO gugong@localhost;
FLUSH PRIVILEGES;

USE gugong;

CREATE TABLE product(
    productID int NOT NULL AUTO_INCREMENT,
	productName VARCHAR(50) NOT NULL,
	productCatalog VARCHAR(50) NOT NULL,
    productPrice DECIMAL(9,2) NOT NULL,
    productDescription VARCHAR(500) NOT NULL,
    productRating int(1) NOT NULL,
    productImage1 VARCHAR(50) NOT NULL,
    productImage2 VARCHAR(50) NOT NULL,
    productImage3 VARCHAR(50) NOT NULL,
    productDate DATE DEFAULT NOW(),
	PRIMARY KEY (productID)
	);

-- Add original product colletions.

INSERT INTO product
( productName, productCatalog, productPrice, productDescription, productRating,
 productImage1, productImage2, productImage3, productDate)
VALUES
(                  
                   "Fulushou Mug",
                   "Cups",                  
                   "32.99",
                   "Traditional Chinese culture has long associated the stars in the sky with the good, and bad luck of the world. The folks regard the 'Fu', 'Lu', 'Shou', three stars of good fortune and longevity as a symbol of happiness, auspiciousness, and longevity in ritual communication. The designer uses simple lines to vividly outline the cute pet images of three auspicious animals, so that users can feel the profoundness and profoundness of Chinese blessing culture while enjoying tea.",
                   "5",
                   "images/fulushou01.jpg",
                   "images/fulushou02.jpg",
                   "images/fulushou03.jpg",
                   "2011-01-02"),
(               
                   "Haicuo Mug",
                   "Cups",                  
                   "35.99",
                   "Haicuo is the collective name for the various kinds of fish in ancient China. In the Qing Dynasty, Nie Huang devoted his life to Haicuo painting. In the 37th year of Emperor Kangxi of the Qing Dynasty,his only surviving painting Haicuotu was completed and was later accepted into the court during the Qianlong period. The cup body is made of Jingdezhen ceramics, and the detailed texture of the sea fish is clearly displayed through the applique process,which makes people marvel at the fantasy and vivid interpretation of the marine life of the ancients.",
                   "5",
                   "images/haicuo01.jpg",
                   "images/haicuo02.jpg",
                   "images/haicuo03.jpg",
                   "2011-01-03"),
(              
                   "Golden Osmanthus Glass Cup",
                   "Cups",                  
                   "35.99",
                   "In traditional Chinese culture, Golden Osmanthus means auspiciousness, and the full moon means reunion. This product is inspired by the 'Wu Tong Shuang Tu Tu' in the Qing Dynasty collected in the Palace Museum. The designer combined the full moon, laurel tree, and jade rabbit into this product. The jade rabbit is a three-dimensional shape, sitting on the bottom of the cup exquisitely, surrounded by clouds and osmanthus flowers, echoing inside and out, creating a sense of space before and after. Hope is like a full flower ball in the golden autumn, filling and warm inside.",
                   "3",
                   "images/jinguicup01.jpg",
                   "images/jinguicup02.jpg",
                   "images/jinguicup03.jpg",
                   "2011-01-04"),
(             
                   "Winter Plum Blossom Pearl Earrings",
                   "Accessories",                  
                   "125.99",
                   "The design of the product is inspired by the 'Prunus arvense tree bonsai' collected by the Palace Museum. Inspired by the blooming winter plum bonsai, the shape of the winter plum blossoms is inlaid with handmade filigree. The shape is small and exquisite, and the ancient charm is elegant. The stud earrings are exquisite and lightweight, they are small but gorgeous",
                   "3",
                   "images/earrings01.jpg",
                   "images/earrings02.jpg",
                   "images/earrings03.jpg",
                   "2011-01-05"),
(           
                   "Filigree Butterfly Brooch",
                   "Accessories",                  
                   "159.99",
                   "The filigree process is made by drawing gold, silver and copper into Sith, using techniques such as stacking weaving. The materials are rare and the process is complicated.The filigree butterfly brooch is vivid and represents spring is coming.",
                   "4",
                   "images/butterfly01.jpg",
                   "images/butterfly02.jpg",
                   "images/butterfly03.jpg",
                   "2011-01-06"),
(            
                   "Palace Agate Bracelet",
                   "Accessories",                  
                   "73.99",
                   "The university question in the small card·Oracle builds a bridge between pictures and Chinese characters·Professional font designer + senior children's hand-drawn illustrator = As always high-looking. At the same time, cultivate children's observation, memory, concentration and self-confidence· Four themes to build children's own cognitive kingdom",
                   "3",
                   "images/bracelet01.jpg",
                   "images/bracelet02.jpg",
                   "images/bracelet03.jpg",
                   "2011-01-07"),
(           
                   "Palace Air Cushion",
                   "Cosmetics",                  
                   "56.99",
                   "The outerlook of the Palace Air Cushion is inspired by the blue-glazed plum vase during the Yongzheng period of the Qing Dynasty. It is deep and restrained, noble and mysterious. Cushion makeup looks natural and moisturized.",
                   "3",
                   "images/cusion01.jpg",
                   "images/cusion02.jpg",
                   "images/cusion03.jpg",
                   "2011-01-08"),
(        
                   "Palace Eye Shadow",
                   "Cosmetics",                  
                   "65.99",
                   "At the top of the Forbidden City, today’s Queqiong Tower, the red wall and golden tiles, the place of contemplation, the golden light is bright, dancing with the wind. Vermilion, that is, Chinese red, is the color of the imperial imperial palace, the color of the walls of the Forbidden City, and the color of the red makeup of beauty. The bright red is warm and gorgeous, and it is a lifelong miss",
                   "4",
                   "images/eyeshadow01.jpg",
                   "images/eyeshadow02.jpg",
                   "images/eyeshadow03.jpg",
                   "2011-01-09"),
(          
                   "Palace Lipstick Set",
                   "Cosmetics",                  
                   "239.99",
                   "Inspired by the Forbidden City purse collection, six oriental colors: warm agate red, gentle cowpea red, stunning ruby ​​red, noble glaze purple, bright amber orange, vitality coral red, gorgeous and elegant, just like a costume between lips. Retro and full of charm, brighten your lips",
                   "4",
                   "images/lipstick01.jpg",
                   "images/lipstick02.jpg",
                   "images/lipstick03.jpg",
                   "2011-01-01");
