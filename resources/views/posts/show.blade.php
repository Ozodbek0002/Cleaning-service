<x-layouts.main xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>
        {{--        {{$post->id}}-{{$post->title}}--}}
    </x-slot:title>

    <x-page-header title="{{$post->title}}"/>


    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-4">
                        @auth()
                            @canany(['update','delete'], $post)
                                <a class="btn btn-sm btn-outline-dark mr-2" href="{{route('posts.edit',$post->id)}} ">O`zgartrish </a>

                                <form action="{{route( 'posts.destroy',['post'=>$post->id] )}}"
                                      method="POST"
                                      onSubmit="return confirm('Rostan ham o`chirilishini hohlaysizmi?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">O`chirish</button>
                                </form>
                            @endcan
                        @endauth
                    </div>
                    <div class="mb-5">
                        <div class="d-flex mb-2">
                            @foreach($post->tags as $tag)
                                <a class="text-secondary text-uppercase font-weight-medium">{{$tag->name}}</a>
                                <span class="text-primary px-2">|</span>
                            @endforeach
                            <a class="text-secondary text-uppercase font-weight-medium">{{ date_format($post->created_at,'d-m-Y H:m')}}</a>
                        </div>
                        <div class="d-flex mb-2">
                            <a href="{{route('posts.index',['category_id'=>$post->category->id])}}"
                               class="bg-secondary font-weight-medium px-2 py-1 rounded text-white">{{$post->category->name}}</a>
                        </div>

                        <h1 class="section-title mb-3">{{$post->title}}</h1>
                    </div>

                    <div class="mb-5">
                        <img class="/img-fluid rounded w-100 mb-4" src="{{ asset('storage/'.$post->photo) }}"
                             alt="Image">
                        <p>{{$post->content}}</p>
                        <h2 class="mb-4"> Est dolor lorem et ea rfghn </h2>
                        <img class="/img-fluid rounded w-50 float-left mr-4 mb-3"
                             src="{{ asset('storage/'.$post->photo) }}" alt="Image">
                        <p>
                            Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor invidunt at
                            est
                            sanctus sanctus. Clita dolores sit kasd diam takimata justo diam lorem sed. Magna amet sed
                            rebum
                            eos. Clita no magna no dolor erat diam tempor rebum consetetur, sanctus labore sed nonumy
                            diam
                            lorem amet eirmod. No at tempor
                            ebum sit amet ut ut, voluptua diam dolores at
                            sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam dolores
                            takimata
                            dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna sea at sed et eos. Accusam
                            eirmod
                            kasd lorem clita sanctus ut consetetur et. Et duo tempor sea kasd clita ipsum et. Takimata
                            kasd
                            diam justo est eos erat aliquyam et ut. Ea sed sadipscing no justo et eos labore, gubergren
                            ipsum magna dolor lorem dolore, elitr aliquyam takimata sea kasd dolores diam, amet et est
                            accusam labore eirmod vero et voluptua. Amet labore clita duo et no. Rebum voluptua magna
                            eos
                            magna, justo gubergren labore sit voluptua eos.

                        </p>


                    </div>

                    <div class="mb-5">
                        <h3 class="mb-4 section-title">{{$post->comments()->count()}} Izohlar </h3>

                        @foreach($post->comments as $comment)
                            <div class="media mb-4">
                                <img src="/img/user.jpg" alt="Image" class="/img-fluid rounded-circle mr-3 mt-1"
                                     style="width: 45px;">
                                <div class="media-body">
                                    <h6> {{$comment->user->name}} <small><i> {{ $comment->created_at }} </i></small>
                                    </h6>
                                    <p>{{$comment->body}}</p>
                                    {{--                                    <button class="btn btn-sm btn-light"> Reply</button>--}}

                                </div>
                            </div>
                        @endforeach

                    </div>

                    {{--                    commetns--}}
                    <div class="bg-light rounded p-5">

                        <h3 class="mb-4 section-title">Izoh qoldirish</h3>
                        @auth()
                            <form action="{{route('comments.store')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="message">Habar</label>
                                    <textarea name="body" cols="30" rows="5" class="form-control"></textarea>
                                </div>

                                <input type="hidden" value="{{$post->id}}" name="post_id">

                                <div class="form-group mb-0">
                                    <input type="submit" value="yuborish" class="btn btn-primary">
                                </div>

                            </form>
                        @else
                            <div> Izoh qoldirish uchun
                                <a href="{{route('login')}}" class="btn btn-primary">Kiring</a>
                            </div>
                        @endauth
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">

                    {{--                    user--}}
                    <div class="d-flex flex-column text-center bg-secondary rounded mb-5 py-5 px-4">
                        <img src="/img/user.jpg" class="/img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                        <h3 class="text-white mb-3">{{auth()->user()->name}}</h3>
                        <p class="text-white m-0">
                            User haqida malumotlar chiqadi...
                        </p>
                    </div>

                    {{--                    search--}}
{{--                    <div class="mb-5">--}}
{{--                        <div class="w-100">--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" class="form-control" style="padding: 25px;" placeholder="Keyword">--}}
{{--                                <div class="input-group-append">--}}
{{--                                    <button class="btn btn-primary px-4">Search</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    {{--                    Categories--}}
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Kategoriyalar</h3>
                        <ul class="list-inline m-0">
                            @foreach($categories as $category)
                                <li class="mb-1 py-2 px-3 bg-light d-flex justify-content-between align-items-center">
                                    <a href="{{route('posts.index',['category_id'=>$category->id])}}" class="text-dark"><i
                                            class="fa fa-angle-right text-secondary mr-2"></i>{{$category->name}}</a>
                                    <span class="badge badge-primary badge-pill">{{$category->posts()->count()}}</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>


                    {{--                    Tags--}}
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Taglar</h3>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach($tags as $tag)
                                <a href="{{route('posts.index',['tag_id'=>$tag->id])}}"
                                   class="btn btn-outline-secondary m-1">{{$tag->name}}</a>
                            @endforeach

                        </div>
                    </div>

                    <div class="mb-5">
                        <img src="/img/blog-2.jpg" alt="" class="/img-fluid rounded">
                    </div>

                    {{--                    latest posts--}}
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Oxirgi Postlar</h3>
                        @foreach($recent_posts as $recent)

                            <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                <img class="/img-fluid rounded" src="{{ asset('storage/'.$recent->photo) }}"
                                     style="width: 80px; height: 80px; object-fit: cover;" alt="Bu rasm">
                                <div class="d-flex flex-column pl-3">
                                    <a href="{{route('posts.show',['post'=>$recent->id])}}" class="text-dark mb-2"
                                       href="">{{$recent->title}}</a>
                                    <div class="d-flex">

                                        @foreach($recent->tags as $k=>$tag)
                                            <a class="text-secondary text-uppercase font-weight-medium">{{$tag->name}}</a>
                                        <?php
                                            if ($k < $recent->tags()->count()-1){
                                                ?>
                                            <span class="text-primary px-2">|</span>
                                            <?php
                                            }
                                            ?>
                                        @endforeach

                                    </div>
                                    <a class="text-secondary text-uppercase font-weight-medium">{{ date_format($post->created_at,'d-m-Y H:m')}}</a>
                                </div>
                            </div>
                        @endforeach


                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

</x-layouts.main>

