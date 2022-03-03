@extends('front.layouts.app')
@include('front.inc.validation_message')
@include('front.inc.auth_message')
@section('content')
<div class="main-banner  wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-content how-works header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <h6>You’ve Created the session: {{$survey->unique_id}}</h6>
              <h2>What set of questions should be included in your results?</h2>
              <div class="csmt-rdo">
                <div class="row">
                  <div class="col-md-12">
                    <div class="radio-item">
                      <input type="radio" id="ritema" name="ritem" value="ropt1" checked="checked">
                      <label for="ritema">{{ucfirst($survey->question_type)}}</label>
                      <ul class="basic-list-detail">
                        @foreach($questions as $key => $val)
                        <li>{{$val->question}}</li>                      
                        @endforeach
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-6">
                  </div>
                </div>
              </div>
              <div class="parti-list">
                <h4>How many people will be participating? <span class="total-ser">{{$survey->number_of_attempt}}</span></h4>
                <p class="lead fs-lg"><span>We will email the results after 24 hours if at least 3 people answer the questions</span></p>
              </div>
              <form id="search" action="{{route('front.quiz.start',$survey->unique_id)}}" method="post">
                @csrf
                <fieldset>
                  <input type="email" name="email" class="email" placeholder="Enter Email..." autocomplete="on" required>
                  <input type="hidden" value="{{$survey->unique_id}}" name="unique_id">
                </fieldset>
                <fieldset>
                  <button class="main-button">Submit</button>
                </fieldset>
              </form>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <img src="{{asset('assets/front/images/bg_3.png')}}" alt="team meeting">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>  
</script>
@endsection