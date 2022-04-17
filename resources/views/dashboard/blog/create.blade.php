@extends('layouts.dashboard')

@section('content')

    <div class="box">
        <div class="box-header with-action">
            <h5 class="box-title">Create New Blog</h5>
            <a href="{{ route('blog.list') }}" class="btn btn-sm btn-secondary float-right">Blog List</a>
        </div>
        {!! Form::open(['route' => 'blog.store', 'method' => 'POST']) !!}
        <div class="box-body">
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Blog Category</label>
                    <div class="col-md-9">
                        <select class="form-select form-control bg-gray-50" id="" name="blog_category">
                            <option value="">Choose Category</option>

                            @foreach($categories as $category)
                                <option value={{ $category->id }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Title</label>
                    <div class="col-md-9">
                        <input type="text" name="title" id="title" placeholder="Enter title" class="form-control">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Slug</label>
                    <div class="col-md-9">
                        <input type="text" name="slug" id="title" placeholder="Enter slug" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Description</label>
                    <div class="col-md-9">
                        <textarea type="text" name="description" id="" placeholder="Enter description" class="form-control description_summernote"></textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Thumbnail</label>
                    <div class="col-md-9">
                        <input type="file" name="thumbnail" id="" placeholder="Enter thumbnail" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Image</label>
                    <div class="col-md-9">
                        <input type="file" name="image" id="" placeholder="Enter image" class="form-control">
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Meta page id</label>
                    <div class="col-md-9">
                        <input type="text" name="meta_page_id" id="" placeholder="Enter meta page id" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('meta_page_id') }}</span>
                    </div>
                </div>
            <div class="form-group my-10 text-right">
                <button type="submit" class="btn btn-primary" onclick="formSubmit(this, event)">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="box-footer">
        </div>

    </div>
@endsection
