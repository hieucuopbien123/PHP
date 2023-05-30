CREATE DATABASE Users;

USE Users;

CREATE TABLE User (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Age INT,
    Hometown VARCHAR(255),
    Job VARCHAR(255)
);

INSERT INTO User (FirstName, LastName, Age, Hometown, Job) VALUES 
('Peter', 'Griffin', 41, 'Quahog', 'Software Engineer'),
('Jane', 'Doe', 30, 'Los Angeles', 'Data Analyst'),
('Bob', 'Smith', 40, 'Chicago', 'Project Manager'),
('Alice', 'Johnson', 35, 'Houston', 'Marketing Manager');
