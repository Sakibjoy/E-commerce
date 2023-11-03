@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h4>Edit {{$category->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.category.update', $category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Div tag -->
                            <div class="form-group">
                                <label for="icon">Icon </label>
                                <div>
                                    <button class="btn btn-primary" data-selected-class="btn-success" data-icon="{{$category->icon}}"
                                    data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" class="form-control" value="{{$category->name}}"  name="name"> 
                            </div>
                            <div class="form-group">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status">
                                    <option {{$category->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$category->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
@endsection
 