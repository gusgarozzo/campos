-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2021-11-19 04:38:54.132

-- tables
-- Table: category_provider
CREATE TABLE category_provider (
    id_cat_provider int NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    CONSTRAINT category_provider_pk PRIMARY KEY (id_cat_provider)
);

-- Table: customer
CREATE TABLE customer (
    id_customer int NOT NULL AUTO_INCREMENT,
    kind varchar(30) NOT NULL,
    name varchar(50) NOT NULL,
    email varchar(30) NOT NULL,
    address varchar(50) NOT NULL,
    city varchar(30) NOT NULL,
    phone int NOT NULL,
    status bool NOT NULL,
    CONSTRAINT customer_pk PRIMARY KEY (id_customer)
);

-- Table: customer_account
CREATE TABLE customer_account (
    id_customer_account int NOT NULL AUTO_INCREMENT,
    id_customer int NOT NULL,
    id_user int NOT NULL,
    id_sale_bill int NOT NULL,
    date date NOT NULL,
    status bool NOT NULL,
    comment varchar(50) NULL,
    CONSTRAINT customer_account_pk PRIMARY KEY (id_customer_account)
) COMMENT 'total_due se calcula a traves de consulta en sale_bill con items en status 0 (impago)';

-- Table: customer_payment
CREATE TABLE customer_payment (
    id_customer_payment int NOT NULL AUTO_INCREMENT,
    id_payment_method int NOT NULL,
    id_customer int NOT NULL,
    date date NOT NULL,
    total decimal(8,2) NOT NULL,
    cancel bool NOT NULL,
    card_number int NULL,
    CONSTRAINT payment_pk PRIMARY KEY (id_customer_payment)
);

-- Table: inbox
CREATE TABLE inbox (
    id_message int NOT NULL AUTO_INCREMENT,
    id_sender int NOT NULL,
    id_recipient int NOT NULL,
    message varchar(500) NOT NULL,
    date date NOT NULL,
    seen bool NOT NULL,
    CONSTRAINT inbox_pk PRIMARY KEY (id_message)
);

-- Table: memo
CREATE TABLE memo (
    id_memo int NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL,
    memo varchar(500) NOT NULL,
    done bool NOT NULL,
    date date NOT NULL,
    CONSTRAINT memo_pk PRIMARY KEY (id_memo)
);

-- Table: message
CREATE TABLE message (
    id_message int NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL,
    message varchar(500) NOT NULL,
    date date NOT NULL,
    CONSTRAINT message_pk PRIMARY KEY (id_message)
);

-- Table: onsale_category_product
CREATE TABLE onsale_category_product (
    id_onsale_category_product int NOT NULL AUTO_INCREMENT,
    category_name varchar(50) NOT NULL,
    CONSTRAINT onsale_category_product_pk PRIMARY KEY (id_onsale_category_product)
);

-- Table: onsale_product
CREATE TABLE onsale_product (
    id_onsale_product int NOT NULL AUTO_INCREMENT,
    sale_category_product_id int NOT NULL,
    product_name varchar(50) NOT NULL,
    price decimal(8,2) NOT NULL,
    stock int NOT NULL,
    min_stock int NOT NULL,
    status bool NOT NULL,
    CONSTRAINT onsale_product_pk PRIMARY KEY (id_onsale_product)
);

-- Table: payment_method
CREATE TABLE payment_method (
    id_payment_method int NOT NULL AUTO_INCREMENT,
    payment_method_name varchar(50) NOT NULL,
    status bool NOT NULL,
    comment varchar(50) NULL,
    CONSTRAINT payment_method_pk PRIMARY KEY (id_payment_method)
);

-- Table: provider
CREATE TABLE provider (
    id_provider int NOT NULL AUTO_INCREMENT,
    id_cat_provider int NOT NULL,
    name varchar(50) NOT NULL,
    email varchar(30) NOT NULL,
    phone int NOT NULL,
    address varchar(50) NOT NULL,
    city varchar(50) NOT NULL,
    comment int NULL,
    CONSTRAINT Provider_pk PRIMARY KEY (id_provider)
);

