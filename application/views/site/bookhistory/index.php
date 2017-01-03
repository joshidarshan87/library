<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Book History</h1>
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
                                <th>Book Image</th>
                                <th>Book Name</th>
                                <th>Issue Date</th>
                                <th>Renew Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_book_history_by_user as $key=>$value):?>
                            <tr>
                                  <td><img src="<?php echo base_url(); ?><?php echo $value['image_url']; ?>" class="img-responsive" style="height: 100px;width:100px;"></td>
                                  <td><?= $value['name']; ?></td>
                                  <td><?= $value['issue_date'] ?></td>
                                  <td><?= $value['renew_date'] ?></td>  
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


