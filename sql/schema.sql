-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2021-11-18 21:37:52.077

-- tables
-- Table: Product
CREATE TABLE Product (
    id_product int NOT NULL,
    id_category_product int NOT NULL,
    id_provider int NOT NULL,
    price decimal(8,2) NOT NULL,
    stock int NOT NULL,
    CONSTRAINT Product_pk PRIMARY KEY (id_product)
);

-- Table: Provider
CREATE TABLE Provider (
    id_provider int NOT NULL,
    name varchar(50) NOT NULL,
    address varchar(50) NOT NULL,
    city varchar(50) NOT NULL,
    supplies varchar(50) NOT NULL,
    category_provider_id int NOT NULL,
    CONSTRAINT Provider_pk PRIMARY KEY (id_provider)
);

-- Table: category_product
CREATE TABLE category_product (
    id_category_provider int NOT NULL,
    name varchar(50) NOT NULL,
    CONSTRAINT category_product_pk PRIMARY KEY (id_category_provider)
);

-- Table: category_provider
CREATE TABLE category_provider (
    id_cat_provider int NOT NULL,
    name varchar(50) NOT NULL,
    CONSTRAINT category_provider_pk PRIMARY KEY (id_cat_provider)
);

-- Table: customer
CREATE TABLE customer (
    id_customer int NOT NULL,
    type varchar(30) NOT NULL,
    name varchar(50) NOT NULL,
    address varchar(50) NOT NULL,
    city varchar(30) NOT NULL,
    phone int NOT NULL,
    CONSTRAINT customer_pk PRIMARY KEY (id_customer)
);

-- Table: customer_account
CREATE TABLE customer_account (
    id_item int NOT NULL,
    id_customer int NOT NULL,
    id_sale int NOT NULL,
    date date NOT NULL,
    item varchar(30) NOT NULL,
    rate decimal(8,2) NOT NULL,
    cancel bool NOT NULL,
    status bool NOT NULL,
    comment varchar(50) NULL,
    CONSTRAINT customer_account_pk PRIMARY KEY (id_item)
);

-- Table: inbox
CREATE TABLE inbox (
    id_message int NOT NULL,
    id_sender int NOT NULL,
    id_recipient int NOT NULL,
    message varchar(500) NOT NULL,
    sent bool NOT NULL,
    CONSTRAINT inbox_pk PRIMARY KEY (id_message)
);

-- Table: memo
CREATE TABLE memo (
    id_user int NOT NULL,
    memo varchar(500) NOT NULL,
    done bool NOT NULL,
    date date NOT NULL,
    CONSTRAINT memo_pk PRIMARY KEY (id_user)
);

-- Table: message
CREATE TABLE message (
    id_message int NOT NULL,
    message varchar(500) NOT NULL,
    date date NOT NULL,
    id_recipient int NOT NULL,
    id_sender int NOT NULL,
    CONSTRAINT message_pk PRIMARY KEY (id_message)
);

-- Table: payment
CREATE TABLE payment (
    id_payment int NOT NULL,
    id_payment_method int NOT NULL,
    id_item int NOT NULL,
    id_customer int NOT NULL,
    date date NOT NULL,
    rate decimal(8,2) NOT NULL,
    total decimal(8,2) NOT NULL,
    card_number int NULL,
    CONSTRAINT payment_pk PRIMARY KEY (id_payment)
);

-- Table: payment_method
CREATE TABLE payment_method (
    id_payment_method int NOT NULL,
    payment_method_name varchar(50) NOT NULL,
    CONSTRAINT payment_method_pk PRIMARY KEY (id_payment_method)
);

-- Table: raw_material
CREATE TABLE raw_material (
    id_raw_material int NOT NULL,
    price decimal(8,2) NOT NULL,
    date_purchase date NOT NULL,
    id_provider int NOT NULL
);

-- Table: sale
CREATE TABLE sale (
    id_sale int NOT NULL,
    id_seller int NOT NULL,
    id_customer int NOT NULL,
    id_product int NOT NULL,
    discount float(3,2) NOT NULL,
    total_amount decimal(8,2) NOT NULL,
    date date NOT NULL,
    CONSTRAINT sale_pk PRIMARY KEY (id_sale)
);

