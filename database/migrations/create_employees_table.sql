-- create_employees_table.sql

CREATE TABLE IF NOT EXISTS employees (

    -- Primary Key
    EmpSSN INT UNSIGNED NOT NULL AUTO_INCREMENT,

    -- Attributes
    EmpName VARCHAR(255) NOT NULL,
    EmpPhone VARCHAR(11) NOT NULL,
    EmpStartDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    EmpManagerSSN INT NOT NULL,

    -- Timestamps
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- Primary Key
    PRIMARY KEY (EmpSSN)

    -- TODO: Create dependents table
);