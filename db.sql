create database wa;
use wa;

create table user(
	id int not null unique auto_increment,
	name varchar(20) not null unique,
	password varchar(20) not null check(length(password) > 5),
    email varchar(50) not null unique check(email like '%@%'),
    views int default 0,
    likes int default 0,
    dislikes int default 0,
    logs int default 0
);


create procedure add_user (in name varchar(20), in email varchar(50), in password varchar(20))
	insert into user(name, email, password)
		values
			(name, email, password);

drop table user;
drop procedure add_user;

insert into user(name, password, email)
	values
		('user', 'abc123', 'user@gmail.com');
        
call add_user ('user2', 'user2@gmail.com', 'abcd1234');
        
select * from user;