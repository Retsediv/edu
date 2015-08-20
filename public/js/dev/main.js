/*
Tasks list
 */


$(document).ready(function () {
    $(".todo-list li input[type=checkbox]:checked").parent().addClass("done");;

    $(".todo-list li input").click(function(){
        $(this).parent().toggleClass("done");
    });


    /*
    Task done
     */
    $(".todo-list li i#done").click(function(){
        $(this).parent().parent().addClass("done");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "task/done",
            cache: false,
            data: { task_id: $(this).parent().parent().find("input").val() },
            type: "POST",

            always: function() { $(this).parent().parent().addClass("done"); }
        });
    });


    /*
    Task delete
     */
    $(".todo-list li i#remove").click(function(){
        $(this).parent().parent().remove();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "task/remove",
            cache: false,
            data: { task_id: $(this).parent().parent().find("input").val() },
            type: "POST",

            always: function() { $(this).parent().parent().remove(); }
        });
    });
});
