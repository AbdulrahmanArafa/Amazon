create database ONE_PLACE ;
use ONE_PLACE ;
go

CREATE TABLE COUSTOMERS  
(
	coustomer_id int identity(1,1) primary key ,--iden
	country varchar(20)  null,
	email varchar(30) unique not null,
	password varchar(30) not null,
	address varchar(40) null,	
	phone int unique not null,
	first_name varchar(10) not null,
	last_name varchar(10) not null,
	age numeric(2) check(age between 16 and 90) ,
	delivery_man_coustomer_no int
);

CREATE TABLE CATEGORY 
(
	category_id int identity(1,1) primary key,
	category_name varchar(30) not null,
	coustomer_no int,
	constraint coustomer_category_fk foreign key (coustomer_no)
	references COUSTOMERS(coustomer_id)
);

CREATE TABLE PRODUCTS 
(
	product_id int primary key,
	name varchar(30) not null,
	price int not null,
	model varchar(20) unique not null,
	category_no int ,
	seller_no int ,
	constraint category_product_fk foreign key (category_no) 
	references CATEGORY (category_id)
);

CREATE TABLE SELLER 
(
	seller_id int primary key,
	first_name varchar(10) not null,
	last_name varchar(10) not null,
	email varchar(30) unique not null,
	admin_no int,
	constraint admin_seller_fk foreign key (admin_no)
	references ADMIN(admin_id)
);

alter table PRODUCTS
add constraint seller_product_fk foreign key (seller_no)
references SELLER(seller_id);

CREATE TABLE ADMIN 
(
	admin_id int primary key,
	first_name varchar(10) not null,
	last_name varchar(10) not null,
	email varchar(30) unique not null
);

CREATE TABLE SHOPPING_CART 
(
	product_id int primary key,
	product_name varchar(30) unique,
	total_price int not null,
	payment_method varchar(30) not null,
	coustomer_no int ,
	delivery_man_shopping_no int,
	constraint coustomer_shopping_cart_fk foreign key (coustomer_no)
	references COUSTOMERS(coustomer_id)
);

CREATE TABLE DELIVERY_MAN 
(
	delivery_man_id int primary key,
	first_name varchar(20) not null ,
	last_name varchar(20) not null,
);

alter table SHOPPING_CART 
add constraint delivery_man_shopping_cart_fk foreign key (delivery_man_shopping_no)
references DELIVERY_MAN (delivery_man_id) ;

alter table COUSTOMERS
add constraint delivery_man_coustomer foreign key (delivery_man_coustomer_no)
references DELIVERY_MAN(delivery_man_id);