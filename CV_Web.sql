CREATE DATABASE cv_db;

CREATE TABLE jobseeker (
    JS_ID int NOT NULL AUTO_INCREMENT,
    JS_Name varchar(50) NOT NULL,
    JS_Address varchar(100) NOT NULL,
    JS_Email varchar(50) NOT NULL,
    JS_MobileNum varchar(20) NOT NULL,
    Password varchar(50) NOT NULL,
    PRIMARY KEY (JS_ID)
);

CREATE TABLE cv (
    CV_ID int NOT NULL AUTO_INCREMENT,
    Job_ojb varchar(100) NOT NULL,
    Experience varchar(100) NOT NULL,
    WorkingHistory varchar(100) NOT NULL,
    Add_Info varchar(100) NOT NULL,
    CV_JS_ID int NOT NULL,
    PRIMARY KEY (CV_ID),
    FOREIGN KEY (CV_JS_ID) REFERENCES JobSeeker(JS_ID)
);

CREATE TABLE certificate (
    Cer_ID int NOT NULL AUTO_INCREMENT,
    Cer_Name varchar(50) NOT NULL,
    Time datetime NOT NULL,
    Expiration datetime NOT NULL,
    Cer_CV_ID int NOT NULL,
    PRIMARY KEY (Cer_ID),
    FOREIGN KEY (Cer_CV_ID) REFERENCES CV(CV_ID)
);

CREATE TABLE reference (
    Ref_ID int NOT NULL AUTO_INCREMENT,
    Ref_Name varchar(50) NOT NULL,
    Ref_Address varchar(100) NOT NULL,
    Ref_Email varchar(50) NOT NULL,
    Ref_MobileNum varchar(20) NOT NULL,
    Relationship varchar(20) NOT NULL,
    Ref_CV_ID int NOT NULL,
    PRIMARY KEY (Ref_ID),
    FOREIGN KEY (Ref_CV_ID) REFERENCES CV(CV_ID)
);

CREATE TABLE education (
    Deg_ID int NOT NULL AUTO_INCREMENT,
    Deg_Name varchar(50) NOT NULL,
    School_Info varchar(100) NOT NULL,
    Deg_Time datetime NOT NULL,
    Deg_CV_ID int NOT NULL,
    PRIMARY KEY (Deg_ID),
    FOREIGN KEY (Deg_CV_ID) REFERENCES CV(CV_ID)
);