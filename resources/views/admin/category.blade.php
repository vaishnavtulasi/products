@extends('layout.index')

@section('headtitle')
    Category
@stop

@section('header')
    <div>
        <h3>Manage Games</h3>
        <a href="#" class="btn btn-primary pull-right">Add New Game</a>
    </div>
@stop

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="grid simple">
                <div class="grid-body no-border">
                    @if(Session::has('msg'))
                        <div class="breadcrumb text-success">
                            {{ session('msg')  }}
                        </div>
                    @endif

                    <table class="table " id="users-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Is_Approve</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    @stop


                    @push('scripts')
                    <script>

                        $(document).ready(function () {
                            $('#users-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: '{!! route('users.index') !!}',
                                columns: [
                                    {data: 'id', name: 'id'},
                                    {data: 'name', name: 'name'},
                                    {data: 'email', name: 'email'},
                                    {data: 'is_approve', name: 'is_approve', orderable: false, searchable: false},
                                    {data: 'action', name: 'action', orderable: false, searchable: false},
                                ]
                            });

                        });
                    </script>
                    @endpush

                </div>
            </div>
        </div>
    </div>


