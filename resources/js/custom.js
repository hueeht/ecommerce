$("#logout").click(function () {
    event.preventDefault();
    document.getElementById('logout-form').submit();
});

$("#delete").click(function () {
    return confirm("Are You Sure?");
});
