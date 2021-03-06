<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>

<div class="row text-center">
    <h2 class="header">All Customers
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
        <span aria-hidden="true" class="glyphicon glyphicon-plus"></span>
    </button>
    </h1>
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-condensed">
            <tr>
                <td>Name</td>
                <td>Address</td>
                <td>Username</td>
                <td>Created On</td>
                <td>Last Updated</td>
                <td>Edit</td>
            </tr>
            
            <?php foreach($customers as $customer) { ?>
            <tr>
                <td><a href="/customers.php?name=<?= $customer["CustomerUsername"] ?>"><?= $customer["CustomerName"] ?></a></td>
                <td><?= $customer["CustomerAddr"] ?></td>
                <td><?= $customer["CustomerUsername"] ?></td>
                <td><?= $customer["CreatedAt"] ?></td>
                <td><?= $customer["UpdatedAt"] ?></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#edit-<?= $customer["CustomerSSN"] ?>">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="edit-<?= $customer["CustomerSSN"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update <?= $customer["CustomerName"] ?>'s Profile</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form method="POST" action="customers.php">
                                        <div class="form-group">
                                            <input autofocus value="<?= $customer["CustomerUsername"] ?>" class="form-control" name="username" placeholder="Username" type="text"/>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" value="<?= $customer["CustomerName"] ?>" name="name" placeholder="Name" type="text"/>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" value="<?= $customer["CustomerAddr"] ?>" name="address" placeholder="Address" type="text"/>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" disabled value="<?= $customer["CustomerSSN"] ?>" name="ssn" placeholder="SSN" type="text"/>
                                        </div>
                                        <input class="form-control hidden" value="<?= $customer["CustomerSSN"] ?>" name="ssn" placeholder="SSN" type="text"/>
                                        <div class="form-group text-center">
                                            <button class="btn btn-default" type="submit" name="action" value="edit">
                                                <span aria-hidden="true" class="glyphicon glyphicon-cog"></span>
                                                Update
                                            </button>
                                            <button class="btn btn-default" type="submit" name="action" value="delete">
                                                <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </table>
        <!-- Button trigger modal -->

    </div>
</div>

<!-- MODAL -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create New User</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="register.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Password" type="password"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="Name" type="text"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="address" placeholder="Address" type="text"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="ssn" placeholder="SSN" type="text"/>
                                </div>

                                <div class="form-group">
                                    <input disabled value="<?= $user["EmpName"] ?>" class="form-control" name="empname" placeholder="Employee Name" type="text"/>
                                </div>

                                <input class="hidden" value="<?= $user["EmpSSN"] ?>" class="form-control" name="employee" placeholder="SSN" type="text"/>

                                <div class="form-group text-center">
                                    <button class="btn btn-default" type="submit">
                                        <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                                        Register
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>