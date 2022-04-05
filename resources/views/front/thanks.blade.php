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
                <h3>Thank you for using Wage Share. <span> Once all the participants have submitted their responses, we will email everyone the results. If at least 3 people fill out the results, we will send out an email after 24 hours.</span></h3>
            </div>
        </div>
    </div>
</div>
@endsection

