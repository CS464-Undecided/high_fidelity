PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
COMMIT;
PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE FOLDERS (folderid INTEGER PRIMARY KEY AUTOINCREMENT, folder_name varchar(255), time_created TEXT, last_edited TEXT);
CREATE TABLE files (fileid INTEGER PRIMARY KEY AUTOINCREMENT, file_name varchar(255), parent_folder_id INTEGER, time_created TEXT, last_edited TEXT, FOREIGN KEY(parent_folder_id) REFERENCES FOLDERS(folderid));
COMMIT;
