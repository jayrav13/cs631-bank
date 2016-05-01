USE cs631;
DELIMITER $$
CREATE PROCEDURE `add_service_charge` (IN AccountNumber INT)
BEGIN
    START TRANSACTION

    DECLARE valid FLOAT;
    SELECT AccountBalance INTO valid FROM accounts WHERE AccountNumber = AccountNumber AND AccountBalance > 2.00;
    -- SET valid = (SELECT AccountBalance FROM accounts WHERE AccountNumber = AccountNumber AND AccountBalance > 2.00)

    IF valid IS NOT NULL THEN
        INSERT INTO transactions (AccountNumber, TransacName, TransacCharge, TransacType, TransacAmount, TransacDate, AccountBalance) VALUES (valid.AccountNumber, "Service Charge", 2.00, "SC", 0.00, CURRENT_TIMESTAMP, valid.AccountBalance - 2.00);
        INSERT INTO transactions (AccountNumber, TransacName, TransacCharge, TransacType, TransacAmount, TransacDate, AccountBalance) VALUES (1111111111, "Service Charge", 0.00, "SC", 2.00, CURRENT_TIMESTAMP, valid.AccountBalance + 2.00);
        UPDATE accounts SET AccountBalance = AccountBalance - 2.00 WHERE AccountNumber = AccountNumber;
        COMMIT;
    ELSE
        ROLLBACK;
    END IF

END$$
DELIMITER ; 