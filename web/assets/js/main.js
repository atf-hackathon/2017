window.$ = window.jQuery = require('jquery');
require('bootstrap');
require('datatables');
require('jquery-form');

$(function() {
    let modalWin = $('#scan-modal');
    let cancelWin = $('#cancel-modal');

    let ordersTable = $('#orders-list').DataTable({
        ajax: {
            url: '/app_dev.php/orders'
            , dataType: 'json'
            , cache: false
            , data: function (d) {
                return $.extend( {}, d, {
                    filterStatus: $('#status-filter').val()
                });
            }
        }
        , serverSide: true
        ,  columns: [
            {
                title: "Order"
                , render: function(data, type, row) {
                    let productName = row.product.length > 36 ? row.product.substring(0, 36) + '...' : row.product
                        , status = row.orderStatus ? 'text-danger' : 'text-success';

                    return `
                        <div>
                            <div class="pull-left text-primary">${row.orderId}</div>
                            <div class="pull-right"><strong>Box:</strong> ${row.box}</div>
                            
                            <div class="clearfix"></div>
                            
                            <div class="text-muted order-product" title="${row.product}"><i class="fa fa-circle ${status}" aria-hidden="true"></i> ${productName}</div>
                        </div>
                    `;
                }
            }
        ]
        , dom: '<"top"f<"filters">>t<"bottom">'
        , language: {
            search: ""
            , searchPlaceholder: 'Search through orders'
        }
        , bScrollInfinite: true
        , bScrollCollapse: true
        , rowCallback: function(row, data, index) {
            $(row)
                .off('click')
                .on('click', function() {
                    modalWin.find('.modal-title').text(data.product);
                    modalWin.modal('show');

                    modalWin.find('.save')
                        .off('click')
                        .on('click', function() {
                            modalWin.find('form').find('input[name="id"]').val(data.id);
                            modalWin.find('form').find('input[name="box_no"]').val(data.box);

                            modalWin.find('form').submit();
                        })
                });
        }
    });

    $('#orders-list_wrapper').find('.filters').append(`
        <div class="form-group">
            <label>Filter by status</label>
            <select class="form-control" id="status-filter">
                <option value="0">All</option>
                <option value="1">Pending</option>
                <option value="2">Boxed</option>
                <option value="3">Expired</option>
            </select>
          </div>
    `);

    $('#status-filter').change(function(ev) {
        ordersTable.ajax.reload();
    });


    $('#boxes-list').find('td')
        .off('click')
        .on('click', function() {
            if ($(this).data('productorder')) {
                cancelWin.modal('show');

                cancelWin.find('.product').text($(this).data('product'));

                cancelWin.find('form').find('input[name="id"]').val($(this).data('productorder'));
                cancelWin.find('form').find('input[name="box_id"]').val($(this).data('boxid'));

                cancelWin.find('.save')
                    .off('click')
                    .on('click', function() {
                        cancelWin.find('form').submit();
                    });
            }
        })
});