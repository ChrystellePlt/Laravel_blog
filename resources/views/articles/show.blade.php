@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Visualsation d'un article
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
                <h4 class="card-title">Article numéro  {{ $article->id }}: {{ $article->title}}</h4>
                <p class="card-text">
                    {{ $article->description }}
                </p>
                <img class="card-img-bottom" src="{{url('uploads/'.$article->filename)}}" alt="{{$article->filename}}">
                <a href="{{ route('articles.index') }}" class="btn btn-dark">Retour</a>
        </div>
    </div>
@endsection