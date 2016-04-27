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
    UpdatedAt TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,

    -- Primary Key
    PRIMARY KEY (EmpSSN),

    -- Foreign Key
    BranchId INT UNSIGNED NOT NULL,
    FOREIGN KEY (BranchId) REFERENCES branches(id)

    -- TODO: Create dependents table
);