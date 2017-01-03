<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">USer</h1>
        </div>
        <div class="col-md-6">
            <a href="<?= base_url('admin/user/add'); ?>" class="btn btn-primary">Add New User</a>
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

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $key=>$value):?>
                            <tr>
                                <td><?= $value['firstname'];?>&nbsp;<?= $value['lastname'];?></td>
                                <td><?= $value['email'];?></td>
                                <td><?= $value['gender'];?></td>
                                <td><?= $value['address'];?></td>
                                <td><?= $value['phone'];?></td>
                                <td><a href="<?= base_url()?>admin/user/edit/<?= $value['user_id'];?>">Edit</a></td>
                                <td><a href="<?= base_url();?>admin/user/delete/<?= $value['user_id']?>" onclick="return confirm('Are You Sure');">Delete</a></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>



</div>
<!-- /#page-wrapper -->

