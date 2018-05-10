/*
 *  Document   : be_tables_datatables.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Tables Datatables Page
 */

var BeTableDatatables = function() {
    // Override a few DataTable defaults, for more examples you can check out https://www.datatables.net/
    var exDataTable = function() {
        jQuery.extend( jQuery.fn.dataTable.ext.classes, {
            sWrapper: "dataTables_wrapper dt-bootstrap4"
        });
    };

    // Init full DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableFull = function() {
        jQuery('.obat').dataTable({
            columnDefs: [ { orderable: false, targets: [ 4 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false
        });
    };
    var initDataTableJ = function() {
        jQuery('.jual').dataTable({
            columnDefs: [ { orderable: false, targets: [ 4 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false
        });
    };
    var initDataTableB = function() {
        jQuery('.beli').dataTable({
            columnDefs: [ { orderable: false, targets: [ 4 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false
        });
    };

    return {
        init: function() {
            // Override a few DataTable defaults
            exDataTable();

            // Init Datatables
            // initDataTableSimple();
            initDataTableFull();
            initDataTableJ();
            initDataTableB();
            // initDataTableFullPagination();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeTableDatatables.init(); });