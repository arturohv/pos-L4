create database taranis

go

use taranis

CREATE TABLE product(
	id INT IDENTITY(1,1) NOT NULL ,
	barcode VARCHAR(40) ,
	internal_code VARCHAR(40) ,
	product_type_id INTEGER NOT NULL ,
	model_number VARCHAR(40) ,
	product_name VARCHAR(60) ,
	description TEXT ,
	cost_price DECIMAL(19,4) NOT NULL DEFAULT 0,	
	tax_group_id INTEGER NOT NULL ,
	measure_unit_id INTEGER NOT NULL ,
	is_active BIT DEFAULT 1 ,
	is_visible BIT DEFAULT 1 ,	 
	PRIMARY KEY (id),
	UNIQUE(barcode,internal_code)

);

CREATE TABLE document_type(
	id INT IDENTITY(1,1) NOT NULL ,
	document_name VARCHAR(60) ,
	description TEXT ,
	PRIMARY KEY (id)
);

CREATE TABLE store(
	id INT IDENTITY(1,1) NOT NULL ,
	store_name VARCHAR(40) ,
	is_default BIT DEFAULT 0 ,
	PRIMARY KEY (id)
);

 CREATE TABLE price_list_type(
	id INT IDENTITY(1,1) NOT NULL ,
	price_list_type_name VARCHAR(40) ,
	is_default BIT DEFAULT 0 ,
	PRIMARY KEY (id) 
 );
 

CREATE TABLE price_list_product(
	id INT IDENTITY(1,1) NOT NULL ,	
	product_id INTEGER NOT NULL ,
	price_list_type_id INTEGER NOT NULL ,	
	sell_price DECIMAL(19,4) NOT NULL DEFAULT 0,
	discount_max DECIMAL(19,4) DEFAULT 0 ,	
	PRIMARY KEY (id) ,
	UNIQUE(product_id,price_list_type_id) 	
);

CREATE TABLE stock_level_product(
	id INT IDENTITY(1,1) NOT NULL ,
	store_id INTEGER NOT NULL ,
	product_id INTEGER NOT NULL ,
	stock_max DECIMAL(19,4) DEFAULT 0 ,
	stock_min	DECIMAL(19,4) DEFAULT 0 ,	
	PRIMARY KEY (id) ,
	UNIQUE(product_id,store_id)
);

CREATE TABLE inventory(
	id INT IDENTITY(1,1) NOT NULL ,
	store_id INTEGER NOT NULL ,
	product_id INTEGER NOT NULL ,
	document_type_id INTEGER NOT NULL ,
	document_number INTEGER NOT NULL ,		
	user_id INTEGER NOT NULL,
	amount_in DECIMAL(19,4) DEFAULT 0, 
	amount_out DECIMAL(19,4) DEFAULT 0,
	balance DECIMAL(19,4) DEFAULT 0 ,
	registration_date DATETIME DEFAULT GETDATE() ,	 
	PRIMARY KEY (id)
	
);

CREATE TABLE measure_unit(
	id INT IDENTITY(1,1) NOT NULL ,
	measure_unit_name VARCHAR(30) NOT NULL ,
	symbol VARCHAR(10) NOT NULL ,	
	PRIMARY KEY (id)	
);

CREATE TABLE product_type(
	id INT IDENTITY(1,1) NOT NULL ,
	product_type_name VARCHAR(30) NOT NULL ,	
	PRIMARY KEY (id)	
);

CREATE TABLE tax_type(
	id INT IDENTITY(1,1) NOT NULL ,
	tax_type_name VARCHAR(30) NOT NULL ,
	percentage NUMERIC NOT NULL ,
	PRIMARY KEY (id)	
);

CREATE TABLE tax_group(
	id INT IDENTITY(1,1) NOT NULL ,
	tax_group_name VARCHAR(30) NOT NULL ,
	tax_type_id INTEGER NOT NULL ,	
	PRIMARY KEY (id)
);

