<x-app-layout>

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-4">
                                <div class="card">

                                    {{-- Carrousel --}}
                                    <div id="carouselExample_{{ $post->id }}" class="carousel slide"
                                        data-bs-ride="carousel">
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

                                    <div class="card-footer bg-transparent border-success">
                                        @foreach ($post->tags as $tag)
                                            <a href="#" class="btn btn-light">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <ul class="list-group list-group-flush navbar-nav">
                            @foreach ($categories as $category)
                                <li class="list-group-item nav-item">
                                    <a href="#" class="nav-link">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>
