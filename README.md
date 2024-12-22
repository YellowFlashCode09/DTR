# DTR
DTR System for ITE18 course

1. Download This file as a zip
2. Download the webserver hosting i used XAMPP for this (https://sourceforge.net/projects/xampp/files/)
3. install and run the Apache & MySql Module in the XAMPP Program
4. go to your webbrowser and go to http://localhost/phpmyadmin/
5. add a new database name it dtr_system
6. run this query command in that database

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    unique_id VARCHAR(13) NOT NULL
);

CREATE TABLE time_records (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    clock_in DATETIME NOT NULL,
    clock_out DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

7. create an folder at D:\Xampp\htdocs (in my case i installed xampp in driver D:\)
8. extract the downloaded zipfile to the D:\Xampp\htdocs\dtr (I named my folder dtr)
9. then go to your browswer and type localhost/DTR/index.html (localhost/(foldername)/index.html
