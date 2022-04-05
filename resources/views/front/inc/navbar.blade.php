<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{route('index')}}" class="logo w-20">
              <img src="{{asset('assets/front/images/logo.png')}}" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="{{route('index')}}" class=" @if(request()->is('/') || request()->is('/')) active @endif ">Home</a></li>
              <li class="scroll-to-section"><a href="{{route('front.how-works')}}" class="@if(request()->is('how-works*') || request()->is('how-works*')) active @endif">How it works</a></li>
              <li class="scroll-to-section"><a href="{{route('front.who-we-are')}}" class="@if(request()->is('who-we-are*') || request()->is('who-we-are*')) active @endif">Who we are</a></li>
              <li class="scroll-to-section"><a href="{{route('front.term-condition')}}" class="@if(request()->is('term-condition*') || request()->is('term-condition*')) active @endif">Terms and Conditions</a></li>
              <li class="scroll-to-section"><a href="blog" target="_blank" class="">Blog</a></li>
              <li class="scroll-to-section"><div class="main-red-button"><a href="{{route('front.contact-us')}}">Contact Us</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>

  