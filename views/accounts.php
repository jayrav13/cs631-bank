<div class="row">
    <style type="text/css">

    </style>

<div class="col-md-10 col-md-offset-1 text-center">
        <h3 class="header">Account Details</h1>
            <table class="table table-condensed">
                <tr>
                    <td>Transaction Code</td>
                    <td>Transaction Name</td>
                    <td>Transaction Charge</td>
                    <td>Transaction Type</td>
                    <td>Transaction Date</td>
                    <td>Transaction Amount</td>
                </tr>
                <?php foreach($transactions as $transaction) { ?>
                <tr>
                    <td><?= $transaction["TransacCode"] ?></td>
                    <td><?= $transaction["TransacName"] ?></td>
                    <td>$ <?= $transaction["TransacCharge"] ?></td>
                    <td><?= $transaction["TransacType"] ?></td>
                    <td><?= $transaction["TransacDate"] ?></td>
                    <td>$<?= $transaction["TransacAmount"] ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>