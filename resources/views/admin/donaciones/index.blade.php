@extends('layouts.admin')
@section('title', 'Donations')
@section('content')
    <div class="col">
        <h1>List of Donations</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Registered Donations</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.donaciones.create') }}" class="btn btn-primary">
                            Register New Donation
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="donationsTable" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Reader</th>
                                <th style="text-align: center">Directive</th>
                                <th style="text-align: center">Amount</th>
                                <th style="text-align: center">Method</th>
                                <th style="text-align: center">Donation Date</th>
                                <th style="text-align: center">Note</th>
                                <th style="text-align: center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donations as $donation)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $donation->id }}</td>
                                    <td style="text-align: center">{{ $donation->reader->name }}</td>
                                    <td style="text-align: center">{{ $donation->directive->name }}</td>
                                    <td style="text-align: center">${{ number_format($donation->amount, 2) }}</td>
                                    <td style="text-align: center">{{ ucfirst($donation->method) }}</td>
                                    <td style="text-align: center">{{ \Carbon\Carbon::parse($donation->donation_date)->format('d M, Y') }}</td>
                                    <td style="text-align: center">{{ $donation->note ?? '—' }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.donations.show', $donation->id) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> View
                                            </a>
                                            <a href="{{ route('admin.donations.edit', $donation->id) }}" class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <a href="{{ url('admin/donations/' . $donation->id . '/confirm-delete') }}" class="btn btn-danger btn-sm">
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
                        {{ $donations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script de DataTables --}}
    <script>
        $(function() {
            $("#donationsTable").DataTable({
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "All"]
                ],
                "language": {
                    "emptyTable": "No data available",
                    "info": "Showing _START_ to _END_ of _TOTAL_ donations",
                    "infoEmpty": "Showing 0 to 0 of 0 donations",
                    "infoFiltered": "(filtered from _MAX_ total donations)",
                    "lengthMenu": "Show _MENU_ donations",
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
                        buttons: [
                            { text: 'Copy', extend: 'copy', exportOptions: { columns: ':visible:not(.no-export)' } },
                            { text: 'PDF', extend: 'pdf', exportOptions: { columns: ':visible:not(.no-export)' } },
                            { text: 'CSV', extend: 'csv', exportOptions: { columns: ':visible:not(.no-export)' } },
                            { text: 'Excel', extend: 'excel', exportOptions: { columns: ':visible:not(.no-export)' } },
                            { text: 'Print', extend: 'print', exportOptions: { columns: ':visible:not(.no-export)' } }
                        ]
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="bi bi-eye"></i> Column Visibility'
                    }
                ],
            }).buttons().container().appendTo('#donationsTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

