CREATE DATABASE IF NOT EXISTS pdoapp;

USE pdoapp;

CREATE TABLE IF NOT EXISTS books (
    id VARCHAR(100) NOT NULL,
    title VARCHAR(100) NOT NULL,
    year INTEGER NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS authors(
    id VARCHAR(100) NOT NULL,
    name VARCHAR(255) NOT NULL,
    country VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS books_authors (
    book_id VARCHAR(100) NOT NULL,
    author_id VARCHAR(100) NOT NULL,
    PRIMARY KEY (book_id, author_id), -- avoid duplications
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (author_id) REFERENCES authors(id)
);
