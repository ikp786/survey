@extends('admin.layouts.app')
@section('styles')
<style>
    .delete{
        background: transparent;
        border: none;
    }
.qus-table{
    box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
    background: #fff;

} 
 .qus-table table tr th{
    border: 1px solid #ebedf2;
    color: #23c687;
    font-weight: 700;
    font-size: 13px;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 10px 10px;
}
.qus-table table tr td{ 
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
.delete-edit-btn{
    text-align: center;
}
.delete-edit-btn i{
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
                        <h6 class="m-0">Question List {{ collect(request()->segments())->last(); }}  <span style=" float: right;"><a href="{{route('questions.create')}}"><button type="button" class="btn p-0">Add</button> </a></span></h6>  
                    </div>
                
           
                    
                <div class="table-responsive">
                    <table class="table all-type-ques" id="dataTable_2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Question</th>
                                <th scope="col">Option Type</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $cnt =1; @endphp
                            @forelse($questions as $val)
                            <tr>
                                <th scope="row">{{$cnt}}</th>
                                <td>{{$val->question}}</td>
                                <td>{{isset($val->options->type) ? $val->options->type : ''}}</td>
                                <td>{{$val->created_at}}</td>
                                <td class="delete-edit-btn">

                                <a class="btn-xs sharp me-1" href="{{ route('questions.edit',$val->id) }}"><i class="fas fa-edit text-secondary" aria-hidden="true"></i></a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['questions.destroy', $val->id],'style'=>'display:inline']) !!}<button onclick="return confirm('Are you sure to delete Question?')" class="delete btn-xs sharp" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
             
            "oLanguage": {
            "sLengthMenu": "Show _MENU_ "
        }
        });
    });
</script>
@endsection