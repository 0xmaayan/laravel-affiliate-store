@extends('layouts.admin')

@section('styles')
@endsection

@section('content')
    <div id="page-wrapper" style="min-height: 902px;">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div style="padding-top:25px;"></div>
        <div class="row">

            <div class="col-md-12">
                <h1>
                    Subscribes
                </h1>
            </div>

            <div class="panel-body">
                <table id="products-table" class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>email</th>
                        <th>name</th>
                        <th>message</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(function(){
            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.subscribes.index') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'email', name: 'email' },
                    { data: 'name', name: 'name' },
                    { data: 'message', name: 'message' },
                    { data: 'created_at', name: 'created_at' }
                ]
            });
        });
    </script>
@endpush
