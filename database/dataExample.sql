INSERT INTO user_table (
    email,
    password,
    name,
    last_name,
    mothersLast_name,
    phone,
    type
) VALUES ("dieghoramreyes@gmail.com", "5914af360a493b7cd046d15bc04c0b9f", "Diego Guadalupe", "Ramirez", "Reyes", 3481098523, "GOD"),
("controlTest@tecnica.com", "5914af360a493b7cd046d15bc04c0b9f", "Control", "Secundaria", "Tecnica", 3481000001, "Control"),
("coordinadorTest@tecnica.com", "5914af360a493b7cd046d15bc04c0b9f", "Coordinador", "Secundaria", "Tecnica", 3481000002, "Coordinador"),
("prefectoTest@tecnica.com", "5914af360a493b7cd046d15bc04c0b9f", "Prefecto", "Secundaria", "Tecnica", 3481000003, "Prefecto"),
("maestroTest@tecnica.com", "5914af360a493b7cd046d15bc04c0b9f", "Maestro", "Secundaria", "Tecnica", 3481000004, "Maestro");


INSERT INTO group_table(
    name
) VALUES ('A'), ('B'), ('C'), ('D'), ('E');

INSERT INTO grade_table (
    name
) VALUES ('1'), ('2'), ('3');

INSERT INTO shift_table (
    name
) VALUES ('Matutino'), ('Vespertino');

insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Sibel', 'Sange', 'Wellan', 2, 1, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Micky', 'Antram', 'Malkie', 1, 2, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Elinor', 'Decort', 'Ginn', 1, 3, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Leo', 'Montez', 'Scartifield', 2, 1, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Balduin', 'Ambrosio', 'Blakely', 1, 2, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Benjamin', 'DeSousa', 'Stanfield', 1, 4, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Elita', 'Hambly', 'Le Marquis', 2, 4, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Dasi', 'Stonham', 'Dupoy', 3, 2, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Elke', 'Hovard', 'Piatkowski', 2, 5, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Marrissa', 'Batthew', 'Tagg', 2, 5, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Leigha', 'Bollard', 'Vaz', 2, 2, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Marita', 'Goldspink', 'Pirson', 2, 5, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Janith', 'Flowerden', 'Shevell', 1, 5, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Flynn', 'Edney', 'Costello', 2, 3, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Harley', 'Sandland', 'Roark', 2, 2, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Cris', 'Skeemer', 'Silkstone', 2, 2, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Melissa', 'Farlane', 'Odde', 2, 1, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Yulma', 'Gyorffy', 'Roan', 2, 5, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Rachel', 'Forsaith', 'Vasovic', 1, 1, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Markus', 'Ducker', 'Handes', 1, 2, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Calv', 'Surcomb', 'Ahrenius', 2, 2, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Holmes', 'McCullock', 'Byham', 3, 2, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Berton', 'Windress', 'Penwright', 3, 1, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Damien', 'Whithorn', 'Heyns', 2, 2, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Michal', 'Paquet', 'Oseland', 2, 4, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Matty', 'Gellion', 'Shutler', 2, 5, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Mile', 'MacCroary', 'Strafen', 2, 2, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Bran', 'Feaver', 'Ploughwright', 2, 4, 1);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Evelina', 'Gibbings', 'Sinnat', 2, 2, 2);
insert into  student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) values ('Myrtle', 'Notman', 'Goodbairn', 2, 1, 2);

INSERT INTO class_table(name) VALUES ('Matematicas I'), ('Español I');

INSERT INTO class_teacher_table(teacher_fk, grade_fk, group_fk, shift_fk, class_fk) VALUES (5, 2, 5, 1, 1);

--DATE = yyyy-mm-dd
INSERT INTO attendance_table (day, class_teacher_fk, student_fk, status) VALUES 
('2023-04-10', 1, 9, 'Asistencia'),
('2023-04-10', 1, 18, 'Asistencia'),
('2023-04-10', 1, 26, 'Asistencia'),
('2023-04-11', 1, 9, 'Falta'),
('2023-04-11', 1, 18, 'Retraso'),
('2023-04-11', 1, 26, 'Justificacion');

INSERT INTO conduct_table(student_fk, description, value, class_teacher_fk, person) VALUES 
(9, 'Initialize Conduct', 'Bueno', null, 4),
(18, 'Initialize Conduct', 'Bueno', null, 4),
(26, 'Initialize Conduct', 'Bueno', null, 4),
(9, 'Entrego tareas a tiempo', 'Bueno', null, 4),
(18, 'Entrego tareas sucias', 'Regular', null, 4),
(26, 'No Entrego tareas', 'Malo', null, 4),
(9, 'Se mio en clase', 'Regular', null, 4),
(18, 'No se asea', 'Malo', null, 4),
(26, 'Se peleo con la maestra', 'Malo', null, 4),
(9, 'Participo en clase', 'Regular', null, 4),
(18, 'Gano el torneo intersecundario', 'Bueno', null, 4),
(26, 'Comprende el ingles', 'Bueno', null, null),
(9, 'Initialize Conduct', 'Bueno', 1, null),
(18, 'Initialize Conduct', 'Bueno', 1, null),
(26, 'Initialize Conduct', 'Bueno', 1, null),
(9, 'Entrego tareas a tiempo', 'Bueno', 1, null),
(18, 'Entrego tareas sucias', 'Regular', 1, null),
(26, 'No Entrego tareas', 'Malo', 1, null),
(9, 'Se mio en clase', 'Regular', 1, null),
(18, 'No se asea', 'Malo', 1, null),
(26, 'Se peleo con la maestra', 'Malo', 1, null),
(9, 'Participo en clase', 'Regular', 1, null),
(18, 'Gano el torneo intersecundario', 'Bueno', 1, null),
(26, 'Comprende el ingles', 'Bueno', 1, null);