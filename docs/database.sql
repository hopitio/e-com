CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
)

CREATE TABLE t_user(
	id	INT PRIMARY KEY AUTO_INCREMENT,
firstname	VARCHAR(50),
lastname	VARCHAR(50),
account	VARCHAR(20),
`password`	VARCHAR(255),
sex	ENUM('M', 'F', 'O'),
DOB	DATETIME,
date_joined	DATETIME,
`status`	TINYINT,
status_date	DATETIME,
status_reason	TEXT,
last_active	DATETIME,
is_admin	TINYINT DEFAULT 0,
phoneno	VARCHAR(20),
bonus	DOUBLE
);

CREATE TABLE t_role(
    id	INT PRIMARY KEY AUTO_INCREMENT,
    `name`	VARCHAR(255),
codename	VARCHAR(50)

);

CREATE TABLE t_user_role(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_user	INT,
fk_role	INT
);

CREATE TABLE t_relationship(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_user1	INT,
fk_user2	INT
);

CREATE TABLE t_privillege(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_instance	INT,
`type`	VARCHAR(20),
privilige	VARCHAR(50)

);

CREATE TABLE t_category(
id	INT PRIMARY KEY AUTO_INCREMENT,
codename	VARCHAR(50),
fk_parent	INT,
sort	TINYINT,
path	VARCHAR(255),
image	text
);

CREATE TABLE t_category_language(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_category	INT,
`language`	VARCHAR(10),
`name`	VARCHAR(255),
description	TEXT

);

CREATE TABLE t_retailer(
id	INT PRIMARY KEY AUTO_INCREMENT,
`name`	VARCHAR(255),
logo	TEXT,
phoneno	VARCHAR(20),
email	VARCHAR(50),
website	VARCHAR(100),
`status`	TINYINT DEFAULT 1,
status_date	DATETIME,
status_reason	TEXT,
fk_manager	INT

);

CREATE TABLE t_listtype(
id	INT PRIMARY KEY AUTO_INCREMENT,
`name`	VARCHAR(255),
codename	VARCHAR(50),
`status`	TINYINT DEFAULT 1

);

CREATE TABLE t_list(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_listtype	INT,
`name`	VARCHAR(255),
codename	VARCHAR(50),
sort	INT
);

CREATE TABLE t_product(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_category	INT,
fk_retailer	INT,
fk_group	INT,
is_group	TINYINT DEFAULT 0,
price	DOUBLE,
price_currency	VARCHAR(10)

);

CREATE TABLE t_product_attribute_type(
id	INT PRIMARY KEY AUTO_INCREMENT,
codename	VARCHAR(50),
datatype	ENUM('number', 'enum', 'text'),
fk_enum_ref	INT,
multi_language	TINYINT DEFAULT 0,
repeating_group tinyint,
important_level int
);

CREATE TABLE t_category_attribute(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_attribute_type	INT,
fk_category	INT
);

CREATE TABLE t_product_attribute(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_product	INT,
fk_attribute_type	INT,
value_number DOUBLE,
value_reference INT,
value_text	TEXT,
`language`	VARCHAR(10)
);

CREATE TABLE t_order_status(
id	INT PRIMARY KEY AUTO_INCREMENT,
`name`	VARCHAR(255),
codename	VARCHAR(50),
sort	TINYINT
);

CREATE TABLE t_order(
id	INT PRIMARY KEY AUTO_INCREMENT,
uid	VARCHAR(50),
fk_customer	INT,
subtotal	DOUBLE,
payment_currency	VARCHAR(10),
payment_method	ENUM('cash'),
email_status	TINYINT,
fk_order_status_history	INT,
`comment`	TEXT,
bonus	DOUBLE
);

CREATE TABLE t_order_product(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_order	INT,
fk_product	INT,
orginal_price	DOUBLE,
price	DOUBLE,
quantity	DOUBLE,
discharge	DOUBLE
);

CREATE TABLE t_invoice(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_order	INT,
fk_customer	INT,
date_created	DATETIME,
date_paid	DATETIME,
invoice_status	ENUM('unpaid', 'paid', 'cancelled'),
fk_contact	INT,
email_status	TINYINT,
`comment`	TEXT

);

CREATE TABLE t_invoice_detail(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_invoice	INT,
fk_product	INT,
fk_order	INT,
quantity	DOUBLE

);

CREATE TABLE t_credit_memo(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_order	INT,
date_created	DATETIME,
date_refuned	DATETIME,
credit_status	ENUM('paid', 'unpaid', 'cancelled'),
fk_contact	INT,
email_status	TINYINT,
`comment`	TEXT
);

CREATE TABLE t_user_contact(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_user	INT,
date_created	DATETIME,
date_used	DATETIME,
count_used	INT,
prefix	VARCHAR(100),
firstname	VARCHAR(100),
middlename	VARCHAR(100),
lastname	VARCHAR(100),
suffix	VARCHAR(100),
company	VARCHAR(255),
street_address	TEXT,
city	VARCHAR(255),
country	VARCHAR(10),
state_province	VARCHAR(50),
zip_postal_code	VARCHAR(10),
telephone	VARCHAR(20),
fax	VARCHAR(20),
vat_number	VARCHAR(50)
);

CREATE TABLE t_shipment(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_order	INT,
fk_customer	INT,
date_created	DATETIME,
date_shipped	DATETIME,
`comment`	TEXT

);

CREATE TABLE t_shipment_detail(
id	INT PRIMARY KEY,
fk_order	INT,
fk_product	INT,
quantity	DOUBLE,
fk_shipment	INT
);

CREATE TABLE t_order_status_history(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_order	INT,
fk_status	INT,
date_happened	DATETIME,
fk_creator	INT,
date_created	DATETIME,
is_mail_sent	TINYINT DEFAULT 0

);

CREATE TABLE t_wishlist(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_customer	INT,
`name`	INT,
remind_date	DATETIME,
note	TEXT,
date_created DATETIME
);

CREATE TABLE t_wishlist_detail(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_wishlist	INT,
`type`	ENUM('product', 'note', 'link'),
note	TEXT,
fk_product	INT
);

CREATE TABLE t_feature_product(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_product	INT,
fk_category	INT,
sort	TINYINT

);

CREATE TABLE t_retailer_category(
id	INT PRIMARY KEY AUTO_INCREMENT,
fk_retailer	INT,
fk_category	INT

);


