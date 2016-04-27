-- create_customers_table.sql

CREATE TABLE IF NOT EXISTS customers (

    -- Primary Key
    CustomerSSN INT UNSIGNED NOT NULL AUTO_INCREMENT,

    -- Attributes
    CustomerName VARCHAR(255) NOT NULL,
    CustomerAddr VARCHAR(255) NOT NULL,
    CustomerUsername VARCHAR(32) NOT NULL,
    CustomerPassword VARCHAR(32) NOT NULL,

    -- Timestamps
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- Primary Key
    PRIMARY KEY (CustomerSSN),

    -- Foreign Key
    EmpSSN INT UNSIGNED NOT NULL,
    FOREIGN KEY (EmpSSN) REFERENCES employees(EmpSSN)

);