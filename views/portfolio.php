<div class="row">
    <style type="text/css">

    </style>

    <div class="col-md-8 col-md-offset-2 text-center">
        <h3 class="header">All Accounts</h1>
        <table class="table table-condensed">
            <tr>
                <td>Account Number</td>
                <td>Account Balance</td>
                <td>Account Type</td>
                <td>Account Interest</td>
                <td>Created Date</td>
                <td>Last Updated</td>
            </tr>
            <?php foreach($accounts as $account) { ?>
            <tr>
                <td><a href="/account.php?id=<?= $account['AccountNumber'] ?>"><?= $account["AccountNumber"] ?></td>
                <td>$ <?= $account["AccountBalance"] ?></td>
                <td><?= $account["AccountType"] == 1 ? "Checking" : ($account["AccountType"] == 2 ? "Savings" : "Loan") ?></td>
                <td><?= $account["InterestRate"] ?> %</td>
                <td><?= $account["CreatedAt"] ?></td>
                <td><?= $account["UpdatedAt"] == 0 ? $account["UpdatedAt"] : $account["CreatedAt"] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class="col-md-10 col-md-offset-1 text-center">
        <h3 class="header">All Transactions <a class="btn btn-primary btn-sm" href="/transactions.php" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></h1>
        <table class="table table-condensed">
            <tr>
                <td>Account Number</td>
                <td>Transaction Code</td>
                <td>Transaction Name</td>
                <td>Transaction Charge</td>
                <td>Transaction Type</td>
                <td>Transaction Date</td>
                <td>Transaction Amount</td>
            </tr>
            <?php foreach($transactions as $transaction) { ?>
            <tr>
                <td><a href="/account.php?id=<?= $account['AccountNumber'] ?>"><?= $transaction["AccountNumber"] ?></td>
                <td><?= $transaction["TransacCode"] ?></td>
                <td><?= $transaction["TransacName"] ?></td>
                <td>$ <?= $transaction["TransacCharge"] ?></td>
                <td><?= $transaction["TransacType"] ?></td>
                <td><?= $transaction["TransacDate"] ?></td>
                <td>$ <?= $transaction["TransacAmount"] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>