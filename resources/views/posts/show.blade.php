@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-10/12 bg-background p-6 rounded-lg">
      <x-post :post="$post" />
    </div>
  </div>
@endsection
