@extends('front.layouts.app')
@include('front.inc.validation_message')
@include('front.inc.auth_message')
@section('content')
<section class="how-it-works-section">
        <div class="container">
                <div class="row">
                        <div class="col-md-7 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                                <div class="section-detail">
                                        <h2 class="section-heading mb-3">Who Are We?</h2>
                                        <p class="">
                                                Today you hear a lot about inflation, the job market, supply issues, wages, the housing market, etc. - the list goes on and on. The benefit to not talking about salary falls mostly on the employer. We’ve long heard and felt that it is taboo to talk about how much people are being paid. We aim to be disruptive and using technology we want to bring your salary/wage to light. Your wage is a large part of your lively hood and access to transparent salary/wage information will only benefit you. <br><br>
                                                By choosing to participate with your peers we hope that each person receives the clarity that was previously too hard to talk through.
                                        </p>
                                        <span class="mt-5 d-block">Disclaimer<br>
                                                <small>Last updated: February 19, 2022</small>
                                        </span>
                                </div>
                        </div>
                        <div class="col-md-5 position-relative wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                                <div class="shape bg-soft-primary rounded-circle rellax w-20 h-20" data-rellax-speed="1" style="top: -2rem; left: -1.9rem; transform: translate3d(0px, -31px, 0px);">
                                </div>
                                <div class="rounded">
                                        <img src="{{asset('assets/front/images/who-wr-img.png')}}" alt="">
                                </div>
                        </div>
                </div>
        </div>
</section>

<section class="steps">
        <div class="container-fluid">
                <div class="steps-details hwr-der">
                        <!-- <h2>Steps 1</h2> -->
                        <h3>Interpretation and Definitions</h3>
                        <p>The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the<br> same meaning regardless of whether they appear in singular or in plural.</p>
                </div>
        </div>
        <div class="container wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                <ul class="int-def contact-us-section">
                        <li class="brdr-rht brdr-btm">
                                <img src="{{asset('assets/front/images/building.png')}}" alt="">
                                <h4>Company</h4>
                                <p>(referred to as either "the Company", "We", "Us" or <br>"Our" in this Disclaimer) refers to Wage Share</p>
                        </li>
                        <li class="brdr-btm">
                                <img src="{{asset('assets/front/images/srvc.png')}}" alt="">
                                <h4>Services</h4>
                                <p>Refer to the Website</p>
                        </li>
                        <li class="brdr-rht">
                                <img src="{{asset('assets/front/images/userrs.png')}}" alt="">
                                <h4>Services</h4>
                                <p>Means the individual accessing the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable</p>
                        </li>
                        <li>
                                <img src="{{asset('assets/front/images/wag-logo')}}.png" alt="">
                                <h4></h4>
                                <p>You refers to Wage Share, accessible from<br>
                                        <a href="http://www.wageshare.com/" target="_blank">www.wageshare.com</a>
                                </p>
                        </li>
                </ul>
        </div>
</section>


<!-- section class="steps bg-color">
                                <div class="container"> 
                                        <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="steps-img">
                                                                <img src="./{{asset('assets/front/images/3.png')}}" alt="">
                                                        </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="steps-details">
                                                                <h2>Steps 1</h2>
                                                                <h3>Definitions</h3>
                                                                <p>For the purposes of this Disclaimer:</p>
                                                                <h4>Company</h4>
                                                                <p> (referred to as either "the Company", "We", "Us" or "Our" in this Disclaimer) refers to Wage Share.</p>
                                                                <h4>Service</h4>
                                                                <p>refers to the Website.</p>
                                                                <h4>You</h4>
                                                                <p>means the individual accessing the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</p>
                                                                <h4>Website</h4>
                                                                <p>refers to Wage Share, accessible from <a href=""> www.wageshare.com</a></p>
                                                        </div>
                                                        
                                                </div>
                                                
                                        </div>
                                </div>
                        </section> -->

<section class="disclaimer-detail steps-details bg-color m-0">
        <div class="container">
                <div class="row">
                        <div class="col-md-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="wha-pg m-0">
                                        <h3>Disclaimer</h3>
                                        <p>The information contained on the Service is for general information purposes only.</p>
                                        <p>The Company assumes no responsibility for errors or omissions in the contents of the Service.</p>
                                        <p>In no event shall the Company be liable for any special, direct, indirect, consequential, or incidental damages or any damages whatsoever, whether in an action of contract, negligence or other tort, arising out of or in connection with the use of the Service or the contents of the Service. The Company reserves the right to make additions, deletions, or modifications to the contents on the Service at any time without prior notice. This Disclaimer has been created with the help of the Disclaimer Template.</p>
                                        <p>The Company does not warrant that the Service is free of viruses or other harmful components.</p>

                                </div>
                        </div>
                </div>
        </div>
        <div class="line"></div>
        <div class="line-1"></div>
        <!--  <img class="shapes-4" src="./assets/images/bg-5.png"> -->
</section>

