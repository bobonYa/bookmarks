@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">All links</h2>
                    <form action="{{ url('search') }}" method="get">
                        <div class="form-group">
                            <input
                                type="text"
                                name="q"
                                class="form-control"
                                placeholder="Search..."
                                value="{{ request('q') }}"
                            />
                        </div>
                    </form>
                    <table class="display table" id="datatables">
                        <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Favicon</th>
                            <th scope="col">Url</th>
                            <th scope="col">Title</th>
                            <th scope="col">More details</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <a href="/dashboard/links/new" class="btn btn-primary">Add Link</a>
                    <a href="/links/export" class="btn btn-primary">Export to Excel</a>
                </div>
            </div>
        </div>
    </div>



    <script type="application/javascript">
        $(document).ready(function () {
            $('#datatables').DataTable({
                "columnDefs": [
                    {"name": "created_at", "targets": 0},
                    {"name": "favicon", "targets": 1},
                    {"name": "link", "targets": 2},
                    {"name": "title", "targets": 3},
                    {"name": "details", "targets": 4}
                ],
                "order": [[0, "desc"]],
                "columnDefs": [
                    {
                        "targets": 1,
                        "orderable": false
                    },
                    {
                        "targets": 4,
                        "orderable": false
                    },
                ],
                "searching": false,
                "processing": true,
                "serverSide": true,
                "ajax": "/dashboard/json"
                // "paging":   false,
                // "ordering": false,
                // "info":     false

            });
        });
    </script>







@endsection
