    
    var tagOpenHtmlContent = '<div class="input-group-check col-12 p-0 pb-2"><div class="input-group-prepend"><div class="checkbox">';
    var tagCloseHtmlContent = '</div></div></div></div>';

    $(window).on('load', function() {
        $.ajax({
            url: "/api/index",
            type: "POST",
            success : function(response){
                if (response.meta.status_code == 200) {
                    if (response.data != null) {
                        for (var i = 0; i < response.data.length; i++) {
                            var tagFirstDivHtml = '<div id="'+response.data[i].id+'" class="row m-0 border-bot1 pt-2 pb-2">'
                            var checkBox = '<input type="checkbox" value="" class="mr-2" data-id="'+response.data[i].id+'">';
                            var content = '<label id="'+response.data[i].id+'" >'+response.data[i].task+'</label>';
                            if (response.data[i].status == 1) {
                                content = '<label id="'+response.data[i].id+'"  style="text-decoration:line-through">'+response.data[i].task+'</label>';
                            }
                            var deleteButton = '<div><button type="button" class="btn add-btn btn-danger font-12" data-id="'+response.data[i].id+'"">Delete</button></div>';

                            var htmlContent =tagFirstDivHtml+" "+tagCloseHtmlContent+" "+checkBox+" "+content+" "+deleteButton+" "+tagCloseHtmlContent;

                            $('.add-to-do').append(htmlContent);
                        }
                    }
                } else {
                    console.log("error : " + response.meta.message)
                }
            }
        });
    });
    
    $(document).on("click", '.add-title-button', function(){
        //var a = $('#mydiv').data('myval'); //getter data
       //$('#mydiv').data('myval',20); //setter data (data-myval=20)

        var titleValue = $('.add-title-input').val();
        $.ajax({
            url: "/api/title/create",
            type: "POST",
            data: {"title":titleValue},
            success : function(response){
                if (response.meta.code == 200) {
                    console.log("success")
                } else {
                    console.log("error : " + response.meta.message)
                }
            }
        });
    });

    $(document).on("click", '.add-task-button', function(){
        //var a = $('#mydiv').data('myval'); //getter data
       //$('#mydiv').data('myval',20); //setter data (data-myval=20)

        var taskValue = $('.add-task-input').val();
        var titleID = $('.add-task-input').val();
        $.ajax({
            url: "/api/task/create",
            type: "POST",
            data: {task:taskValue,title_id=titleID},
            success : function(response){
                if (response.meta.code == 200) {
                    console.log("success")
                } else {
                    console.log("error : " + response.meta.message)
                }
            }
        });
    });

    $(document).on("click", '.add-task-button', function(){
        //var a = $('#mydiv').data('myval'); //getter data
       //$('#mydiv').data('myval',20); //setter data (data-myval=20)

        var taskValue = $('.add-task-input').val();
        var titleID = $('.add-task-input').val();
        $.ajax({
            url: "/api/task/create",
            type: "POST",
            data: {task:taskValue,title_id=titleID},
            success : function(response){
                if (response.meta.code == 200) {
                    console.log("success")
                } else {
                    console.log("error : " + response.meta.message)
                }
            }
        });
    });

