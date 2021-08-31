@extends('administrator.app')
@section('title', 'Edit Project Category')
@section('content')
<div class="row">
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card" id="edit-content">
            <div class="card-header">
                <h5 class="font-weight-bold mb-0">Edit Data</h5>
            </div>
            <form action="{{ url('administrator/project-category/updating') }}" method="POST">
                <div class="card-body">
                    @csrf
                    <input type="hidden" required readonly value="{{ $data->id }}" name="id">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" required name="name" id="name" value="{{ $data->name }}">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('administrator/project-categories') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection