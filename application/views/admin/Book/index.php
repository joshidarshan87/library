<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Book</h1>
        </div>
        <div class="col-md-6">
            <a href="<?= base_url('admin/book/add'); ?>" class="btn btn-primary">Add New Book</a>
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
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Book</th>
                                <th>ISBN No.</th>
                                <th>Total Quantity</th>
                                <th>Price</th>
                                <th>Department</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ($result as $key => $value): ?>
                                <tr>
                                    <td><?= $i = $i + 1; ?></td>
                                    <td><img src="<?php echo base_url(); ?><?php echo $value['image_url']; ?>" class="img-responsive" style="height: 100px;width:100px;"></td>
                                    <td><?= $value['name']; ?></td>
                                    <td><?= $value['ISBN_no'] ?></td>
                                    <td><?= $value['quantity'] ?></td>
                                    <td><?= $value['price'] ?></td>
                                    <td><?= $value['department_name'] ?></td>
                   
                                   <?php //$count_row=$this->db->get_where('issue_book',array('book_id'=>$value['book_id'],'status'=>1))->result_array();?>
                                    <?php //$issue_quantity = count($count_row);?>
                                    <?php //$avail_quan = $value['quantity']-$issue_quantity;?>
                                   <!--<td> <?php //echo $avail_quan;?></td>-->
                                    <?php //$this->db->update('book_quantity',array('availabel_quantity'=>$avail_quan),array('book_id'=>$value['book_id']));?>
                                    <td><a href="<?= base_url(); ?>admin/book/edit/<?= $value['book_id'] ?>">Edit</a></td>
                                    <td><a href="<?= base_url(); ?>admin/book/delete/<?= $value['book_id'] ?>" onclick="return confirm('Are you Sure');">Delete</a></td>
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




