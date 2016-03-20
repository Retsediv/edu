var labels = [];
var dat = [];
$.ajax({
    type: "GET",
    url: '/api/mark/get',
    success: function (marks) {
        for(var i = 0; i < marks.length; i++){
            labels[i] = marks[i].created_at.substring(5, 10);
            dat[i] = marks[i].mark;

        }

        var ctx = document.getElementById("mark-chart").getContext("2d");

        var data = {
            labels: labels,
            datasets: [
                {
                    label: "Dataset",
                    fillColor: "rgba(219,40,40,0.2)",
                    strokeColor: "rgba(219,40,40,1)",
                    pointColor: "rgba(219,40,40,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(13,60,95,1)",
                    data: dat
                }
            ]
        };

        var markChart = new Chart(ctx).Line(data);
    }});