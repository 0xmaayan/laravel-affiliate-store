@extends('layouts.admin')

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

        <div class="col-md-6">
            {!! Form::open(['route' => ['categories.update',$category->id ],'files' => true ,'method' => 'PUT']) !!}
            <div class="form-group">
                <label>{!! Form::label('name') !!}</label>
                {!! Form::text('name',$category->name,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('image') !!}</label>
                {!! Form::file('image') !!}
                <img width="150" height="150" src="{{asset('images/categories/'.$category->image)}}" alt="category image">
            </div>
            {!! Form::submit('Update',['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>

        <div class="col-md-12">
            <h1>
                {{$category->name}} Products
            </h1>
            <hr>
        </div>

        <div id="products-table"></div>
        <script id="details-template" type="text/x-handlebars-template">
            <table class="table">
                <tr>
                    <td>Full name:</td>
                    <td>{{name}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{email}}</td>
                </tr>
                <tr>
                    <td>Extra info:</td>
                    <td>And any further details here (images etc)...</td>
                </tr>
            </table>
        </script>
    </div>
</div>

<script>
    var template = Handlebars.compile($("#details-template").html());

    var table = $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route('categories.index')}}',
        columns: [
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable":     false,
                "data":           null,
                "defaultContent": ''
            },
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
        ],
        order: [[1, 'asc']]
    });

    // Add event listener for opening and closing details
    $('#products-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( template(row.data()) ).show();
            tr.addClass('shown');
        }
    });
</script>
@endsection
