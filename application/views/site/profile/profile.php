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
                            <div class="row">
                                <div class="col-lg-6">
                                    <!--<form role="form">-->
                                        <?php $attributes=array('role'=>'form');?>
                                        <?= form_open('user/edit_profile/'.$result['user_id'],$attributes);?>
                                        <div class="form-group">
                                            <table class="table table-bordered table-striped">
                                                <tr>
                                                    <td>Name</td>
                                                    <td><?= $result['firstname'];?>&nbsp;<?= $result['lastname'];?></td>
                                                </tr> 
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?= $result['email'];?></td>
                                                </tr> 
                                                <tr>
                                                    <td>Birthday</td>
                                                    <td><?= $result['birthday'];?></td>
                                                </tr> 
                                                <tr>
                                                    <td>Gender</td>
                                                    <td><?= $result['gender'];?></td>
                                                </tr> 
                                                <tr>
                                                    <td>Address</td>
                                                    <td><?= $result['address'];?></td>
                                                </tr> 
                                                <tr>
                                                    <td>City</td>
                                                    <td><?= $result['city'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td><?= $result['phone'];?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><input type="submit" name="submit" value="Edit Profile" class="btn btn-success" style="float: right"></td>
                                                <input type="hidden" name="user_id" value="<?= $result['user_id'];?>">                                               
                                                </tr>
                                                
                                            </table> 
                                        </div>
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
