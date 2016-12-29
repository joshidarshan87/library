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
                            <input type="text" name="search" id="search" class="form-control" onkeyup="dosearch();" placeholder="Enter UserID">
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
    $.ajax({
       type: 'GET',
       url: base_url+"admin/Renewbook/search/"+search,
       dataType: 'json',
       success: function (result) {
           
      for(x in result){
      //console.log(result[x].name);
     book_name +="<div class='row bg-success' style='margin-left: 4px;'>"+
             "<div class='col-md-6'>"+
             "<h4> Book ID:"+ " "+result[x].book_id+"</h4>"+
             "<h4> Book Name:"+ " "+result[x].name+"</h4>"+
             "<h4> USER ID:"+ " "+result[x].user_id+"</h4>"+
             "<h4> USER Name:"+ " "+result[x].firstname+ " "+result[x].lastname+"</h4>"+
             "</div>"+
             
             "<div class='col-md-6'>"+
             "<h4> Issue Date:"+" "+result[x].issue_date+"</h4>"+
             "<h4> Return Date:"+" "+result[x].renew_date+"</h4>"+
             "<br/>"+
             "<a href='"+base_url+"admin/Renewbook/return_book/"+result[x].user_id+"/"+result[x].book_id+"'>Return</a>"+ "&nbsp;" + "|"+ "&nbsp;" + "<a href='"+base_url+"admin/Renewbook/renew_book/"+result[x].user_id+"/"+result[x].book_id+"'>Renew</a>"+
             
             "</div>"+
             "</div>"+"<br/>";
          }
         $("#bookname").html(book_name);
        }
    });
 
   }
</script>
    