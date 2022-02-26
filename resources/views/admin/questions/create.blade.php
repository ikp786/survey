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
                <form action="{{route('questions.store')}}" method="POST">
                    @csrf
                    <h6 class="mb-4">Add Question</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" checked name="type" value="basic">
                        <label class="form-check-label" for="inlineRadio1">Basic</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="advance">
                        <label class="form-check-label" for="inlineRadio2">Advance</label>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="question" class="form-control">
                                <label for="floatingInput">Question</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-control">
                                <select class="form-select" name="select_option_type" id="select_question_type">
                                    <option value="dropdown">Dropdown</option>
                                    <option value="input">Text</option>
                                    <option value="number">Number</option>
                                    <option value="radio">Radio</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="add_option_div" class="form-floating mb-3 dropdown-cut-btn">
                            <input type="text" name="option[0]" class="form-control add_dropdown" data-count="0" id="add_dropdown"><label for="floatingInput">Option</label>
                            <!-- <button class="delete_dropdown'+class_count+'" onclick="remove_dropdown('+class_count+')" type="button">X</button> -->
                            <!-- <label for="floatingInput">Dropdown</label> -->
                        </div>
                    </div>
                    <div class="col-md-6">
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

    $(document).on('click', 'input[id^="add_dropdown"]', function() {
        var dataid = $(this).data("count");
        var class_count = $('body').find('.add_dropdown').length;
        console.log(dataid);
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