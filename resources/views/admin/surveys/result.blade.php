@extends('admin.layouts.app')
@section('styles')
<style>
    .delete {
        background: transparent;
        border: none;
    }

    .qus-table {
        box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
        background: #fff;

    }

    .qus-table table tr th {
        border: 1px solid #ebedf2;
        color: #23c687;
        font-weight: 700;
        font-size: 13px;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 10px 10px;
    }

    .qus-table table tr td {
        vertical-align: middle;
        color: #515365;
        font-size: 13px;
        letter-spacing: 1px;
        border: 1px solid #ebedf2;
        padding: 10px 10px;

    }

    .all-type-ques {
        margin-top: 20px !important;
        display: inline-table;
    }

    .delete-edit-btn {
        text-align: center;
    }

    .delete-edit-btn i {
        color: #888ea8;
    }

    i.fa.fa-trash {
        color: #e7515a !important;
    }
</style>
@endsection
@section('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="rounded h-100 p-4 qus-table">
                @include('admin.inc.validation_message')
                @include('admin.inc.auth_message')
                <!--   <h6 class="mb-4">Question List {{ collect(request()->segments())->last(); }} <span style=" float: right;"><a href="{{route('questions.create')}}"><button style="color: #009CFF;" class="btn">Add</button> </a></span></h6>  -->
                <div class="main-title-heading">
                    <h6 class="m-0">Result </h6>
                </div>
                @foreach($results as $key => $val)
                <div class="ques-heading" style="padding: 10px 20px;">
                    <h3>{{$val['question']}}</h3>
                    <?php $total_survey_taker = 0; ?>
                    @foreach(end($val) as $key2 => $val2)
                    <?php $total_survey_taker = $total_survey_taker + $val2['count']; ?>
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
                </div>
                @endforeach

                <!-- SURVEY INPUT TEXT INPUT NUMBER RESULT -->

                @foreach($input_result as $key => $val)

                <div class="ques-heading" style="padding: 10px 20px;">
                    <h3>{{$val['question']}}</h3>
                    @if($val['option_type'] == 'input')
                    @foreach($val['ans'] as $key2 => $val2)
                    <div class="ques-option" style="margin-bottom: 20px;">
                        <!-- <h4 style="margin: 0 0 10px;">{{--$val2--}} <span style="float: right;">{{--$val2--}}%</span></h4> -->
                        <!-- <div class="progress-bar" style="position: relative; width: 100%; height: 10px; background-color: #c2c2c2; border-radius: 50px;">
                    <div class="color-fill-bar" style="position: absolute; width: 10%; height: 100%; background-color: #23c686;border-radius: 50px;">

                    </div>
                </div> -->
                        <span>{{$val2}}</span>
                    </div>
                    @endforeach
                    @else
                    @php $number_count = 0; @endphp
                    @foreach($val['ans'] as $key3 => $val3)
                    @php $number_count = $number_count+$val3; @endphp
                    @endforeach
                    <div class="ques-option" style="margin-bottom: 20px;">
                        <span>{{ round($number_count/count($val['ans']),2)}}</span>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#dataTable_2').DataTable({

            "oLanguage": {
                "sLengthMenu": "Show _MENU_ "
            }
        });
    });
</script>
@endsection