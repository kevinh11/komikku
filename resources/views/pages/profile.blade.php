@extends('templates.master')

@section('content')
  @include('components.navbar')

  {{-- {{$user_data['uid']}} --}}

  <div class='auth-page flex flex-col items-center '>
    <div class='profile-container rounded-lg shadow-md mt-3 flex flex-row flex-row justify-between items-center'>
      <div class='h-full w-1/2 flex flex-row justify-center items-center'>
        <div class=' h-full w-1/2 flex flex-row justify-center items-center'>
          <img class='profile-img' src={{asset('images/defaults/anonymous.png')}}></img>
        </div>
        <div class='h-full w-1/2 flex flex-col justify-center items-center align-left'>
          <h1 class='text-2xl text-orange-500 font-bold'>{{$user_data['username']}}</h1> 
          <h3 class='text-md text-gray-500'>{{count($user_data['products'])}} barang yang dijual</h3>         
        </div>

        <div class='avg-rating'>
          @if (isnull($user_data['avg_rating']))
            <h1>NA</h1>
          @else
            <h1>{{$user_Data['avg_rating']}}</h1> 
          @endif
        </div>
      </div>
      <div>  
    </div>
      

    </div>  

    <div class='flex mt-8 w-4/6 flex-col justify-center items-start'>
      <h1 class='text-orange-500 font-bold text-3xl'>Top Products</h1>

      <div class='flex mt-3 flex-row justify-around items-center'>
        @foreach ($user_data['products'] as $item)
          <h1>{{$item->title}}</h1>

          @foreach($item->reviews as $r)
            <h2>{{$r->rating}}</h2>

          @endforeach
        @endforeach
      </div>
    </div>
  </div>
  {{-- @include('components.footer') --}}
@endsection