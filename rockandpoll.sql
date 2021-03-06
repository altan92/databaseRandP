CREATE TABLE Users(
Password VARCHAR2(20) NOT NULL,
gender VARCHAR2(20) NOT NULL CHECK(gender in ('Female', 'Male', 'Other')),
age Integer NOT NULL CHECK(age>0),
Username VARCHAR2(20),
PRIMARY KEY(Username) 
);

CREATE TABLE Has(
Username VARCHAR2(20),
state_name VARCHAR2(20),
PRIMARY KEY(Username,state_name),
FOREIGN KEY (Username) References Users,
FOREIGN KEY (state_name) References Location
);

CREATE TABLE Have(
Username VARCHAR2(20),
i_name VARCHAR2(20),
PRIMARY KEY(Username,i_name),
FOREIGN KEY (Username) References Users,
FOREIGN KEY (i_name) References Interests
);

CREATE TABLE Interests(
i_name VARCHAR2(20),
PRIMARY KEY(i_name)
);

CREATE TABLE Location(
state_name VARCHAR2(20), 
PRIMARY KEY(state_name)
);

CREATE TABLE Questions(
q_id Integer CHECK(q_id>0),
question VARCHAR2(100) NOT NULL,
PRIMARY KEY(q_id)
);

CREATE TABLE Data(
q_id Integer,
d_id Integer CHECK(d_id>0),
stats Integer NOT NULL CHECK(stats>=0 and stats<=100),
PRIMARY KEY(q_id,d_id),
FOREIGN KEY(q_id) References Questions 
ON DELETE CASCADE
);

CREATE TABLE Polls(
Username VARCHAR2(20),
q_id Integer,
answer Integer CHECK(answer in (1,0)),
PRIMARY KEY(Username,q_id),
FOREIGN KEY(Username) References Users,
FOREIGN KEY(q_id) References Questions
);

CREATE TABLE Comments(
usercom VARCHAR2(20), 
Username VARCHAR2(20),
q_id Integer,
C_id Integer,
PRIMARY KEY(C_id),
FOREIGN KEY(Username) References Users,
FOREIGN KEY(q_id) References Questions
);


CREATE TABLE Can_Be(
q_id Integer,
g_id Integer CHECK(g_id > 0),
PRIMARY KEY(q_id,g_id),
FOREIGN KEY(q_id) References Questions,
FOREIGN KEY(g_id) References Genre
);

CREATE TABLE Genre(
Genre_name VARCHAR2(20) NOT NULL,
g_id Integer,
PRIMARY KEY(g_id)
);

CREATE TABLE Business(
g_id Integer,
Genre_name VARCHAR2(20) NOT NULL,
PRIMARY KEY (g_id),
FOREIGN KEY(g_id) References Genre
ON DELETE CASCADE
);

CREATE TABLE Pop_culture(
g_id Integer,
Genre_name VARCHAR2(20) NOT NULL,
PRIMARY KEY(g_id),
FOREIGN KEY(g_id) References Genre
ON DELETE CASCADE
);

CREATE TABLE Movies(
g_id Integer,
Genre_name VARCHAR2(20) NOT NULL,
PRIMARY KEY(g_id),
FOREIGN KEY(g_id) References Genre
ON DELETE CASCADE
);

CREATE TABLE Education(
g_id Integer,
Genre_name VARCHAR2(20) NOT NULL,
PRIMARY KEY(g_id),
FOREIGN KEY(g_id) References Genre
ON DELETE CASCADE
);

CREATE TABLE World_News(
g_id Integer,
Genre_name VARCHAR2(20) NOT NULL,
PRIMARY KEY(g_id),
FOREIGN KEY(g_id) References Genre
ON DELETE CASCADE
);


Insert into Comments (Usercom,username,q_id,C_id) VALUES ('This is garbage','test',1,2);

