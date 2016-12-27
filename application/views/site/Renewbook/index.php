<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Renew Book</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <?php var_dump($get_issue_book);?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?= $page_title;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Issue Date</th>
                                        <th>Renew Date</th> 
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php foreach ($get_issue_book as $key=>$value):?>
                                    <tr>
                                        <td><?= $value['name'];?></td>
                                        <td><?= $value['issue_date'];?></td>
                                        <td><?= $value['renew_date'];?></td>
                                        <td><input data-name="<?= $value['name']; ?>" type="checkbox" <?= $value['status'] ? 'checked' : NULL ?> data-toggle="toggle" data-url="<?= "Renewbook/status/{$value['issue_book_id']}/" ?>" data-onstyle="info" /></td>                                        
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
<script>
$('input[type="checkbox"][data-toggle="toggle"]').change(function () {
   var status = $(this).is(":checked") ? 1 : 0;
   var name = $(this).data('name');
   var url = $(this).data('url') + status;
   $.ajax({
      url: base_url+url,
      success: function () {
                        
                    }
      
   });
  
});
</script>
