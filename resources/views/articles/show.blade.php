<x-app-layout>    
  <x-main-card>
    <x-page-heading style="color: var(--main-color)">{{$article->title}}</x-page-heading><br>
    <p>Author: {{$article->author}}</p>
    <p>Published on: {{$article->published_on}}</p>
    <div id="start-speaking" style="display: block;">
      <div class="row justify-content-end">
        <div class="col-md-3">
          <x-primary-button class="float-end" onclick="startSpeech()">Read Article</x-primary-button>
        </div>
      </div>
    </div>
    <div id="while-speaking" style="display: none;">
      <div class="row justify-content-end">
        <div class="col-md-3">
          <x-primary-button class="float-end" onclick="restartSpeech()">Restart</x-primary-button>
          <x-primary-button class="float-end" onclick="stopSpeech()">Stop</x-primary-button>
        </div>
        <div class="col-md-3">
          <x-primary-button class="float-end" onclick="pauseSpeech()">Pause</x-primary-button>
          <x-primary-button class="float-end" onclick="resumeSpeech()">Resume</x-primary-button>
        </div>
      </div>
    </div>
    <br>
    <p id="article-body">
      @php
      echo nl2br($article->body);
      @endphp
    </p>
    <a href={{$article->source}}><p class="text-blue-500 text-right"><u>Click here for further reading</u></a>
  </x-main-card>
  <script src="../js/articles.js"></script>
</x-app-layout>