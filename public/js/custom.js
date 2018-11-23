    
    var tagOpenHtmlContent = '<div class="input-group-check col-12 p-0 pb-2 "><div class="input-group-prepend"><div class="checkbox">';
    var tagCloseHtmlContent = '</div></div>';

    $(window).on('load', function() {
        $.ajax({
            url: "/api/index",
            type: "GET",
            success : function(response){
                if (response.meta.status_code == 200) {
                    if (response.data != null) {
                        for (var i = 0; i < response.data.length; i++) {
                            addContentHtml(response.data[i]);
                        }
                    }
                } else {
                    console.log("error : " + response.meta.message)
                }
            }
        });
    });
    
    $(document).on("click", '#addButton', function(){
        var taskValue = $('#newList').val();
        $.ajax({
            url: "/api/task/create",
            type: "POST",
            data: {"task":taskValue},
            success : function(response){
                console.log(response);
                if (response.meta.status_code == 200) {
                    if (response.data != null) {
                        addContentHtml(response.data);
                    }
                } else {
                    console.log("error : " + response.meta.message)
                }
            }
        });
    });

    $(document).on("click", '#clearDataButton', function(){
        $.ajax({
            url: "/api/task/delete-all",
            type: "DELETE",
            success : function(response){
                console.log(response);
                if (response.meta.status_code == 200) {
                    $(".content-task").remove();
                } else {
                    console.log("error : " + response.meta.message)
                }
            }
        });
    });

    $(document).on("click", '#deleteButton', function(){
        var id = $(this).data('id')
        var url = "/api/task/delete/"+id;
        $.ajax({
            url: url,
            type: "DELETE",
            success : function(response){
                console.log(response);
                if (response.meta.status_code == 200) {
                    if (response.data != null) {
                        var selector = "#"+id
                        $(selector).remove();
                    }
                } else {
                    console.log("error : " + response.meta.message)
                }
            }
        });
    });

    $(document).on("click", '#checkBoxTask', function(){
        var id = $(this).data('id')
        $.ajax({
            url: "/api/task/update-status",
            type: "POST",
            data:{id:id},
            success : function(response){
                console.log(response);
                if (response.meta.status_code == 200) {
                    if (response.data != null) {
                        var idLabel = "#label"+id;
                        if (response.data.status == 0) {
                            $(idLabel).css("text-decoration", "");
                        }else{
                            $(idLabel).css("text-decoration", "line-through");
                        }
                    }
                } else {
                    console.log("error : " + response.meta.message)
                }
            }
        });
    });

function addContentHtml(dataContent){
    var tagFirstDivHtml = '<div class="content-task" id="'+dataContent.id+'"><div class="row m-0 border-bot1 pt-2 pb-2">'
    var checkBox = '<input type="checkbox" value="" class="mr-2" data-id="'+dataContent.id+'" id="checkBoxTask">';
    var content = '<label id="label'+dataContent.id+'" >'+dataContent.task+'</label>';
    if (dataContent.status == 1) {
        checkBox = '<input type="checkbox" value="" class="mr-2" data-id="'+dataContent.id+'" id="checkBoxTask" checked>';
        content = '<label id="label'+dataContent.id+'"  style="text-decoration:line-through">'+dataContent.task+'</label>';
    }
    var deleteButton = '<div><button type="button" id="deleteButton" class="btn add-btn btn-danger font-12" data-id="'+dataContent.id+'"">Delete</button></div>';
    var createdAt  = '<div class="col-12 justify-content-end" ><sub  class="pull-right">created at '+dataContent.created_at+'</sub></div></div></div>'

    var htmlContent =tagFirstDivHtml+" "+tagOpenHtmlContent+" "+checkBox+" "+content+" "+deleteButton+" "+tagCloseHtmlContent+" "+createdAt;

    $('.add-to-do').append(htmlContent);
}
