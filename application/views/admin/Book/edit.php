<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Book</h1>
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
                        <div class="col-lg-12">
                            <?php $attributes = array('role' => 'form'); ?>
                            <?= form_open_multipart('admin/book/edit/' . $id, $attributes); ?>
                            <div class="form-group col-md-6">
                                <label>Book Name</label>
                                <input type="text" name="bookname" class="form-control" value="<?= $result['name']; ?>" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>ISBN No.</label>
                                <input type="text" name="ISBN_no" class="form-control" value="<?= $result['ISBN_no']; ?>" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" value="<?= $result['quantity']; ?>" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Edition</label>
                                <input type="text" name="edition" class="form-control" value="<?= $result['edition']; ?>" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" value="<?= $result['price']; ?>" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Purchase Date</label>
                                <input type="text" name="purchase_date" class="form-control" value="<?= $result['purchase_date']; ?>" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Department Name</label>
                                <select name="department_name" class="form-control">
                                    <option value="">----Select Department----</option>
                                    <?php foreach ($get_department as $key => $value): ?>
                                        <?php $is_selected = ''; ?>
                                        <?php
                                        if ($value['department_id'] == $result['department_id']) {
                                            $is_selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $value['department_id'] ?>" <?php echo $is_selected; ?>><?php echo $value['department_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Publication Name</label>
                                <select name="publication_name" class="form-control">
                                    <option value="">----Select Publication----</option>
                                    <?php foreach ($get_publication as $key => $value): ?>
                                        <?php $is_selected = ''; ?>
                                        <?php
                                        if ($value['publication_id'] == $result['publication_id']) {
                                            $is_selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?= $value['publication_id'] ?>" <?php echo $is_selected; ?>><?= $value['publication_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Author Name</label>
                                <select name="author_name" class="form-control">
                                    <option value="">----Select Author----</option>
                                    <?php foreach ($get_author as $key => $value): ?>
                                        <?php $is_selected = ''; ?>
                                        <?php
                                        if ($value['author_id'] == $result['author_id']) {
                                            $is_selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?= $value['author_id'] ?>" <?php echo $is_selected; ?>><?= $value['firstname'] ?>&nbsp;<?= $value['lastname'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image</label>
                                <input type="file" name="userfile">
                                <img src="<?= base_url(); ?><?php echo $result['image_url']; ?>" class="img-responsive" style="height: 100px;width:100px;">
                            </div>
                            <button type="submit" class="btn btn-success" style="margin-top: 100px;">Edit Book</button>

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