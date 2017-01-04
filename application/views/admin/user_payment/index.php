<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Payment</h1>
        </div>
        <div class="col-md-6">
            <a href="<?= base_url('admin/User_payment/add'); ?>" class="btn btn-primary">Add New User Payment</a>
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
                                <th>#</th>
                                <th>User Name</th>
                                <th>Book Name</th>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ($result as $key => $value): ?>
                                <tr>
                                    <td><?= $i = $i + 1; ?></td>
                                    <td><?= $value['firstname']; ?>&nbsp;<?= $value['lastname'];?></td>
                                    <td><?= $value['name'];?></td>
                                    <td><?= $value['payment_date']?></td>
                                    <td>Rs.<?= $value['amount']?></td>
                                    <td><a href="<?= base_url(); ?>admin/user_payment/edit/<?= $value['user_payment_id'] ?>">Edit</a></td>
                                    <td><a href="<?= base_url(); ?>admin/user_payment/delete/<?= $value['user_payment_id'] ?>" onclick="return confirm('Are you Sure');">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
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



