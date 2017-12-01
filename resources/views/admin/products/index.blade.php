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
                    Products
                    <a
                        class="btn btn-outline btn-info pull-right"
                        href="{{route('products.create')}}">Add Product
                    </a>
                </h1>
            </div>

            <div class="panel-body">
                <table id="products-table" class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
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
                ajax: '{!! route('products.index') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'link', name: 'link' },
                    { data: 'category.name', name: 'category.name' },
                    { data: 'brands.name', name: 'brands.name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    </script>
@endpush
