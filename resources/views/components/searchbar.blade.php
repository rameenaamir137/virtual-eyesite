@props(['href', 'textbox_placeholder'])

@php
if (!($textbox_placeholder ?? false)) {
  $textbox_placeholder = "Search...";
}   
@endphp

<form action="{{$href}}">
  <div class="row align-items-center">
    <div class="col-9 pe-1">
      <input class="form-control rounded py-2" type="text" name="search" placeholder="{{$textbox_placeholder}}" />
    </div>
    <div class="col-3 ps-1">
      <input class="btn btn-light border rounded-end py-2" type="submit" value="Search" />
    </div>
  </div>
</form>