CREATE TABLE person(
	id INT IDENTITY(1,1) NOT NULL ,
	person_type_id INTEGER NOT NULL,
	nip VARCHAR(30) NOT NULL ,
	first_name VARCHAR(60) NOT NULL ,
	last_name VARCHAR(40) ,
	PRIMARY KEY (id),
	UNIQUE(nip)	
);

CREATE TABLE person_type(
	id INT IDENTITY(1,1) NOT NULL ,
	person_type_name VARCHAR(50) NOT NULL ,	
	PRIMARY KEY (id)
);

CREATE TABLE address_type(
	id INT IDENTITY(1,1) NOT NULL ,
	address_type_name VARCHAR(40) NOT NULL ,
	PRIMARY KEY (id)
);

CREATE TABLE person_address(
	id INT IDENTITY(1,1) NOT NULL ,
	address_type_id INTEGER NOT NULL ,
	person_id INTEGER NOT NULL ,
	address_line_1 VARCHAR(100) NOT NULL ,
	address_line_2 VARCHAR(100) ,
	city VARCHAR(60) NOT NULL ,
	province VARCHAR(60) NOT NULL ,
	country VARCHAR(60) NOT NULL ,
	PRIMARY KEY (id)
);

CREATE TABLE phone_type(
	id INT IDENTITY(1,1) NOT NULL ,
	phone_type_name VARCHAR(40) NOT NULL ,
	PRIMARY KEY (id)
);

CREATE TABLE person_phones(
	id INT IDENTITY(1,1) NOT NULL ,
	phone_type_id INTEGER NOT NULL ,
	person_id INTEGER NOT NULL ,
	phone_number VARCHAR(60) NOT NULL, 
	PRIMARY KEY (id),
	UNIQUE(phone_type_id)	
);

CREATE TABLE customer (
	id INTEGER NOT NULL ,	
	email VARCHAR(60) NOT NULL ,
	company VARCHAR(60) ,
	credit_max DECIMAL(19,4) DEFAULT 0 , 
	is_active BIT DEFAULT 1 ,
	price_list_type_id INT NOT NULL,
	PRIMARY KEY (id),
	UNIQUE(email)
);


CREATE TABLE order_detail (
	id INT IDENTITY(1,1) NOT NULL ,
	order_id INTEGER NOT NULL ,
	product_id INTEGER NOT NULL ,
	quantity DECIMAL(19,4) NOT NULL ,
	unit_price DECIMAL(19,4) NOT NULL CHECK (unit_price > 0),
	PRIMARY KEY (id)
);

CREATE TABLE document_status(
	id INT IDENTITY(1,1) NOT NULL ,
	status_name VARCHAR(30) ,	
	PRIMARY KEY (id)
);

CREATE TABLE order_header (
	id INT IDENTITY(1,1) NOT NULL ,
	customer_id INTEGER NOT NULL ,
	user_id INTEGER NOT NULL , 
	status_id INTEGER NOT NULL ,
	order_date DATETIME DEFAULT GETDATE() ,
	notes TEXT ,	
	PRIMARY KEY (id)
);

CREATE TABLE invoice_header(
	id INT IDENTITY(1,1) NOT NULL ,
	/*order_id INTEGER NOT NULL ,*/
	customer_id INTEGER NOT NULL ,
	user_id INTEGER NOT NULL ,
	status_id INTEGER NOT NULL ,
	invoice_date DATETIME DEFAULT GETDATE() ,
	notes TEXT ,
	terms_conditions TEXT ,
	PRIMARY KEY (id) 
);

CREATE TABLE invoice_detail(
	id INT IDENTITY(1,1) NOT NULL ,
	invoice_id INTEGER NOT NULL ,
	/*order_detail_id INTEGER NOT NULL*/ ,
	order_id INTEGER NOT NULL ,
	PRIMARY KEY(id) ,
	UNIQUE(invoice_id, order_detail_id)
);

