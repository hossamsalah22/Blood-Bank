@extends('front/ar.master')
@inject('model', 'App\Models\Client')
@section('content')

    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                {!! Form::model($model, [
    'action' => 'App\Http\Controllers\Front\Ar\AuthController@loginCheck',
    'method' => 'post',
]) !!}
                @include('partials.validation_error')
                @include('flash::message')
                <div class="logo">
                    <img src="{{ asset('front/imgs/logo.png') }}">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="الجوال">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="كلمة المرور">
                </div>
                <div class="row options">
                    <div class="col-md-6 remember">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                        </div>
                    </div>
                    <div class="col-md-6 forgot">
                        <img src="{{asset('front/imgs/complain.png')}}" width="50" height="50">
                        <a href="{{url('/foreget-password')}}">هل نسيت كلمة المرور</a>
                    </div>
                </div>
                <div class="row buttons">
                    <div class="col-md-6 right">
                        <button type="submit" class="btn btn-login">دخول</button>
                    </div>
                    <div class="col-md-6 left">
                        <button class="btn btn-register"><a href="{{url('/register')}}">انشاء حساب جديد</a></button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
