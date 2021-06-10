@extends('layouts.app')

@section('title-block')
    Home
@endsection

@section('content')
    <h1>Main page</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et laudantium error adipisci officiis quisquam minus. 
    Numquam aut pariatur quisquam debitis, laborum mollitia voluptatibus magnam vero, enim itaque aliquam, deleniti dolorum!</p>
@endsection

@section('aside')
    @parent
        <p>extra panel</p>
@endsection