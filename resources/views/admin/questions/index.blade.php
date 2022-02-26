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
                <h6 class="mb-4">Question List {{ collect(request()->segments())->last(); }}</h6>
                <div class="table-responsive">
                    <table class="table" id="dataTable_2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Question</th>
                                <th scope="col">Type</th>
                                <th scope="col">Option Type</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            d
                            @php $cnt =1; @endphp
                            @forelse($questions as $val)
                            <tr>
                                <th scope="row">{{$cnt}}</th>
                                <td>{{$val->question}}</td>
                                <td>{{$val->type}}</td>
                                <td>{{isset($val->options->type) ? $val->options->type : ''}}</td>
                                <td>{{$val->created_at}}</td>
                                <td>

                                <a class="btn btn-primary shadow btn-xs sharp me-1" href="{{ route('questions.edit',$val->id) }}"><i class="fas fa-user-edit text-secondary" aria-hidden="true"></i></a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['questions.destroy', $val->id],'style'=>'display:inline']) !!}<button onclick="return confirm('Are you sure to delete Question?')" class="btn btn-danger shadow btn-xs sharp" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @php $cnt++; @endphp
                            @empty
                            <div>Data Not Found</div>
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