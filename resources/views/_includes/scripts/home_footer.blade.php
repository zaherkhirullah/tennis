
<script>
     sayac = 0;
    setTimeout(function () {
        clickRight(); 
    }, 1);

    function clickRight(id) {
        if(id == undefined){
            date = new Date();
            id = $(`span:contains("${date.getDate()}")`).closest("label").attr("id");
            $('.day').css('background-color','white');
            $('#'+id).trigger('click').css('background-color', '#a0a0a0');
        }
        if ((sayac % 2) == 1) {
            $('.day').css('background-color','white');
            $('#'+id).trigger('click').css('background-color', '#a0a0a0');
            sayac = 1;
        }
    }
</script>
<script src="{{ asset('js/Calender.js') }}"></script>
<script>
$(document).ready(function () {
        hour_list = [];
        _events = [];
        calendar = new Calendar("calendarContainer", "small", ["PZT", 3], ["#054910", "#07911d", "#ffffff", "#ffffff"]);
        organizer = new Organizer("organizerContainer", calendar);
        currentDay = calendar.date.getDate();
        $('.day').on('click', function () {
            id = $(this).attr('id');
            gun = $(this).children('[id^="calendarContainer-day-num-"]').text();
            yil = $("#calendarContainer-year").text();
            ay = months.indexOf($("#calendarContainer-month").text());
            ay = ay + 1;
            stage = $('#stage').val();
            $('#tarih').val(`${yil}-${ay}-${gun}`);
            $.ajax({
                type: 'POST',
                url: "{{ route('ajax') }}",
                dataType: 'json',
                data: {
                    day: gun,
                    month: ay,
                    year: yil,
                    stage:stage,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    hour_list = data;
                    console.log(data);
                    for (i = 0; i < hour_list.length; i++)
                    {
                        _events[i] =
                            {
                                startTime: hour_list[i] + ":00",
                                endTime: (hour_list[i] + 1) + ":00",
                                mTime: "",
                                text: "reservationEt "
                            }
                    }
                    clickRight(id);
                    sayac = sayac + 1;
                    console.log(_events);
                },
                error: function (ex) {
                    alert('Bir hata olustu. '+ ex);
                }
            });
            data = 
            {
                years:
                [{
                    int: yil,
                    months: 
                    [{ 
                        int: ay,
                        days:
                        [{ 
                            int: gun,
                            events: _events
                        }]
                    }]
                }]
            };
            
            organizer.setOnClickListener('day-slider', 
            function () { showEvents();
                console.log("Day back slider clicked");
            }, 
            function () { showEvents();
                console.log("Day next slider clicked");
            });
            
            organizer.setOnClickListener('days-blocks',
            function () {showEvents();
                console.log("Day block clicked");
            }, null);
            
            organizer.setOnClickListener('month-slider',
            function () {showEvents();
                console.log("Month back slider clicked");
            }, 
            function () {showEvents();
                console.log("Month next slider clicked");
            });
            
            organizer.setOnClickListener('year-slider',
            function () {showEvents();
                console.log("Year back slider clicked");
            }, 
            function () {showEvents();
                console.log("Year next slider clicked");
            });
        });
       

    });
    $(document).on('change',function () {
            $('[id^="organizerContainer-list-item-"]').on('click',
            function(){alert('organizer Container list item clicked');});
        });

    function clackme (id) 
    {
        $(`li[id^='organizerContainer-list-item-']`).css('background-color','white');
        $(`#${id}`).css('background-color','#707070');
        time = $(`#${id}-time`).text();
        $('#hour').val(time);
    }
</script>
<script src="{{ asset('js/vue.js') }}"></script>
<script>
    var app = new Vue({
            el: '#app',
            data: {
                name:'',
                service: '',
                address:'',
                show:true
            },
            methods:{
                show_btn:function () {

                }
            }
        }
    )
</script>