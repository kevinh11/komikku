<nav class="bg-white font-sans flex flex-col sm:flex-row sm:text-left justify-between py-7 px-6 sm:items-baseline w-full">
  <div class="mb-2 lg:w-1/4 w-100 sm:mb-0 flex flex-row justify-between">
    <a href="/" class="text-4xl font-bold no-underline text-orange-500 hover:text-blue-dark">
      Komikku
    </a>
    <button class="bg-orange-500 text-white font-bold py-2 px-4 ml-2 lg:hidden"
    id="toggleButton">
      <i class="fas fa-bars">
      </i>
    </button>
  </div>
  <div class='nav-utility shadow-md lg:shadow-none lg:w-3/4 hidden lg:flex lg:flex-row flex-col justify-around lg:items-center items-start '>
    <div class="search-area flex items-center w-full lg:w-5/6 justify-center ">
      <input id='search' type="text" placeholder="Mau cari apa ngab?" class="border border-gray-300 rounded py-2 px-4 focus:outline-none focus:border-blue-500 w-5/6 "
      />
      <button class=" bg-orange-500 text-white font-bold py-2 px-4 ml-2 sm:flex">
        <i class="fas fa-search">
        </i>
      </button>
    </div>
    <div class="flex w-1/6 lg:flex-row flex-col w-full items-start lg:items-center justify-end mt-4 sm:mt-0 sm:px-6 lg:px-0 ">
      @if (isset($_COOKIE['loggedIn']))
      <a href='/cart'>
        <div class='flex mt-3 lg:mt-0 lg:mr-4 mr-0 flex-row items-center'>
          <i class="nav-icon text-orange-500 fa-solid fa-cart-shopping">
          </i>
          <h2 class="font-bold lg:hidden">
            Cart
          </h2>
        </div>
      </a>
      <a href='/notifications'>
        <div class='flex mt-3 lg:mt-0 flex-row items-center'>
          <i class="nav-icon text-orange-500 fa-solid fa-bell">
          </i>
          <h2 class="font-bold lg:hidden">
            Notifications
          </h2>
        </div>
      </a>
      <a href='/users/{{$user_data['uid']}}'>
        <div class='flex flex-row justify-around items-center'>
          <img class='mini-profile-img lg:mr-2 lg:ml-3 lg:mt-0 mt-2 mr-2 ml-0' src='{{asset("images/defaults/anonymous.png")}}'>
          <h2 class='font-bold'>
            {{$_COOKIE['currentUser']}}
          </h2>
        </div>
      </a>
   
      @else
      <a href='/login' class='flex flex-col lg:flex-row items-start justify-center'>
        <div class='flex mt-3 lg:mt-0 lg:mr-5 mr-0 flex-row items-center'>
          <i class="nav-icon text-orange-500 mr-0 lg:mr-5 fa-solid fa-cart-shopping">
          </i>
          <h2 class="font-bold lg:hidden">
            Cart
          </h2>
        </div>
        <div class='flex mt-3 lg:mt-0 flex-row items-center'>
          <i class="nav-icon text-orange-500  fa-solid fa-bell">
          </i>
          <h2 class="font-bold lg:hidden">
            Notifications
          </h2>
        </div>
        <a href="/login" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">
          <button type='submit' class='auth-button bg-orange-500 text-white font-bold p-3'>
            Log in
          </button>
        </a>
      </a>
      @endif
    </div>
  </div>
</nav>
<script>
  let clicked = false;
  let prevWidth = window.innerWidth;
  document.getElementById('toggleButton').addEventListener('click',
  function() {
    let navArea = document.querySelector('.nav-utility') 
    
    if (clicked) {
      navArea.classList.remove('hidden')
    } else {
      navArea.classList.add('hidden')
    }
    clicked = !clicked

  });

  window.addEventListener('resize', () =>{
    if (window.innerWidth >= prevWidth) {
      document.querySelector('.nav-utility').classList.remove('hidden')
    }
  })
</script>