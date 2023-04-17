CREATE DATABASE IF NOT EXISTS manage_bills;

USE manage_bills;

CREATE TABLE IF NOT EXISTS bills (
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    amount DECIMAL(10,2) NOT NULL,
    category VARCHAR(125) NOT NULL,
    due_date INT NOT NULL,
    paid BOOLEAN NOT NULL,
    paid_date DATETIME,
    PRIMARY KEY (id)
);
