<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>User Sign Up</title>

        <!-- Bootstrap Core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../assets/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">User Sign Up</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text text-danger">
                                <?= validation_errors(); ?>
                            </div>
                            <?php $attributes = array('role' => 'form'); ?>
                            <?= form_open('user/signup', $attributes); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="First Name" name="firstname" type="text" autofocus value="<?= set_value('firstname'); ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Last Name" name="lastname" type="text" value="<?= set_value('lastname'); ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="text" value="<?= set_value('email'); ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?= set_value('password'); ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Date Of Birth" name="birthday" type="text" value="<?= set_value('birthday'); ?>">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Address" rows="3" name="address"><?= set_value('address'); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="City" name="city" type="text" value="<?= set_value('city'); ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone" name="phone" type="text" value="<?= set_value('phone'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Gender: </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="male">Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="female">Female
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Signup">
                            </fieldset>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../assets/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../assets/dist/js/sb-admin-2.js"></script>

    </body>

</html>