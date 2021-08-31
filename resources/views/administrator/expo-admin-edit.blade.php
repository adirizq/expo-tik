@extends('administrator.app')
@section('title', 'Edit')
@section('styles')
@endsection
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
    </div>
    <div class="col-lg-7">
        <div class="card shadow" id="edit-content">
            <form action="{{ url('administrator/u/updating') }}" method="POST">
                <div class="card-header font-weight-bold">User</div>
                <div class="card-body">
                    @csrf
                    {{-- <input type="hidden" readonly required name="id" value="{{ $data->id }}"> --}}
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" required name="name" id="name" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="username" class="font-weight-bold">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" required name="username" id="username" value="{{ Auth::user()->username }}">
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input type="password" class="form-control" name="password" id="password" minlength="6">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card shadow" id="edit-content">
            <form action="{{ url('administrator/config/updating') }}" method="POST">
                <div class="card-header font-weight-bold">Web Settings</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="year" class="font-weight-bold">Tahun <span class="text-danger">*</span></label>
                        <input type="number" min="2000" class="form-control" required name="year" id="year" value="{{ $conf->year }}">
                        <small>menampilkan data proyek kekhususan untuk tampilan user berdasarkan tahun yang dipilih</small>
                    </div>
                    <div class="form-group">
                        <label for="duevote" class="font-weight-bold">Batas Vote <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" required name="duevote" id="duevote" value="{{ $conf->duevote }}">
                    </div>
                    <div class="form-group">
                        <label for="evdate" class="font-weight-bold">Tanggal Event <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" required name="evdate" id="evdate" value="{{ $conf->eventdate }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection