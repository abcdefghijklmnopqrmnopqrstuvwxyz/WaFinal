create database wa;
use wa;

/*============USER============*/
create table user(
	id int not null unique auto_increment,
	name varchar(20) not null unique,
	password varchar(255) not null check(length(password) > 5),
    email varchar(200) not null unique check(email like '%@%'),
    views int default 0,
    likes int default 0,
    dislikes int default 0,
    logs int default 0
);

/*==========ADD_USER==========*/
DELIMITER //

create procedure `add_user` (in namex varchar(20), in emailx varchar(200), in passwordx varchar(255), out success tinyint)
begin
	declare exist int default 0;
    
    select count(id) into exist from user where namex = name or emailx = email;
    
    if exist = 0
    then
		insert into user(name, email, password)
			values
				(namex, emailx, passwordx);

		set success = 1;
	else
		set success = 0;
	end if;
end //

DELIMITER ;

/*==========GET_STATS==========*/
DELIMITER //

create procedure `get_stats` (in emailx varchar(200), out namex varchar(20), out viewsx int, out likesx int, out dislikesx int, out logsx int)
begin
	set namex = (select name from user where email = emailx);
	set viewsx = (select views from user where email = emailx);
    set likesx = (select views from user where email = emailx);
    set dislikesx = (select views from user where email = emailx);
    set logsx = (select views from user where email = emailx);
end //

DELIMITER ;

/*==========GET_HASH==========*/
DELIMITER //

create procedure `get_hash` (in emailx varchar(200), out hashx varchar(255))
begin
	select password into hashx from user where email = emailx;
end //

DELIMITER ;

/*============LOGIN============*/
DELIMITER //

create procedure `login` (in emailx varchar(200), out logsuccess tinyint)
begin
	declare exist int default 0;
    
    select count(id) into exist from user where emailx = email and passwordx = password;
    
    if exist = 1
    then
		set logsuccess = 1;
	else
		set logsuccess = 0;
	end if;
end //

DELIMITER ;

/*=============================*/
drop table user;
drop procedure add_user;
drop procedure get_stats;
drop procedure login;
        
call add_user ('user10', 'user10@gmail.com', 'abc123', @success);
	
select * from user;