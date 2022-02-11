@extends('layouts.admin')

@section('body')


<div class="table-responsive">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>

            <li>{!! print_r($errors->all()) !!}</li>

        </ul>
    </div>
    @endif


    <h2>Neues Produkt hinzufügen</h2>

    <form action="{{ route('adminSendCreateProductForm')}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name(Max. 100 Zeichen!)</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Produktname" required>
        </div>
        <div class="form-group">
            <label for="description">Beschreibung(Max. 200 Zeichen!)</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung" required>
        </div>
        <div class="form-group">
            <label for="categorie">Kategorie</label>
            <input type="text" class="form-control" name="categorie" id="categorie" placeholder="Kategorie(Brot, Süß, etc..)" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class=""  name="image" id="image" required>
        </div>

        <div class="form-group">
            <label for="type">Preis</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Preis(Bsp: '3.60' mit PUNKT und ohne Währungszeichen!)" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Speichern</button>
    </form>

</div>
@endsection
