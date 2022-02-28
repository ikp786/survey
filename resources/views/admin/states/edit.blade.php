@extends('admin.layouts.app')
@section('styles')
<style>

</style>
@endsection
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @include('admin.inc.validation_message')
                @include('admin.inc.auth_message')
                {!! Form::model($states, ['method' => 'PATCH','route' => ['admin.states.update', $states->id],'files'=>true]) !!}
                @csrf
                <h6 class="mb-4">Edit State</h6>
                <h6 style=" float: right;margin-top: -45px;" class="mb-4"> <a href="{{route('admin.states.index')}}"><button type="button" style="color: #009CFF;" class="btn">List</button> </a> </h6>
                </br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">                            
                            {!! Form::text('name', $states->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            <label for="floatingInput">Name</label>
                        </div>
                    </div>
                </div>
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
@endsection