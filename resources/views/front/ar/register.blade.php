@extends('front/ar.master')
@section('content')

    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                {!! Form::open([
    'action' => 'App\Http\Controllers\Front\Ar\ClientsController@store',
]) !!}
                <div class="form-group">
                    @include('partials.validation_error')
                    <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="الإسم">

                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="البريد الإلكترونى">

                    <input placeholder="تاريخ الميلاد" class="form-control" type="text" onfocus="(this.type='date')"
                        id="d_o_b">

                    {{-- <input type="blood_type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="فصيلة الدم"> --}}
                    <select class="form-control" id="blood_type_id" name="blood_type_id">
                        <option selected disabled hidden value="">فصيلة الدم</option>
                        @foreach ($bloodTypes as $bloodtype)
                            <option value="{{ $bloodtype->id }}">{{ $bloodtype->name }}</option>
                        @endforeach
                    </select>

                    <select class="form-control" id="governorate" name="governorate_id">
                        <option selected disabled hidden value="">المحافظة</option>
                        @foreach ($governorates as $governorate)
                            <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                        @endforeach
                    </select>

                    <select class="form-control" id="city" name="city">
                        <option selected disabled hidden value="">المدينة</option>
                        {{-- @foreach ($governorate->cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach --}}
                    </select>

                    <input type="text" class="form-control" id="phone" aria-describedby="emailHelp"
                        placeholder="رقم الهاتف">

                    <input placeholder="آخر تاريخ تبرع" class="form-control" type="text" onfocus="(this.type='date')"
                        id="last_donation">

                    <input type="password" class="form-control" id="password" placeholder="كلمة المرور">

                    <input type="password" class="form-control" id="password_confirmation" placeholder="تأكيد كلمة المرور">

                    <div class="create-btn">
                        {{-- <input type="submit" value="إنشاء" wire:loading.attr="disabled"> --}}
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">إنشاء</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        

    @endsection
