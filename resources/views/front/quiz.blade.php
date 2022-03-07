@extends('front.layouts.app')
@include('front.inc.validation_message')
@include('front.inc.auth_message')
@section('content')

<div class="wrapper position-relative overflow-hidden">
   <!-- Top content -->
   <div class="container">
      <div class="logo_area pt-5">
         <a href="index.html">
         </a>
      </div>
      <div class="step_progress">
         <div class="d-flex overflow-hidden">
            <div class="col-2">
               <div class="step d-inline-block position-relative rounded-pill active">1</div>
            </div>
            <div class="col-2 me-auto">
               <div class="step d-inline-block position-relative rounded-pill">2</div>
            </div>
            <div class="col-2 text-end">
               <div class="step d-inline-block position-relative rounded-pill">3</div>
            </div>
            <div class="col-2 text-end">
               <div class="step d-inline-block position-relative rounded-pill">4</div>
            </div>
         </div>
      </div>
   </div>
   <!-- Circles which indicates the steps of the form: -->
   <div class="container">
      <form class="multisteps_form" id="wizard" method="POST" action="{{route('front.save-quiz')}}">
         @csrf
         <input type="hidden" name="survey_creater_id" value="{{$survery->id}}">
         <input type="hidden" name="survey_taker_id" value="{{$survey_taker_id}}">
         <!------------------------- Step-1 ----------------------------->

         @foreach($questions as $key => $val)
         <div class="multisteps_form_panel">
            <div class="content_box shadow text-center bg-white d-flex py-5 position-relative">
               <div class="form_timer d-flex flex-column rounded-pill position-absolute countdown_timer" data-countdown="2022/10/24">
               </div>
               <div class="question_title p-2 text-center w-100">
                  <h1>{{$val->question}}</h1>
               </div>
            </div>
            <div class="row mt-5">
               <div class="left_side_img d-none d-md-block col-md-3">
               </div>
               <input type="hidden" id="question{{$val->id}}" name="question[{{$val->id}}]" value="{{$val->id}}">
               <input type="hidden" id="{{$val->options->type}}" name="question[{{$val->options->type}}]" value="{{$val->options->type}}">
               <div class="col-md-6">
                  <div class="form_items overflow-hidden">
                     <ul class="list-unstyled text-center p-0">
                        <li>
                           <label class="step_1 position-relative bg-white shadow animate__animated animate__fadeInRight animate_50ms active" for="opt_1">
                              @if($val->options->type == 'number')
                              <input type="number" id="answer_{{$val->id}}" name="answer[]" value="">
                              @elseif($val->options->type == 'input')
                              <input type="text" id="answer_{{$val->id}}" name="answer[]" value="">
                              @elseif($val->options->type == 'dropdown')
                              @php
                              $arr = json_decode($val->options->value,true);
                              @endphp
                              <select name="answer[]" id="answer_{{$val->id}}">
                                 @foreach($arr as $key2 => $val2)
                                 <option value="{{$val2}}">{{$val2}}</option>
                                 @endforeach
                              </select>
                              @elseif($val->options->type == 'radio')
                              @php
                              $arr = json_decode($val->options->value,true);
                              @endphp
                              @foreach($arr as $key2 => $val2)
                              <input type="radio" name="answer[]" value="{{$val2}}" />
                              {{$val2}}
                              @endforeach
                              @endif
                           </label>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </form>
      <!------------------------- Form button ----------------------------->
      <div class="row pt-5 float-lg-end flex-column">
         <button type="button" class="f_btn prev_btn bg-white border text-uppercase" id="prevBtn" onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Last Question</button>
         <button type="button" class="f_btn next_btn text-white text-uppercase mt-2" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
   </div>
</div>
@endsection
@section('script')
<!-- Scripts -->
<script src="{{ asset('assets/front/quiz/js/jquery-3.6.0.min.js')}}"></script>
<!-- Countdown-js include -->
<script src="{{ asset('assets/front/quiz/js/countdown.js')}}"></script>
<!-- Bootstrap-js include -->
<script src="{{ asset('assets/front/quiz/js/bootstrap.min.js')}}"></script>
<!-- jQuery-validate-js include -->
<script src="{{ asset('assets/front/quiz/js/jquery.validate.min.js')}}"></script>
<!-- Custom-js include -->
<script src="{{ asset('assets/front/quiz/js/script.js')}}"></script>
<script>
   $('#nextBtn').on('click', function() {

      // var option_type = $("input[type='text'][name='option_type']").val();
      // var id =$(this).attr('data-id');
      // // var data = $(this).attr("option_type").val();
      // alert(id)
      // var option_type  = '';


   });
</script>
@endsection