create table Ladas (
  id int NOT NULL AUTO_INCREMENT,
  lada int NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE People (
    id int NOT NULL AUTO_INCREMENT,
    last_name varchar(255) NOT NULL,
    first_name varchar(255),
    phone_number varchar(255),
    lada_id int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (lada_id) REFERENCES Ladas(id)

);

INSERT INTO People (last_name, first_name, phone_number, lada_id) values ('Casillas', 'Michel', '4995940', 1);


ALTER TABLE Ladas 
ADD city varchar(255) NOT NULL,
ADD state varchar(255) NOT NULL

ALTER TABLE People 
ADD column company varchar(255) NOT NULL

select p.first_name, p.last_name, p.phone_number, l.lada, l.city, l.state from People as p
inner join Ladas as l where l.id = p.lada_id;