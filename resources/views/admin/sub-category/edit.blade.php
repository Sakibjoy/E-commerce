@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Sub Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{route('admin.sub-category.index')}}"> All Sub Categories</a></div>
              <div class="breadcrumb-item">{{$subCategory->name}}</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit "{{$subCategory->name}}"</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.sub-category.update', $subCategory->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputState">Category</label>
                            <select id="inputState" class="form-control" name="category">
                              <option value="">Select</option>
                              @foreach ($categories as $category)
                                <option {{$category->id == $subCategory->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$subCategory->name}}">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option {{$subCategory->status == 1 ? 'selected': ''}} value="1">Active</option>
                              <option {{$subCategory->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger"><a style="text-decoration: none; color:white" href="{{route('admin.sub-category.index')}}">Cancel</a></button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
