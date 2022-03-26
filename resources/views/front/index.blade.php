@extends('front.layouts.app')
@include('front.inc.validation_message')
@include('front.inc.auth_message')

@section('content')

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-md-12 wow fadeInBottom" data-wow-duration="1s" data-wow-delay="1s">
        <div class="left-content private-session m-0">
          <p class="text-center mt-0">Did someone send you a private session ID?</p>
          <form id="search" action="{{route('front.start-survey')}}" method="GET" class="m-auto">
            @csrf
            <fieldset>
              <input type="text" name="unique_ids" id="unique_ids" class="email" placeholder="Enter Code Here..." autocomplete="on" required>
            </fieldset>
            <div class="error-message-taker"></div>
            <fieldset>
              <button type="submit" class="main-button survey-submit-taker">Continue</button>
            </fieldset>
          </form>
          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="left-content how-works mt-4 header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
          <div class="maoin-heading-1">
            <h2 class="section-heading main-heading mb-3"><span>Welcome to</span>
              <span id="neon">
                <span id="n">W</span>
                <span id="e">a</span>
                <span id="o">g</span>
                <span id="n2">e</span>
                <span id="n3"> S</span>
                <span id="n4"> h</span>
                <span id="n5"> a</span>
                <span id="n6"> r</span>
                <span id="n7"> e</span>
                <span id="n8"> !</span>
                </button>
            </h2>
          </div>

          <P class="lead fs-lg mb-4"><span class="">Wage Share offers a group of professionals a place to compare salary details openly and anonymously in pursuit of salary insight</span> </P>
          </span>
          </h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-content main-slider how-works header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <h4>Anonymous, Fast, and Free!</h4>
              <p class="lead fs-lg esey-stepes"><span>Getting started is easy</span></p>
              <ul class="started-steps">
                <li> Create a new session ID below for your group.</li>
                <li> Share the session ID with your group.</li>
                <li> Fill in the questionnaire and we will email the group the average salary.</li>
              </ul>
              <p class="lead fs-lg"><span class="web-tag-line">Insights in an instant!</span></p>
              <!-- <p class="lead fs-lg"><span>We email you the group’s average salary amount without asking your name!</span></p> -->
              <form id="search" action="#" method="GET">
                <fieldset>
                  <input type="text" id="unique_id" name="unique_id" class="email" placeholder="Create a new session ID here (ex. WAGE123)" autocomplete="on" required>
                </fieldset>
                <fieldset>
                <button class="survey-submit">Click to Start</button>
                </fieldset>
                <div class="alert text-danger p-0 print-error-msg error-msg" style="display:none">
                  <ul></ul>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <img src="{{asset('assets/front/images/slider-bg.png')}}" alt="team meeting">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<section class="testimonial-section bg-color wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">

  <div class="testimonials-clean">
    <div class="container">
      <div class="intro">
        <h2 class="text-center">Research Interviews </h2>
        <!-- <p class="text-center">Our customers love us! Read what they have to say below. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae.</p> -->
      </div>
      <div class="row people">
        <div class="col-md-6 col-lg-4 item">
          <div class="box ">
            <p class="description"><i class="fa fa-quote-left"></i> In general, yes it would be great to know how my salary compares with my colleagues. I feel like that information is good to know as it could be used in salary negotiations. It also gives you confidence knowing that you’re being compensated fairly <i class="fa fa-quote-right"></i></p>
            <!-- <div class="actuary-exp">
                        <p>Actuary with 5 years of experience</p>
                      </div> -->
            <div class="author">
              <div class="user-profil">
                <img class="rounded-circle" src="https://i.pinimg.com/originals/cd/30/70/cd3070a2136037debd9afc722a7a1fd6.jpg">
              </div>
              <h5 class="name">Victoria Nova</h5>
              <p class="title">Actuary</p>
            </div>
          </div>

        </div>
        <div class="col-md-6 col-lg-4 item">
          <div class="box">
            <div class="qutoes-icon">

            </div>
            <p class="description"><i class="fa fa-quote-left"></i> I’m an onsite construction lead for a local housing developer. I met with another person in a similar role who worked for a different company. I was curious and asked what their responsibilities were and compared them to mine. I really wanted to compare salary but felt it was taboo and not appropriate. Salary was the last piece of the puzzle…the one that mattered most…but I couldn’t bring it up <i class="fa fa-quote-right"></i></p>
            <div class="qutoes-icon">

            </div>
            <!--  <div class="actuary-exp">
                        <p>Business analyst with 7 years of experience</p>
                      </div> -->
            <div class="author">
              <div class="user-profil">
                <img class="rounded-circle" src="https://sm.askmen.com/askmen_in/article/f/facebook-p/facebook-profile-picture-affects-chances-of-gettin_fr3n.jpg">
              </div>
              <h5 class="name">Mark Joseph</h5>
              <p class="title">Construction Lead </p>
            </div>
          </div>

        </div>
        <div class="col-md-6 col-lg-4 item">
          <div class="box">
            <p class="description"><i class="fa fa-quote-left"></i> You need to look at more than just salary. For me, I want to compare experience, credentials, exams, etc. If I want to negotiate salary, I need to look at the full breadth of benefits and compare apples to apples. There is no insight regarding salary for equivalent roles and I feel work relies on that <i class="fa fa-quote-right"></i></p>
            <!-- <div class="actuary-exp">
                        <p>Construction lead with 12 years of experience</p>
                      </div> -->
            <div class="author">
              <div class="user-profil">
                <img class="rounded-circle" src="https://i.imgur.com/o5uMfKo.jpg">
              </div>
              <h5 class="name">Carina Gill</h5>
              <p class="title">Analyst</p>
            </div>
          </div>

        </div>
      </div>
    </div>

    <section>
  <div class="container">
    <img src="{{asset('assets/front/images/survey-avg-salary.png')}}" alt="">
  </div>
