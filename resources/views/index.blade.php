@extends('layouts.master')

@section('content')

    @include('pages.homepage.slider')

    @include('pages.homepage.specialCategories')

    @include('pages.homepage.categories')

    @include('pages.homepage.parallax')

    @include('pages.homepage.categoriesList')

    {{--@include('pages.homepage.articles')--}}

@endsection