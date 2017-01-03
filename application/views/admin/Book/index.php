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

    <style>
    ul.pagination li a:hover,
    ul.pagination li a.current
    {
      color:#fff;
      background-color: #337ab7;
     }
    </style>
    
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= $page_title; ?>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                        <?= form_open('admin/book/search');?>
                      <div class="row">
                        <div class="col-md-3 col-md-offset-8">
                            <input type="text" name="search" id="search" value="" class="form-control" placeholder="Search Book"> 
                        </div>
                        <div class="col-md-1">
                            <input type="submit" name="submit" value="Search" class="btn btn-danger">  
                        </div>
                      </div>
                        <?= form_close();?>
                  <br/>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="">
                        <thead>
                            <tr>
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
                            
                            <?php foreach ($result as $key=>$value):?>
                            <tr>
                                  <td><img src="<?php echo base_url(); ?><?php echo $value['image_url']; ?>" class="img-responsive" style="height: 100px;width:100px;"></td>
                                  <td><?= $value['name']; ?></td>
                                  <td><?= $value['ISBN_no'] ?></td>
                                  <td><?= $value['quantity'] ?></td>
                                  <td><?= $value['price'] ?></td>
                                  <td><?= $value['department_name'] ?></td>
                                  <td><a href="<?= base_url(); ?>admin/book/edit/<?= $value['book_id'] ?>">Edit</a></td>
                                  <td><a href="<?= base_url(); ?>admin/book/delete/<?= $value['book_id'] ?>" onclick="return confirm('Are you Sure');">Delete</a></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <ul class="pagination" style="margin-left: 80%">
                        <li><?= $links;?></li> 
                    </ul>
                    <br/>
                    <p id="bookname"></p>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->

<script>
$(document).ready(function (){
//$('#search').autocomplete({
//  minLength: 3,
//  source:function(request,response){
//     var book_name="";
//      $.ajax({
//         type: 'POST',
//         url: base_url+"admin/book/autocomplete",
//         data: {search:$("#search").val()},
//         dataType: 'json',
//         success: function (result) {
//                      for(x in result){
//                          book_name+="<table class='table table-striped table-bordered table-hover'>"+
//                                    "<tr>"+
//                                    "<td>"
//                                    "</tr>"+
//                                    "</table>";
//                      }
//                      $("#bookname").html(book_name);
//                    }
//      });
//  }  
//}); 
});
</script>

