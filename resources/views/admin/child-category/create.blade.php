@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Child Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{route('admin.child-category.index')}}"> All Child Category</a></div>
              <div class="breadcrumb-item">Create New</div>
          </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Child Category</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.child-category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" class="form-control main-category" name="category">
                              <option value="">Select</option>
                              @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub-category">Sub Category</label>
                            <select id="sub-category" class="form-control sub-category" name="sub_category">
                              <option value="">Select</option>
                              
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Create</button>
                        <button type="button" class="btn btn-danger"><a style="text-decoration: none; color:white" href="{{route('admin.child-category.index')}}">Cancel</a></button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection

@push('scripts')
  <script>
    $(document).ready(function(){
      $('body').on('change', '.main-category', function(e){
        // alert('hello');
        let categoryId = $(this).val();
        // console.log(categoryId);
        $.ajax({
          method: 'GET',
          url: "{{route('admin.get-subcategories')}}",
          data: {
            id: categoryId,

          },
          success: function(data){
            $('.sub-category').html(`<option value="">Select</option>`)
            $.each(data, function(i, item){
              $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
            })
          },
          error: function(xhr, status, error){
            console.log(error);
          }
        })
      })
    })
  </script>
@endpush
