$(function() {
    $( "#txtSearch" ).autocomplete({
        source: "http://localhost:88/do-an-co-so/product/search/1",
    });
});