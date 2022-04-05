@extends('admin.layouts.app')
@section('styles')
<style>
    .dropdown-cut-btn {
        position: relative;
    }
    .dropdown-cut-btn button {
        position: relative;
        top: 20px;
        right: 10px;
        border: none;
        background: transparent;
        float: right;
        font-size: 20px;
        color: #787878;
    }
    .dropdown-cut-btn input {
        width: 93%;
        float: left;
        margin-right: 4px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @include('admin.inc.validation_message')
                @include('admin.inc.auth_message')
                {!! Form::model($questions, ['method' => 'PATCH','route' => ['questions.update', $questions->id],'files'=>true]) !!}
                @csrf
                <h6 class="mb-4">Edit Question</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" {{ ($questions->type== 'basic') ?  "checked" : "" }} name="type" value="basic">
                    <label class="form-check-label" for="inlineRadio1">Basic</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" {{ ($questions->type== 'advance') ?  "checked" : "" }} name="type" value="advance">
                    <label class="form-check-label" for="inlineRadio2">Advance</label>
                </div>
                </br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" value="{{$questions->question}}" name="question" class="form-control">
                            <label for="floatingInput">Question</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-control">
                            <select class="form-select" name="select_option_type" id="select_question_type">
                                <option {{ ($questions->options->type ==  'dropdown') ? ' selected="selected"' : ''}} value="dropdown">Dropdown</option>
                                <option {{ ($questions->options->type ==  'input') ? ' selected="selected"' : ''}} value="input">Text</option>
                                <option {{ ($questions->options->type ==  'number') ? ' selected="selected"' : ''}} value="number">Number</option>
                                <option {{ ($questions->options->type ==  'radio') ? ' selected="selected"' : ''}} value="radio">Radio</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <div id="add_option_div" class="form-floating mb-3 dropdown-cut-btn">
                            <?php //dd(count(json_decode($questions->options->value))); 
                            ?>

                            @if($questions->options->type == 'dropdown' || $questions->options->type == 'radio')
                            @if(count(json_decode($questions->options->value)) > 0)
                            @php
                            $cnt = 0;
                            @endphp
                            @foreach(json_decode($questions->options->value) as $val)
                            <input type="text" name="option[{{$cnt}}]" value="{{$val}}" class="form-control add_dropdown delete_dropdown{{$cnt}}" data-count="{{$cnt}}" id="add_dropdown">
                            @if($cnt != 0)<button class="delete_dropdown{{$cnt}}" onclick="remove_dropdown({{$cnt}})" type="button">X</button>@endif<label for="floatingInput">Option</label>
                            @php $cnt++; @endphp
                            @endforeach
                            @else
                            <input type="text" name="option[0]" class="form-control add_dropdown" data-count="0" id="add_dropdown"><label for="floatingInput">Option</label>
                            @endif
                            @elseif($questions->options->type == 'text')
                            <input type="text" name="option[0]" readonly class="form-control add_dropdown"><label for="floatingInput">Option</label>
                            @elseif($questions->options->type == 'number')
                            <input type="text" name="option[0]" readonly class="form-control add_dropdown"><label for="floatingInput">Option</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" value="{{$questions->question_heading}}" name="question_heading" class="form-control">
                            <label for="floatingInput">Question Heading</label>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $("#select_question_type").on('change', function(e) {
        var select_question_type = $(this).val();
        if (select_question_type == 'input') {
            var content = '<div class="form-floating mb-3"><input readonly type="text" name="option[0]" class="form-control"><label for="floatingInput">Input</label></div>';
            $('#add_option_div').html(content);
        } else if (select_question_type == 'dropdown' || select_question_type == 'radio') {
            var content = '<div class="form-floating mb-3"><input name="option[0]" type="text" class="form-control add_dropdown" data-count="0" id="add_dropdown"><label for="floatingInput">Option</label></div>';
            $('#add_option_div').html(content);
        } else if (select_question_type == 'number') {
            var content = '<div class="form-floating mb-3"><input readonly type="number" name="option[0]" class="form-control"><label for="floatingInput">Number</label></div>';
            $('#add_option_div').html(content);
        }
    });
    $(document).on('click keypress', 'input[id^="add_dropdown"]', function() {
        var dataid = $(this).data("count");
        var class_count = $('body').find('.add_dropdown').length;
        dataid++;
        if (class_count == dataid) {
            var content = '<input type="text" name="option[' + class_count + ']" class="form-control delete_dropdown' + class_count + ' add_dropdown" data-count="' + class_count + '" id="add_dropdown"><button class="delete_dropdown' + class_count + '" onclick="remove_dropdown(' + class_count + ')" type="button">X</button> ';
            $('#add_option_div').append(content);
        }
    })
    function remove_dropdown(e) {
        $('.delete_dropdown' + e).remove();
    }
</script>
@endsection