CREATE TABLE category (
	id INT IDENTITY(1,1) NOT NULL ,
	category_name VARCHAR(60) NOT NULL ,
	image_url VARCHAR(100) ,
	is_active BIT DEFAULT 1,
	PRIMARY KEY (id)
);

CREATE TABLE class (
	id INT IDENTITY(1,1) NOT NULL ,
	category_id INTEGER NOT NULL,
	class_name VARCHAR(60) NOT NULL ,
	image_url VARCHAR(100),	
	PRIMARY KEY (id)
);

CREATE TABLE product_classification (
	id INT IDENTITY(1,1) NOT NULL ,
	product_id INTEGER NOT NULL ,
	category_id INTEGER NOT NULL ,
	class_id INTEGER NOT NULL ,	
	PRIMARY KEY (id),
	UNIQUE(product_id,category_id,class_id)
);

CREATE TABLE product_images (
	id INT IDENTITY(1,1) NOT NULL ,
	product_id INTEGER NOT NULL ,
	image_url VARCHAR(100) NOT NULL ,
	is_default BIT DEFAULT 0 ,
	PRIMARY KEY (id)
);

CREATE TABLE "user" (
	id INTEGER NOT NULL,
	user_name VARCHAR(60) NOT NULL ,
	email VARCHAR(60) NOT NULL ,
	password VARCHAR(60) NOT NULL,	  
	registration_date DATETIME DEFAULT GETDATE() ,
	is_active BIT NOT NULL  DEFAULT 0 ,
	is_admin BIT NOT NULL DEFAULT 0 ,
	PRIMARY KEY (id) ,
	UNIQUE(user_name,email)
);

CREATE TABLE permission(
	id INT IDENTITY(1,1) NOT NULL ,
	menu_id INTEGER NOT NULL ,
	window_name VARCHAR(100) NULL ,
	action_name VARCHAR(60) NULL ,
	description text ,
	PRIMARY KEY (id) ,
	UNIQUE(window_name,action_name)
);

CREATE TABLE "role"(
	id INT IDENTITY(1,1) NOT NULL ,
	role_name VARCHAR(60) NOT NULL ,	
	description text ,
	PRIMARY KEY (id) ,
	UNIQUE(role_name)
);

CREATE TABLE role_permission(
	id INT IDENTITY(1,1) NOT NULL ,
	role_id INTEGER NOT NULL ,	
	permission_id INTEGER NOT NULL ,
	PRIMARY KEY (id) ,
	UNIQUE(role_id,permission_id)
);

CREATE TABLE role_user(
	id INT IDENTITY(1,1) NOT NULL ,
	role_id INTEGER NOT NULL ,	
	user_id INTEGER NOT NULL ,
	PRIMARY KEY (id) ,
	UNIQUE(role_id,user_id)
);

CREATE TABLE main_menu(
	id INT IDENTITY(1,1) NOT NULL ,
	parent_id INTEGER NULL ,
	window_name VARCHAR(100) ,
	title VARCHAR (40) NOT NULL,
	description TEXT NULL,
	is_visible BIT DEFAULT 1,	
	PRIMARY KEY (id)
);

