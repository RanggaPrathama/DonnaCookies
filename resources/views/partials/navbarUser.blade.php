<nav>
    <div>
        <img class="image" src="images/navImg.svg" alt="">
    </div>
    <div class="nav-icon d-flex">
        <a class="icon  text-white  px-3" style="font-size: 30px" href="{{ route('homeUser') }}"><i  class="bi bi-house-door" ></i></a>
        <a class="icon" href="{{ route('cart') }}"><img src="images/cardIcon.svg" alt=""></a>
        <a class="icon" href=""><img src="images/profileIcon.svg" alt=""></a>
       <a class="icon text-white my-auto px-3" style="font-size: 30px" href=" {{ route('logout') }}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" >  <i  class="bi bi-door-open-fill text-white"></i></a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
       </form>
    </div>
</nav>
