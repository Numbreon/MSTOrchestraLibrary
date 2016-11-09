CREATE TABLE SHEET_MUSIC (
	MusicID	VARCHAR(5)	PRIMARY KEY,
	Title	VARCHAR(15)	NOT NULL,
	ComposerFirst	VARCHAR(15),
	ComposerLast	VARCHAR(15)	NOT NULL,
	Ensemble	VARCHAR(15) NOT NULL,
	Genre	VARCHAR(30),
	Year	INT,
	Copies	INT	DEFAULT '0'
);
CREATE TABLE INSTRUMENT (
	Instrument 	VARCHAR(30)	PRIMARY KEY,
	Family	VARCHAR(15)	NOT NULL
);
CREATE TABLE COMPOSER (
	ComposerID	VARCHAR(5)	PRIMARY KEY,
	TimePeriod	VARCHAR(15),
	FName	VARCHAR(30),
	MName	VARCHAR(30),
	LName	VARCHAR(30)	NOT NULL
);
CREATE TABLE PLAYS (
	MusicID VARCHAR(5) NOT NULL,
	Instrument 	VARCHAR(30)	NOT NULL,
	FOREIGN KEY(MusicID) REFERENCES SHEET_MUSIC(MusicID),
	FOREIGN KEY (Instrument) REFERENCES INSTRUMENT(Instrument)
);