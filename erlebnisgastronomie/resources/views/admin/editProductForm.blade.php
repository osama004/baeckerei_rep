@extends('layouts.admin')

@section('body')


<div class="table-responsive">

    <form action="{{ route('adminUpdateProduct',['product_id' => $product->product_id ])}}" method="post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name(Max. 100 Zeichen)</label>
            <input maxlength="100" onkeyup="lettersOnly(this)" type="text" class="form-control" name="title" id="title" placeholder="Product Name" value="{{$product->title}}" required>
        </div>
        <div class="form-group">
            <label for="description">Beschreibung(Max. 200 Zeichen)</label>
            <input maxlength="200" onkeyup="lettersOnly(this)" type="text" class="form-control" name="description" id="description" placeholder="description" value="{{$product->description}}" required>
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
            <label for="type">Preis</label>
            <input maxlength="4" onkeyup="numbersOnly(this)" type="text" class="form-control" name="price" id="price" placeholder="{{$product->price}}" required>
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
