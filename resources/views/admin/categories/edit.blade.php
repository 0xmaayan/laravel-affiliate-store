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
                Edit <i>{{$category->name}}</i> Category
            </h1>
        </div>

        <div class="col-md-12">
            <div class="col-md-9">
                {!! Form::open(['route' => ['admin.categories.update',$category->id ],'files' => true ,'method' => 'PUT']) !!}
                <div class="form-group col-md-4">
                    <label>{!! Form::label('name') !!}</label>
                    {!! Form::text('name',$category->name,['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <label>{!! Form::label('image') !!}</label>
                    {!! Form::file('image') !!}
                </div>
                <div class="form-group col-md-4">
                    <label>{!! Form::label('second image') !!}</label>
                    {!! Form::file('second_image') !!}
                </div>
                <div class="form-group col-md-4">
                    <img width="150" height="150" src="{{asset('uploads/categories/'.$category->id.'/'.$category->image)}}" alt="category image">
                </div>
                <div class="form-group col-md-4">
                    <img width="150" height="150" src="{{asset('uploads/categories/'.$category->id.'/'.$category->second_image)}}" alt="category image">
                </div>
                {!! Form::submit('Update',['class' => 'btn btn-default col-md-12']) !!}
                {!! Form::close() !!}

            </div>
            <div class="col-md-3">
                {!! Form::open(['route' => ['admin.categories.destroy',$category->id ],'method' => 'DELETE']) !!}
                <div class="form-group col-md-12">
                    {!! Form::submit('Delete Category',['class' => 'btn btn-danger col-md-12']) !!}
                </div>
                {!! Form::close() !!}
            </div>
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
                       <th>#</th>
                       <th>Name</th>
                       <th>Link</th>
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
            ajax: '{!! route('admin.categories.edit',$category->id) !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'link', name: 'link' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action' }
            ]
        });
    });
    </script>
@endpush
