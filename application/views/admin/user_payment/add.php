<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Payment</h1>
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
                            <?= form_open('admin/User_payment/add', $attributes); ?>
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
                                <input type="text" name="issue_date" value="" id="issue_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Renew Date</label>
                                <input type="text" name="renew_date" value="" id="renew_date" class="form-control">
                            </div>
                            <div class="form-grop">
                                <label>Payment Date</label>
                                <input type="text" name="payment_date" value="" id="payment_date" class="form-control">
                            </div>
                            <div class="form-grop">
                                <label>Amount</label>
                                <input type="text" name="amount" value="" class="form-control">
                            </div>
                            <br/>
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
<script>
  $( function() {
    $( "#issue_date" ).datepicker();
    $("#renew_date").datepicker();
    $("#payment_date").datepicker();
  } );
</script>