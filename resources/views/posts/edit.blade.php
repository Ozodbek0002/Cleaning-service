<x-layouts.main xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>
        Postni o'zgartirish #{{$post->id}}
    </x-slot:title>

    <x-page-header title="Postni o'zgartirish #{{$post->id}}"/>


    <div class="container ">
        <div class="w-50 py-4">
            <div class="contact-form">
                <div id="success"></div>

                <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="control-group mb-4">
                        <input type="text" class="form-control p-4" name="title" placeholder="Sarlavhasi..."
                               value="{{$post->title}}"/>
                        @error('title')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="control-group">
                        <input type="file" class="form-control p-4" name="photo" placeholder="Rasmi..." title="rasmi"
                               required="required"/>
                        @error('photo')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="2" name="short_content"
                                  placeholder="Qisqa mazmuni...">{{$post->short_content}}</textarea>
                        @error('short_content')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="6" name="conten"
                                  placeholder="Matni...">{{$post->content}}</textarea>
                        @error('content')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex">

                            <button class="btn btn-success  py-3 px-5" type="submit" id="sendMessageButton">
                                O`zgartrish
                            </button>

                            <a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-danger  py-3 px-5" type="submit" id="sendMessageButton">
                                Bekor qlish </a>

                    </div>

                </form>
            </div>
        </div>

    </div>


</x-layouts.main>