</section>
    
  </div>
  </script>
</section>

<section class="services" id="services">
  <div class="container">

    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="box line">
          <div class="service-img">
            <img class="w-75 mt-2 mb-2" src="{{asset('assets/front/images/fast.png')}}">
          </div>

          <h4 class="title mt-4">
            <a href="#">Fast and Easy!</a>
          </h4>

          <p class="description">
            See the average salary for a group of colleagues or friends in under 3 minutes!
          </p>
          <!-- <div class="actuary-exp">
              <p>Actuary with 5 years of experience</p>
            </div> -->
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="box line">
          <div class="service-img">
            <img src="{{asset('assets/front/images/free.png')}}">
          </div>

          <h4 class="title">
            <a href="#">Free And Anonymous</a>
          </h4>

          <p class="description">
            No payment information required and no names collected. Just simple and valuable insight
          </p>
          <!-- <div class="actuary-exp">
              <p>Actuary with 5 years of experience</p>
            </div> -->
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="box ">
          <div class="service-img">
            <img src="{{asset('assets/front/images/solution.png')}}">
          </div>

          <h4 class="title">
            <a href="#">An Elegant Solution</a>
          </h4>

          <p class="description">
            Ensure you’re being compensated fairly using our secure, quick, and simple solution
          </p>
          <!-- <div class="actuary-exp">
              <p>Actuary with 5 years of experience</p>
            </div> -->
        </div>
      </div>


    </div>
  </div>
</section>
@endsection

@section('script')

<script>

$(document).ready(function() {
        $(".survey-submit").click(function(e){
            e.preventDefault();
       
            var _token = $("input[name='_token']").val();
            var unique_id = $("input[name='unique_id']").val();            
       
            $.ajax({
                url: "{{ route('front.save-survey-uniqueId-by-creator') }}",
                type:'POST',
                data: {_token:_token, unique_id:unique_id},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        // alert(data.survey_id);
                        <?php $val = 3; ?>
                        window.location.href = "<?php echo  url('create-survey'); ?>/"+data.survey_id
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
       
        }); 
       
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }

        $(".survey-submit-taker").click(function(e){
            e.preventDefault();
       
            var _token = $("input[name='_token']").val();
            var unique_ids = $("input[name='unique_ids']").val();            
       
            $.ajax({
                url: "{{ route('front.check-survey-uniqueId-by-taker') }}",
                type:'POST',
                data: {_token:_token, unique_id:unique_ids},
                success: function(data) {
                  console.log(data.error)
                    if($.isEmptyObject(data.error)){
                        
                        
                        window.location.href = "<?php echo  url('start-survey'); ?>/"+unique_ids
                    }else{
                      $(".error-message-taker").html(data.error);
                $(".error-message-taker").css('color','red');
                    }
                }
            });
       
        }); 
       
        function printErrorMsg2(msg) {
            
            $.each( msg, function( key, value ) {
              alert(value)
              $(".error-message-taker").html(value);
                $(".error-message-taker").css('color','red');
            });
        }

    });
</script>
@endsection