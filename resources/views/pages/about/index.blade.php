@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="col-md-12">
                    {{$contents[1]['content']}}
                </p>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection