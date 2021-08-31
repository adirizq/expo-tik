@extends('administrator.app')
@section('title', 'Project Categories')

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
        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="card" id="data-content">
            <div class="card-header">
                    <button type="button" onclick="$('#add-content, #data-content').slideToggle();$('#add-content input').focus()" class="btn btn-info"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
            </div>
            <div class="card-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Project Category</th>
                            <th width="15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td class="text-center align-middle"><div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ url('administrator/project-category/edit?category='.$item->id) }}" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ url('administrator/project-category/deleting?category='.$item->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                              </div></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" style="display: none" id="add-content">
            <div class="card-header">
                <h5 class="font-weight-bold mb-0">Tambah Data</h5>
            </div>
            <form action="{{ url('administrator/project-category/inserting') }}" method="POST">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" required name="name" id="name">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" onclick="$('#add-content, #data-content').slideToggle(); $('#add-content input').val('');" class="btn btn-secondary">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection