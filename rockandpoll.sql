CREATE TABLE Users(
Password CHAR(20) NOT NULL,
gender CHAR(20) NOT NULL,
age Integer NOT NULL,
Username CHAR(20),
PRIMARY KEY(Username) 
);

CREATE TABLE Has(
Username CHAR(20),
state_name CHAR(20),
PRIMARY KEY(Username,state_name),
FOREIGN KEY (Username) References Users,
FOREIGN KEY (state_name) References Location
);

CREATE TABLE Have(
Username CHAR(20),
i_name CHAR(20),
PRIMARY KEY(Username,i_name),
FOREIGN KEY (Username) References Users,
FOREIGN KEY (i_name) References Interests
);

CREATE TABLE Interests(
i_name CHAR(20),
PRIMARY KEY(i_name)
);

CREATE TABLE Location(
state_name CHAR(20), 
zipcode Integer,
city CHAR(20),
PRIMARY KEY(state_name)
);

CREATE TABLE Questions(
q_id Integer,
question CHAR(100) NOT NULL,
PRIMARY KEY(q_id)
);

CREATE TABLE Data(
q_id Integer,
d_id Integer,
stats Integer NOT NULL,
PRIMARY KEY(q_id,d_id),
FOREIGN KEY(q_id) References Questions 
ON DELETE CASCADE
);

CREATE TABLE Polls(
Username CHAR(20),
q_id Integer,
answer Integer, 
PRIMARY KEY(Username,q_id),
FOREIGN KEY(Username) References Users,
FOREIGN KEY(q_id) References Questions
);

CREATE TABLE Can_Be(
q_id Integer,
g_id Integer,
PRIMARY KEY(q_id,g_id),
FOREIGN KEY(q_id) References Questions,
FOREIGN KEY(g_id) References Genre
);

CREATE TABLE Genre(
Genre_name CHAR(20) NOT NULL,
g_id Integer,
PRIMARY KEY(g_id)
);

CREATE TABLE Business(
g_id Integer,
Genre_name CHAR(20) NOT NULL,
PRIMARY KEY (g_id),
FOREIGN KEY(g_id) References Genre
ON DELETE CASCADE
);

CREATE TABLE Pop_culture(
g_id Integer,
Genre_name CHAR(20) NOT NULL,
PRIMARY KEY(g_id),
FOREIGN KEY(g_id) References Genre
ON DELETE CASCADE
);

CREATE TABLE Movies(
g_id Integer,
Genre_name CHAR(20) NOT NULL,
PRIMARY KEY(g_id),
FOREIGN KEY(g_id) References Genre
ON DELETE CASCADE
);

CREATE TABLE Education(
g_id Integer,
Genre_name CHAR(20) NOT NULL,
PRIMARY KEY(g_id),
FOREIGN KEY(g_id) References Genre
ON DELETE CASCADE
);

CREATE TABLE World_News(
g_id Integer,
Genre_name CHAR(20) NOT NULL,
PRIMARY KEY(g_id),
FOREIGN KEY(g_id) References Genre
ON DELETE CASCADE
);


