-- create table
CREATE TABLE tasks (
	task_id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    created_at DATE NOT NULL,
    PRIMARY KEY (task_id)
);

-- insert
INSERT INTO tasks 
    (name, description, created_at)
    VALUES
    ('Task 1', 'Description of the task 1', NOW())

-- update
UPDATE tasks 
SET created_at = NOW() 
WHERE task_id = 1;

-- users 
CREATE TABLE users (
	id INTEGER NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(25) NOT NULL,
    PRIMARY KEY (id)
);