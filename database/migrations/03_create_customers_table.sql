-- create_customers_table.sql

CREATE TABLE IF NOT EXISTS customers (

    -- Primary Key
    CustomerSSN INT UNSIGNED NOT NULL UNIQUE,

    -- Attributes
    CustomerName VARCHAR(255) NOT NULL,
    CustomerAddr VARCHAR(255) NOT NULL,
    CustomerUsername VARCHAR(64) NOT NULL UNIQUE,
    CustomerPassword VARCHAR(64) NOT NULL,

    -- Timestamps
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT "1970-01-01 00:00:00" ON UPDATE CURRENT_TIMESTAMP,

    -- Primary Key
    PRIMARY KEY (CustomerSSN),

    -- Foreign Key
    EmpSSN INT UNSIGNED NOT NULL,
    FOREIGN KEY (EmpSSN) REFERENCES employees(EmpSSN)

);