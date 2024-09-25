<x-app-layout>
  <x-main-card :border="true">
    <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:50px; text-align:center"><span class="colored-heading">A</span>rticles</h2>
    @if(count($articles) == 0)
      <p>No articles found</p>
    @else
      @foreach($articles as $article) 
      <x-main-card class="cool-link my-2 motion-safe:hover:scale-[1.01] transition-all duration-250" vert_space="2">
        <h3 class="text-xl font-semibold py-1" style="color: var(--main-color)"><a href={{"/articles/".$article->id}}>{{$article->title}}</a></h3>
        <p class="text-base transform -translate-x-1/2">
          @php
          echo nl2br(substr($article->body, 0, 256).'...');
          @endphp
        </p>
        <p class="text-xs text-right">By {{$article->author}} &emsp; Date: {{$article->published_on}}</p>
      </x-main-card>
      @endforeach
    @endif
  </x-main-card>
</x-app-layout>
