@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! html_entity_decode($contents[1]['content']) !!}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection