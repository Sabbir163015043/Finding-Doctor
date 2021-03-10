@extends('front_end.layout.master')
@section('content')
<div class="search-bar-area">
    <div class="contianer">
        <div class="row">
            <form action="{{route('data.filter')}}" method="get">
                @csrf
            <div class="col-md-2 form-location col-md-offset-2 nopadding">
                <div class="location">
                    <div class="form_group ">
                        <select name="city" type="text" class="form-control doctor-control-form">
                            <option value="" hidden selected disabled>Select Cities...</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('city') }}</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 from-doctor nopadding">
                <div class="doctor">
                    <div class="form_group">
                        <select name="category" type="text" class="form-control doctor-control-form">
                            <option value="" hidden selected disabled>I am looking for</option>
                            <option value="doctor">Doctor</option>
                            <option value="hospital">Hospital</option>
                        </select>
                    </div>
                    <small class="text-danger">{{ $errors->first('category') }}</small>
                </div>
            </div>
            <div class="col-md-4 form-hospital nopadding">
                <select name="doctor_type" type="text" class="form-control doctor-control-form">
                        <option value="" hidden selected disabled>--select doctor category--</option>
                        @foreach($doctortypes as $type)
                            <option value="{{ $type->id }}">{{$type->name}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="col-md-1 nopadding">
                <form>
                    <div class="forom_group">
                        <button type="submit" class="button"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            </form>
        </div>
    </div>
</div>

<section class="slide-area">
    <div class="overlay"></div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{ asset('frontend/assets/image/Apallo2.jpg')}}" alt="...">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="slider-content">
                                    <h2>Biggest hospital in bangladesh</h2>
                                    <a href="https://www.apollodhaka.com/"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('frontend/assets/image/Squre1.jpg')}}" alt="...">
                <div class="carousel-caption">
                    <div class="slider-content">
                        <h2>Biggest hospital in bangladesh</h2>
                        <a href="https://www.squarehospital.com/"></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('frontend/assets/image/Ibne%20cina%204.jpg')}}" alt="...">
                <div class="carousel-caption">
                    <div class="slider-content">
                        <h2>Biggest hospital in bangladesh</h2>
                        <a href="https://www.ibnsinatrust.com/"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->

    </div>
</section>
<!-- Team -->
<section id="team" style="padding: 0;margin-top:-80px">
    <div class="container">
        <h3 class="section-title">Search Item ({{$filterdatas->count()}})</h3>
        <div class="row">
            <!-- Team member -->
            @if(!$filterdatas->count())
            <h3 class="text-danger text-center"> Oh!! Sorry No Data Found !!</h3>
            @endif
            @foreach($filterdatas as $data)
                @if($data->category == "hospital")
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center" style="padding:10px">
                                   <center><img class=" img-fluid" src="{{asset("")}}{{$data->image}}" alt="card image"></center>
                                    <h4 class="card-title">{{$data->hospital_name}}</h4>
                                    <h5 class="card-title">{{$data->city->name}}</h5>
                                    <p style="word-wrap: break-word;font-size: 15px" class="card-text text-center">{{$data->hospital_details}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @else
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                <div class="mainflip">
                                    <div class="frontside">
                                        <div class="card">
                                            <div class="card-body text-center" style="padding:10px">
                                                <center><img class=" img-fluid" src="{{asset("")}}{{$data->image}}" alt="doctor image"></center>
                                                <h4 class="card-title">{{$data->doctor_name}}</h4>
                                                <h5 class="card-title">{{$data->designation}}</h5>
                                                <h5 class="card-title">{{$data->doctortype->name}}</h5>
                                                <p style="word-wrap: break-word;font-size: 15px" class="card-text text-center">{{$data->doctor_details}}</p>
{{--                                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>--}}
                                                <p style="font-size: 10px" class="text-right">{{$data->city->name}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
            @endif
            @endforeach
            <!-- ./Team member -->
        </div>
    </div>
</section>
<!-- Team -->
<section class="">
    <div class="news-title">
        <h2>
            <marquee><a href="">আবরার হত্যা নিয়ে বিবৃতি দেওয়ায় মিয়া সেপ্পোকে ডেকে অসন্তোষ প্রকাশ</a></marquee>
        </h2>
    </div>
</section>

<!--    About-service-item -->

<div class="service-area health-bg">
    <h1>Our Health tips</h1>
    <div class="service-single-item owl-carousel">
        <div class="service-item">
            <img src="{{ asset('frontend/assets/image/health-1.jpg')}}" alt="">
        </div>
        <div class="service-item">
            <img src="{{ asset('frontend/assets/image/health-1.jpg')}}" alt="">
        </div>
        <div class="service-item">
            <img src="{{ asset('frontend/assets/image/health-1.jpg')}}" alt="">
        </div>
        <div class="service-item">
            <img src="{{ asset('frontend/assets/image/health-1.jpg')}}" alt="">
        </div>
    </div>
</div>

@endsection
@push('style-css')
    <style>
        /* FontAwesome for working BootSnippet :> */



        .btn-primary {
            color: #fff;
            background-color: #007b5e;
            border-color: #007b5e;
        }

        section {
            padding: 60px 0;
        }

        section .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 50px;
            text-transform: uppercase;
        }

        #team .card {
            border: none;
            background: #ffffff;
        }




        .frontside {
            position: relative;
            -webkit-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            z-index: 2;
            margin-bottom: 30px;
        }

        .frontside,
        .backside {
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transition: 1s;
            -webkit-transform-style: preserve-3d;
            -moz-transition: 1s;
            -moz-transform-style: preserve-3d;
            -o-transition: 1s;
            -o-transform-style: preserve-3d;
            -ms-transition: 1s;
            -ms-transform-style: preserve-3d;
            transition: 1s;
            transform-style: preserve-3d;
        }

        .frontside .card,
        .backside .card {
            min-height: 312px;
        }

        .backside .card a {
            font-size: 18px;
            color: #007b5e !important;
        }

        .frontside .card .card-title,
        .backside .card .card-title {
            color: #007b5e !important;
        }

        .frontside .card .card-body img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }
    </style>
@endpush
