CREATE DATABASE IF NOT EXISTS pdoapp;

USE pdoapp;

CREATE TABLE IF NOT EXISTS students (
    id VARCHAR(150) NOT NULL,
    name VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS courses(
    id VARCHAR(150) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    year INTEGER,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS students_courses (
    student_id VARCHAR(150) NOT NULL,
    course_id VARCHAR(150) NOT NULL,
    final_mark INTEGER,
    PRIMARY KEY (student_id, course_id),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

/*
INSERT INTO students VALUES ('550baab1-0ef5-4625-97fa-e0cbb58f7587', 'lucas', 'sp');
INSERT INTO courses VALUE ('1fed8378-91c9-41b3-9ca6-48fe9b7a364d', 'php course', 'the best lang', 2022);
INSERT INTO courses VALUE ('7bf3922b-6ded-4d4c-9cc6-6eb27a441f8e', 'javascript course', 'not pro lang', 2022);
INSERT INTO students_courses VALUES ('550baab1-0ef5-4625-97fa-e0cbb58f7587', '1fed8378-91c9-41b3-9ca6-48fe9b7a364d', NULL);
INSERT INTO students_courses VALUES ('550baab1-0ef5-4625-97fa-e0cbb58f7587', '7bf3922b-6ded-4d4c-9cc6-6eb27a441f8e', NULL);
*/
