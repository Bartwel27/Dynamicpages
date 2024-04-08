-- create tables
create table users(
 id int(11) not null primary key auto_increment,
 username varchar(50) not null,
 myid varchar(50) not null,
 myimages varchar(50) not null,
 like varchar(10) not null
);

create table comments(
 id int(11) not null primary key auto_increment,
 username varchar(50) not null,
 userid varchar(50) not null,
 comment varchar(1500) not null
);
