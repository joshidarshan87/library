<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Issue Book</h1>
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
                            <?= form_open('admin/Issue_Book/add', $attributes); ?>
<!--                            <div class="form-group">
                                <label>User</label>
                                <select name="username" class="form-control">
                                    <?php// foreach ($get_user as $key => $value): ?>
                                        <option value="<?//= $value['user_id']; ?>"><?//= $value['firstname']; ?>&nbsp;<?//= $value['lastname']; ?></option>
                                    <?php// endforeach; ?>
                                </select>
                            </div>-->
<!--                            <div class="form-group">
                                <label>Book</label>
                                <select name="bookname" class="form-control">
                                    <?php// foreach ($get_book as $key => $value): ?>
                                        <option value="<?//= $value['book_id']; ?>"><?//= $value['name']; ?></option>
                                    <?php// endforeach; ?>
                                </select>
                            </div>-->
                            <div class="form-grop">
                                <label>User ID</label>
                                <input type="text" name="username" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                 <label>Book ID</label>
                                <input type="" name="bookname" value="" class="form-control">  
                            </div>
                            <div class="form-group">
                                <label>Issue Date</label>
                                <input type="text" name="issue_date" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Renew Date</label>
                                <input type="text" name="renew_date" value="" class="form-control">
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