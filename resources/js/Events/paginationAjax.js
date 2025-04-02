
class pagination {
    test(endPointPagination , ){
        $.ajax({
            url: endPointPagination,
            success: function(result) {
                place.innerHTML = result;
            }
        });
    }
}
