-- create_branches_table.sql

CREATE TABLE IF NOT EXISTS branches (

    -- Primary Key
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,

    -- Attributes
    BranchName VARCHAR(255) NOT NULL UNIQUE,
    BranchAssets DECIMAL(12, 2) NOT NULL DEFAULT 0.00,

    -- Timestamps
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,

    -- Primary Key
    PRIMARY KEY (id)
    
);