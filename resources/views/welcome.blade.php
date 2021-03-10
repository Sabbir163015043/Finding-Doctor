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
<section class="">
    <div class="news-title">
        <h2>
            <marquee>
                
                <a href="https://bangla.bdnews24.com/lifestyle/article1336533.bdnews">“বাংলাদেশের প্রেক্ষাপটে চিকুনগুনিয়া ভাইরাস নিশ্চিতভাবে সনাক্ত করার স্থান হল রাজধানীর মহাখালিতে অবস্থিত রোগ তত্ত্ব, নিয়ন্ত্রণ ও গবেষণা ইনস্টিটিউট আইইডিসিআর। এই গবেষণা কেন্দ্রে ‘সেলোরজি’ পরীক্ষার মাধ্যমে নিশ্চিতভাবে চিকুনগুনিয়ার ভাইরাস সনাক্ত করা সম্ভব।”</a>

            </marquee>
        </h2>
    </div>
</section>

<!--    About-service-item -->

<div class="service-area health-bg">
    <h1>Our Popular Doctor</h1>
    <div class="service-single-item owl-carousel">
        <div class="service-item">
            <img src="{{ asset('frontend/assets/image/doctor 2.jpg')}}" alt="">
        </div>
        <div class="service-item">
            <img src="{{ asset('frontend/assets/image/doctor-1.jpg')}}" alt="">
        </div>
        <div class="service-item">
            <img src="{{ asset('frontend/assets/image/doctor 3.jpg')}}" alt="">
        </div>
       <div class="service-item">
            <img src="{{ asset('frontend/assets/image/doctor4.jpg')}}" alt="">
        </div>
       
    </div>
</div>

@endsection
