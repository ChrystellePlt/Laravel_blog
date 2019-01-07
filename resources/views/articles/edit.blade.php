@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Édition d'un article
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
            <form method="post" action="{{ route('articles.update', $article->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Titre de l'article :</label>
                    <input type="text" class="form-control" name="title" value={{ $article->title }} />
                </div>
                <div class="form-group">
                    <label for="description">Description de l'article :</label>
                    <input type="text" class="form-control" name="description" value={{ $article->description }} />
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
@endsection