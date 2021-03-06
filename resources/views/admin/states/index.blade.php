@extends('admin.layouts.app')
@section('styles')
<style>
</style>
@endsection
@section('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                @include('admin.inc.validation_message')
                @include('admin.inc.auth_message')
                <h6 class="mb-4">State List</h6>
                <h6 style=" float: right;margin-top: -45px;" class="mb-4"> <a href="{{route('admin.states.create')}}"><button style="color: #009CFF;" class="btn">Add</button> </a> </h6>
                <div class="table-responsive">
                    <table class="table" id="dataTable_2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th>Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $cnt =1; @endphp
                            @forelse($states as $val)
                            <tr>
                                <th scope="row">{{$cnt}}</th>
                                <td>{{$val->name}}</td>
                                <td>{{$val->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary shadow btn-xs sharp me-1" href="{{ route('admin.states.edit',$val->id) }}"><i class="fas fa-user-edit text-secondary" aria-hidden="true"></i></a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['admin.states.destroy', $val->id],'style'=>'display:inline']) !!}<button onclick="return confirm('Are you sure to delete State?')" class="btn btn-danger shadow btn-xs sharp" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @php $cnt++; @endphp
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
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

        });
    });
</script>
@endsection