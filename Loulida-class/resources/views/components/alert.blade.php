@props(['type'])

<div class="m-2 alert alert-{{$type}}" role="alert">
   {{$slot}}
</div>