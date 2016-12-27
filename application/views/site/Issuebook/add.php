<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Book Detail</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
        <?php var_dump($book_detail);?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= $page_title; ?>
                </div>
                <div class="panel-body">
                    <div class="row bg-success">
                        <div class="col-md-6">
                            <br/>
                            <img src="<?= base_url()?><?= $book_detail['image_url']?>" style="height: 200px; width: 200px;">
                        </div>
                        <div class="col-md-6">
                            <br/>
                           <h4>Book Name:&nbsp;<?= $book_detail['name'];?></h4>
                           <p>ISBN No:&nbsp;<?= $book_detail['ISBN_no'];?></p>
                           <p>Price:&nbsp;<?= $book_detail['price'];?></p>
                           <p>Edition:&bbsp;<?= $book_detail['edition'];?>st</p>
                           
                        </div>
                    </div>
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