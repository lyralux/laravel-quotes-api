@extends('layout.master')

@section('content')
    @php
        foreach ($quotes as $quote) {
            echo $quote->quote;
            echo "<br/>";
        }
    @endphp

@stop