<section class="disclaimer-detail steps-details shapes-up m-0">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <div class="wha-pg m-0 m-0">
                                        <h3>External Links Disclaimer</h3>
                                        <p>The Service may contain links to external websites that are not provided or maintained by or in any way affiliated with the Company.</p>
                                        <p>Please note that the Company does not guarantee the accuracy, relevance, timeliness, or completeness of any information on these external websites.</p>


                                </div>
                        </div>
                </div>
        </div>
        <div class="line"></div>
        <div class="line-1"></div>
        <!-- <img class="shapes" src="./assets/images/bg-5.png"> -->
</section>


<section class="disclaimer-detail steps-details bg-color m-0">
        <div class="container">
                <div class="row">
                        <div class="col-md-12 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                                <div class="wha-pg m-0">
                                        <h3>Errors and Omissions Disclaimer</h3>
                                        <p>The information given by the Service is for general guidance on matters of interest only. Even if the Company takes every precaution to insure that the content of the Service is both current and accurate, errors can occur. Plus, given the changing nature of laws, rules and regulations, there may be delays, omissions or inaccuracies in the information contained on the Service.</p>
                                        <p>The Company is not responsible for any errors or omissions, or for the results obtained from the use of this information.</p>

                                </div>
                        </div>

                </div>
        </div>
        <div class="line"></div>
        <div class="line-1"></div>
        <!--  <img class="shapes-4" src="./assets/images/bg-5.png"> -->
</section>

<section class="disclaimer-detail steps-details shapes-up m-0">
        <div class="container">
                <div class="row">

                        <div class="col-md-12 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                                <div class="wha-pg m-0">
                                        <h3>Fair Use Disclaimer</h3>
                                        <p>The Company may use copyrighted material which has not always been specifically authorized by the copyright owner. The Company is making such material available for criticism, comment, news reporting, teaching, scholarship, or research.</p>
                                        <p>The Company believes this constitutes a "fair use" of any such copyrighted material as provided for in section 107 of the United States Copyright law.</p>
                                        <p>If You wish to use copyrighted material from the Service for your own purposes that go beyond fair use, You must obtain permission from the copyright owner.</p>

                                </div>
                        </div>

                </div>
        </div>
        <div class="line"></div>
        <div class="line-1"></div>
        <!-- <img class="shapes" src="./assets/images/bg-5.png"> -->
</section>


<section class="disclaimer-detail steps-details bg-color m-0">
        <div class="container">
                <div class="row">

                        <div class="col-md-12 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                                <div class="wha-pg m-0">
                                        <h3>Views Expressed Disclaimer</h3>
                                        <p>The Service may contain views and opinions which are those of the authors and do not necessarily reflect the official policy or position of any other author, agency, organization, employer or company, including the Company.</p>
                                        <p>Comments published by users are their sole responsibility and the users will take full responsibility, liability and blame for any libel or litigation that results from something written in or as a direct result of something written in a comment. The Company is not liable for any comment published by users and reserves the right to delete any comment for any reason whatsoever.</p>


                                </div>
                        </div>


                </div>
        </div>
        <div class="line"></div>
        <div class="line-1"></div>
        <!--  <img class="shapes-4" src="./assets/images/bg-5.png"> -->
</section>

<section class="disclaimer-detail steps-details shapes-up m-0">
        <div class="container">
                <div class="row">

                        <div class="col-md-12 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                                <div class="wha-pg m-0">
                                        <h3>No Responsibility Disclaimer</h3>
                                        <p>The information on the Service is provided with the understanding that the Company is not herein engaged in rendering legal, accounting, tax, or other professional advice and services. As such, it should not be used as a substitute for consultation with professional accounting, tax, legal or other competent advisers.</p>
                                        <p>In no event shall the Company or its suppliers be liable for any special, incidental, indirect, or consequential damages whatsoever arising out of or in connection with your access or use or inability to access or use the Service.</p>


                                </div>
                        </div>


                </div>
        </div>
        <div class="line"></div>
        <div class="line-1"></div>
        <!-- <img class="shapes" src="./assets/images/bg-5.png"> -->
</section>


<section class="disclaimer-detail steps-details bg-color m-0">
        <div class="container">
                <div class="row">

                        <div class="col-md-12">
                                <div class="wha-pg m-0">
                                        <h3>"Use at Your Own Risk" Disclaimer</h3>
                                        <p>All information in the Service is provided "as is", with no guarantee of completeness, accuracy, timeliness or of the results obtained from the use of this information, and without warranty of any kind, express or implied, including, but not limited to warranties of performance, merchantability and fitness for a particular purpose. The Company will not be liable to You or anyone else for any decision made or action taken in reliance on the information given by the Service or for any consequential, special or similar damages, even if advised of the possibility of such damages.</p>


                                </div>
                        </div>


                </div>
        </div>
        <div class="line"></div>
        <div class="line-1"></div>
        <!--  <img class="shapes-4" src="./assets/images/bg-5.png"> -->

</section>


@endsection