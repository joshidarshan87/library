<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= $page_title; ?>
                </div>
                <div class="panel-body">
                    <div class="text text-danger">
                        <?= validation_errors(); ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <?php $attributes = array('role' => 'form'); ?>
                            <?= form_open('admin/User/add', $attributes); ?>
                                  <div class="form-group">
                                      <label>First Name</label>
                                    <input class="form-control" placeholder="First Name" name="firstname" type="text" autofocus value="<?= set_value('firstname'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" placeholder="Last Name" name="lastname" type="text" value="<?= set_value('lastname'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" placeholder="Email" name="email" type="text" value="<?= set_value('email'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?= set_value('password'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <input class="form-control" placeholder="Date Of Birth" name="birthday" type="text" value="<?= set_value('birthday'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" placeholder="Address" rows="3" name="address"><?= set_value('address'); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" placeholder="City" name="city" type="text" value="<?= set_value('city'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
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
                            <input type="submit" class="btn btn-success" value="Submit">
                            <?= form_close(); ?>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->    