DROP DATABASE IF EXISTS Rotten_Sushi;  
CREATE DATABASE Rotten_Sushi;  

USE Rotten_Sushi;

-- ACTOR
DROP TABLE IF EXISTS Actor;
CREATE TABLE Actor
( Actor_ID			INT NOT NULL AUTO_INCREMENT,
  First_Name		VARCHAR(100) NOT NULL,
  Last_Name			VARCHAR(100) NOT NULL,
  Date_of_Birth		DATE NOT NULL,
  PRIMARY KEY (Actor_ID)
);

-- CHARACTER 
DROP TABLE IF EXISTS Character_;
CREATE TABLE Character_
( Character_ID		INT NOT NULL AUTO_INCREMENT,
  Actor_ID			INT NOT NULL,
  First_Name		VARCHAR(100) NOT NULL,
  Last_Name			VARCHAR(100) NOT NULL,
  PRIMARY KEY (Character_ID, Actor_ID),
  FOREIGN KEY (Actor_ID) REFERENCES Actor(Actor_ID)
);

-- CATEGORY
DROP TABLE IF EXISTS Category;
CREATE TABLE Category
( Category_ID		INT NOT NULL AUTO_INCREMENT,
  Cat_Description	VARCHAR(100) NOT NULL,	
  PRIMARY KEY (Category_ID)
);

-- AWARD
DROP TABLE IF EXISTS Award;
CREATE TABLE Award
( Award_ID			INT NOT NULL AUTO_INCREMENT,
  Award_Name		VARCHAR(100) NOT NULL,
  Award_Description	VARCHAR(100) NOT NULL,	
  PRIMARY KEY (Award_ID)
);

-- MOVIE
DROP TABLE IF EXISTS Movie;
CREATE TABLE Movie
( Movie_ID			INT NOT NULL AUTO_INCREMENT,
  Category_ID		INT NOT NULL,
  Release_Year		YEAR NOT NULL,
  Character_ID		INT NOT NULL,
  Award_ID			INT,
  CONSTRAINT PRIMARY KEY (Movie_ID ),
  FOREIGN KEY (Character_ID) REFERENCES Character_(Character_ID),
  FOREIGN KEY (Award_ID) REFERENCES Award(Award_ID)
);

/*

-- Quarter Table
DROP TABLE IF EXISTS Quarter_;
CREATE TABLE Quarter_
( Quarter_ID			INT NOT NULL AUTO_INCREMENT,
  Quarter_Season		VARCHAR(10),
  Quarter_Year			YEAR,
  CONSTRAINT PRIMARY KEY ( Quarter_ID )
);

-- Customer Type Table
DROP TABLE IF EXISTS Customer_Type;
CREATE TABLE Customer_Type
( Customer_Type_ID		INT NOT NULL AUTO_INCREMENT,
  Description_			VARCHAR(100),
  Wholesale_Discount_Percent	INT,
  Order_Limit			INT DEFAULT 5,
  CONSTRAINT PRIMARY KEY ( Customer_Type_ID )
);

-- Customer Table
DROP TABLE IF EXISTS Customer;
CREATE TABLE Customer
( Customer_ID		INT NOT NULL AUTO_INCREMENT,
  First_Name		VARCHAR(100) NOT NULL,
  Last_Name			VARCHAR(100) NOT NULL,
  Credit_Card		VARCHAR(200),
  Customer_Type_ID  INT NOT NULL,
  Email				VARCHAR(200) NOT NULL,
  Phone				VARCHAR(10),
  CONSTRAINT PRIMARY KEY ( Customer_ID ),
  FOREIGN KEY (Customer_Type_ID) REFERENCES Customer_Type(Customer_Type_ID)
);



-- Order Table
DROP TABLE IF EXISTS Order_;
CREATE TABLE Order_
( Order_ID			INT NOT NULL AUTO_INCREMENT,
  Customer_ID		INT NOT NULL,
  Quarter_ID		INT NOT NULL,
  Order_Date		DATE NOT NULL,
  PRIMARY KEY ( Order_ID ),
  FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID),
  FOREIGN KEY (Quarter_ID) REFERENCES Quarter_(Quarter_ID)
);



-- Order Item
DROP TABLE IF EXISTS Order_Item;
CREATE TABLE Order_Item
( Product_ID		INT NOT NULL,
  Order_ID			INT NOT NULL,
  Order_Quantity    INT NOT NULL,
  Return_ID 		INT,
  PRIMARY KEY ( Product_ID, Order_ID ),
  FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID),
  FOREIGN KEY (Order_ID) REFERENCES Order_(Order_ID),
  FOREIGN KEY (Return_ID) REFERENCES Order_return(Return_ID)
);

-- Review Table
DROP TABLE IF EXISTS Review;
CREATE TABLE Review
( Order_ID			 INT NOT NULL,
  Product_ID         INT NOT NULL,
  Review_Date		 DATE NOT NULL,
  Review_Description TEXT,
  PRIMARY KEY ( Product_ID, Order_ID ),
  FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID),
  FOREIGN KEY (Order_ID) REFERENCES Order_(Order_ID)
);


-- Emails Table
DROP TABLE IF EXISTS Mailing;
CREATE TABLE Mailing
( Customer_ID			INT NOT NULL,
  Address_Type			VARCHAR(50) NOT NULL,
  Street				VARCHAR(50) NOT NULL,
  City					VARCHAR(50) NOT NULL,
  State					VARCHAR(2) NOT NULL,
  Zip_Code				INT(5) NOT NULL,
  PRIMARY KEY ( Customer_ID, Address_Type ),
  FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);



*/




