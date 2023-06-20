DROP TABLE `expenses`;
DROP TABLE `categories`;
DROP TABLE `accounts`;
DROP TABLE `incomes`;
DROP TABLE `users`;


-- users table
CREATE TABLE `users` (
    user_id INTEGER NOT NULL AUTO_INCREMENT,
    full_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_active SMALLINT(1) NOT NULL DEFAULT 1 COMMENT '0 = not active, 1 = active',
    PRIMARY KEY (user_id)
);

-- categories table
CREATE TABLE `categories`(
    category_id SMALLINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    is_active SMALLINT(1)  NOT NULL DEFAULT 1 COMMENT '0 = not active, 1 = active',
    PRIMARY KEY (category_id)
);
-- accounts table
CREATE TABLE `accounts`(
    account_id SMALLINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    is_active SMALLINT(1)  NOT NULL DEFAULT 1 COMMENT '0 = not active, 1 = active',
    user_id INTEGER NOT NULL,
    PRIMARY KEY (account_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- incomes table
CREATE TABLE `incomes`(
    income_id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    category_id SMALLINT NOT NULL,
    account_id SMALLINT NOT NULL,
    date DATE NOT NULL,
    periodicity SMALLINT(1)  NOT NULL DEFAULT 0 COMMENT '0 = no, 1 = fixed, 2 = installments',
    status SMALLINT(1)  NOT NULL DEFAULT 0 COMMENT '0 = unreceived; 1 = received',
    user_id INTEGER NOT NULL,
    PRIMARY KEY (income_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
    FOREIGN KEY (account_id) REFERENCES accounts(account_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- expenses table
CREATE TABLE `expenses`(
    expense_id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    category_id SMALLINT NOT NULL,
    account_id SMALLINT NOT NULL,
    date DATE NOT NULL,
    periodicity SMALLINT(1)  NOT NULL DEFAULT 0 COMMENT '0 = no, 1 = fixed, 2 = installments',
    status SMALLINT(1)  NOT NULL DEFAULT 0 COMMENT '0 = unpaid; 1 = paid',
    user_id INTEGER NOT NULL,
    PRIMARY KEY (expense_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
    FOREIGN KEY (account_id) REFERENCES accounts(account_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