ALTER TABLE main_menu ADD constraint fk_main_menu_parent FOREIGN KEY (parent_id) REFERENCES main_menu (id);
/*user*/
ALTER TABLE "user" ADD constraint fk_user_person FOREIGN KEY (id) REFERENCES person (id);
/*product_images*/
ALTER TABLE product_images ADD constraint fk_product_images_product FOREIGN KEY (product_id) REFERENCES product (id);
/*order_header*/
ALTER TABLE order_header ADD constraint fk_order_header_customer FOREIGN KEY (customer_id) REFERENCES customer (id);
ALTER TABLE order_header ADD constraint fk_order_header_document_status FOREIGN KEY (status_id) REFERENCES document_status (id);
ALTER TABLE order_header ADD constraint fk_order_header_user FOREIGN KEY (user_id) REFERENCES "user" (id);
/*order_detail*/
ALTER TABLE order_detail ADD constraint fk_order_detail_order_header FOREIGN KEY (order_id) REFERENCES order_header (id);
ALTER TABLE order_detail ADD constraint fk_order_detail_product FOREIGN KEY (product_id) REFERENCES product (id);
/*invoice_header*/
ALTER TABLE invoice_header ADD constraint fk_invoice_header_customer FOREIGN KEY (customer_id) REFERENCES customer (id);
ALTER TABLE invoice_header ADD constraint fk_invoice_header_document_status FOREIGN KEY (status_id) REFERENCES document_status (id);
ALTER TABLE invoice_header ADD constraint fk_invoice_header_user FOREIGN KEY (user_id) REFERENCES "user" (id);
/*ALTER TABLE invoice_header ADD constraint fk_invoice_header_order FOREIGN KEY (order_id) REFERENCES order_header (id);*/
/*invoice_detail*/
ALTER TABLE invoice_detail ADD constraint fk_invoice_detail_invoice_header FOREIGN KEY (invoice_id) REFERENCES invoice_header (id);
ALTER TABLE invoice_detail ADD constraint fk_invoice_detail_order_header FOREIGN KEY (order_id) REFERENCES order_header (id);
/*Person*/
ALTER TABLE person ADD constraint fk_person_person_type FOREIGN KEY (person_type_id) REFERENCES person_type (id);
/*costumer*/
ALTER TABLE customer ADD constraint fk_customer_person FOREIGN KEY (id) REFERENCES person (id);

ALTER TABLE customer ADD constraint fk_customer_price_list_type FOREIGN KEY (price_list_type_id)
REFERENCES price_list_type (id);
/*person_phones*/
ALTER TABLE person_phones ADD constraint fk_person_phones_phone_type FOREIGN KEY (phone_type_id) REFERENCES phone_type (id);
ALTER TABLE person_phones ADD constraint fk_person_phones_person FOREIGN KEY (person_id) REFERENCES person (id);
/*person_address*/
ALTER TABLE person_address ADD constraint fk_person_address_address_type FOREIGN KEY (address_type_id) REFERENCES address_type (id);
ALTER TABLE person_address ADD constraint fk_person_address_person FOREIGN KEY (person_id) REFERENCES person (id);
/*class*/
ALTER TABLE class ADD constraint fk_class_category FOREIGN KEY (category_id) REFERENCES category (id);
/*product_classification*/
ALTER TABLE product_classification ADD constraint fk_product_classification_product FOREIGN KEY (product_id) REFERENCES product (id);
ALTER TABLE product_classification ADD constraint fk_product_classification_category FOREIGN KEY (category_id) REFERENCES category (id);
ALTER TABLE product_classification ADD constraint fk_product_classification_class FOREIGN KEY (class_id) REFERENCES class (id);
/*product*/
ALTER TABLE product ADD constraint fk_product_tax_group FOREIGN KEY (tax_group_id) REFERENCES tax_group (id);
ALTER TABLE product ADD constraint fk_product_product_type FOREIGN KEY (product_type_id) REFERENCES product_type (id);
ALTER TABLE product ADD constraint fk_product_measure_unit FOREIGN KEY (measure_unit_id) REFERENCES measure_unit (id);
/*tax_group*/
ALTER TABLE tax_group ADD constraint fk_tax_group_tax_type FOREIGN KEY (tax_type_id) REFERENCES tax_type (id);
/*role permission*/
ALTER TABLE role_permission ADD constraint fk_role_permission_role FOREIGN KEY (role_id) REFERENCES role (id);
ALTER TABLE role_permission ADD constraint fk_role_permission_permission FOREIGN KEY (permission_id) REFERENCES permission (id);					
/*role_user*/
ALTER TABLE role_user ADD constraint fk_role_user_role FOREIGN KEY (role_id) REFERENCES "role" (id);
ALTER TABLE role_user ADD constraint fk_role_user_user FOREIGN KEY (user_id) REFERENCES "user" (id);
/*inventory*/
ALTER TABLE inventory ADD constraint fk_inventory_store FOREIGN KEY (store_id) REFERENCES store (id);
ALTER TABLE inventory ADD constraint fk_inventory_product FOREIGN KEY (product_id) REFERENCES product (id);
ALTER TABLE inventory ADD constraint fk_inventory_document_type FOREIGN KEY (document_type_id) REFERENCES document_type (id);
ALTER TABLE inventory ADD constraint fk_inventory_user FOREIGN KEY (user_id) REFERENCES "user" (id);

