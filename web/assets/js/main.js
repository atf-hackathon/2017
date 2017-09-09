window.$ = window.jQuery = require('jquery');
require('bootstrap');
require('datatables');

$(function() {
    $('#orders-list').DataTable({
        ajax: '/app_dev.php/products'
        , serverSide: true
        ,  columns: [
            { "data": "id" },
            { "data": "name" }
        ]
        , dom: '<"top">rt<"bottom"f><"clear">'
        , bScrollInfinite: true
        , bScrollCollapse: true
    });
});