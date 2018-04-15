<head>

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
<!------ Include the above in your HEAD tag ---------->
<div class="wrapper">
    <div id="calendarContainer"></div>
    <div id="organizerContainer" style="margin-left: 8px;"></div>
</div>
<script src="js/Calender.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script>


sayac =0;
setTimeout(function() {

clickRight();
}, 1);
   function clickRight()
   {
       if ((sayac % 2) ==1){
           $('#calendarContainer-day-22').trigger('click');
            sayac =1;
       }else{

       }



   }
    $(document).ready(function () {
        

        saat_list=[];
        _events = [];
         calendar = new Calendar("calendarContainer", "small", [ "PZT", 3 ], [ "#054910", "#07911d", "#ffffff", "#ffffff" ]);
         organizer = new Organizer("organizerContainer", calendar);
        currentDay = calendar.date.getDate();

        $('.day').on('click', function () {

             gun = $(this).children('[id^="calendarContainer-day-num-"]').text();
             yil = $("#calendarContainer-year").text();
             ay = months.indexOf(  $("#calendarContainer-month").text());
             ay= ay +1;

            $.ajax({
                type: 'POST',
                url: '{{ route('ajax') }}',
                dataType: 'json',

                data: {
                    day:gun,
                    month:ay,
                    year:yil,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {


                    saat_list = data;
                    console.log(data);

                    for(i=0;i<saat_list.length;i++){

                        _events[i]=
                            {
                                startTime: saat_list[i]+":00",
                                endTime: (saat_list[i] +1)+":00",
                                mTime: "",
                                text: "Reserved."
                            }
                    }
                    clickRight();
                    sayac = sayac +1;
                    console.log(_events);


                },
                error: function (ex) {
                    alert('Failed.' + ex);
                }
            });


            data = {
                years: [
                    {
                        int: yil,
                        months: [
                            {
                                int:ay,
                                days: [
                                    {
                                        int: gun,
                                        events: _events
                                    }
                                ]
                            }
                        ]
                    }

                ]
            };


            organizer.setOnClickListener('day-slider', function () { showEvents(); console.log("Day back slider clicked"); }, function () { showEvents(); console.log("Day next slider clicked"); });
            organizer.setOnClickListener('days-blocks', function () { showEvents(); console.log("Day block clicked"); }, null);
            organizer.setOnClickListener('month-slider', function () { showEvents(); console.log("Month back slider clicked"); }, function () { showEvents(); console.log("Month next slider clicked"); });
            organizer.setOnClickListener('year-slider', function () { showEvents(); console.log("Year back slider clicked"); }, function () { showEvents(); console.log("Year next slider clicked"); });





        });
    });
</script>
<style>
    body {
        display: felx;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .wrapper {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-line-pack: center;
        align-content: center;
    }

    body > p {
        font-family: "Satellite", "Roboto", sans-serif;
        font-size: 20px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-line-pack: center;
        align-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        margin: 20px 40px;
        text-align: justify;
    }

    .calendar {
        width: 800px;
        height: 800px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        font-family: "Satellite", "Roboto", sans-serif;
        border: 1px solid rgba(21, 21, 21, 0.12);
        -webkit-transform: scale(1);
        transform: scale(1);
        box-shadow: 0px 0px 4px rgba(21, 21, 21, 0.21);
        -ms-user-select: none;
        user-select: none;
        -moz-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -o-user-select: none;
    }

    .calendar.small {
        width: 400px;
        height: 400px;
    }

    .calendar.medium {
        width: 600px;
        height: 600px;
    }

    .calendar.large {
        width: 800px;
        height: 800px;
    }

    .year {
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding: 5px;
        font-size: 14px;
    }

    .year > span {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-line-pack: center;
        align-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        text-transform: uppercase;
    }

    .year > div {
        cursor: pointer;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-line-pack: center;
        align-content: center;
    }

    .month {
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding: 20px 5px;
        font-size: 40px;
        box-shadow: 0px 2px 6px rgba(21, 21, 21, 0.21);
    }

    .month > span {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-line-pack: center;
        align-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        text-transform: uppercase;
    }

    .month > div {
        cursor: pointer;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-line-pack: center;
        align-content: center;
    }

    .labels {
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
    }

    .labels > span {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        font-size: 12px;
        text-transform: uppercase;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-line-pack: center;
        align-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 10px;
    }

    .days {
        width:100%;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        margin-left:4%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        box-shadow: 0px 2px 6px -2px rgba(21, 21, 21, 0.21);
    }

    .row {
        float:right;
        width: 100%;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
    }

    .day {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        padding: 5px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        border-bottom: 1px solid rgba(21, 21, 21, .12);
        border-right: 1px solid rgba(21, 21, 21, .12);
        cursor: pointer;
        -webkit-transition: box-shadow 200ms ease-in-out;
        transition: box-shadow 200ms ease-in-out;
    }

    .day:last-child {
        border-right: none;
    }

    .day:hover {
        background-color: rgba(21, 21, 21, 0.012);
        box-shadow: inset 0px 0px 4px rgba(21, 21, 21, 0.21);
    }

    .day-radios {
        display: none;
    }

    .day-radios:checked + .day {
        background-color: rgba(21, 21, 21, 0.012);
        box-shadow: inset 0px 0px 4px rgba(21, 21, 21, 0.21);
    }

    .day > span {
        width: auto;
        font-size: 14px;
        color: rgba(21, 21, 21, 0.84);
    }

    .day.diluted {
        background-color: rgba(21, 21, 21, 0.021);
        box-shadow: inset 0px 0px 1px rgba(21, 21, 21, 0.12);
    }

    .day.diluted > span {
        width: auto;
        font-size: 10px;
        color: rgba(21, 21, 21, 0.73);
    }

    .events {
        width: 800px;
        height: 800px;
        font-family: "Satellite", "Roboto", sans-serif;
        box-shadow: 0px 0px 4px rgba(21, 21, 21, 0.21);
        border: 1px solid rgba(21, 21, 21, 0.12);
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -ms-user-select: none;
        user-select: none;
        -moz-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -o-user-select: none;
    }

    .events.small {
        width: 400px;
        height: 400px;
    }

    .events.medium {
        width: 600px;
        height: 600px;
    }

    .events.large {
        width: 800px;
        height: 800px;
    }

    .date {
        width: calc(100% - 10px);
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        background-color: ' + this.calendar.colors[1] + ';
        color: ' + this.calendar.colors[3] + ';
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding: 5px;
        font-size: 14px;
    }

    .date > span {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-line-pack: center;
        align-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        text-transform: uppercase;
    }

    .date > div {
        cursor: pointer;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-line-pack: center;
        align-content: center;
    }

    .rows {
        width: 100%;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        overflow: hidden !important;
    }

    .list {
        width: 100%;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        overflow-y: auto !important;
        padding: 0;
        margin: 0;
        color: rgba(21, 21, 21, 0.94);
    }

    .list > li {
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        border-bottom: 1px solid rgba(21, 21, 21, 0.12);
    }

    .list > li:hover {
        box-shadow: inset 0px 0px 4px rgba(21, 21, 21, 0.21);
    }

    .list > li > div {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 2;
        -ms-flex: 2;
        flex: 2;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-line-pack: center;
        align-content: center;
        padding: 10px;
        border-right: 1px solid rgba(21, 21, 21, 0.12);
    }

    .time {
        font-size: 14px;
    }

    .m {
        font-size: 14px;
        text-transform: uppercase;
        padding-left: 5px;
    }

    .list > li > p {
        -webkit-box-flex: 4;
        -ms-flex: 4;
        flex: 4;
        margin: 10px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-line-pack: center;
        align-content: center;
        font-size: 18px;
        word-wrap: break-word;
        word-break: break-word;
    }
</style>

</body>
