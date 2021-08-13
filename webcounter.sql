Create database if not exists webcounter;

Create table if not exists webcounter(
id int(11) auto_increment primary key,
access_page varchar(255) not null unique,
access_counter int(11)
);
