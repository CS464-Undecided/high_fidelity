PRAGMA foreign_keys=ON;
BEGIN TRANSACTION;
CREATE TABLE FOLDERS (folderid INTEGER PRIMARY KEY AUTOINCREMENT, folder_name varchar(255), time_created TEXT, last_edited TEXT);
INSERT INTO "FOLDERS" VALUES(1,'parent',NULL,NULL);
CREATE TABLE files (fileid INTEGER PRIMARY KEY AUTOINCREMENT, file_name varchar(255), parent_folder_id INTEGER, time_created TEXT, last_edited TEXT, FOREIGN KEY(parent_folder_id) REFERENCES FOLDERS(folderid));
INSERT INTO "files" VALUES(1,'doc1.txt',1,NULL,NULL);
INSERT INTO "files" VALUES(2,'doc2.txt',1,NULL,NULL);
DELETE FROM sqlite_sequence;

INSERT INTO "sqlite_sequence" VALUES('FOLDERS',1);
INSERT INTO "sqlite_sequence" VALUES('files',2);
COMMIT;
