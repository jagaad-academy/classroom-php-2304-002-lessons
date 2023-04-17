CREATE DATABASE personal_finance;

-- users
CREATE TABLE users (
    user_id INTEGER NOT NULL AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(155) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_active BOOLEAN NOT NULL,
    PRIMARY KEY (user_id)
);

-- accounts
CREATE TABLE accounts (
    account_id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    type VARCHAR(10) NOT NULL,
    user_id INTEGER NOT NULL,
    PRIMARY KEY (account_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- transactions
CREATE TABLE transactions (
    transaction_id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(55) NOT NULL,
    amount DECIMAL(19,2) NOT NULL,
    category VARCHAR(255) NOT NULL,
    transaction_date DATETIME NOT NULL,
    occurrence BOOLEAN NOT NULL,
    status VARCHAR(25) NOT NULL,
    type VARCHAR(25) NOT NULL,
    account_id INTEGER NOT NULL,
    PRIMARY KEY (transaction_id),
    FOREIGN KEY (account_id) REFERENCES accounts(account_id)
)
