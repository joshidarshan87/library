<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> User Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $page_title;?>
                        </div>
                        <div class="panel-body">
                            <div class="text text-danger">
                            <?= validation_errors(); ?>
                           </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <!--<form role="form">-->
                                        <?php $attributes=array('role'=>'form');?>
                                        <?= form_open('user/edit_profile/'.$result['user_id'],$attributes);?>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="firstname" value="<?= $result['firstname'];?>" class="form-control">
                                        </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" value="<?= $result['lastname'];?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Birthday</label>
                                        <input type="text" name="birthday" value="<?= $result['birthday'];?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control"><?= $result['address'];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" value="<?= $result['city']?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="<?= $result['phone']?>" class="form-control">
                                    </div>
                                    <input type="submit" name="submit" value="Update" class="btn btn-success">
                                    <?= form_close();?>
                                    <!--</form>-->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
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
