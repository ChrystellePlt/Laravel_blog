@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">Ajouter un article</div>
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
            <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    <label for="title">Titre de l'article :</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="description">Description de l'article :</label>
                    <input type="text" class="form-control" name="description"/>
                </div>
                <div class="form-group">
                    <label for="image">Image de l'article :</label>
                    <input type="file" class="form-control" name="imagearticle"/>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
@endsection