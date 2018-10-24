<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход</title>
    <link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-multiselect.css" rel="stylesheet">
    <link href="/assets/DataTables/datatables.min.css" rel="stylesheet">
    <link href="/assets/css/common.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/assets/js/html5shiv.min.js"></script>
    <script src="/assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('login/log_in'); ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <select name="user_id" id="user" class="form-control">
                                    <?php foreach ($logins as $l): ?>
                                        <option value="<?php echo $l->id ?>"><?php echo $l->profa . ": " . $l->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control" name="password" type="password" value="2001">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="form-control btn-primary" type="submit"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Вход</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/bootstrap-multiselect.js"></script>
<script src="/assets/DataTables/datatables.min.js"></script>
<script src="/assets/js/common.js"></script>
</body>
</html>