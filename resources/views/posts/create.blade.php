<x-layouts.main xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>
        Post yaratish
    </x-slot:title>

    <x-page-header title="Yangi post yaratish"/>

    <div class="container ">
        <div class="w-50 py-4">
            <div class="contact-form">
                <div id="success"></div>

                {{--                validate errors--}}
                {{--                @if ($errors->any())--}}
                {{--                    <div class="alert alert-danger">--}}
                {{--                        <ul>--}}
                {{--                            @foreach ($errors->all() as $error)--}}
                {{--                                <li>{{ $error }}</li>--}}
                {{--                            @endforeach--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                @endif--}}

                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group mb-4">
                        <input type="text" class="form-control p-4" name="title" placeholder="Sarlavhasi..."
                               value="{{old('title')}}"/>
                        @error('title')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="control-group mb-4">
                        <label class="form-label select-label">Kategoriya</label>
                        <select name="category_id"  class="form-control" >
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="control-group mb-4">
                        <label class="form-label select-label">Tag</label>
                        <select name="tags[]"  class=" select form-control" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="control-group">
                        <input type="file" class="form-control p-4" name="photo" placeholder="Rasmi..." title="rasmi">
                        @error('photo')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <br>

                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="2" name="short_content"
                                  placeholder="Qisqa mazmuni...">{{old('short_content')}}</textarea>
                        @error('short_content')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="6" name="conten"
                                  placeholder="Matni...">{{old('conten')}}</textarea>
                        @error('conten')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">
                            Yaratish
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</x-layouts.main>

