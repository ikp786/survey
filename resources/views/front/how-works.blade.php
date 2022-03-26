@extends('front.layouts.app')
@include('front.inc.validation_message')
@include('front.inc.auth_message')
@section('content')


<section class="how-it-works-section">
        <div class="container">
                <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 position-relative wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                                <div class="shape bg-soft-primary rounded-circle rellax w-20 h-20" data-rellax-speed="1" style="top: -2rem; left: -1.9rem; transform: translate3d(0px, -31px, 0px);">
                                </div>
                                <div class="rounded">
                                        <img src="{{asset('assets/front/images/works-bg.png')}}" alt="">
                                </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                                <div class="section-detail how-works">
                                        <h2 class="section-heading mb-3">What is this website about?</h2>
                                        <h3>Have you ever wondered how much you make opposite your colleagues or friends?</h3>
                                        <h3>Are you making enough?</h3>
                                        <h3> Are you close to the average?</h3>
                                        <p class="lead fs-lg"> <span style="margin-top: 20px;">Here you can have a safe, discrete, and anonymous view into everyone’s salary without judgement or embarrassment.</span></p>
                                        <a href="{{route('index')}}" class="learn-more-btn">Create Survey</a>
                                </div>
                        </div>
                </div>
                <section class="how-it-wrks">
                        <h2>How does it work?</h2>
                        <div class="row">
                                <div class="col-md-4">
                                        <div class="hw-wrk mt-4">
                                                <h3>Step 1</h3>
                                                <p>Find 3 or more people to participate. Don’t worry we average the results so nobody is identified and we never ask for names!
                                                </p><br>
                                                <img src="{{asset('assets/front/images/cut1.jpg')}}" alt="">
                                                <a href="#step-1">Learn More</a>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="hw-wrk mt-4">
                                                <h3>Step 2</h3>
                                                <p>One person creates a custom session ID and shares it with the other participants. Choose between basic salary questions or advanced.
                                                </p><br>
                                                <img src="{{asset('assets/front/images/cut2.jpg')}}" class="img-fluid" alt="">
                                                <a href="#step-2">Learn More</a>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="hw-wrk mt-4">
                                                <h3>Step 3</h3>
                                                <p>Once everyone has filled out the questions an email will be sent out with the results The session will remain for active for 24 hours or until at least 3 users have filled out the questions.
                                                </p>
                                                <img src="{{asset('assets/front/images/cut3.jpg')}}" alt="">
                                                <a href="#step-3">Learn More</a>
                                        </div>
                                </div>
                        </div>
                </section>
        </div>
</section>
<section class="steps" id="step-1">
        <div class="container">
                <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="steps-details">
                                        <h2>Steps 1</h2>
                                        <h3>Find 3 or more people that you want to participate.</h3>
                                        <p>Find 3 or more people that you want to participate. Generally speaking, you want to compare to people that are in the same stage of their career as yourself. Remember, this will remain anonymous and only averages will be shared. Reaffirm with the group that this concept only works well if people are honest. We’d recommend using your judgement to ensure that people will put accurate information and have no previous knowledge of people’s respective salary or wage. If you want to establish a different pay calculation because of commission etc. please establish that with your peers before submitting to the survey.</p>
                                </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="steps-img">
                                        <img src="{{asset('assets/front/images/3.png')}}" alt="">
                                </div>
                        </div>
                </div>
        </div>
</section>
<section class="steps bg-color pb-4" id="step-2">
        <div class="container">
                <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="steps-img">
                                        <img src="{{asset('assets/front/images/4.png')}}" alt="">
                                </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="steps-details">
                                        <h2>Step 2</h2>
                                        <h3>Have 1 person create a random session ID </h3>
                                        <p>Have 1 person create a random session ID and share it with the group. Share it with everyone so they can login using the personal session ID.
                                        <p>If you’re creating the session ID you will be asked between a set of basic questions or advanced.</p>
                                        </p>
                                        <div class="row">
                                                <div class="col-md-6">
                                                        <div class="questions-type">
                                                                <h2>Basic Salary Questions</h2>
                                                                <ul class="mt-3">
                                                                        @forelse($questions as $key => $val)
                                                                        @if($val->type == 'basic')
                                                                        <li>{{$val->question}}</li>
                                                                        @endif
                                                                        @endforeach

                                                                        <!-- <li>• State or Province</li>
                                                                        <li>• Years of Experience</li>
                                                                        <li>• Company Name</li>
                                                                        <li>• Job Title</li>
                                                                        <li>• Department</li>
                                                                        <li>• Annual Base Salary (if hourly, please convert to annual)</li> -->
                                                                </ul>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="questions-type">
                                                                <h2>Advanced Salary Questions</h2>
                                                                <h2>Basic Salary Questions plus…</h2>
                                                                <ul class="mt-3">
                                                                        <!-- <li>• Annual Bonus/Commission</li>
                                                                        <li>• Age Range</li>
                                                                        <li>• Highest Level of Education</li>
                                                                        <li>• Signing Bonus</li>
                                                                        <li>• Vacation Days Given</li>
                                                                        <li>• Number Professional Exams completed</li>
                                                                        <li>• Pension provided</li>
                                                                        <li>• Profit Sharing</li> -->
                                                                        @forelse($questions as $key => $val)
                                                                        @if($val->type != 'basic')                                                                        
                                                                        <li>{{$val->question}}</li>
                                                                        @endif
                                                                        @endforeach
                                                                </ul>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>
<section class="steps" id="step-3">
        <div class="container">
                <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="steps-details">
                                        <h2>Step 3</h2>
                                        <h3>We do ask for email in order to send out the results privately</h3>
                                        <p>We do ask for email in order to send out the results privately. Emails are sent out once the predetermined number of users have all filled out the survey. Once the results are in from all the members, we show the group the range of answers without identifying respective salary/pay. Obviously, you know how much you make but now you get insight into how much the group is making on average.</p>
                                </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="steps-img">
                                        <img src="{{asset('assets/front/images/5.png')}}" alt="">
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="steps-details other-details">
                                        <h2>How do we keep it all a secret?</h2>
                                        <p>We do not ask for your name or anything that could identify who you are. All you have to do is find like-minded people that are interested in salary insight.</p>
                                </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="steps-details other-details">
                                        <h2>Why do this?</h2>
                                        <p>There are many factors that could go into a person’s pay like years of service, roles and responsibilities, performance, skillset, etc. That doesn’t mean that everyone should be left in the dark wondering if they’re getting paid adequately. It is in your best interest to understand how much you make opposite your peers. There is only one thing stopping you which is fear of embarrassment or politeness. This website aims to remove the fear and create transparency!</p>
                                </div>
                        </div>
                </div>
                <div class="text-center heading-works-bottom">
                        <div class="rating-star">
                                <ul>
                                        <li><img src="{{asset('assets/front/images/star.svg')}}"></li>
                                        <li><img src="{{asset('assets/front/images/star.svg')}}"></li>
                                        <li><img src="{{asset('assets/front/images/star.svg')}}"></li>
                                        <li><img src="{{asset('assets/front/images/star.svg')}}"></li>
                                        <li><img src="{{asset('assets/front/images/star.svg')}}"></li>
                                </ul>
                        </div>
                        <h5><em>"Inflation, rising cost of living, lack of equity are all reasons to ensure you’re getting paid properly"</em></h5>
                </div>
        </div>
</section>
@endsection