@extends('templates.master')

@section('content')
  <div class="auth-page flex bg-gray-100 flex-col justify-center items-center ">
    <h1 class='font-bold text-orange-500 text-5xl mb-10'>Komikku</h1>
    <form method='POST' action='/signup/execute'class="mt-3 py-4 rounded-lg auth-form bg-white flex flex-col justify-evenly items-center px-4">
      @csrf
      <h1 class='text-2xl mb-5 text-orange-500'>Bikin Akun</h1>
      <div class='w-3/4'>
        <div class="flex flex-col w-full justify-center items-start">
          <label for='email'>Username</label>
          <input required class='mt-2 w-full rounded-lg' name='username' type='text' placeholder="enter username">
        </div>
        <div class="mt-5 flex flex-col w-full justify-center items-start">
          <label for='email'>Email</label>
          <input required class='mt-2 w-full rounded-lg' name='email' type='email' placeholder="enter email">
        </div>
        <div class="mt-5 flex flex-col w-full justify-center items-start">
          <label for='email'>Password</label>
          <input required class='mt-2 w-full rounded-lg' name='pwd' type='password' placeholder="enter password">
        </div>
        <div class="mt-5 flex flex-col w-full justify-center items-start">
          <label for='dob'>Date of Birth</label>
          <input required class='mt-2 w-3/5 rounded-lg' name='dob' type='date'>
        </div>
      </div>
      @if (isset($_SESSION))
        @foreach ($_SESSION as $item)
        <p>{{$item}}</p>
        @endforeach
      @endif
   
      <input type='submit' class='auth-button mt-5 bg-orange-500  text-white font-bold py-3 px-4'></button>
      <p>Udah punya akun? gas <a class='text-blue-500' href='/signup'> Login</a> ga si?</p>

      <div class="flex flex-col justify-center items-start"></div>
    </form>
  </div>
  @include('components.footer')



@endsection