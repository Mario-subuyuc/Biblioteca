@extends('layouts.admin')
@section('title', 'Readers')
@section('content')
    <div class="col">
        <h1>List of Readers</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <h3 class="card-title">Registered Readers</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.lectores.create') }}" class="btn btn-primary">
                             Register New Reader
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Name</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Birth Date</th>
                                <th style="text-align: center">Gender</th>
                                <th style="text-align: center">DPI</th>
                                <th style="text-align: center">Occupation</th>
                                <th style="text-align: center">Ethnicity</th>
                                <th style="text-align: center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($readers as $reader)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $reader->id }}</td>
                                    <td style="text-align: center">{{ $reader->user->name }}</td>
                                    <td style="text-align: center">{{ $reader->user->email }}</td>
                                    <td style="text-align: center">{{ $reader->birth_date ?? '—' }}</td>
                                    <td style="text-align: center">{{ ucfirst($reader->gender) ?? '—' }}</td>
                                    <td style="text-align: center">{{ $reader->dpi }}</td>
                                    <td style="text-align: center">{{ $reader->occupation ?? '—' }}</td>
                                    <td style="text-align: center">{{ $reader->ethnicity ?? '—' }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.lectores.show', $reader->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> View
                                            </a>
                                            <a href="{{ route('admin.lectores.edit', $reader->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <a href="{{ url('admin/lectores/' . $reader->id . '/confirm-delete') }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash3"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Paginación Laravel --}}
                    <div class="mt-2">
                        {{ $readers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script de DataTables --}}
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "All"]
                ],
                "language": {
                    "emptyTable": "No data available",
                    "info": "Showing _START_ to _END_ of _TOTAL_ readers",
                    "infoEmpty": "Showing 0 to 0 of 0 readers",
                    "infoFiltered": "(filtered from _MAX_ total readers)",
                    "lengthMenu": "Show _MENU_ readers",
                    "loadingRecords": "Loading...",
                    "processing": "Processing...",
                    "search": "Search:",
                    "zeroRecords": "No matching records found",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Previous"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [{
                        extend: 'collection',
                        text: '<i class="bi bi-file-earmark-text"></i> Reports',
                        orientation: 'landscape',
                        buttons: [{
                                text: 'Copy',
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                }
                            },
                            {
                                text: 'PDF',
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                }
                            },
                            {
                                text: 'CSV',
                                extend: 'csv',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                }
                            },
                            {
                                text: 'Excel',
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                }
                            },
                            {
                                text: 'Print',
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                }
                            }
                        ]
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="bi bi-eye"></i> Column Visibility'
                    }
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

