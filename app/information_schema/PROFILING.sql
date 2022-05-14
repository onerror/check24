alter table information_schema.PROFILING
	add QUERY_ID int not null;

alter table information_schema.PROFILING
	add SEQ int not null;

alter table information_schema.PROFILING
	add STATE varchar(30) default '' not null;

alter table information_schema.PROFILING
	add DURATION decimal(905) not null;

alter table information_schema.PROFILING
	add CPU_USER decimal(905) null;

alter table information_schema.PROFILING
	add CPU_SYSTEM decimal(905) null;

alter table information_schema.PROFILING
	add CONTEXT_VOLUNTARY int null;

alter table information_schema.PROFILING
	add CONTEXT_INVOLUNTARY int null;

alter table information_schema.PROFILING
	add BLOCK_OPS_IN int null;

alter table information_schema.PROFILING
	add BLOCK_OPS_OUT int null;

alter table information_schema.PROFILING
	add MESSAGES_SENT int null;

alter table information_schema.PROFILING
	add MESSAGES_RECEIVED int null;

alter table information_schema.PROFILING
	add PAGE_FAULTS_MAJOR int null;

alter table information_schema.PROFILING
	add PAGE_FAULTS_MINOR int null;

alter table information_schema.PROFILING
	add SWAPS int null;

alter table information_schema.PROFILING
	add SOURCE_FUNCTION varchar(30) default '' null;

alter table information_schema.PROFILING
	add SOURCE_FILE varchar(20) default '' null;

alter table information_schema.PROFILING
	add SOURCE_LINE int null;

