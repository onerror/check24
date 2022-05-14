alter table information_schema.FILES
	add FILE_ID bigint null;

alter table information_schema.FILES
	add FILE_NAME text collate utf8_bin null;

alter table information_schema.FILES
	add FILE_TYPE varchar(256) null;

alter table information_schema.FILES
	add TABLESPACE_NAME varchar(268) collate utf8_bin not null;

alter table information_schema.FILES
	add TABLE_CATALOG char(0) default '' not null;

alter table information_schema.FILES
	add TABLE_SCHEMA binary(0) null;

alter table information_schema.FILES
	add TABLE_NAME binary(0) null;

alter table information_schema.FILES
	add LOGFILE_GROUP_NAME varchar(256) null;

alter table information_schema.FILES
	add LOGFILE_GROUP_NUMBER bigint null;

alter table information_schema.FILES
	add ENGINE varchar(64) not null;

alter table information_schema.FILES
	add FULLTEXT_KEYS binary(0) null;

alter table information_schema.FILES
	add DELETED_ROWS binary(0) null;

alter table information_schema.FILES
	add UPDATE_COUNT binary(0) null;

alter table information_schema.FILES
	add FREE_EXTENTS bigint null;

alter table information_schema.FILES
	add TOTAL_EXTENTS bigint null;

alter table information_schema.FILES
	add EXTENT_SIZE bigint null;

alter table information_schema.FILES
	add INITIAL_SIZE bigint null;

alter table information_schema.FILES
	add MAXIMUM_SIZE bigint null;

alter table information_schema.FILES
	add AUTOEXTEND_SIZE bigint null;

alter table information_schema.FILES
	add CREATION_TIME binary(0) null;

alter table information_schema.FILES
	add LAST_UPDATE_TIME binary(0) null;

alter table information_schema.FILES
	add LAST_ACCESS_TIME binary(0) null;

alter table information_schema.FILES
	add RECOVER_TIME binary(0) null;

alter table information_schema.FILES
	add TRANSACTION_COUNTER binary(0) null;

alter table information_schema.FILES
	add VERSION bigint null;

alter table information_schema.FILES
	add ROW_FORMAT varchar(256) null;

alter table information_schema.FILES
	add TABLE_ROWS binary(0) null;

alter table information_schema.FILES
	add AVG_ROW_LENGTH binary(0) null;

alter table information_schema.FILES
	add DATA_LENGTH binary(0) null;

alter table information_schema.FILES
	add MAX_DATA_LENGTH binary(0) null;

alter table information_schema.FILES
	add INDEX_LENGTH binary(0) null;

alter table information_schema.FILES
	add DATA_FREE bigint null;

alter table information_schema.FILES
	add CREATE_TIME binary(0) null;

alter table information_schema.FILES
	add UPDATE_TIME binary(0) null;

alter table information_schema.FILES
	add CHECK_TIME binary(0) null;

alter table information_schema.FILES
	add CHECKSUM binary(0) null;

alter table information_schema.FILES
	add STATUS varchar(256) null;

alter table information_schema.FILES
	add EXTRA varchar(256) null;

