@include('front.header')
@include('front.navbar')
<!-- Page Header-->
<header class="masthead" style="background-image: url('{{ asset('front/img/home-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Page Header-->

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <!-- Post preview-->
            @foreach ($datas as $data)
                <div class="post-preview">
                    <a href="{{route('blog.detail',$data->id)}}">
                        <h2 class="post-title">{{$data->title}}</h2>
                        <h3 class="post-subtitle">{{$data->description}}</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">{{$data->name}}</a>
                        {{-- on {{$data->created_at->format('l, d F Y')}} --}}
                        on {{$data->created_at->format('d-m-Y')}}
                    </p>
                </div>

                <!-- Divider-->
                <hr class="my-4" />
            @endforeach

            <!-- Pager-->
            <div class="d-flex justify-content-between mb-4">
                <div class="">
                    <a class="btn btn-primary text-uppercase" href="#!">&larr; Newer Posts</a>
                </div>
                <div class="">
                    <a class="btn btn-primary text-uppercase" href="#!">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content-->
@include('front.footer')
