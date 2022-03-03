@extends('front.layouts.app')
@include('front.inc.validation_message')
@include('front.inc.auth_message')
@section('content')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <input type="hidden" id="unique_id" name="unique_id" value="{{$unique_id}}">
              <h6>You’ve Created the session: {{$unique_id}}</h6>
              <h2>What set of questions should be included in your results?</h2>
              <div class="csmt-rdo">
                <div class="row">
                  <div class="col-md-6">
                    <div class="radio-item">
                      <input type="radio" checked="checked" name="question_type" id="question_type" value="basic">
                      <label for="question_type">Basic</label>
                      <ul class="basic-list-detail">
                        @forelse($questions as $key => $val)
                        @if($val->type == 'basic')
                        <li>{{$val->question}}</li>
                        @endif
                        @empty
                        <li>No Question are availble yet.</li>
                        @endforelse
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="csmt-rdo">
                      <div class="radio-item">
                        <input type="radio" name="question_type" id="ritemb" value="advance">
                        <label for="ritemb">Advance</label>
                        <ul class="basic-list-detail">
                          <!-- <li>+ Basic Questions -->
                          <ul class="basic-questions">
                            @forelse($questions as $key => $val)
                            @if($val->type == 'advance')
                            <li>{{$val->question}}</li>
                            @endif
                            @empty
                            <li>No Question are availble yet.</li>
                            @endforelse
                          </ul>
                          <!-- </li> -->
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <h5 style="margin-top: 15px;">Select Date</h5>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="csmt-rdo">
                      <div class="radio-item end-date-input">
                        <input type="date" name="end_date" id="end_date">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="parti-list">
                <h4>How many people will be participating? <input type="text" name="number_of_attempt" id="number_of_attempt"></h4>
                <p>We will email the results after 24 hours if at least 3 people answer the questions</p>
              </div>
              <div id="copy_link">
                <form id="search" action="#" method="GET">
                  <fieldset>
                    <input type="email" id="email" name="email" class="email" placeholder="Enter Email..." autocomplete="on" required>
                    <div class="alert alert-danger email-error-msg" style="display:none">
                      <ul></ul>
                    </div>
                  </fieldset>
                  <fieldset>
                    <button class="survey-submit">Submit</button>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <img src="{{asset('assets/front/images/6.png')}}" alt="team meeting">
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
  $(document).ready(function() {
    $(".survey-submit").click(function(e) {
      e.preventDefault();
      var _token = $("input[name='_token']").val();
      var question_type = $("input[type='radio'][name='question_type']:checked").val();
      var email = $('#email').val();
      var unique_id = $("input[name='unique_id']").val();
      var end_date = $("input[name='end_date']").val();
      var number_of_attempt = $('#number_of_attempt').val();
      $.ajax({
        url: "{{ route('front.save-survey-by-creator') }}",
        type: 'POST',
        data: {
          _token: _token,
          unique_id: unique_id,
          email: email,
          number_of_attempt: number_of_attempt,
          question_type: question_type,
          end_date: end_date
        },
        success: function(data) {
          if ($.isEmptyObject(data.error)) {
            var content = '<p ><u id="demo">' + data.data + '</u><button class="btn btn-link" onclick="copy(\'#demo\')">Copy </button></p>';
            $('#copy_link').html(content);
          } else {
            printErrorMsg(data.error);
          }
        }
      });
    });

    function printErrorMsg(msg) {
      $(".email-error-msg").find("ul").html('');
      $(".email-error-msg").css('display', 'block');
      $(".email-error-msg").find("ul").append('<li>' + msg + '</li>');
      $.each(msg, function(key, value) {
        // $(".email-error-msg").find("ul").append('<li>' + value + '</li>');
      });
    }
  });

  function copy(selector) {
    var $temp = $("<div>");
    alert('dsf')
    $("body").append($temp);
    $temp.attr("contenteditable", true)
      .html($(selector).html()).select()
      .on("focus", function() {
        document.execCommand('selectAll', false, null);
      })
      .focus();
    document.execCommand("copy");
    $temp.remove();
  }
</script>
@endsection