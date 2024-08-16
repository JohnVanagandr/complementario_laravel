<x-app-layout>

    @section('content')
    
      <div>
          {{ $user->name }}
      </div>
      <div>
          @forelse ($posts as $post)
              <div>
                  <h2> {{ $post->title }}</h2>
                  <p>
                      {{ $post->body }}
                  </p>
              </div>
          @empty
              <p>El usuario no tiene posts asociados</p>
          @endforelse
      </div>

@endsection

</x-app-layout>
