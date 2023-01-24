
<x-layouts.auth xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>
        {{__('Ro`yhatdan o`tish')}}
    </x-slot:title>



    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">{{__('Ro`yhatdan o`tish')}}</h3>
                    </div>

                    <div class="panel-body p-3">
                        <form action="{{route('register.store')}}" method="POST" >
                            @csrf

                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="text" name="name" placeholder="Ismingiz" required> </div>
                            </div>

                             <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="text" name="email" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input name="password" type="password" placeholder="Parol" required>
                                </div>
                            </div>


                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input name="password_confirmation" type="password" placeholder="Parolni takrorlang" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-3">{{__('Ro`yhatdan o`tish')}}</button>

                            <div class="text-center pt-4 text-muted">{{__('Ro`yhatdan o`tganmisiz?')}}
                                <a href="{{route('login')}}">{{__('Kirish')}}</a>
                            </div>

                        </form>
                    </div>

                    <div class="mx-3 my-2 py-2 bordert">
                        <div class="text-center py-3"> <a href="https://wwww.facebook.com" target="_blank" class="px-2"> <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg" alt=""> </a> <a href="https://www.google.com" target="_blank" class="px-2"> <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" alt=""> </a> <a href="https://www.github.com" target="_blank" class="px-2"> <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png" alt=""> </a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layouts.auth>
