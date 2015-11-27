drop table if exists Cookies;
create table Cookies
( CookieID int unsigned not null auto_increment primary key,
Cookie varchar(50),
Brand varchar(50),
Calories int(7),
Description text
);
insert into Cookies values (NULL,"Oreo","Nabisco",160,"Two chocolate waffers with cream in between.");