-- Table: provider_bill
CREATE TABLE provider_bill (
    id_provider_bill int NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL,
    id_provider int NOT NULL,
    date date NOT NULL,
    payment_status bool NOT NULL,
    comment varchar(255) NULL,
    CONSTRAINT provider_bill_pk PRIMARY KEY (id_provider_bill)
);

-- Table: provider_category_product
CREATE TABLE provider_category_product (
    id_category_product int NOT NULL AUTO_INCREMENT,
    category_name varchar(50) NOT NULL,
    CONSTRAINT category_product_pk PRIMARY KEY (id_category_product)
);

-- Table: provider_payment
CREATE TABLE provider_payment (
    id_provider_payment int NOT NULL AUTO_INCREMENT,
    id_payment_method int NOT NULL,
    id_provider int NOT NULL,
    id_user int NOT NULL,
    date date NOT NULL,
    total decimal(8,2) NOT NULL,
    cancel bool NOT NULL,
    provider_bill varchar(250) NOT NULL,
    CONSTRAINT provider_payment_pk PRIMARY KEY (id_provider_payment)
) COMMENT 'Agregar facturas pagadas a columna provider_bill en forma de strings concatenados?';

-- Table: provider_product
CREATE TABLE provider_product (
    id_provider_product int NOT NULL AUTO_INCREMENT,
    id_provider_category_product int NOT NULL,
    id_provider int NOT NULL,
    product_name varchar(50) NOT NULL,
    price decimal(8,2) NOT NULL,
    stock int NOT NULL,
    min_stock int NOT NULL,
    CONSTRAINT Product_pk PRIMARY KEY (id_provider_product)
);

-- Table: sale_bill
CREATE TABLE sale_bill (
    id_sale_bill int NOT NULL AUTO_INCREMENT,
    id_customer int NOT NULL,
    id_user int NOT NULL,
    id_onsale_product int NOT NULL,
    total decimal(8,2) NOT NULL,
    date date NOT NULL,
    status bool NOT NULL,
    cancel bool NOT NULL,
    comment varchar(200) NULL,
    discount float(3,2) NULL,
    CONSTRAINT sale_pk PRIMARY KEY (id_sale_bill)
) COMMENT 'ID_ONSALE_BILL no tiene que ser autoincremental, ya que para llenar la factura vamos a tener que iterar la consulta e ir agregando, si generamos un nuevo id cada vez que hacemos insert no meteríamos todos los productos en una misma factura. ';

-- Table: testing_product
CREATE TABLE testing_product (
    id_testing_product int NOT NULL AUTO_INCREMENT,
    product_name varchar(50) NOT NULL,
    lote int NOT NULL,
    date date NOT NULL,
    comment varchar(255) NULL,
    CONSTRAINT testing_product_pk PRIMARY KEY (id_testing_product)
);

-- Table: user
CREATE TABLE user (
    id_user int NOT NULL AUTO_INCREMENT,
    user_name varchar(30) NOT NULL,
    user_lastname varchar(30) NOT NULL,
    email varchar(30) NOT NULL,
    password varchar(255) NOT NULL,
    status bool NOT NULL,
    role char(1) NOT NULL,
    CONSTRAINT user_pk PRIMARY KEY (id_user)
);

-- foreign keys
-- Reference: customer_account_customer (table: customer_account)
ALTER TABLE customer_account ADD CONSTRAINT customer_account_customer FOREIGN KEY customer_account_customer (id_customer)
    REFERENCES customer (id_customer);

-- Reference: customer_account_user (table: customer_account)
ALTER TABLE customer_account ADD CONSTRAINT customer_account_user FOREIGN KEY customer_account_user (id_user)
    REFERENCES user (id_user);

