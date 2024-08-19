<x-app-layout>

    @section('content')
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card">

                            {{-- Carrousel --}}
                            <div id="carouselExample_{{ $post->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($post->images as $item)
                                        @if ($loop->first)
                                            <div class="carousel-item active">
                                                <img src="{{ $item->url_path }}" class="d-block w-100"
                                                    alt="{{ $item->name }}">
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <img src="{{ $item->url_path }}" class="d-block w-100"
                                                    alt="{{ $item->name }}">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExample_{{ $post->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExample_{{ $post->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->body }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection

</x-app-layout>
