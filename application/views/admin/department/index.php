<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Department</h1>
        </div>
        <div class="col-md-6">
            <a href="<?= base_url('admin/department/add'); ?>" class="btn btn-primary">Add New Department</a>
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
                                <th>Department Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ($result as $key => $value): ?>
                                <tr>
                                    <td><?= $i = $i + 1; ?></td>
                                    <td><?= $value['department_name']; ?></td>
                                    <td><a href="<?= base_url(); ?>admin/department/edit/<?= $value['department_id'] ?>">Edit</a></td>
                                    <td><a href="<?= base_url(); ?>admin/department/delete/<?= $value['department_id'] ?>" onclick="return confirm('Are you Sure');">Delete</a></td>
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

