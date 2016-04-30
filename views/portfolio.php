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
        <h3 class="header">All Transactions 
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </h3>
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

    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Transaction</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="portfolio.php" class="col-md-8 col-md-offset-2">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Transaction Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Add to Savings Account">
                        </div>


                        <div class="form-group">
                            <label for="from-account">Transaction From</label>
                            <select class="form-control" name="from-account">
                                <option value="-1">Check / Cash</option>
                                <?php foreach($accounts as $account) { ?>
                                <option value="<?= $account["AccountNumber"] ?>"><?= $account["AccountType"] == 1 ? "Checking" : ($account["AccountType"] == 2 ? "Savings" : "Loan") ?> - <?= $account["AccountNumber"] ?> - $ <?= $account["AccountBalance"] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="form-account">Transaction To</label>
                            <select class="form-control" name="to-account">
                                <option value="-1">Withdrawal</option>
                                <?php foreach($accounts as $account) { ?>
                                <option value="<?= $account["AccountNumber"] ?>"><?= $account["AccountType"] == 1 ? "Checking" : ($account["AccountType"] == 2 ? "Savings" : "Loan") ?> - <?= $account["AccountNumber"] ?> - $ <?= $account["AccountBalance"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input name="amount" type="number" class="form-control" id="amount" placeholder="631">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>