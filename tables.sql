create table  if not exists ci_sessions(
session_id  varchar(40) not null default 0,
ip_address  varchar(16) not null default 0,
user_agent  varchar(120) not null,
last_activity int(10) not null,
user_data text not null,
lastlogin timestamp not null default current_timestamp on update current_timestamp,
primary key (session_id),
key last_activity_idx (last_activity)
)engine=myisam default charset=utf8;

create table if not exists files(
file_id int(10) unsigned not null auto_increment,
name varchar(255) collate latin1_general_ci not null,
owner varchar(25) collate latin1_general_ci not null,
size double not null,
type char(5) collate latin1_general_ci not null,
time timestamp not null default current_timestamp on update current_timestamp,
primary key (file_id)
)engine=myisam default charset=latin1 collate=latin1_general_ci;

create table if not exists users(
uid int(11) not null auto_increment,
first_name  varchar(25) not null,
last_name  varchar(25) not null,
username varchar(25) not null,
password varchar(32) not null,
email varchar(50) not null,
primary key(uid),
unique key username (username)
)engine=myisam default charset=utf8;
