window.$ = window.jQuery = require('jquery');
require('bootstrap');
require('datatables');

$(function() {
    $('#orders-list').DataTable({
        ajax: '/app_dev.php/orders'
        , serverSide: true
        ,  columns: [
            {
                title: "Order"
                , render: function(data, type, row) {
                    return `
                        <div>
                            <div class="pull-left text-primary">${row.orderId}</div>
                            <div class="pull-right"><strong>Box:</strong> ${row.box}</div>
                            
                            <div class="clearfix"></div>
                            
                            <div class="text-muted">${row.product}</div>
                        </div>
                    `;
                }
            }
        ]
        , dom: '<"top"f>t<"bottom">'
        , language: {
            search: ""
            , searchPlaceholder: 'Search through orders'
        }
        , bScrollInfinite: true
        , bScrollCollapse: true
    });
});