@extends('templates.master')

@section('content')
  <div class="auth-page flex bg-gray-100 flex-col justify-center items-center ">
    <h1 class='font-bold text-orange-500 text-5xl mb-10'>Komikku</h1>
    <form method='POST' action='/login/execute'class="mt-3 md-rounded auth-form bg-white flex flex-col justify-evenly items-center px-4">
      @csrf
      <h1 class='text-2xl mb-5 text-orange-500'>Login Dulu Ngab!</h1>
      <div class='w-3/4'>
        <div class="flex flex-col w-full justify-center items-start">
          <label for='email'>Email</label>
          <input class='mt-2 w-full' name='email' type='email' placeholder="enter email">
        </div>
        <div class="mt-5 flex flex-col w-full justify-center items-start">
          <label for='email'>Password</label>
          <input class='mt-2 w-full' name='pwd' type='password' placeholder="enter password">
        </div>
      </div>
      <input type='submit' class='auth-button mt-5 bg-orange-500  text-white font-bold py-3 px-4'>
      <div class="flex flex-col justify-center items-start"></div>
      <p>Belum punya akun? <a class='text-blue-500' href='/signup'>Bikin dulu</a> ngab!</p>
      
      @if (session('loginMsg'))
        <p class='text-red-500'>{{session('loginMsg')}}</p>
      @endif
    </form>
  </div>
  @include('components.footer')



@endsection