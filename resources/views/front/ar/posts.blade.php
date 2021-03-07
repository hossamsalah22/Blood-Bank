@extends('front/ar.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">الرئيسية</li>
                    <li class="breadcrumb-item">المقالات</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="artilce-head">
                        <p class="article-name">{{ $post->title }}</p>
                    </div>
                    <div class="card">
                        <img style="width: 250px; height: auto;" class="article-img shadow p-3 mb-5"
                            src="{{ asset($post->image) }}">
                        <a href="{{ url('/posts/' . $post->id) }}"><button class="btn more2-btn">التفاصيل
                            </button></a>
                    </div>
                    <br>
                </div>
        </div>
        @endforeach
    </div>
    </div>
@endsection
