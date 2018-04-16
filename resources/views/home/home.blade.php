@extends('layouts.app')

@section('content')
        <!DOCTYPE html>
<html lang="en">
<head>
    {{--<meta charset="utf-8">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    {{--<meta name="description" content="">--}}
    {{--<meta name="author" content="">--}}

    {{--<title>INSPINIA - Landing Page</title>--}}


    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>





</head>
<body  class="landing-page no-skin-config"
       style="background-image:url(img/183850434.jpg);background-color:black;background-position: center;background-size:contain; background-repeat:no-repeat;background-attachment: fixed;">
<div id="app">




    <div id="features" class="container" style="margin: 5% auto;margin-top: 15%;width: 100%;position:center;">
        <div class="row col-lg-6">
            <div class="">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <h2 style="color:#99e600 !important;font-weight:400;text-align:center">Temiz Kortlar</h2>
                    <p style="color:#99e600 !important;font-weight:400;text-align:left">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>

                </div>
                <div class="col-sm-2"></div>
            </div>
            <div class="">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <h2 style="color:#99e600 !important;font-weight:400;text-align:center">Servis Araçları</h2>
                    <p style="color:#99e600 !important;font-weight:400;text-align:right">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>

                </div>
                <div class="col-sm-2"></div>
            </div>

        </div>
        <div class="row col-lg-6">

            <div class="">
                <div class="col-sm-8">
                    <h2 style="color:#99e600 !important;font-weight:400;text-align:left">Kıyafet Kiralama</h2>
                    <p style="color:#99e600 !important;font-weight:400;text-align:left">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>

                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <h2 style="color:#99e600 !important;font-weight:400;text-align:right">Çeşitli Kortlar</h2>
                    <p style="color:#99e600 !important;font-weight:400;text-align:right">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>

                </div>
            </div>
        </div>
    </div>
    <div class="navy-line"></div>    
    <section class="container features" >
        <div class="row ">
            <div class="col-md-9 panel" style="margin-left:13%;">
                <div class="">
                    <div class="ibox-title text-center">
                            <h1 >Kortunuzu Rezerv Ediniz</h1>
                            <p >Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
                    </div>
                    <div class="ibox-content" id="rezerv">
                        <form action="{{ route('rezervasyon.store') }}" method="post">
                            @csrf
                            @guest
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Adınız ve Soyadınız</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="isim" v-model="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Telefon Numaranız</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telefon" />
                                </div>
                            </div>
                            @endguest
                            <div class="form-group row">
                                <div class="col-md-6" >
                                    <label class="col-sm-8 control-label">Servis istiyor musunuz</label>
                                    <div class="col-sm-4">
                                        <input type="checkbox" class="control-label" name="servis" v-model="servis"/>
                                    </div>
                                </div>
                                <div class="col-md-6" v-if="servis">
                                    <label class="col-sm-2 control-label" style="color:white">Adres</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="servis_adresi" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Kort Seç</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kort_id" id="kort">
                                        @foreach($kortlar as $kort)
                                            <option value="{{ $kort->id  }}">{{ $kort->isim}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <input type="text" name="tarih" id="tarih" readonly class="form-control" placeholder="Bir tarih seçmek için Tikla ">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="saat" id="saat" readonly class="form-control"  placeholder="Tarih seçtikten sonra bir saat seç">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6 col-xs-offset-3 text-center">
                                    <button type="submit"  value="rezerv et" v-if="true" class="btn btn-primary">
                                            Rezerv et
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div id="calendarContainer"  class="col-md-6"></div>
            <div id="organizerContainer" class="col-md-6"></div>
        </div>
    </section>
    



    <section id="contact" class="">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Contact Us</h1>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                </div>
            </div>
            <div class="row m-b-lg">
                <div class="col-lg-3 col-lg-offset-3">
                    <address>
                        <strong><span class="navy">Company name, Inc.</span></strong><br />
                        795 Folsom Ave, Suite 600<br />
                        San Francisco, CA 94107<br />
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
                <div class="col-lg-4">
                    <p class="text-color">
                        Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad perspiciatis, totam corporis laboriosam veritatis, consectetur adipisicing elit quos non quis ad perspiciatis, totam corporis ea,
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="mailto:test@email.com" class="btn btn-primary">Send us mail</a>
                    <p class="m-t-sm">
                        Or follow us on social platform
                    </p>
                    <ul class="list-inline social-icon">
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                    <p>
                        <strong>&copy; 2015 Company Name</strong>
                        <br /> consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="js/Calender.js"></script>


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
            $('#'+id).trigger('click').css('background-color', '#707070');
        }

        if ((sayac % 2) == 1) {

            $('.day').css('background-color','white');

            $('#'+id).trigger('click').css('background-color', '#707070');
            sayac = 1;
        }


    }

    $(document).ready(function () {


        saat_list = [];
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
            kort = $('#kort').val();
            $('#tarih').val(`${yil}-${ay}-${gun}`);



            $.ajax({
                type: 'POST',
                url: "{{ route('ajax') }}",
                dataType: 'json',

                data: {
                    day: gun,
                    month: ay,
                    year: yil,
                    kort:kort,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    saat_list = data;
                    console.log(data);
                    for (i = 0; i < saat_list.length; i++) {
                        _events[i] =
                            {
                                startTime: saat_list[i] + ":00",
                                endTime: (saat_list[i] + 1) + ":00",
                                mTime: "",
                                text: "Rezerv Et "
                            }
                    }
                    clickRight(id);
                    sayac = sayac + 1;
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
                                int: ay,
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


            organizer.setOnClickListener('day-slider', function () {
                showEvents();
                console.log("Day back slider clicked");
            }, function () {
                showEvents();
                console.log("Day next slider clicked");
            });
            organizer.setOnClickListener('days-blocks', function () {
                showEvents();
                console.log("Day block clicked");
            }, null);
            organizer.setOnClickListener('month-slider', function () {
                showEvents();
                console.log("Month back slider clicked");
            }, function () {
                showEvents();
                console.log("Month next slider clicked");
            });
            organizer.setOnClickListener('year-slider', function () {
                showEvents();
                console.log("Year back slider clicked");
            }, function () {
                showEvents();
                console.log("Year next slider clicked");
            });


        });
        $(document).on('change',function () {
            $('[id^="organizerContainer-list-item-"]').on('click',function(){
                alert('fhfjhgtkytkuyuk');
            });
        });


    });



    function fuckme (id) {

        $(`li[id^='organizerContainer-list-item-']`).css('background-color','white');
        $(`#${id}`).css('background-color','#707070');
        time = $(`#${id}-time`).text();
        $('#saat').val(time);
    }




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
        background-color:white;
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
        float: right;
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
        width: 100%;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        margin-left: 4%;
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
        float: right;
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
        background-color:white;
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

<script src="js/vue.js"></script>
<script>

    var app = new Vue({
            el: '#app',
            data: {
                name:'',
                servis: '',
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
</body>
</html>

@endsection
