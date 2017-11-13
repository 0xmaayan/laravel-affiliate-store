@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
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
                Edit {{$category->name}} Category
            </h1>
        </div>

        <div class="col-md-12">
            {!! Form::open(['route' => ['categories.update',$category->id ],'files' => true ,'method' => 'PUT']) !!}
            <div class="form-group col-md-4">
                <label>{!! Form::label('name') !!}</label>
                {!! Form::text('name',$category->name,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                <label>{!! Form::label('image') !!}</label>
                {!! Form::file('image') !!}
            </div>
            <div class="form-group col-md-4">
                <img width="150" height="150" src="{{asset('images/categories/'.$category->image)}}" alt="category image">
            </div>
            {!! Form::submit('Update',['class' => 'btn btn-default col-md-12']) !!}
            {!! Form::close() !!}
        </div>

        <div class="col-md-12">
            <h1>
                {{$category->name}} Products
            </h1>
            <hr>
        </div>

       <div class="panel-body">
           <table id="products-table" class="table">
               <thead>
               <tr>
                   <td>#</td>
                   <td>Name</td>
                   <td>Created At</td>
                   <td>Updated At</td>
               </tr>
               </thead>
               <tbody>
               </tbody>
           </table>
       </div>

    </div>
</div>
@stop

@push('scripts')
    <script>
        $(function() {
            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('categories.index') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' }
                ]
            });
        });
    </script>

@endpush
