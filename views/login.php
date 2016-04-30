<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form action="login.php" method="post">
            <fieldset>
                <div class="form-group">
                    <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" placeholder="Password" type="password"/>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="type" value="customer" checked>
                        Customer
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="type" value="employee">
                        Employee
                    </label>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-default" type="submit">
                        <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                        Log In
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
