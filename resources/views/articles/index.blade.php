@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Titre</td>
                <td>Description</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td><a href="{{ route('articles.show',$article->id)}}">{{$article->title}}</a></td>
                    <td>{{$article->description}}</td>
                    <td><a href="{{ route('articles.edit',$article->id)}}" class="btn btn-primary">Modifier</a></td>
                    <td>
                        <form action="{{ route('articles.destroy', $article->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection