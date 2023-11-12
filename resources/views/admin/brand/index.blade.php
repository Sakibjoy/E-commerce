@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Brand</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.brand.index')}}"> All Brands</a></div>
                <div class="breadcrumb-item">Brands List</div>
            </div>
        </div>

        <div class="section-body">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h4>All Brands</h4>
                        <div class="card-header-action"><a href="{{route('admin.brand.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New Brand</a></div>
                    </div>
                    <div class="card-body p-0">
                        {{$dataTable->table()}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
{{$dataTable->scripts(attributes: ['type'=> 'module'])}}
<script>
    $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
            let isChecked = $(this).is(':checked');
            let id = $(this).data('id');

            $.ajax({
                url: "{{route('admin.brand.change-status')}}",
                method: 'PUT',
                data: {
                    status: isChecked,
                    id: id
                },
                success: function(data){
                    toastr.success(data.message)
                },
                error: function(xhr, status, error){
                    toastr.error(data.message)
                }
            })

        })
    })
</script>
@endpush