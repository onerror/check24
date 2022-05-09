create table users
(
	id                int auto_increment
		primary key,
	login             varchar(64)         not null,
	real_name         varchar(64) null,
	pass              varchar(64)         not null,
	registration_date timestamp default CURRENT_TIMESTAMP null,
	status            int       default 1 not null,
	constraint users_login_uindex
		unique (login)
);

create table articles
(
	id           int auto_increment
		primary key,
	title        varchar(64)         not null,
	content      text null,
	author_id    int                 not null,
	date_created timestamp default CURRENT_TIMESTAMP null,
	status       int       default 1 not null,
	picture_url  varchar(128) null,
	constraint articles_users_id_fk
		foreign key (author_id) references users (id)
			on update cascade
);

create table comments
(
	id           int auto_increment
		primary key,
	content      text                                not null,
	date_created timestamp default CURRENT_TIMESTAMP not null,
	article_id   int null,
	author_id    int null,
	status       int       default 1                 not null,
	email        varchar(64) null,
	title        varchar(64)                         not null,
	constraint comments_articles_id_fk
		foreign key (article_id) references articles (id)
			on update cascade,
	constraint comments_users_id_fk
		foreign key (author_id) references users (id)
			on update cascade
);

