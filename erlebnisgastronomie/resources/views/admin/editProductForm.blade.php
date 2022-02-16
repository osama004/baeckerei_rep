@extends('layouts.admin')

@section('body')


<div class="table-responsive">

    <form action="{{ route('adminUpdateProduct',['product_id' => $product->product_id ])}}" method="post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name(Max. 100 Zeichen)</label>
            <input maxlength="100" onkeyup="lettersOnly(this)" type="text" class="form-control" name="title" placeholder="Product Name" value="{{$product->title}}" required>
        </div>
        <div class="form-group">
            <label for="description">Beschreibung(Max. 200 Zeichen)</label>
            <input maxlength="200" onkeyup="lettersOnly(this)" type="text" class="form-control" name="description" id="description" placeholder="description" value="{{$product->description}}" required>
        </div>

        <div class="form-group">
            <label for="categorie">Kategorie</label>
            <label for="category_id">Kategorie wählen:</label>
            <select id="category_id" name="category_id">
            @foreach($categories as $category)
                    <option value="{{$category->category_id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <label for="ingredients_id[]">Zutaten wählen:</label>
        <div class="form-group checkboxes">
            <ul class ="formingredients">
                @foreach($ingredients as $ingredient)
                    <input id ="checkbox{{$ingredient->ingredient_id}}" type="checkbox" name="ingredients_id[]" value="{{$ingredient->ingredient_id}}"> {{$ingredient->name}}<br>
                @endforeach
            </ul>
        </div>


        <div class="form-group">
            <label for="type">Preis</label>
            <input maxlength="4" onkeyup="numbersOnly(this)" type="text" class="form-control" name="price" id="price" placeholder="{{$product->price}}" required>
        </div>

        <div class="form-group checkboxes">
            <ul class ="formingredients">
                <label for="is_weekly_menu">Teil der Wochenkarte ? </label>
                <input id = "weekly_menu" type="checkbox" name="is_weekly_menu" value="{{$product->is_weekly_menu == true ? 1 : 0}}">
            </ul>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Speichern</button>
    </form>

</div>


<script src="{{asset('js/adminpanel.js')}}"></script>
<script src="{{asset('js/adminpanel.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#weekly_menu').on('change', function () {
            this.value = this.checked ? 1 : 0;
            alert(this.value);
        }).change();
    });
</script>

@endsection
