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
    'action' => 'App\Http\Controllers\Front\Ar\AuthController@registerCreate',
]) !!}
                <div class="form-group">
                    @include('partials.validation_error')
                    <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="الإسم"
                        name="name">

                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="البريد الإلكترونى" name="email">

                    <input placeholder="تاريخ الميلاد" class="form-control" type="text" onfocus="(this.type='date')"
                        id="d_o_b" name="d_o_b">

                    @inject('blood_type','App\Models\BloodType')
                    {!! Form::select('blood_type_id', $blood_type->pluck('name', 'id')->toArray(), null, [
    'class' => 'form-control',
    'id' => 'blood_type',
    'placeholder' => 'فصيلة الدم',
]) !!}

                    @inject('governorate', 'App\Models\Governorate')
                    {!! Form::select('governorate_id', $governorate->pluck('name', 'id')->toArray(), null, [
    'class' => 'form-control',
    'id' => 'governorates',
    'placeholder' => 'المحافظة',
]) !!}
                    @inject('city','App\Models\City')
                    {!! Form::select('city_id', [], null, [
    'class' => 'form-control',
    'id' => 'cities',
    'placeholder' => 'المدينة',
]) !!}

                    <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="رقم الهاتف"
                        name="phone">

                    <input placeholder="آخر تاريخ تبرع" class="form-control" type="text" onfocus="(this.type='date')"
                        id="last_donation" name="last_donation">

                    <input type="password" class="form-control" id="password" placeholder="كلمة المرور" name="password">

                    <input type="password" class="form-control" id="password_confirmation" placeholder="تأكيد كلمة المرور"
                        name="password_confirmation">

                    <div class="create-btn">
                        <input type="submit" value="إنشاء">
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @push('scripts')
            <script>
                $("#governorates").change(function(e) {
                    e.preventDefault();
                    var governorate_id = $("#governorates").val();
                    if (governorate_id) {
                        $.ajax({
                            url: '{{ url('api/v1/cities?governorate_id=') }}'+governorate_id,
                            type: 'get',
                            success: function(data) {
                                if (data.status == 1) {
                                    $("#cities").empty();
                                    $("#cities").append('<option value="">المدينة</option>');
                                    $.each(data.data, function(index, city) {
                                        $("#cities").append('<option value="'+city.id+'">'+city.name+'</option>');
                                    });
                                }
                            },
                            error: function(jqXhr, textStatus, errorMessage) {
                                alert(errorMessage);
                            }
                        });
                    } else {
                        $("#cities").empty();
                        $("#cities").append('<option value="">المدينة</option>');
                    }
                });

            </script>
        @endpush

    @endsection
