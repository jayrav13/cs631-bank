USE cs631;
DELIMITER $$
CREATE TRIGGER `accounts_check_balance` AFTER UPDATE ON `accounts`
FOR EACH ROW
BEGIN
    IF NEW.AccountBalance < 0.00 THEN
        SIGNAL SQLSTATE '22023' SET MESSAGE_TEXT = 'This transaction is invalid.';
    END IF;
END$$
DELIMITER ; 