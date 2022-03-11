<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Email</title>
    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 8px rgb(126, 126, 126);
            border-radius: 5px;
        }

        .logo {
            width: 300px;
            padding: 0;
            margin: 4px auto;
        }

        ul {
            padding: 0;
        }

        .footer ul li {
            margin: 0 5px;
        }

        .footer ul li a {
            width: 30px;
            height: 30px;
            background: #000;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
            border-radius: 50px;
            color: #fff;
            text-decoration: none;
        }

        @media only screen and (max-width: 620px) {}
    </style>
</head>

<body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <div class="container">
        <div class="logo">
            <img style="width: 100%;" src="https://stageofproject.com/survey-portal/assets/images/logo.png" alt="">
        </div>


        @foreach($results as $key => $val)
        {{--@dd(end($val)) --}}

        <div class="ques-heading" style="padding: 10px 20px;">
            <h3>{{$val['question']}}</h3>

            <?php $total_survey_taker = 0; ?>
            @foreach(end($val) as $key2 => $val2)
            <?php $total_survey_taker = $total_survey_taker+$val2['count']; ?>
            @endforeach
            
            
            @foreach(end($val) as $key2 => $val2)
            @php
            $arrCount = $val2['count'] / $total_survey_taker *100;

            @endphp
            <div class="ques-option" style="margin-bottom: 20px;">
                <h4 style="margin: 0 0 10px;">{{$val2['value']}} <span style="float: right;">{{$arrCount}}%</span></h4>
                <div class="progress-bar" style="position: relative; width: 100%; height: 10px; background-color: #c2c2c2; border-radius: 50px;">
                    <div class="color-fill-bar" style="position: absolute; width: {{$arrCount}}%; height: 100%; background-color: #23c686;border-radius: 50px;">

                    </div>
                </div>
            </div>

            @endforeach
            
            <!-- <div class="ques-option" style="margin-bottom: 20px;">
                <h4 style="margin: 0 0 10px;">IKP<span style="float: right;">50%</span></h4>
                <div class="progress-bar" style="position: relative; width: 100%; height: 10px; background-color: #c2c2c2; border-radius: 50px;">
                    <div class="color-fill-bar" style="position: absolute; width: 90%; height: 100%; background-color: #23c686;border-radius: 50px;">

                    </div>

                </div>
            </div>
            <div class="ques-option " style="margin-bottom: 20px;">
                <h4 style="margin: 0 0 10px;">You <span style="float: right;">50%</span></h4>
                <div class="progress-bar" style="position: relative; width: 100%; height: 10px; background-color: #c2c2c2; border-radius: 50px;">
                    <div class="color-fill-bar" style="position: absolute; width: 50%; height: 100%; background-color: #23c686;border-radius: 50px;">

                    </div>
                </div>
            </div>
            <div class="ques-option" style="margin-bottom: 20px;">
                <h4 style="margin: 0 0 10px;">Me <span style="float: right;">50%</span></h4>
                <div class="progress-bar" style="position: relative; width: 100%; height: 10px; background-color: #c2c2c2; border-radius: 50px;">
                    <div class="color-fill-bar" style="position: absolute; width: 50%; height: 100%; background-color: #23c686;border-radius: 50px;">

                    </div>
                </div>
            </div> -->
        </div>
        @endforeach














        <!-- <div class="ques-heading" style="padding: 10px 20px;">
            <h3>Who are You?</h3>
            <div class="ques-option" style="margin-bottom: 20px;">
                <h4 style="margin: 0 0 10px;">I <span style="float: right;">50%</span></h4>
                <div class="progress-bar" style="position: relative; width: 100%; height: 10px; background-color: #c2c2c2; border-radius: 50px;">
                    <div class="color-fill-bar" style="position: absolute; width: 50%; height: 100%; background-color: #23c686;border-radius: 50px;">

                    </div>
                </div>
            </div>
            <div class="ques-option" style="margin-bottom: 20px;">
                <h4 style="margin: 0 0 10px;">I <span style="float: right;">50%</span></h4>
                <div class="progress-bar" style="position: relative; width: 100%; height: 10px; background-color: #c2c2c2; border-radius: 50px;">
                    <div class="color-fill-bar" style="position: absolute; width: 50%; height: 100%; background-color: #23c686;border-radius: 50px;">

                    </div>

                </div>
            </div>
            <div class="ques-option " style="margin-bottom: 20px;">
                <h4 style="margin: 0 0 10px;">You <span style="float: right;">50%</span></h4>
                <div class="progress-bar" style="position: relative; width: 100%; height: 10px; background-color: #c2c2c2; border-radius: 50px;">
                    <div class="color-fill-bar" style="position: absolute; width: 50%; height: 100%; background-color: #23c686;border-radius: 50px;">

                    </div>
                </div>
            </div>
            <div class="ques-option" style="margin-bottom: 20px;">
                <h4 style="margin: 0 0 10px;">Me <span style="float: right;">50%</span></h4>
                <div class="progress-bar" style="position: relative; width: 100%; height: 10px; background-color: #c2c2c2; border-radius: 50px;">
                    <div class="color-fill-bar" style="position: absolute; width: 50%; height: 100%; background-color: #23c686;border-radius: 50px;">

                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <ul style="display: flex; text-align: center; margin: auto; justify-content: center; list-style: none;">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
            <p style="text-align:center;">© Copyright 2022 Servay Co. All Rights Reserved.</p>
        </div> -->
    </div>

</body>

</html>