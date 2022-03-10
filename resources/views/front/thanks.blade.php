@extends('front.layouts.app')

@section('style')

<style>
    .check_mark_img img {
    width: 20rem;
    height: auto;
}
</style>
@endsection
@include('front.inc.validation_message')
@include('front.inc.auth_message')
@section('content')
  <div id="wrapper">
    <div class="container">
        <div class="row text-center">
            <div class="check_mark_img">
                <img style="width: 20rem; height: auto;" src="https://jthemes.net/themes/html/quizo/thankyou/assets/images/checkmark.png" alt="image_not_found">
            </div>
            <div class="sub_title">
                <span>Your submission has been received</span>
            </div>
            <div class="title pt-1">
                <h3>Thankyou For Give Answer <span> You will receive the result on your registered email.</span></h3>
            </div>
        </div>
    </div>
</div>
@endsection

