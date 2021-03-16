@extends('layouts.website')

@section('content')

    <?php
    //category store in array key=>value
    //category store in array id=>name
    $categoryArray = [];
    foreach ($categories as $category){
        $categoryArray[$category->id] = $category->name;
    }

    $userArray = [];
    foreach ($users as $user){
        $userArray[$user->id] = $user->name;
    }

    ?>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2>Recent Posts</h2>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-4 mb-4">
                    <div class="entry2">
                        <a href="{{ route('single-post',$post) }}">
                           {{-- <img src="{{ asset('/assets/post/img/')}}/{{ $post->image }}" class="image-fluid" alt="Image" width="50px">--}}
                            <img src="{{ asset('/assets/post/img/')}}/{{ $post->image }}" alt="Image" class="img-fluid rounded" style="height: 254px; width: 370px"></a>
                        <div class="excerpt">
                            <span class="post-category text-white bg-secondary mb-3">{{$categoryArray[$post->category_id]}}</span>

                            <h2><a href="{{ route('single-post',$post) }}">{{ $post->title }}</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('website')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">{{ $userArray[$post->user_id] }}</a></span>
                                {{--<span>&nbsp;-&nbsp; July 19, 2019</span>--}}
                                <span>&nbsp;-&nbsp; {{ date_format( date_create($post->created_at),"M d, Y h:i A") }}</span>
                            </div>

                            <p>{{ substr($post->description,0,171) }}</p>
                            {{--<p>
                            <form action="{{ route('single-post',$post) }}" class="mr-1" method="POST">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-danger"> Read More </button>

                            </form>
                            </p>--}}
                            <p><a href="{{ route('single-post',$post) }}">Read More</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                    {{--Pagination laravel    $posts->links() --}}
                    {{ $posts->links() }}
                    {{--<div class="custom-pagination">
                        <span>1</span>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <span>...</span>
                        <a href="#">15</a>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row align-items-stretch retro-layout">

                <div class="col-md-5 order-md-2">
                    <a href="post.blade.php" class="hentry img-1 h-100 gradient" style="background-image: url('{{asset('website')}}/images/img_4.jpg');">
                        <span class="post-category text-white bg-danger">Travel</span>
                        <div class="text">
                            <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                            <span>February 12, 2019</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-7">

                    <a href="post.blade.php" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{asset('website')}}/images/img_1.jpg');">
                        <span class="post-category text-white bg-success">Nature</span>
                        <div class="text text-sm">
                            <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                            <span>February 12, 2019</span>
                        </div>
                    </a>

                    <div class="two-col d-block d-md-flex">
                        <a href="post.blade.php" class="hentry v-height img-2 gradient" style="background-image: url('{{asset('website')}}/images/img_2.jpg');">
                            <span class="post-category text-white bg-primary">Sports</span>
                            <div class="text text-sm">
                                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                                <span>February 12, 2019</span>
                            </div>
                        </a>
                        <a href="post.blade.php" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('{{asset('website')}}/images/img_3.jpg');">
                            <span class="post-category text-white bg-warning">Lifestyle</span>
                            <div class="text text-sm">
                                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                                <span>February 12, 2019</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <div class="site-section bg-lightx">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <div class="subscribe-1 ">
                        <h2>Subscribe to our newsletter</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
                        <form action="#" class="d-flex">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
