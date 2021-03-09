@extends('front/ar.master')
@inject('blood_type', 'App\Models\BloodType')
@inject('city', 'App\Models\City')
@inject('model', 'App\Models\DonationRequest')
@section('content')

    <!--inside-article-->
    <div class="all-requests">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                    </ol>
                </nav>
            </div>

            <div class="account-form">
                {!! Form::open([
    'action' => 'App\Http\Controllers\Front\Ar\MainController@donationCreateSave',
    'method' => 'post',
]) !!}
                <div class="form-group">
                    @include('partials.validation_error')
                    <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="إسم المريض"
                        name="name">

                    <input type="phone" class="form-control" id="phone" aria-describedby="emailHelp"
                        placeholder="رقم التواصل" name="phone">

                    <input type="age" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="عمر المريض"
                        name="patient_age">

                    @inject('blood_type','App\Models\BloodType')
                    {!! Form::select('blood_type_id', $blood_type->pluck('name', 'id')->toArray(), null, [
    'class' => 'form-control',
    'id' => 'blood_type',
    'placeholder' => 'فصيلة الدم',
]) !!}
                    <input type="integer" class="form-control" id="phone" aria-describedby="emailHelp"
                        placeholder="عدد الأكياس المطلوبة" name="blood_bags_num">

                    <input type="text" class="form-control" id="phone" aria-describedby="emailHelp"
                        placeholder="اسم المستشفي" name="hospital_name">

                    @inject('city','App\Models\City')
                    {!! Form::select('city_id', $city->pluck('name', 'id')->toArray(), null, [
    'class' => 'form-control',
    'id' => 'cities',
    'placeholder' => 'المدينة',
]) !!}

                    <input type="text" class="form-control" id="phone" aria-describedby="emailHelp"
                        placeholder="عنوان المستشفي" name="hospital_address">

                    @inject('client','App\Models\Client')
                    {!! Form::select('client_id', auth()->user()->pluck('name', 'id')->toArray(), null, [
    'class' => 'form-control',
    'id' => 'client_id',
    'placeholder' => 'الاسم',
]) !!}
                    <div class="create-btn">
                        <input type="submit" value="إنشاء">
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>


    @endsection