/*permission*/
ALTER TABLE permission ADD constraint fk_permission_menu FOREIGN KEY (menu_id) REFERENCES main_menu (id);
/*price_list_product*/
ALTER TABLE price_list_product ADD constraint fk_price_list_product_product FOREIGN KEY (product_id)
REFERENCES product (id);

ALTER TABLE price_list_product ADD constraint fk_price_list_product_price_list_type FOREIGN KEY (price_list_type_id)
REFERENCES price_list_type (id);

/*stock_level_product*/
ALTER TABLE stock_level_product ADD constraint fk_stock_level_product_stock_level_product FOREIGN KEY (store_id)
REFERENCES store (id);

ALTER TABLE stock_level_product ADD constraint fk_stock_level_product_product FOREIGN KEY (product_id)
REFERENCES product (id);

/*Inserts measure_unit*/
insert into measure_unit (measure_unit_name, symbol) values ('Unidad','U');
insert into measure_unit (measure_unit_name, symbol) values ('Gramo','g');
/*Inserts product_type*/
insert into product_type (product_type_name) values ('Producto Simple');
insert into product_type (product_type_name) values ('Producto Compuesto');	
insert into product_type (product_type_name) values ('Servicio');
insert into product_type (product_type_name) values ('Ingrediente');
insert into product_type (product_type_name) values ('Insumo');
insert into product_type (product_type_name) values ('Conjunto de Productos Simples');
/*Inserts tax_type*/
insert into tax_type (tax_type_name, percentage) values ('Impuesto Venta',13);
insert into tax_type (tax_type_name, percentage) values ('Exento Impuesto',0);
insert into tax_type (tax_type_name, percentage) values ('Impuesto Servicio',10);
/*Inserts tax_group*/
insert into tax_group (tax_group_name, tax_type_id) values ('Gravado',1);
insert into tax_group (tax_group_name, tax_type_id) values ('Exento',2);
/*Inserts address_type*/
insert into address_type (address_type_name) values ('Residencia');
insert into address_type (address_type_name) values ('Trabajo');
/*Inserts phone_type*/
insert into phone_type (phone_type_name) values ('Residencial');
insert into phone_type (phone_type_name) values ('Móvil');
insert into phone_type (phone_type_name) values ('Trabajo');
/*Inserts document_status*/
insert into document_status (status_name) values ('Nuevo');
insert into document_status (status_name) values ('Parcialmente Procesada');
insert into document_status (status_name) values ('Procesada');
insert into document_status (status_name) values ('Impreso');
insert into document_status (status_name) values ('Anulado');
/*price_list_type*/
INSERT INTO price_list_type(price_list_type_name,is_default) VALUES ('Por Defecto',1);
INSERT INTO price_list_type(price_list_type_name,is_default) VALUES ('Frecuente',0);
INSERT INTO price_list_type(price_list_type_name,is_default) VALUES ('Mayorista',0);



/*Person Type*/	
insert into person_type (person_type_name) values ('Física');
insert into person_type (person_type_name) values ('Jurídica');
insert into person_type (person_type_name) values ('Extranjero');	