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
                    <div class="row">
                        <div class="col-md-6">
                            <label>Search</label>
                            <input type="text" name="search" id="search" onkeyup="dosearch()" class="form-control">
                            <input type="hidden" name="user_id" id="user_id" value="<?= $user_id; ?>">
                            <br/>
                            <p id="bookname"></p>
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
    var user_id = $("#user_id").val();
    $.ajax({
       type: 'GET',
       url: base_url+"search/autosearch/"+search,
       dataType: 'json',
       success: function (result) {
           
      for(x in result){
      //console.log(result[x].name);
     book_name +="<div class='row bg-success' style='margin-left: 4px;'>"+
             "<div class='col-md-6'>"+
             "<h4> Book Name:"+ " "+result[x].name+"</h4>"+
             "<p> Price:"+" "+result[x].price+"</p>"+
             "<p> ISBN No:"+" "+result[x].ISBN_no+"</p>"+
             "<p> Edition:"+" "+result[x].edition+"</p>"+
             "<p> Publication:"+" "+result[x].publication_name+"</p>"+
             "<p> Author:"+" "+result[x].firstname+" "+result[x].lastname+"</p>"+
             "</div>"+
             
             "<div class='col-md-6'>"+
             "<p> Total Quantity:"+" "+result[x].quantity+"</p>"+
             "<p> Availabel Quantity:"+" "+result[x].availabel_quantity+"</p>"+
             "<img src='"+base_url+result[x].image_url+"' style='height:100px;width:100px;'>"+
             "</div>"+
             "<br/>"+
             "<div class='col-md-3'>"+
             "<br/>"+
             "<a href='"+base_url+"Issuebook/add/"+result[x].book_id+"/"+user_id+"' class='btn btn-info'>Issue Book</a>"+
             "</div>"+
             "</div>"+"<br/>";

          }
         $("#bookname").html(book_name);
        }
    });
   }
</script>
    