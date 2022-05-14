alter table information_schema.ENGINES
	add ENGINE varchar(64) default '' not null;

alter table information_schema.ENGINES
	add SUPPORT varchar(8) default '' not null;

alter table information_schema.ENGINES
	add COMMENT varchar(80) default '' not null;

alter table information_schema.ENGINES
	add TRANSACTIONS varchar(3) default '' null;

alter table information_schema.ENGINES
	add XA varchar(3) default '' null;

alter table information_schema.ENGINES
	add SAVEPOINTS varchar(3) default '' null;

