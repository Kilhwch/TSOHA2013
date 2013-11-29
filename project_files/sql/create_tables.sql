
CREATE table login (
username varchar(10),
password varchar(15),
id SERIAL,
PRIMARY KEY(id)
);

CREATE table decks (
deckid SERIAL,
PRIMARY KEY(deckid),
name varchar(40),
userid integer references login(id)
);

CREATE table cards (
front varchar(40),
back varchar(40),
deckid integer references decks(deckid) on delete cascade,
id SERIAL,
PRIMARY KEY(id)
);