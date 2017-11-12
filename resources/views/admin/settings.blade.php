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
            <h1>Settings</h1>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Logo</label>
                <input type="file">
            </div>
            <div class="form-group">
                <label>Site Email</label>
                <input class="form-control" placeholder="Enter text">
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <input class="form-control" placeholder="Enter text">
            </div>
            <div class="form-group">
                <label>Pinterest</label>
                <input class="form-control" placeholder="Enter text">
            </div>
        </div>
    </div>
</div>
@endsection