-- Reference: inbox_message (table: inbox)
ALTER TABLE inbox ADD CONSTRAINT inbox_message FOREIGN KEY inbox_message (id_message)
    REFERENCES message (id_message);

-- Reference: memo_user (table: memo)
ALTER TABLE memo ADD CONSTRAINT memo_user FOREIGN KEY memo_user (id_user)
    REFERENCES user (id_user);

-- Reference: message_user (table: message)
ALTER TABLE message ADD CONSTRAINT message_user FOREIGN KEY message_user (id_user)
    REFERENCES user (id_user);

-- Reference: payment_customer (table: customer_payment)
ALTER TABLE customer_payment ADD CONSTRAINT payment_customer FOREIGN KEY payment_customer (id_customer)
    REFERENCES customer (id_customer);

-- Reference: payment_payment_method (table: customer_payment)
ALTER TABLE customer_payment ADD CONSTRAINT payment_payment_method FOREIGN KEY payment_payment_method (id_payment_method)
    REFERENCES payment_method (id_payment_method);

-- Reference: product_sale_category_product (table: onsale_product)
ALTER TABLE onsale_product ADD CONSTRAINT product_sale_category_product FOREIGN KEY product_sale_category_product (sale_category_product_id)
    REFERENCES onsale_category_product (id_onsale_category_product);

-- Reference: provider_bill_user (table: provider_bill)
ALTER TABLE provider_bill ADD CONSTRAINT provider_bill_user FOREIGN KEY provider_bill_user (id_user)
    REFERENCES user (id_user);

-- Reference: provider_bills_provider (table: provider_bill)
ALTER TABLE provider_bill ADD CONSTRAINT provider_bills_provider FOREIGN KEY provider_bills_provider (id_provider)
    REFERENCES provider (id_provider);

-- Reference: provider_category_provider (table: provider)
ALTER TABLE provider ADD CONSTRAINT provider_category_provider FOREIGN KEY provider_category_provider (id_cat_provider)
    REFERENCES category_provider (id_cat_provider);

-- Reference: provider_payment_payment_method (table: provider_payment)
ALTER TABLE provider_payment ADD CONSTRAINT provider_payment_payment_method FOREIGN KEY provider_payment_payment_method (id_payment_method)
    REFERENCES payment_method (id_payment_method);

-- Reference: provider_payment_provider (table: provider_payment)
ALTER TABLE provider_payment ADD CONSTRAINT provider_payment_provider FOREIGN KEY provider_payment_provider (id_provider)
    REFERENCES provider (id_provider);

-- Reference: provider_payment_user (table: provider_payment)
ALTER TABLE provider_payment ADD CONSTRAINT provider_payment_user FOREIGN KEY provider_payment_user (id_user)
    REFERENCES user (id_user);

-- Reference: provider_product_category_product (table: provider_product)
ALTER TABLE provider_product ADD CONSTRAINT provider_product_category_product FOREIGN KEY provider_product_category_product (id_provider_category_product)
    REFERENCES provider_category_product (id_category_product);

-- Reference: provider_product_provider (table: provider_product)
ALTER TABLE provider_product ADD CONSTRAINT provider_product_provider FOREIGN KEY provider_product_provider (id_provider)
    REFERENCES provider (id_provider);

-- Reference: sale_bill_sale_product (table: sale_bill)
ALTER TABLE sale_bill ADD CONSTRAINT sale_bill_sale_product FOREIGN KEY sale_bill_sale_product (id_onsale_product)
    REFERENCES onsale_product (id_onsale_product);

-- Reference: sale_customer (table: sale_bill)
ALTER TABLE sale_bill ADD CONSTRAINT sale_customer FOREIGN KEY sale_customer (id_customer)
    REFERENCES customer (id_customer);

-- Reference: sale_user (table: sale_bill)
ALTER TABLE sale_bill ADD CONSTRAINT sale_user FOREIGN KEY sale_user (id_user)
    REFERENCES user (id_user);

-- End of file.

