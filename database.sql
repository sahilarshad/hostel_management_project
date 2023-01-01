CREATE TABLE Student(
Student_ID int,
First_Name varchar(60),
Last_name varchar(60),
Mobile_number bigint,
Department_of_study varchar(30),
Year_of_study int,
Room_number int,
PRIMARY KEY (Student_ID),
FOREIGN KEY (Room_number) references Room(Room_number));




CREATE TABLE Room(
Room_number int,
Number_of_students int,
Floor int,
PRIMARY KEY (Room_number));


CREATE TABLE Visitor(
Visitor_ID int,
Visitor_name varchar(60),
date date,
in_time time,
out_time time,
Student_ID int,
PRIMARY KEY (Visitor_ID),
FOREIGN KEY (Student_ID) references Student(Student_ID));



CREATE TABLE Staff(
ID int,
Fname varchar(60),
Lname varchar(60),
Mobile_number bigint,
job varchar(60)
);

CREATE TABLE Family(
Name varchar(60),
Mobile_number bigint,
Address text,
relation varchar(60),
Student_ID int
);

/* Insert statements*/

INSERT INTO Student VALUES
(001,'Nandan','Hemanth',9845645635,'CSE',3,101),
(002,'Dhruv','Singla',9845712341,'ECE',1,102),
(003,'Ritvik','Wuyyuru',9781245639,'MECH',2,201),
(004,'Saieesh','Rao',9843645678,'EEE',3,201),
(005,'Robin','Roy',8145645457,'CSE',4,103);


INSERT INTO Room VALUES
(101,1,1),
(102,1,1),
(103,1,1),
(104,0,1),
(201,2,2),
(202,0,2),
(203,0,2),
(204,0,2),
(301,0,2),
(302,0,2),
(303,0,2),
(304,0,2);


INSERT INTO Visitor VALUES
(67411,"Ramesh babu","2022-10-01","07:30:00","09:00:00",003),
(67412,"Rakesh swami","2022-10-01","10:30:00","12:00:00",001),
(67413,"Ronit Bhathija","2022-10-07","08:30:00","09:30:00",004),
(67414,"Ramesh babu","2022-10-09","07:30:00","09:00:00",003),
(67415,"Sita naidu","2022-10-09","12:45:00","15:00:00",005),
(67416,"Monish Raj","2022-10-13","11:20:00","13:00:00",002),
(67417,"Ramesh babu","2022-10-16","07:15:00","09:00:00",003),
(67418,"Rakesh Swami","2022-10-21","10:00:00","11:00:00",001);


INSERT INTO Staff VALUES
(3001,"Loknath","babu",9879287123,"Warden"),
(3002,"Shivraj","sena",9872658123,"Assistant Warden"),
(3003,"raj","sins",9879281023,"Plumbing"),
(3004,"Mohan","babu",9871110123,"Plumbing"),
(3005,"Raskika","Uganda",9349286173,"ELectrician"),
(3006,"Sravyu","Wakanda",9879287773,"Electrician"),
(3007,"Muchhu","Asia",9844285523,"Cleaning"),
(3008,"Shyam","Mukesh",9272944123,"Cleaning"),
(3009,"Risva","nondi",9222287893,"Cleaning");


INSERT INTO Family VALUES
("Ramesh Hemanth",8512654789,"#101,7th main, btm layout, Bangalore-560072","Father",001),
("Seema Singla",8500954789,"#509,14th main, jayanagar, Bangalore-560021","Mother",002),
("Ravi Wuyyuru",8512650109,"#5,4th cross, Whitefield, Bangalore-560090","Father",003),
("Jyothi HS",8010954789,"#21,21st main, Kalyan nagar, Bangalore-560066","Mother",004),
("Roy Abraham",8518980789,"#11,3rd cross, HSR Layout, Bangalore-560043","Father",005);

/* join statements*/

SELECT student.first_name,student.last_name,visitor.visitor_ID,visitor.visitor_name
FROM student
INNER JOIN visitor ON student.student_ID=visitor.student_ID;

SELECT student.first_name,student.last_name,family.Name,family.mobile_number
FROM student
INNER JOIN family ON student.student_ID=family.student_ID;

SELECT student.first_name,student.last_name,room.floor
FROM student
INNER JOIN room ON student.room_number=room.room_number;

/* Aggregate functions*/

select SEC_TO_TIME(AVG(TIME_TO_SEC(in_time)))
FROM visitor;

select SEC_TO_TIME(AVG(TIME_TO_SEC(out_time)))
FROM visitor;

/* SET functions*/

SELECT First_Name, last_name, Mobile_number FROM Student
Union
SELECT FName, lname, Mobile_number FROM Staff;

/* Triggers functions*/

DELIMITER $$
CREATE TRIGGER `time` BEFORE INSERT ON `visitor` FOR EACH ROW SET NEW.time_stayed= SEC_TO_TIME(TIME_TO_SEC(NEW.out_time)- TIME_TO_SEC(NEW.in_time))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `time_1` BEFORE UPDATE ON `visitor` FOR EACH ROW SET NEW.time_stayed=SEC_TO_TIME(TIME_TO_SEC(NEW.out_time)- TIME_TO_SEC(NEW.in_time))
$$
DELIMITER ;

/*functions */

DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `full_name`(`first_name` VARCHAR(20), `last_name` VARCHAR(20)) RETURNS VARCHAR(45) CHARSET utf8mb4
RETURN CONCAT(first_name," ",last_name);$$
