create database shopping;
use shopping;

create table products (
item_code int(4) not null,
item_name varchar(50) not null,
description varchar(255) not null,
category varchar(50) not null,
quantity int(4) not null,
price float,
imagename varchar(50)
);


create table cart (
cart_sess char(50) not null,
cart_itmcode char(5) not null,
cart_qty int(3) not null,
cart_item_name varchar(50),
cart_price float
);

create table customers (
userid varchar(50) not null,
first_name varchar(50),
last_name varchar(50),
add1 varchar(255),
add2 varchar(255),
city varchar(50),
state varchar(50),
zipcode varchar(12),
emailid varchar(50),
password varchar(50),
phone_no varchar(50),
country varchar(50),
primary key(userid));


create table orders (
order_no int(4) not null auto_increment,
order_date date,
userid varchar(50),
shipping_address text,
shipping_city varchar(50),
shipping_state varchar(50),
shipping_country varchar(50),
paymode varchar(50),
shipping_zipcode varchar(15),
primary key (order_no));


create table orders_details (
order_no int(4) not null,
item_code int(4) not null,
item_name varchar(50) not null,
quantity int(4) not null,
price float
);


insert into products(item_code, item_name, description, category, quantity, price, imagename) values(101, 'C1001', 'This is the best Camera of Model C1001', 'Camera', 100, 2200, 'images/101.jpg'); 

insert into products(item_code, item_name, description, category, quantity, price, imagename) values(102, 'C1002', 'This is the best Camera of Model C1002', 'Camera', 100, 4500, 'images/102.jpg'); 

insert into products(item_code, item_name, description, category, quantity, price, imagename) values(103, 'C1003', 'This is the best Camera of Model C1003', 'Camera', 100, 6500, 'images/103.jpg'); 

insert into products(item_code, item_name, description, category, quantity, price, imagename) values(104, 'C1004', 'This is the best Camera of Model C1004', 'Camera', 100, 5300, 'images/104.jpg'); 

insert into products(item_code, item_name, description, category, quantity, price, imagename) values(201, 'M1001', 'This is the best Mobile of Model M1001', 'Mobile', 100, 2800, 'images/201.jpg'); 

insert into products(item_code, item_name, description, category, quantity, price, imagename) values(202, 'M1002', 'This is the best Mobile of Model M1002', 'Mobile', 100, 2200, 'images/202.jpg'); 

insert into products(item_code, item_name, description, category, quantity, price, imagename) values(203, 'M1003', 'This is the best Mobile of Model M1003', 'Mobile', 100, 3500, 'images/203.jpg'); 

insert into products(item_code, item_name, description, category, quantity, price, imagename) values(204, 'M1004', 'This is the best Mobile of Model M1004', 'Mobile', 100, 5700, 'images/204.jpg'); 

insert into products(item_code, item_name, description, category, quantity, price, imagename) values(301, 'Master Unix Shell Programming', 'This is the best book of Unix Shell Programming', 'Book', 100, 140, 'images/301.jpg'); 

insert into products(item_code, item_name, description, category, quantity, price, imagename) values(302, 'Data Structures Through C', 'This is the best book for learning Data Structures in C Programming Language', 'Book', 100, 200, 'images/302.jpg'); 

insert into products(item_code, item_name, description, category, quantity, price, imagename) values(303, 'Business Systems', 'This is the best book for learning Business Systems in Foxpro', 'Book', 100, 120, 'images/303.jpg'); 


insert into products(item_code, item_name, description, category, quantity, price, imagename) values(304, 'Programming & Problem Solving Through C', 'This is the best book for learning Programming and problem Solving through C language', 'Book', 100, 180, 'images/304.jpg'); 

