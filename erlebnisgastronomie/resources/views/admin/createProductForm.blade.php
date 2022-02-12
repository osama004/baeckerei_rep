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

    <form id ="sectionForm" action="{{ route('adminSendCreateProductForm')}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name(Max. 100 Zeichen!)</label>
            <input onkeyup="lettersOnly(this)" id="input" type="text" class="form-control" name="title" id="title" placeholder="Produktname" required>
        </div>
        <div class="form-group">
            <label for="description">Beschreibung(Max. 200 Zeichen!)</label>
            <input onkeyup="lettersOnly(this)" id="input" type="text" class="form-control" name="description" id="description" placeholder="Beschreibung" required>
        </div>

        <div class="form-group">
            <label for="categorie">Kategorie</label>
            <label for="category_id">Kategorie wählen:</label>
            <select id="category_id" name="category_id">
                <option value="1">Sandwich</option>
                <option value="2">Süßspeise</option>
                <option value="3">Brot</option>
                <option value="4">Sonstige</option>
                <option value="5">Getränk</option>
                <option value="6">Käse</option>
            </select>

        </div>

        <label for="ingredients_id[]">Zutaten wählen:</label>
        <div class="form-group checkboxes">
            <ul class ="formingredients">
                @foreach($ingredients as $ingredient)
               <input type="checkbox" name="ingredients_id[]" value="{{$ingredient->ingredient_id}}" > {{$ingredient->name}}<br>
                    @endforeach
            </ul>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class=""  name="image" id="image" required>
        </div>

        <div class="form-group">
            <label for="type">Preis</label>
            <input onkeyup="numbersOnly(this)" type="text" class="form-control" name="price" id="price" placeholder="Preis(Bsp: '3,60' mit KOMMA und ohne Währungszeichen!)" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Speichern</button>

    </form>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#checkBtn').click(function() {
            checked = $("input[type=checkbox]:checked").length;

            if(!checked) {
                alert("You must check at least one checkbox.");
                return false;
            }

        });
    });
</script>

<script type="text/javascript">
  function lettersOnly(input) {
      var regex = /[^a-z-áàéèóòúù,.äüöß# 0-9]/gi;
      input.value = input.value.replace(regex, "");
  }
</script>
    <script type="text/javascript">
        function numbersOnly(input) {
            var regex = /[^0-9,.]/gi;
            input.value = input.value.replace(regex,"");
        }
    </script>
@endsection
