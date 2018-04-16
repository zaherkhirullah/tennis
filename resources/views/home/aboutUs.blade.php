@extends('layouts.app')

@section('content')
<div class="container col-md-12">
    <div class="row">
        <section id="hakkımızda" >
            <div class="col-sm-2"></div>                
            <div class="col-sm-8">
                <h2 class="ibox-title text-center">
                    <b>Hakkımızda</b>
                </h2>
            </div>
        </section>
        <section id="features">
            <div class="col-sm-8 col-xs-offset-2">
                <div class="ibox ibox-content">
                    <h2 style="text-align:center ;color:black;">Hakkımızda ilgili .</h2>
                    <p style="text-align:left">
                        Lorem ipsum dolor sit amet, 
                        aliquet mauris vel etiam vestibulum luctus maecenas, 
                        qui amet mauris. Quisque tempus scelerisque dictum,
                        molestie ultricies vitae ligula vehicula a.
                        Vivamus purus facilisi risus mi ac vestibulum,
                        suspendisse ante viverra, magna mollis et metus,
                        velit lectus pellentesque justo dolor orci auctor.
                        Purus iaculis ullamcorper nec vivamus nonummy vitae. 
                        Hymenaeos erat mauris lobortis amet.
                        Commodo sit lectus semper maecenas, auctor at mi imperdiet
                        consectetuer dapibus, massa leo nibh cursus, mollis tempora 
                        varius blandit. Ac interdum, mi tempor tristique augue, 
                        lorem accumsan elit id, auctor vulputate natoque mattis fames.
                        Blandit amet et enim justo vestibulum cursus, dui vel purus 
                        vivamus odio nunc. Eget nullam, morbi parturient risus pulvinar,
                        augue erat wisi sed vestibulum nec, amet dui vivamus donec sapien 
                        suspendisse, volutpat justo turpis. Et aliquam dolor ultricies.
                        Lectus etiam et, vel quis erat. Nullam erat tellus neque.
                        Lectus in felis elit, et elementum. Egestas cras quam consequat.
                    </p>
                </div>
                <div class="ibox ibox-content">
                    <h2 style="text-align:center; color:black;">
                        Biz Kimiz
                    </h2>
                    <p style="text-align:left">
                            Lorem ipsum dolor sit amet, 
                            aliquet mauris vel etiam vestibulum luctus maecenas, 
                            qui amet mauris. Quisque tempus scelerisque dictum,
                            molestie ultricies vitae ligula vehicula a.
                            Vivamus purus facilisi risus mi ac vestibulum,
                            suspendisse ante viverra, magna mollis et metus,
                            velit lectus pellentesque justo dolor orci auctor.
                            Purus iaculis ullamcorper nec vivamus nonummy vitae. 
                            Hymenaeos erat mauris lobortis amet.
                            Commodo sit lectus semper maecenas, auctor at mi imperdiet
                            consectetuer dapibus, massa leo nibh cursus, mollis tempora 
                            varius blandit. Ac interdum, mi tempor tristique augue, 
                            lorem accumsan elit id, auctor vulputate natoque mattis fames.
                            Blandit amet et enim justo vestibulum cursus, dui vel purus 
                            vivamus odio nunc. Eget nullam, morbi parturient risus pulvinar,
                            augue erat wisi sed vestibulum nec, amet dui vivamus donec sapien 
                            suspendisse, volutpat justo turpis. Et aliquam dolor ultricies.
                            Lectus etiam et, vel quis erat. Nullam erat tellus neque.
                            Lectus in felis elit, et elementum. Egestas cras quam consequat.
                        </p>
                </div>
            </div>
        </section>
        <section id="contact" class="text-center container">
            <div class="col-sm-8 col-xs-offset-2 ibox-content ">
                <h1 class="panel-heading " style="color:black;">
                    Contact Us
                </h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
            </div>
            <div class="col-lg-8 col-xs-offset-2 ibox-content">
                <div class="col-lg-5">
                    <address>
                        <strong>
                            <span class="navy">Company name, Inc.</span>
                        </strong><br />
                        <span style="color:black;">795 Folsom Ave, Suite 600</span><br>
                            <span style="color:black;"> San Francisco, CA 94107</span><br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
                <div class="col-lg-7">
                    <p class="text-color">
                        Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad perspiciatis, totam corporis laboriosam veritatis, consectetur adipisicing elit quos non quis ad perspiciatis, totam corporis ea,
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a href="{{ route('contacts') }}" 
                        class="btn btn-primary">Send us mail</a>
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
</div>
@endsection
