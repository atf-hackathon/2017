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
                    let productName = row.product.length > 36 ? row.product.substring(0, 36) + '...' : row.product;

                    return `
                        <div>
                            <div class="pull-left text-primary">${row.orderId}</div>
                            <div class="pull-right"><strong>Box:</strong> ${row.box}</div>
                            
                            <div class="clearfix"></div>
                            
                            <div class="text-muted order-product" title="${row.product}"><i class="fa fa-circle text-success" aria-hidden="true"></i> ${productName}</div>
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