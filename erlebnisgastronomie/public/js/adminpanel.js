 $(document).ready(function () {
    $('#checkBtn').click(function() {
        checked = $("input[type=checkbox]:checked").length;

        if(!checked) {
            alert("You must check at least one checkbox.");
            return false;
        }

    });
});

    function lettersOnly(input) {
    var regex = /[^a-z-áàéèóòúù,.äüöß# 0-9]/gi;
    input.value = input.value.replace(regex, "");
}

    function numbersOnly(input) {
        var regex = /[^0-9,.]/gi;
        input.value = input.value.replace(regex, "");
    }


