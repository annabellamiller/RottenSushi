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


-- MOVIE
DROP TABLE IF EXISTS Movie;
CREATE TABLE Movie
( Movie_ID			INT NOT NULL AUTO_INCREMENT,
  Movie_Name		VARCHAR(200) NOT NULL,
  Release_Date		Date NOT NULL,
  Director		    VARCHAR(100),
  Award			    TEXT(500),
  Details           TEXT(1000) NOT NULL,
  CONSTRAINT PRIMARY KEY (Movie_ID )
);

-- ROLES 
DROP TABLE IF EXISTS roles;
CREATE TABLE roles
( Movie_ID		INT NOT NULL AUTO_INCREMENT,
  Actor_ID			INT NOT NULL,
  PRIMARY KEY (Movie_ID, Actor_ID),
  FOREIGN KEY (Actor_ID) REFERENCES Actor(Actor_ID),
  FOREIGN KEY (Movie_ID) REFERENCES Movie(Movie_ID)
);

-- USER
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `User_ID`         INT NOT NULL AUTO_INCREMENT,
  `Username`        VARCHAR(100) NOT NULL,
  `Password_`       VARCHAR(100) NOT NULL,
  `First_Name`      VARCHAR(100) NOT NULL,
  `Last_Name`       VARCHAR(100) NOT NULL,
  `Credit_Card`     INT(16),
  `CVV`             INT(4) ,
  `Expiration_Date` DATE ,
  `Admin`           TINYINT(1) NOT NULL DEFAULT 0,
  CONSTRAINT PRIMARY KEY (`User_ID`)
);

-- REVIEW 
DROP TABLE IF EXISTS review;
CREATE TABLE review
( User_ID		INT NOT NULL ,
  Movie_ID		INT NOT NULL,
  Description_  TEXT(2000) NOT NULL,
  Rating        INT NOT NULL,
  PRIMARY KEY (Movie_ID, User_ID),
  FOREIGN KEY (User_ID) REFERENCES user(User_ID),
  FOREIGN KEY (Movie_ID) REFERENCES Movie(Movie_ID)
);

-- PURCHASES 
DROP TABLE IF EXISTS purchases;
CREATE TABLE purchases
( Movie_ID		INT NOT NULL,
  User_ID		INT NOT NULL,
  PRIMARY KEY (Movie_ID, User_ID),
  FOREIGN KEY (User_ID) REFERENCES User(User_ID),
  FOREIGN KEY (Movie_ID) REFERENCES Movie(Movie_ID)
);




