alter table information_schema.TABLESPACES
	add TABLESPACE_NAME varchar(64) default '' not null;

alter table information_schema.TABLESPACES
	add ENGINE varchar(64) default '' not null;

alter table information_schema.TABLESPACES
	add TABLESPACE_TYPE varchar(64) default '' null;

alter table information_schema.TABLESPACES
	add LOGFILE_GROUP_NAME varchar(64) default '' null;

alter table information_schema.TABLESPACES
	add EXTENT_SIZE bigint unsigned default '' null;

alter table information_schema.TABLESPACES
	add AUTOEXTEND_SIZE bigint unsigned default '' null;

alter table information_schema.TABLESPACES
	add MAXIMUM_SIZE bigint unsigned default '' null;

alter table information_schema.TABLESPACES
	add NODEGROUP_ID bigint unsigned default '' null;

alter table information_schema.TABLESPACES
	add TABLESPACE_COMMENT varchar(2048) default '' null;

