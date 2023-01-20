<x-layouts.main xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>
        Xabarnomalar
    </x-slot:title>

    {{--    <x-page-header title="Postlar"/>--}}


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h1 class="section-title mb-3"> Xabarnomalar </h1>
                </div>

            </div>
            @foreach ($notifications as $notification)
                <div class=" border mb-5 p-4 rounded">
                    <div class="position-relative mb-4">
                        <div class="blog-date">
                            <h4 class="font-weight-bold mb-n1">New</h4>
                        </div>
                    </div>
                    <a href="{{'a'}}"
                       class="text-danger text-uppercase font-weight-medium">{{ $notification->created_at }}
                    </a>

                    <h5 class="font-weight-medium mb-2">{{$notification->data['title']}}</h5>

                    <p class="mb-4">{{'Yangi post yaratildi id: '.$notification->data['id']}}</p>

                    <a class="btn btn-sm btn-primary py-2"  href="{{ route('$notification.read',['notification'=>$notification->id]) }}"> O'qildi</a>

                </div>
            @endforeach


            @if ($notifications->hasPages())
                <div class="pagination-wrapper">
                    {{ $notifications->links() }}
                </div>
            @endif

        </div>
    </div>
    <!-- Blog End -->


</x-layouts.main>
