@extends('administrator.app')
@section('title', 'Votes')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" id="data-content">
            <div class="card-header">
                <div class="d-flex flex-wrap">
                    <div class="ml-lg-auto ml-0 mr-lg-0 mr-auto d-flex">
                        <label for="select-year" class="mt-2 mr-3 font-weight-bold">Tampilkan berdasarkan tahun PK</label>
                        <select id="select-year" onchange="$(location).attr('href', '{{ url('administrator/votes?year=') }}' + $(this).val());" class="form-control" style="width: 150px">
                            @foreach ($years as $item)
                            <option {{ ($selected == $item->year ? 'selected' : null) }} value="{{ $item->year }}">{{ $item->year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
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