@extends('administrator.app')
@section('title', 'Dashboard')

@section('styles')
@endsection
@section('content')
<div class="row">
    @if (Request::query('project'))
    <div class="col-12">
        <div class="card" id="data-content">
            <div class="card-body table-responsive">
                <a href="{{ url('administrator/dashboard') }}" class="btn btn-dark mb-3"><i class="fas fa-arrow-left"></i> &nbsp;Kembali</a>
                <table id="dataTable-2" class="table table-bordered table-hover table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>ID Project</th>
                            <th>Project Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>IP Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->id_project }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->ipaddress }}</td>
                            <td class="text-center align-middle">
                                <a href="{{ url('administrator/vote/delete?vote='.$item->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="col-12 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <label for="select-year" class="font-weight-bold">Tampilkan berdasarkan tahun Proyek Kekhususan</label>
                <select id="select-year" onchange="$(location).attr('href', '{{ url('administrator/dashboard?year=') }}' + $(this).val());" class="form-control">
                    @foreach ($years as $item)
                    <option {{ ($selected == $item->year ? 'selected' : null) }} value="{{ $item->year }}">{{ $item->year }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ url('administrator/votes') }}" class="text-decoration-none">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">Votes ({{ $selected }})</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tVotes }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-vote-yea fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ url('administrator/projects') }}" class="text-decoration-none">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">Projects ({{ $selected }})</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tProjects }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-desktop fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ url('administrator/project-categories') }}" class="text-decoration-none">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Project Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tCategories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-layer-group fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12">
        <div class="card shadow-sm" id="data-content">
            <div class="card-body table-responsive">
                <table id="dataTable-2" class="table table-bordered table-hover table-sm table-striped">
                    <thead>
                        <tr>
                            <th width="5%">Total Vote</th>
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
                        @foreach ($dataProjects as $item)
                        <?php parse_str( parse_url( $item->url_youtube, PHP_URL_QUERY ), $embedYoutube ); ?>
                        <tr>
                            <td class="align-middle text-center">{{ $item->votes }}</td>
                            <td class="align-middle">{{ $item->name }}</td>
                            <td style="cursor: pointer" class="align-middle text-center" data-toggle="modal" onclick="$('#fndThumbnailPreview .modal-title').text('{{ $item->title }}');$('#fndThumbnailPreview .modal-subtitle').text('({{ $item->url_youtube }})');$('#fndThumbnailPreview img').attr('src', '{{ asset(null) }}uploaded/{{ $item->thumbnail }}');" data-target="#fndThumbnailPreview"><img src="{{ asset('uploaded/'.$item->thumbnail) }}" width="60px"></td>
                            <td>{{ $item->title }}</td>
                            <td class="small align-middle"><a href="javascript:void(0)">{{ str_replace(['https://www.', 'https://'], null, $item->url_youtube) }}</a></td>
                            <td class="small align-middle"><a href="{{ $item->url_gmeet }}" target="_blank">{{ str_replace(['https://', 'https://www.'], null, $item->url_gmeet) }}</a></td>
                            <td style="white-space: pre-line; text-overflow: ellipsis; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $item->desc }}</td>
                            <td class="text-center align-middle"><div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ url('administrator/dashboard?project='.$item->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat Detail Vote</a>
                            </div></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
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
<script>
    $('#dataTable-2').DataTable( {
        "order": [[ 0, "desc" ]],
        "lengthMenu": [[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]]
    } );
</script>
@endsection