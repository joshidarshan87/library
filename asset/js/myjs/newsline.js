var newsline = {
    mode: "add",
    add: function () {
        $.ajax({
            url: base_url + "admin/Newsline/add",
            type: 'POST',
            data: $("#newsline").serialize(),
            success: function (data) {
                $("#myModal").modal('hide');
                newsline.list();
            }
        });
        this.clearname();
    },
    list: function () {
        $.ajax({
            url: base_url + "admin/Newsline/newsline_list",
            beforeSend: function (xhr) {
                $("#demo").empty();
            },
            success: function (result) {
                var obj = JSON.parse(result);
                // console.log(obj);
                var out;
                var i;
                for (i = 0; i < obj.length; i++) {
                    //out += obj[i].product_name;
//                    console.log(obj[i].product_name);
                    var category = '<tr>'
                            + '<td>' + obj[i].marquee + '</td>'
                            + '<td>'
                            + '<a href="#" data-toggle="modal" data-target="#myModal"  data-name=' + obj[i].marquee + ' data-id= ' + obj[i].id + '>'
                            + '<span class="glyphicon glyphicon-pencil"></span></a>'
                            + '</td>'
                            + '<td>'
                            + '<a href="#!" data-id= ' + obj[i].id + '>'
                            + '<span class="glyphicon glyphicon-trash"></span></a>'
                            + '</td>'
                            + '</tr>';

                    $("#demo").append(category);


                }

            }

        });

    },
    clearname: function () {
        $("#marquee").val('');
    }
}
$(document).ready(function () {
    newsline.list();
    newsline.modal = $("#newsline");
    $("#add").click(function () {
        if (newsline.mode == "add") {
            newsline.add();
        }
    });
});

