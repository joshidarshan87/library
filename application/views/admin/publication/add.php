<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Publication</h1>
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
                            <?= form_open('admin/publication/add', $attributes); ?>
                            <div class="form-group">
                                <label>Publication Name</label>
                                <input type="text" name="publication_name" class="form-control" value="<?= set_value('publication_name'); ?>" required="">
                            </div>
                            <button type="submit" class="btn btn-success">Add Publication</button>
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

<!--<div>
    <div class="text-danger">
<?php //echo validation_errors('<li>', '</li>'); ?>
    </div>
<?php //$attributes = array('role' => 'form'); ?>
    <?//= form_open('admin/publication/add', $attributes); ?>
    <div class="form-group">
        <label>Publication Name</label>
        <input type="text" name="publication_name" class="form-control" value="<?//= set_value('publication_name'); ?>" required="">
    </div>
    <button type="submit" class="btn btn-success">Add Publication</button>
    <?//= form_close(); ?>
</div>-->
