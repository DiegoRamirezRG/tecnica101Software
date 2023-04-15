CREATE DATABASE tecnica;
USE tecnica;

DROP TABLE IF EXISTS user_table;
CREATE TABLE user_table (
    id_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	email VARCHAR(100),
    password TEXT,
    name VARCHAR(100),
    last_name VARCHAR(100),
    mothersLast_name VARCHAR(100),
    phone VARCHAR(12),
    type ENUM('Control', 'Coordinador', 'Prefecto', 'Maestro', 'GOD')
);

DROP TABLE IF EXISTS group_table;
CREATE TABLE group_table (
    id_group INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(5)
);

DROP TABLE IF EXISTS grade_table;
CREATE TABLE grade_table (
    id_grade INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(5)
);

DROP TABLE IF EXISTS shift_table;
CREATE TABLE shift_table (
    id_shift INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(15)
);

DROP TABLE IF EXISTS class_table;
CREATE TABLE class_table (
    id_class INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(50)
);

DROP TABLE IF EXISTS student_table;
CREATE TABLE student_table (
    id_student INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(100),
    last_name VARCHAR(100),
    mothersLast_name VARCHAR(100),
    grade_fk INT,
    group_fk INT,
    shift_fk INT
);

DROP TABLE IF EXISTS conduct_table;
CREATE TABLE conduct_table (
    id_conduct INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    student_fk INT,
    description TEXT,
    value ENUM('Malo', 'Regular', 'Bueno'),
    class_teacher_fk INT NULL DEFAULT NULL,
    person INT NULL DEFAULT NULL,
    day DATE DEFAULT NOW()
);

DROP TABLE IF EXISTS class_teacher_table;
CREATE TABLE class_teacher_table (
    id_class_teacher INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    teacher_fk INT,
    grade_fk INT,
    group_fk INT,
    shift_fk INT,
    class_fk INT
);

DROP TABLE IF EXISTS attendance_table;
CREATE TABLE attendance_table (
    id_attendance INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    day DATE,
    class_teacher_fk INT,
    student_fk INT,
    status ENUM('Retraso', 'Falta', 'Asistencia', 'Justificacion', 'Baja')
);

DROP TABLE IF EXISTS planning_control_table;
CREATE TABLE planning_control_table (
    id_planning_control INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    isActive BOOLEAN
);

DROP TABLE IF EXISTS planning_table;
CREATE TABLE planning_table (
    id_planning INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    upload_date DATE,
    download_url TEXT,
    class_teacher_fk INT
);

DROP TABLE IF EXISTS student_works_table;
CREATE TABLE student_works_table (
    id_student_works INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    upload_date DATE,
    download_url TEXT,
    class_teacher_fk INT
);

DROP TABLE IF EXISTS student_guides_table;
CREATE TABLE student_guides_table (
    id_student_guides INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    upload_date DATE,
    download_url TEXT,
    class_teacher_fk INT
);

DROP TABLE IF EXISTS student_contact_table;
CREATE TABLE student_contact_table (
    id_student_contact INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    student_fk INT,
    name VARCHAR(150),
    phone INT(10),
    relation VARCHAR(100)
);