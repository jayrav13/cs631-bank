<div class="row">
    <style type="text/css">

    </style>


    <div class="col-md-8 col-md-offset-2 text-center">
    <h3 class="header">Passbook</h1>
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
            <?php foreach($transactions as $transaction) { ?>
            <tr>
                <td><?= $transaction["AccountNumber"] ?></td>
                <td><?= $transaction["TransacDate"] ?></td>
                <td><?= $transaction["TransacCode"] ?></td>
                <td><?= $transaction["TransacName"] ?></td>
                <td><?= $transaction["TransacAmount"] > 0 ? $transaction["TransacAmount"] : ""?></td>
                <td><?= $transaction["TransacAmount"] < 0 ? $transaction["TransacAmount"] : ""?></td>
                <!--<td><?= $transaction["AccountBalance"] ?></td>-->
            </tr>
            <?php } ?>
        </table>
    </div>
</div>