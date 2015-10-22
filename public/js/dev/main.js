


$(document).ready(function () {

    /*
     Tasks list
     */


    $(".todo-list li input[type=checkbox]:checked").parent().addClass("done");;

    $(".todo-list li input").click(function(){
        $(this).parent().toggleClass("done");
    });


    /*
    Task done
     */
    $(".todo-list i#done").click(function(){
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
    $(".todo-list i#remove").click(function(){
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


    /*
    Timetable creating and editing...
     */


    /*
    Form styling
     */
    $(".timetable-edit .timetable-input").parent().css("padding", "none");

    /*
    Removing item of lesson in timetble
     */
    $('.timetable').on('click', 'i#remove', function(){
        $(this).parent().parent().parent().remove();
    });

    /*
    Adding item of lesson in timetable
     */
    $(".timetable i#add").click(function(){
        var id = $(this).data("id"),
            block ='<tr><td>1</td><td style=""><input style="width: 90%; float: left;" class="form-control timetable-input" name="lessons['+ id +'][]" placeholder="..." type="text"><div class="tools"> <i class="fa fa-remove" id="remove"></i></div></td><td style=""><input class="form-control timetable-input" name="classroom[' + id + '][]" placeholder="..." type="text"></td> </tr>';

        $(this).parent().parent().parent().parent().append(block);;
    });

    /*
    TODO: Make auto increntmet and auto changing number of lesson
     */
});
