
CREATE TABLE tbl_identity_type(
    id_identity_type int(10) PRIMARY KEY AUTO_INCREMENT,
    identity_name VARCHAR(20) NOT NULL
);

CREATE TABLE tbl_svc_category(
    id_svc_category int(10) PRIMARY KEY AUTO_INCREMENT,
    svc_name varchar(50) NOT NULL,
    svc_description text
);
CREATE TABLE tbl_servicer(
    id_servicer int(10) PRIMARY KEY AUTO_INCREMENT,
    username varchar(20)    NOT NULL,
    email varchar(50)NOT NULL,
    password varchar(100) NOT NULL,
    profile_image text,
    id_identity_type int(10)NOT NULL,
    identity_id varchar(50),
    first_name varchar(25) NOT NULL,
    last_name varchar(25),
    address text,
    phone_no varchar(20),
    rate_point int(10),
    isActive char(1),
    created_at datetime,
    updated_at datetime,
    delete_status char(1),
    remember_token varchar(255),
    FOREIGN KEY (id_identity_type) REFERENCES tbl_identity_type(id_identity_type)
);
CREATE TABLE tbl_client(
    id_client int(10) PRIMARY KEY AUTO_INCREMENT,
    username varchar(20)NOT NULL,
    email varchar(50)NOT NULL,
    password varchar(100) NOT NULL,
    profile_image text,
    id_identity_type int(10)NOT NULL,
    identity_id varchar(50),
    first_name varchar(25) NOT NULL,
    last_name varchar(25),
    address text,
    phone_no varchar(20),
    isActive char(1),
    created_at datetime,
    updated_at datetime,
    delete_status char(1),
    remember_token varchar(255),
    FOREIGN KEY (id_identity_type) REFERENCES tbl_identity_type(id_identity_type)
);
CREATE TABLE tbl_svc(
    id_svc int(10) PRIMARY KEY AUTO_INCREMENT,
    id_servicer int(10)NOT NULL,
    id_svc_category int(10)NOT NULL,
    thumbnail_image text,
    created_at datetime,
    updated_at datetime,
    daelete_status char(1),
    FOREIGN KEY (id_servicer) REFERENCES tbl_servicer(id_servicer),
    FOREIGN KEY (id_svc_category) REFERENCES tbl_svc_category(id_svc_category)
);
CREATE TABLE tbl_feedback(
    id_feedback int(10) PRIMARY KEY AUTO_INCREMENT,
    id_svc int(10) NOT NULL,
    description text,
    rate_point int(10),
    created_at datetime,
    FOREIGN KEY (id_svc) REFERENCES tbl_svc(id_svc)
);

CREATE TABLE tbl_svc_price (
    id_svc_price int(10) PRIMARY KEY AUTO_INCREMENT,
    id_svc int(10)NOT NULL,
    price_per_period int(11)NOT NULL,
    period_type varchar(11)NOT NULL,
    FOREIGN KEY (id_svc) REFERENCES tbl_svc(id_svc)
);

CREATE TABLE tbl_admin(
    id_admin int(10) PRIMARY KEY AUTO_INCREMENT,
    username varchar(20)NOT NULL,
    email varchar(50)NOT NULL,
    password varchar(100) NOT NULL,
    profile_image text,
    first_name varchar(25) NOT NULL,
    last_name varchar(25),
    isActive char(1),
    created_at datetime,
    updated_at datetime,
    delete_status char(1),
    remember_token varchar(255)
)