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
                            <!--<input type="text" name="search" id="search" onkeyup="dosearch()" class="form-control">-->
                            <!--<input type="text" name="search" id="search" class="form-control" class="auto">-->
                            <!--<br/>-->
                            <p id="bookname"></p>
                            <input type="text" id="book" name="book" id="book" class="form-control" placeholder="Search Book">
                            <br/>
                            <p id="book_detail"></p>
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
 $(document).ready(function (){
//$("#search").autocomplete({
//     minLength: 3,
//    source:function (request,response){
//        var book_name="";  
//        $.ajax({
//            type: 'POST',
//            url: base_url+"Search/autocomplete",
//            data: {search: $("#search").val()},
//            dataType: 'json',
//            success: function (result) {
//             for(x in result){
//                 
// book_name +="<div class='row bg-success' style='margin-left: 4px;'>"+
//             "<div class='col-md-6'>"+
//             "<h4> Book Name:"+ " "+result[x].name+"</h4>"+
//             "<p> Price:"+" "+result[x].price+"</p>"+
//             "<p> ISBN No:"+" "+result[x].ISBN_no+"</p>"+
//             "<p> Edition:"+" "+result[x].edition+"</p>"+
//             "<p> Publication:"+" "+result[x].publication_name+"</p>"+
//             "<p> Author:"+" "+result[x].firstname+" "+result[x].lastname+"</p>"+
//             "</div>"+
//             
//             "<div class='col-md-6'>"+
//             "<p> Total Quantity:"+" "+result[x].quantity+"</p>"+
//             "<p> Availabel Quantity:"+" "+result[x].availabel_quantity+"</p>"+
//             "<img src='"+base_url+result[x].image_url+"' style='height:100px;width:100px;'>"+
//             "</div>"+
//             "<br/>"+
//             "<div class='col-md-3'>"+
//             "<br/>"+
//             "</div>"+
//             "</div>"+"<br/>";   
//                       }
//             $("#bookname").html(book_name);
//              }       
//        });
//    }
//});


$("#book").autocomplete({
source:base_url+"search/autocomplete2",
autoFocus: true ,
minLength: 3,
select: function(event, ui){
 event.preventDefault();
 var book_id = ui.item.label_id;
 var book_detail="";
 $.ajax({
     type: 'GET',
     url: base_url+"Search/get_book_detail/"+book_id,
     dataType: 'json',
     success: function (result) {
     if(result!=null){
 var book_detail = "<div class='row bg-success' style='margin-left: 4px;'>"+
                   "<div class='col-md-6'>"+
                   "<h4> Book Name:"+ " "+result.name+"</h4>"+
                   "<p> Price:"+" "+result.price+"</p>"+
                   "<p> ISBN No:"+" "+result.ISBN_no+"</p>"+
                   "<p> Edition:"+" "+result.edition+"</p>"+
                   "<p> Publication:"+" "+result.publication_name+"</p>"+
                   "<p> Author:"+" "+result.firstname+" "+result.lastname+"</p>"+
                   "</div>"+
             
                   "<div class='col-md-6'>"+
//                   "<p> Total Quantity:"+" "+result.quantity+"</p>"+
                   "<p> Availabel Quantity:"+" "+result.availabel_quantity+"</p>"+
                   "<img src='"+base_url+result.image_url+"' style='height:100px;width:100px;'>"+
                   "</div>"+
                   "<br/>"+
                   "<div class='col-md-3'>"+
                   "<br/>"+
                   "</div>"+
                   "</div>"+"<br/>"; 
           
           $("#book_detail").html(book_detail);
                    }else{
                        alert('data not found');
                        location.href= base_url+"Search";     
                    }
               }
         });
 
      } 
  });

}); 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//   function dosearch(){
//       var book_name="";
//    var search =  $("#search").val();
//   
//    $.ajax({
//       type: 'GET',
//       url: base_url+"search/autosearch/"+search,
//       dataType: 'json',
//       success: function (result) {
//           
//      for(x in result){
//    
//     book_name +="<div class='row bg-success' style='margin-left: 4px;'>"+
//             "<div class='col-md-6'>"+
//             "<h4> Book Name:"+ " "+result[x].name+"</h4>"+
//             "<p> Price:"+" "+result[x].price+"</p>"+
//             "<p> ISBN No:"+" "+result[x].ISBN_no+"</p>"+
//             "<p> Edition:"+" "+result[x].edition+"</p>"+
//             "<p> Publication:"+" "+result[x].publication_name+"</p>"+
//             "<p> Author:"+" "+result[x].firstname+" "+result[x].lastname+"</p>"+
//             "</div>"+
//             
//             "<div class='col-md-6'>"+
//             "<p> Total Quantity:"+" "+result[x].quantity+"</p>"+
//             "<p> Availabel Quantity:"+" "+result[x].availabel_quantity+"</p>"+
//             "<img src='"+base_url+result[x].image_url+"' style='height:100px;width:100px;'>"+
//             "</div>"+
//             "<br/>"+
//             "<div class='col-md-3'>"+
//             "<br/>"+
//             "</div>"+
//             "</div>"+"<br/>";
//
//          }
//         $("#bookname").html(book_name);
//        }
//    });
//   }
</script>
    
