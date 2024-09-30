<h1>Hello {{ $user->username }}</h1>

<div>
  <h2>You created {{ $post->title }}</h2>
  <p>{{ $post->body }}</p>

  @if ($post->image)
    <img width="300" src="{{ $message->embed('storage/' . $post->image) }}" alt=""></img>
  @endif
</div>
