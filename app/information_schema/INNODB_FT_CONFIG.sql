alter table information_schema.INNODB_FT_CONFIG
	add `KEY` varchar(193) default '' not null;

alter table information_schema.INNODB_FT_CONFIG
	add VALUE varchar(193) default '' not null;

