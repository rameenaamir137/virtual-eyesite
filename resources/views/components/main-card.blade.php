@props(['vert_space', 'padding', 'border'])

@php
if (!($vert_space ?? false)) {
  $vert_space = "12";
}
if(!($padding ?? false)) {
  $padding = "6";
}
if (!($border ?? false)) {
  $st = "";
  $st1 = "";
}
else {
  $st = '--angle:0deg;border-width:10px;border-style:solid;border-radius:5px!important;border-image:linear-gradient(var(--angle),var(--main-color),white, white, white, white)1;';
  $st1 = 'animation:10s rotate linear infinite;';
}
@endphp

<div class={{"py-".$vert_space}}>
  <div class="max-w-7xl mx-auto sm:px-{{$padding}} lg:px-{{$padding + 2}}">
    <div {{$attributes->merge(['class' => 'bg-white overflow-hidden shadow sm:rounded-lg'])}} style="{{$st.$st1}}">
      <div class="max-w-7xl mx-auto p-{{$padding}} lg:p-{{$padding + 2}}">
        {{$slot}}
      </div>
    </div>
  </div>
</div>