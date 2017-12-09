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
                    Content
                </h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Page</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contents as $content)
                                    <tr class="success">
                                        <td>{{$content->id}}</td>
                                        <td>{{$content->name}}</td>
                                        <td>
                                            <a href="{{route('admin.content.edit',['id' => $content->id ])}}"
                                               class="btn btn-warning">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
@endsection
