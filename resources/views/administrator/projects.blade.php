@extends('administrator.app')
@section('title', 'Projects')

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
        <div class="card" style="{{ (Session::has('add-another') ? 'display:none' : null ) }}" id="data-content">
            <div class="card-header">
                <div class="d-flex flex-wrap">
                    <button type="button" onclick="$('#add-content, #data-content').slideToggle();" class="btn btn-info mr-3 mb-3"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
                    <div class="ml-lg-auto ml-0 mr-lg-0 mr-auto d-flex">
                        <label for="select-year" class="mt-2 mr-3 font-weight-bold">Tampilkan berdasarkan tahun PK</label>
                        <select id="select-year" onchange="$(location).attr('href', '{{ url('administrator/projects?year=') }}' + $(this).val());" class="mb-2 form-control" style="width: 120px">
                            @foreach ($years as $item)
                            <option {{ ($selected == $item->year ? 'selected' : null) }} value="{{ $item->year }}">{{ $item->year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover table-sm table-striped">
                    <thead>
                        <tr>
                            <th width="5%">Tahun</th>
                            <th width="9%">Kategori</th>
                            <th>Poster</th>
                            <th>Judul</th>
                            <th width="12%">Youtube URL</th>
                            <th width="12%">Google Meet URL</th>
                            <th width="25%">Deskripsi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <?php parse_str( parse_url( $item->url_youtube, PHP_URL_QUERY ), $embedYoutube );?>
                        <tr>
                            <td class="align-middle text-center">{{ $item->year }}</td>
                            <td class="align-middle">{{ $item->name }}</td>
                            <td style="cursor: pointer" class="align-middle text-center" data-toggle="modal" onclick="$('#fndThumbnailPreview .modal-title').text('{{ $item->title }}');$('#fndThumbnailPreview .modal-subtitle').text('({{ $item->url_youtube }})');$('#fndThumbnailPreview img').attr('src', '{{ asset(null) }}uploaded/{{ $item->thumbnail }}');" data-target="#fndThumbnailPreview"><img src="{{ asset('uploaded/'.$item->thumbnail) }}" width="60px"></td>
                            <td>{{ $item->title }}</td>
                            <td class="small align-middle">{{ str_replace(['https://www.', 'https://'], null, $item->url_youtube) }}</td>
                            <td class="small align-middle"><a href="{{ $item->url_gmeet }}" target="_blank">{{ str_replace(['https://', 'https://www.'], null, $item->url_gmeet) }}</a></td>
                            <td style="white-space: pre-line; text-overflow: ellipsis; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $item->desc }}</td>
                            <td class="text-center align-middle"><div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ url('administrator/project/edit?project='.$item->id) }}" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ url('administrator/project/delete?project='.$item->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                              </div></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" style="{{ (Session::has('add-another') ? 'display:block' : 'display: none' ) }}" id="add-content">
            <div class="card-header">
                <h5 class="font-weight-bold mb-0">Tambah Data</h5>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-7 order-1 order-lg-0">
                            <div class="form-group">
                                <label for="title" class="font-weight-bold">Judul <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required name="title" id="title">
                            </div>
                            <div class="form-group">
                                <label for="category" class="font-weight-bold">Category <span class="text-danger">*</span></label>
                                <select name="category" id="category" required class="form-control">
                                    <option value="">--</option>
                                    @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="font-weight-bold">Deskripsi</label>
                                <textarea name="desc" id="desc" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="url_youtube" class="font-weight-bold">Link Youtube <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="url_youtube" id="url_youtube">
                                <small>Example : <strong>https://www.youtube.com/watch?v=AHa5mJFlqOg</strong></small>
                            </div>
                            <div class="form-group">
                                <label for="url_gmeet" class="font-weight-bold">Link Google Meet</label>
                                <input type="text" class="form-control" name="url_gmeet" id="url_gmeet">
                                <small>Example : <strong>https://meet.google.com/xxx-yyyy-zzz</strong></small>
                            </div>
                        </div>
                        <div class="col-md-5 order-lg-1 order-0">
                            <div class="form-group">
                                <label for="year" class="font-weight-bold">Tahun <span class="text-danger">*</span></label>
                                <input type="number" min="2000" value="{{ date('Y') }}" class="form-control" required name="year" id="year">
                            </div>
                            <div class="form-group">
                                <label for="poster" class="font-weight-bold">Poster <span class="text-danger">*</span></label>
                                {{-- <input type="hidden" required name="thumbnail">
                                <input type="file" accept="image/*" data-height="350" class="dropify" required data-max-file-size="2M" name="thumbnail-temp"> --}}
                                {{-- <input type="hidden" required name="thumbnail"> --}}
                                <input type="file" accept="image/*" data-height="350" class="dropify" required data-max-file-size="2M" name="thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" onclick="$('#add-content, #data-content, .dropify-preview').slideToggle(); $('#add-content input:not([type=number]), #add-content textarea').val(''); $('.dropify-render, .dropify-filename-inner').html('');" class="btn btn-secondary">Batal</button>
                    <button type="submit" formaction="{{ url('administrator/project/inserting') }}" class="btn btn-success">Simpan</button>
                    <button type="submit" formaction="{{ url('administrator/project/inserting?add-another=true') }}" class="btn btn-success">Simpan dan Tambahkan Lain</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade p-0" id="fndThumbnailPreview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h4 class="modal-title font-weight-bold"></h4>
                    <small class="modal-subtitle"></small>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <img src="" width="100%">
            </div>
        </div>
    </div>
</div>
<div class="modal fade p-0" id="fndYTPreview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h4 class="modal-title font-weight-bold"></h4>
                    <small class="modal-subtitle"></small>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <iframe width="100%" style="height: 70vh;" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
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
</script>
@endsection