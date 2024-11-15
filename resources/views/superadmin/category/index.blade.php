@extends('superadmin.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="{{ asset('backend/css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/css/sweetalert2.css') }}" />
<style type="text/css">
    .cateAction{
        display: inline;
    }
    button.swal2-deny.btn.btn-outline-secondary {
        display: none !important;
    }
</style>
@stop

@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Category List
                    </div>
                    <div class="prism-toggle">
                        <a href="{{ route('superadmin.category.add') }}" class="btn btn-sm btn-primary-light">Add Category
                            <i class="ri-add-line ms-2 d-inline-block align-middle"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatableBasic" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Cat ID</th>
                                    <th>Category Name</th>
                                    <th>Category Sorting</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($category))
                                    @foreach($category as $val)
                                        <tr>
                                            <td>{{ $val->id }}</td>
                                            <td>{{ $val->cat_name }}</td>
                                            <td>{{ $val->cat_sort }}</td>
                                            @if($val->cat_status == 1)
                                                <td><span class="btn btn-success btn-sm btn-wave waves-effect waves-light"> Active </span></td>
                                            @else
                                                <td><span class="btn btn-danger btn-sm btn-wave waves-effect waves-light">Inactive</span></td>
                                            @endif
                                            @if(!empty($val->cat_image))
                                                <td><img src="{{ asset('backend/uploads/category') }}/{{$val->cat_image}}" style="width: 32px;"></td>
                                            @else
                                                <td><img src="{{ asset('backend/images/9.jpg') }}" style="width: 32px;"></td>
                                            @endif
                                            <td>{{ date('d-m-Y', strtotime($val->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('superadmin.category.edit', $val->id) }}" class="btn btn-icon btn-primary btn-wave waves-effect waves-light">
                                                    <i class="ri-edit-box-line"></i>
                                                </a>
                                                <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light removeData" href="javascript:void(0)" data-url="{{ route('superadmin.category.delete') }}" data-id="{{$val->id}}">
                                                    <i class="ri-archive-line"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    $('#datatableBasic').DataTable();
</script>

<script src="{{ asset('backend/js/sweetalert2.js')}}"></script>
<script src="{{ asset('backend/js/extended-ui-sweetalert2.js')}}"></script>
<script type="text/javascript">
    $('#bannerImage').DataTable();
    $(document).ready(function () {
        $(".removeData").click(function(){
            var recID = $(this).data('id');
            var recURL = $(this).data('url');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: recURL,
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "recID": recID,
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                response.success,
                                'success'
                            ).then((result) => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                xhr.responseJSON.error,
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
@stop