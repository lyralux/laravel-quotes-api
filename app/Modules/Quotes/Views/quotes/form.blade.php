@extends('layout.master')

@section('content')
    test
{!! Form::open(['route' => 'quotes.store']) !!}

    <div class="form-group">
        <label for="quote_text">Quote</label>
        {!! Form::textarea('text', null, ['id' => 'quote_text', 'class' => 'form-control', 'rows' => 4]) !!}
    </div>
    <div class="form-group">
        <label for="author_name">Author</label>
        {!! Form::text('author_name', null, ['id' => 'author_name', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="source_name">Source</label>
        {!! Form::text('source_name', null, ['id' => 'source_name', 'class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@stop