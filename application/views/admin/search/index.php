<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Search</h1>
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
                    <!---
                    <div class="row">
                        <div class="col-lg-6">
                            <?php //$attributes = array('role' => 'form'); ?>
                            <?//= form_open('admin/search/index', $attributes); ?>
                            <div class="form-group">
                                <label>Book Name</label>
                                <select name="bookname" class="form-control">
                                    <?php //foreach ($get_book as $key=>$value):?>
                                    <option value="<?//= $value['book_id']?>"><?//= $value['name'];?></option>
                                    <?php //endforeach;?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <?= form_close(); ?>
                            
                        </div>
                    </div>
                    --->
                    <!-- /.row (nested) -->
                    <br/>
                    <!---
                        <div class="row bg-success">
                            <div class="col-md-6">
                                <h4>Book Name:<?//= $search_bookname['name']; ?></h4>
                                <p>Price: <?//= $search_bookname['price'];?></p>
                                <p>ISBN No.: <?//= $search_bookname['ISBN_no'];?></p>
                                <p>Edition: <?//= $search_bookname['edition'];?>st</p>
                                <p>Publication Name: <?//= $search_bookname['publication_name'];?></p>
                                <p>Author Name: <?//= $search_bookname['firstname'];?>&nbsp;<?//= $search_bookname['lastname'];?></p>
                            </div> 
                            <div class="col-md-6">
                                <p>Total Quantity: <?//= $search_bookname['quantity'];?></p>
                                <p>Availabel Quantity: <?//= $search_bookname['availabel_quantity']?></p>
                            </div>   
                        </div>
                    --->
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Search</label>
                            <input type="text" name="search" id="search" onkeyup="dosearch()" class="form-control">
                            <br/>
                            <p id="bookname"></p>
                            <p id="price"></p>
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

<script>
   function dosearch(){
       var book_name="";
    var search =  $("#search").val();
    $.ajax({
       type: 'GET',
       url: base_url+"admin/search/autosearch/"+search,
       dataType: 'json',
       success: function (result) {
           
      for(x in result){
      console.log(result[x].name);
     book_name +=result[x].name+ ""+result[x].price+ "<br>";

          }
         $("#bookname").html(book_name);
        }
    });
 
   }
</script>
    