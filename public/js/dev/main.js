/*
To-Do list
 */


$(document).ready(function () {
    $(".todo-list li input[type=checkbox]:checked").parent().addClass("done");;

    $(".todo-list li input").click(function(){
        $(this).parent().toggleClass("done");
    });
});
