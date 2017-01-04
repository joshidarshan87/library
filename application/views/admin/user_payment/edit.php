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
                    <?php var_dump($result);?>
                    <div class="row">
                        <div class="col-lg-6">
                            <?php $attributes = array('role' => 'form'); ?>
                            <?= form_open('admin/User_payment/edit/'.$result['user_payment_id'], $attributes); ?>
                            <div class="form-grop">
                                <label>User ID</label>
                                <input type="text" name="username" value="<?= $result['user_id'];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                 <label>Book ID</label>
                                <input type="" name="bookname" value="<?= $result['book_id'];?>" class="form-control">  
                            </div>
                            <div class="form-group">
                                <label>Issue Date</label>
                                <input type="text" name="issue_date" value="<?=  date('m/d/Y',strtotime($result['issue_date']));?>" id="issue_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Renew Date</label>
                                <input type="text" name="renew_date" value="<?= date('m/d/Y',strtotime($result['renew_date']));?>" id="renew_date" class="form-control">
                            </div>
                            <div class="form-grop">
                                <label>Payment Date</label>
                                <input type="text" name="payment_date" value="<?= date('m/d/Y',strtotime($result['payment_date']));?>" id="payment_date" class="form-control">
                            </div>
                            <div class="form-grop">
                                <label>Amount (Rs.)</label>
                                <input type="text" name="amount" value="<?= $result['amount'];?>" class="form-control">
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