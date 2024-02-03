@extends('templates.master')

@section('content')
  @include('components.navbar')
  <div class="hero-container bg-orange-500 flex lg:flex-row flex-col justify-end p-4 ">
    <div class="w-1/2 h-full hero-img-container">
      
    </div>
    <div class=" lg:w-1/2 mb-8 lg:mb-0 flex flex-col justify-center items-start px-5">
    
      <h1 class='text-white font-bold text-2xl lg:text-5xl'>Online Shop Jual Beli Manga Pertama </h1> 
      <h1 class='mt-3 text-orange-500 font-bold text-2xl md:text-2xl lg:text-5xl'>di Indonesia</h1>
      <div style='gap:3rem' class="mt-6 flex flex-row justify-around items-center">
        <div class="flex flex-col justify-start items-center">
          <h1 class='font-bold text-5xl text-orange-500'>0</h1>
          <h1 class='text-white text-2xl'>Users</h1>
        </div>
        <div class="flex flex-col justify-start items-center">
          <h1 class='font-bold text-5xl text-orange-500'>0</h1>
          <h1 class='text-white text-2xl'>Manga Sold</h1>
        </div>
        <div class='flex flex-col justify-start items-center'>
          <h1 class='font-bold text-5xl text-orange-500'>0</h1>
          <h1 class='text-white text-2xl'>Users</h1>
        </div>
      </div>
    </div>
  </div>

  <div class='genres-content px-3 w-full flex flex-col justify-center items-center'>
    <h1 class='text-4xl mt-5 font-bold text-orange-500'>Top Genres</h1>
    <div class='genres-slider px-5 flex-row mt-3'>
      <button class='slider-caret left'>
        <i class='fas fa-caret-left'></i>
      </button>
      <a href='#' >
        <div class='genre-block w-full flex flex-row justify-center items-center rounded-md'>
          <h1 class='text-5xl text-white font-bold'>Shounen</h1>

        </div>
      </a>
      <a href='#' >
        <div class='genre-block w-full rounded-md'>
          michelle chrysensia
        </div>
      </a>

      <a href='#' >
        <div class='genre-block  rounded-md'>
          michelle chrysensia
        </div>
      </a>

      <a href='#' >
        <div class='genre-block bg-red-500 rounded-md'>
          michelle chrysensia
        </div>
      </a>
      <a href='#'>
        <div class='genre-block bg-red-500 rounded-md'>
          michelle chrysensia
        </div>
      </a>

      <button class='slider-caret right'>
        <i class='fas fa-caret-right'></i>
      </button>
    </div>
  </div>

  @include('components.footer')

  <script src='js/home.js'></script>
@endsection