@php
$filtered = false;
if ($_GET['city'] ?? false) {
  $filtered = true;
}
@endphp

<x-app-layout>
  <x-main-card class="overflow-visible " :border="true">
    <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:50px; text-align:center"><span class="colored-heading">E</span>ye <span class="colored-heading">H</span>ospitals</h2>

    <div class="row align-items-center gx-6 gy-2">
      <div class="col-md-6">
        <x-searchbar :href="route('hospitals')" textbox_placeholder="Search hospitals..." />
      </div>
      
      @if($filtered)
      <div>
      <button onclick="window.location.href='{{ route('hospitals') }}'" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
        <div>Remove Selection</div>
      </button>
      </div>
      @else
      <x-dropdown class="align-left" width="48" align="left">
        <x-slot name="trigger">
          <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
              
              <div>Select City</div>
              

              <div class="ml-1">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
              </div>
          </button>
        </x-slot>
        <x-slot name="content" >
          <x-dropdown-link :href="route('hospitals')">
            None
          </x-dropdown-link>

          @foreach($cities as $c)
          <x-dropdown-link :href="route('hospitals', ['city' => $c->city])">{{ $c->city }}</x-dropdown-link>
          @endforeach
        </x-slot>
      </x-dropdown>
      @endif
    </div>
    
    @if(count($hospitals) == 0)
      <p class="m-4 p-3 border rounded">No hospitals found</p>
    @else
    <style>
      .shannugrid {
        display: grid;
        grid-template-columns: 1fr;
      }
      @media screen and (min-width: 768px) {
        .shannugrid {
          grid-template-columns: 1fr 1fr;
        }
      }
    </style>
    <div class="mt-6 mb-3 shannugrid">
      @foreach($hospitals as $hospital)
        <div class="bg-white overflow-hidden shadow sm:rounded-lg my-3 mx-6 motion-safe:hover:scale-[1.01] transition-all duration-250 p-6 lg:p-8 max-w-7xl border">

          <h3 class="text-xl font-semibold" style="color: var(--main-color); font-weight:bold;">{{$hospital->name}}</h3>

          <p>City: <u><a href="/hospitals?city={{$hospital->city}}">{{$hospital->city}}</a></u></p>

          @if($hospital->address ?? false)
            <p class="text-xs">Full address: {{$hospital->address}}</p>
          @endif

          @if($hospital->contact_no ?? false)
          <p class="text-xs">Contact no: {{$hospital->contact_no}}</p>
          @endif

          @if($hospital->email ?? false)
            <p class="text-xs">Email: {{$hospital->email}}</p>
          @endif

          @if($hospital->website ?? false)
            <br><p class="text-sm text-right">
              Website: <a class="text-blue-500" href="{{$hospital->website}}">{{$hospital->website}}</a>
            </p>
          @endif

        </div>
      @endforeach
    </div>
    <div class="container">
      {{$hospitals->appends($_GET)->links()}}
    </div>
    @endif 
  </x-main-card>
</x-app-layout>
