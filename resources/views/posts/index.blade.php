<x-layouts.main xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>
        {{__('Postlar')}}
    </x-slot:title>

    <x-page-header title="{{__('Postlar')}}"/>

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{__('Post yaratildi!')}}
                </div>
            @endif
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h1 class="section-title mb-3"> {{ $title }} </h1>
                </div>


            </div>
            <div class="row">

                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="position-relative mb-4">
                            <img style="width: 300px; height: 300px;" class="img-fluid rounded w-100"
                                 src="{{ asset('storage/'.$post->photo) }}" alt="">
                            <div class="blog-date">
                                <h4 class="font-weight-bold mb-n1">{{date_format($post->created_at,'d')}}</h4>
                                <small class="text-white text-uppercase">{{date_format($post->created_at,'M')}}</small>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            @foreach($post->tags as $tag)
                                <a class="text-secondary text-uppercase font-weight-medium">{{$tag->name}}</a>
                                <span class="text-primary px-2">|</span>
                            @endforeach
                        </div>
                        <a href="{{route('posts.index',['category_id'=>$post->category->id])}}"
                           class="text-danger text-uppercase font-weight-medium">{{ $post->category->name }}</a>

                        <h5 class="font-weight-medium mb-2">{{$post->title}}</h5>
                        <p class="mb-4">{{$post->short_content}}</p>

                        @if(auth()->user()->hasRole('admin'))
                            <a class="btn btn-sm btn-primary py-2" href="{{route('posts.show',['post'=>$post->id])}}">Ko'rish</a>
                        @endif

                    </div>
                @endforeach


            </div>

            @if ($posts->hasPages())
                <div class="pagination-wrapper">
                    {{ $posts->links() }}
                </div>
            @endif

        </div>
    </div>
    <!-- Blog End -->


</x-layouts.main>