-- Table: seller
CREATE TABLE seller (
    id_seller int NOT NULL,
    id_user int NOT NULL,
    name varchar(50) NOT NULL,
    address varchar(50) NOT NULL,
    city varchar(50) NOT NULL,
    phone int NOT NULL,
    CONSTRAINT seller_pk PRIMARY KEY (id_seller)
);

-- Table: user
CREATE TABLE user (
    id_user int NOT NULL,
    user_name varchar(30) NOT NULL,
    user_lastname varchar(30) NOT NULL,
    email varchar(30) NOT NULL,
    password varchar(255) NOT NULL,
    status bool NOT NULL,
    role char(1) NOT NULL,
    CONSTRAINT user_pk PRIMARY KEY (id_user)
);

-- foreign keys
-- Reference: Product_category_product (table: Product)
ALTER TABLE Product ADD CONSTRAINT Product_category_product FOREIGN KEY Product_category_product (id_category_product)
    REFERENCES category_product (id_category_provider);

-- Reference: Provider_category_provider (table: Provider)
ALTER TABLE Provider ADD CONSTRAINT Provider_category_provider FOREIGN KEY Provider_category_provider (category_provider_id)
    REFERENCES category_provider (id_cat_provider);

-- Reference: customer_account_customer (table: customer_account)
ALTER TABLE customer_account ADD CONSTRAINT customer_account_customer FOREIGN KEY customer_account_customer (id_customer)
    REFERENCES customer (id_customer);

-- Reference: customer_account_sale (table: customer_account)
ALTER TABLE customer_account ADD CONSTRAINT customer_account_sale FOREIGN KEY customer_account_sale (id_sale)
    REFERENCES sale (id_sale);

-- Reference: inbox_message (table: inbox)
ALTER TABLE inbox ADD CONSTRAINT inbox_message FOREIGN KEY inbox_message (id_message)
    REFERENCES message (id_message);

-- Reference: memo_user (table: memo)
ALTER TABLE memo ADD CONSTRAINT memo_user FOREIGN KEY memo_user (id_user)
    REFERENCES user (id_user);

-- Reference: message_user (table: message)
ALTER TABLE message ADD CONSTRAINT message_user FOREIGN KEY message_user (id_recipient,id_sender)
    REFERENCES user (id_user,id_user);

-- Reference: payment_customer (table: payment)
ALTER TABLE payment ADD CONSTRAINT payment_customer FOREIGN KEY payment_customer (id_customer)
    REFERENCES customer (id_customer);

-- Reference: payment_customer_account (table: payment)
ALTER TABLE payment ADD CONSTRAINT payment_customer_account FOREIGN KEY payment_customer_account (id_item)
    REFERENCES customer_account (id_item);

-- Reference: payment_payment_method (table: payment)
ALTER TABLE payment ADD CONSTRAINT payment_payment_method FOREIGN KEY payment_payment_method (id_payment_method)
    REFERENCES payment_method (id_payment_method);

-- Reference: raw_material_Provider (table: raw_material)
ALTER TABLE raw_material ADD CONSTRAINT raw_material_Provider FOREIGN KEY raw_material_Provider (id_provider)
    REFERENCES Provider (id_provider);

-- Reference: sale_Product (table: sale)
ALTER TABLE sale ADD CONSTRAINT sale_Product FOREIGN KEY sale_Product (id_product)
    REFERENCES Product (id_product);

-- Reference: sale_customer (table: sale)
ALTER TABLE sale ADD CONSTRAINT sale_customer FOREIGN KEY sale_customer (id_customer)
    REFERENCES customer (id_customer);

-- Reference: sale_seller (table: sale)
ALTER TABLE sale ADD CONSTRAINT sale_seller FOREIGN KEY sale_seller (id_seller)
    REFERENCES seller (id_seller);

-- Reference: seller_user (table: seller)
ALTER TABLE seller ADD CONSTRAINT seller_user FOREIGN KEY seller_user (id_user)
    REFERENCES user (id_user);

-- End of file.

