alter table information_schema.PROCESSLIST
	add ID bigint unsigned default '' not null;

alter table information_schema.PROCESSLIST
	add USER varchar(32) default '' not null;

alter table information_schema.PROCESSLIST
	add HOST varchar(261) default '' not null;

alter table information_schema.PROCESSLIST
	add DB varchar(64) default '' null;

alter table information_schema.PROCESSLIST
	add COMMAND varchar(16) default '' not null;

alter table information_schema.PROCESSLIST
	add TIME int not null;

alter table information_schema.PROCESSLIST
	add STATE varchar(64) default '' null;

alter table information_schema.PROCESSLIST
	add INFO varchar(65535) default '' null;

