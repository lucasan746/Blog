@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-secondary btn-lg">Crear una Publicación</button>
        <div class="item mb-5 m-2">
                <div class="media">
                    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-7.jpg" alt="image">
                    <div class="media-body">
                         <h3 class="title mb-1"><a href="blog-post.html">Heading Lorem Ipsum Dolor Sit Amet</a></h3>
                        <div class="meta mb-1"><span class="date">Published 3 months ago</span><span class="time">5 min read</span><span class="comment"><a href="#">4 comments</a></span></div>
                            <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
                            <a class="more-link" href="blog-post.html">Read more &rarr;</a>
                     </div><!--//media-body-->
                </div><!--//media-->
         </div><!--//item-->
    </div>
                
                
                
@endsection
