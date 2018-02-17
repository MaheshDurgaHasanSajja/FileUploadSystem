DROP TABLE IF EXISTS users;

CREATE TABLE users(
    `id` int(11) PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key of users table',
    `name` varchar(255) DEFAULT NULL COMMENT 'Name of an user',
    `email` varchar(255) NOT NULL COMMENT 'Email of user',
    `password` varchar(255) NOT NULL COMMENT 'Password of an user',
    `phone_number` varchar(255) NOT NULL COMMENT 'Phone number of an user',
    `gender` enum('F', 'M') NOT NULL COMMENT 'Gender of an user',
    `address` text NOT NULL  COMMENT 'Address of an user',
    `user_type` enum('A', 'S') COMMENT 'Type of an user A- Admin user, S- student',
    `group_id` int(11) COMMENT 'Primary key of groups table',
    `semister_id` varchar(255) COMMENT 'Primary key of semister table',
    `subject_id` varchar(255)COMMENT 'Primary key of subjects table',
    `year` varchar(255) COMMENT 'Year of subject',
    `row_status` int(11) DEFAULT 1 COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
    `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
    `modified_time` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record'
)AUTO_INCREMENT = 1;


DROP TABLE IF EXISTS user_uploads;

CREATE TABLE user_uploads(
    `id` int(11) PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key of users table',
    `year` int(11) NOT NULL COMMENT 'Year of a semister',
    `group_id` int(11) NOT NULL COMMENT 'Primary key of groups table',
    `semister_id` int(11) NOT NULL COMMENT 'Primary key of semisters table',
    `subject_id` int(11) NOT NULL COMMENT 'Primary key of subjects table',
    `file_name` varchar(255) NOT NULL COMMENT 'Name of a file uploaded by admin',
    `row_status` int(11) DEFAULT 1 COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
    `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
    `modified_time` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record'
)AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS groups;

CREATE TABLE groups(
    `id` int(11) PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key of users table',
    `group_name` varchar(255) COMMENT 'Name of a group',
    `row_status` int(11) DEFAULT 1 COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
    `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
    `modified_time` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record'
)AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS semisters;

CREATE TABLE semisters(
    `id` int(11) PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key of users table',
    `semister_name` varchar(255) COMMENT 'Name of a semister',
    `row_status` int(11) DEFAULT 1 COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
    `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
    `modified_time` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record'
)AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS subjects;

CREATE TABLE subjects(
    `id` int(11) PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary key of users table',
    `subject_name` varchar(255) COMMENT 'Name of a subject',
    `row_status` int(11) DEFAULT 1 COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
    `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
    `modified_time` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record'
)AUTO_INCREMENT = 1;