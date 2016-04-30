<div class="row">
    <style type="text/css">

    </style>


    <div class="col-md-12 text-center">
    <h1 class="header">Passbook</h1>
     <div class="col-md-8 text-center col-md-offset-2 text-center">
        <h3 class="header">Customers</h3>
        <table class="table table-condensed">
            <tr>
                <td>Account Number</td>
                <td>Member Since</td>
                <td>Customer Name</td>
                <td>Customer Address</td>
                <td>Customer Username</td>
            </tr>
            <?php foreach($customers as $customer) { ?>
            <tr>
                <td><?= $customer["AccountNumber"] ?></td>
                <td><?= $customer["CreatedAt"] ?></td>
                <td><?= $customer["CustomerName"] ?></td>
                <td><?= $customer["CustomerAddr"] ?></td>
                <td><?= $customer["CustomerUsername"] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="col-md-8 text-center col-md-offset-2 text-center">
        <h3 class="header">Transactions</h3>
        <table class="table table-condensed">
            <tr>
                <td>Account Number</td>
                <td>Date</td>
                <td>Transaction Code</td>
                <td>Transaction Name</td>
                <td>Debits</td>
                <td>Credits</td>
                <td>Balance</td>
            </tr>
            <tr>
                <td><?= "" ?></td>
                <td><?= $transactions[0]["TransacDate"] ?></td>
                <td><?=""?></td>
                <td><?= "Balance Forward" ?></td>
                <td><?=""?></td>
                <td><?=""?></td>
                <td><?= 0 ?></td>
            </tr>
            <?php foreach($transactions as $transaction) { ?>
            <tr>
                <td><?= $transaction["AccountNumber"] ?></td>
                <td><?= $transaction["TransacDate"] ?></td>
                <td><?= $transaction["TransacCode"] ?></td>
                <td><?= $transaction["TransacName"] ?></td>
                <td><?= $transaction["TransacAmount"] < 0 ? $transaction["TransacAmount"] : ""?></td>
                <td><?= $transaction["TransacAmount"] > 0 ? $transaction["TransacAmount"] : ""?></td>
                <td><?= $transaction["AccountBalance"] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    </div>
</div>