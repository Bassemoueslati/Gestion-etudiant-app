@extends('layout')
@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Liste des Etudiants</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('etudiant.create')}}"> Create New Student</a>
        </div>
    </div>
</div>

<table class="table table-bordered table-hover">
    <tr>
        <th>Numéro</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Classe</th>
    </tr>
    @foreach ($liste as $value )
    <tr>
        <td>{{$loop->index}}</td>
        <td>{{$value->nom}}</td>
        <td>{{$value->prenom}}</td>
        <td>{{$value->classe->libelle}}</td>
        <td>
        <form action="{{ route('etudiant.delete',$value->id) }}" method="post">
            <a class="btn btn-info" href="{{route('etudiant.show',$value->id) }}">Show</a>
            <a class="btn btn-primary" href="{{route('etudiant.edit',$value->id)}}">Edit</a>
            
            @csrf
            @method('DELETE')
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes vous sur de vouloir effectuer cette opération');">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection