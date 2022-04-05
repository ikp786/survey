@extends('front.layouts.app')
@include('front.inc.validation_message')
@include('front.inc.auth_message')
@section('content')
<div id="contacts" class="contact-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <div class="section-heading">
          <h2>Something on your mind? Feel free to send us an email</h2>
          <p>Thoughts? Comments? Concerns? Send us an email and we will respond as soon as we can. </p>
          <div class="phone-info">
            <h4>For any inquiry, please email: <span><i class="fa fa-envelope"></i> <a href="#">info@wageshare.com</a></span></h4>
          </div>
        </div>
      </div>
      <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <form id="contact" action="{{'front.contact-us.store'}}" method="post">
          <div class="row">
            <div class="col-lg-6">
              <fieldset>
                <input type="name" name="name" id="name" placeholder="Name" autocomplete="on">
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on">
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email">
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <textarea name="message" type="text" class="form-control" id="message" placeholder="Message"></textarea>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <button type="submit" id="form-submit" class="main-button ">Send Message</button>
              </fieldset>
            </div>
            <div class="contact-submit-success"></div>
          </div>
          <div class="contact-dec">
            <img src="{{asset('assets/front/images/contact-decoration.png')}}" alt="">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $("#contact").validate({
      rules: {
        name: "required",
        surname: "required",
        email: "required",
        message: "required",
      },
      messages: {
        name: "Please enter your Name",
        surname: "Please enter your Surname",
        email: "Please enter your email",
        message: "Please enter your message",
      }
    })
    $('#form-submit').click(function(e) {
      e.preventDefault();
      // alert('dfdf');
      $("#contact").valid();
      if ($('#contact').valid()) {
        // alert('dfd')
        var name = $('#name').val();
        var surname = $('#surname').val();
        var email = $('#email').val();
        var message = $('#message').val();

        var datass = $('#contact').serialize();
        var formData = new FormData();
        formData.append('name', name);
        formData.append('surname', surname);
        formData.append('email', email);
        formData.append('message', message);
        console.log(formData);
        $.ajax({
          type: 'POST',
          dataType: "json",
          url: '{{route("front.contact-us.store")}}',
          data: {
            'name': name,
            'surname': surname,
            'email': email,
            'message': message
          },
          processData: true,
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          success: function(responce) {
            // alert(responce)
            if (responce == 1) {
              $("#contact")[0].reset();
              $('.contact-submit-success').html('<strong>We&lsquo;ve received your email. Thank you</strong>');
              $('.contact-submit-success').css('color','green');
            } else if (responce == 2) {
              swal("Something wrong");
            }
          }
        });
        return false;
      } else {
        // alert('validated false')
        return false;
      }

    });
  });
</script>


@endsection