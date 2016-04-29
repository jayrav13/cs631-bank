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

                <?php
                    // Loop through all employees and print names 
                ?>

                <?php if(isset($employees)): ?>
                <div class="form-group">
                    <select class="form-control" name="employee">
                        <?php foreach($employees as $employee) { ?>
                            <option value="<?= $employee['EmpSSN'] ?>"><?= $employee["EmpName"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php endif ?>
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
<div class="row text-center">
    or <a href="login.php">login</a> if you already have an account
</div>
