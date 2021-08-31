@extends('administrator.app')
@section('title', 'Edit Project')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
<style>
    .dropify-message p{
        font-size: 20px
    }
</style>
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
        <div class="card" id="edit-content">
            <div class="card-header">
                <h5 class="font-weight-bold mb-0">Edit Data</h5>
            </div>
            <form action="{{ url('administrator/project/updating') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <input type="hidden" readonly required name="id" value="{{ $data->id }}">
                    <div class="row">
                        <div class="col-md-7 order-1 order-lg-0">
                            <div class="form-group">
                                <label for="title" class="font-weight-bold">Judul <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required name="title" id="title" value="{{ $data->title }}">
                            </div>
                            <div class="form-group">
                                <label for="category" class="font-weight-bold">Category <span class="text-danger">*</span></label>
                                <select name="category" id="category" required class="form-control">
                                    <option value="">--</option>
                                    @foreach ($categories as $item)
                                    <option {{ ($item->id == $data->id_category ? 'selected' : null) }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="font-weight-bold">Deskripsi</label>
                                <textarea name="desc" id="desc" class="form-control" rows="3">{{ $data->desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="url_youtube" class="font-weight-bold">Link Youtube <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="url_youtube" id="url_youtube" value="{{ $data->url_youtube }}">
                                <small>Example : <strong>https://www.youtube.com/watch?v=AHa5mJFlqOg</strong></small>
                            </div>
                            <div class="form-group">
                                <label for="url_gmeet" class="font-weight-bold">Link Google Meet</label>
                                <input type="text" class="form-control" name="url_gmeet" id="url_gmeet" value="{{ $data->url_gmeet }}">
                                <small>Example : <strong>https://meet.google.com/xxx-yyyy-zzz</strong></small>
                            </div>
                        </div>
                        <div class="col-md-5 order-lg-1 order-0">
                            <div class="form-group">
                                <label for="year" class="font-weight-bold">Tahun <span class="text-danger">*</span></label>
                                <input type="number" min="2000" value="{{ $data->year }}" class="form-control" required name="year" id="year">
                            </div>
                            <div class="form-group">
                                <label for="poster" class="font-weight-bold">Poster <span class="text-danger">*</span></label>
                                {{-- <input type="hidden" required name="thumbnail" value="{{ $data->thumbnail }}">
                                <input type="file" accept="image/*" data-height="350" class="dropify" name="thumbnail-temp" data-max-file-size="2M" data-default-file="{{ $data->thumbnail }}"> --}}
                                <input type="hidden" required name="thumbnailtemp" value="{{ $data->thumbnail }}">
                                <input type="file" accept="image/*" data-height="350" class="dropify" name="thumbnail" data-max-file-size="5M" data-default-file="{{ asset('uploaded/'.$data->thumbnail) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('administrator/projects') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/dropify.min.js') }}"></script>
<script>
    let drEvent = $('.dropify').dropify();
    drEvent.on('dropify.fileReady', function(event, element, src){
        // $('input[name=thumbnail]').val(src);
    });
    drEvent.on('dropify.afterClear', function(event, element){
        // $('input[name=thumbnail]').val('');
    });
    $('.dropify-render').html('<img style="max-height:350px" src="{{ asset("uploaded/".$data->thumbnail) }}">');
</script>
@endsection