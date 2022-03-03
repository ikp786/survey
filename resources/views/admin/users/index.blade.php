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
                <h6 class="mb-4">Users List</h6>
                <div class="table-responsive">
                    <table class="table" id="dataTable_2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Type</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $cnt =1; @endphp
                            @forelse($users as $val)
                            <tr>
                                <th scope="row">{{$cnt}}</th>
                                <td>{{$val->email}}</td>
                                <td>{{$val->user_type}}</td>
                                <td>{{$val->created_at}}</td>
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