$(document).ready(function () {
    "use strict";

    // Basic DataTable
    $("#basic-datatable").DataTable({
        keys: true,
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'></i>",
                next: "<i class='ri-arrow-right-s-line'></i>"
            }
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
    });

    // DataTable with buttons
    var tableWithButtons = $("#datatable-buttons").DataTable({
        lengthChange: false,
        scrollX: true,
        buttons: ["copy", "print"],
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'></i>",
                next: "<i class='ri-arrow-right-s-line'></i>"
            }
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
    });
    tableWithButtons.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");

    // Selection DataTable
    $("#selection-datatable").DataTable({
        select: {
            style: "multi"
        },
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'></i>",
                next: "<i class='ri-arrow-right-s-line'></i>"
            }
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
    });

    // Alternative pagination DataTable
    $("#alternative-page-datatable").DataTable({
        pagingType: "full_numbers",
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
    });

    // Scroll vertical DataTable
    $("#scroll-vertical-datatable").DataTable({
        scrollY: "350px",
        scrollCollapse: true,
        paging: false,
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'></i>",
                next: "<i class='ri-arrow-right-s-line'></i>"
            }
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
    });

    // Scroll horizontal DataTable
    $("#scroll-horizontal-datatable").DataTable({
        scrollX: true,
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'></i>",
                next: "<i class='ri-arrow-right-s-line'></i>"
            }
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
    });

    // Complex header DataTable
    $("#complex-header-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'></i>",
                next: "<i class='ri-arrow-right-s-line'></i>"
            }
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        },
        columnDefs: [{
            visible: false,
            targets: -1
        }]
    });

    // Row callback DataTable
    $("#row-callback-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'></i>",
                next: "<i class='ri-arrow-right-s-line'></i>"
            }
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        },
        createdRow: function (row, data, dataIndex) {
            if (+data[5].replace(/[\$,]/g, "") > 150000) {
                $("td", row).eq(5).addClass("text-danger");
            }
        }
    });

    // State saving DataTable
    $("#state-saving-datatable").DataTable({
        stateSave: true,
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'></i>",
                next: "<i class='ri-arrow-right-s-line'></i>"
            }
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
    });

    // Fixed columns DataTable
    $("#fixed-columns-datatable").DataTable({
        scrollY: 300,
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        fixedColumns: true
    });

    // Adding classes to DataTables elements
    $(".dataTables_length select").addClass("form-select form-select-sm");
    $(".dataTables_length label").addClass("form-label");

    // Fixed header DataTable
    var fixedHeaderTable = $("#fixed-header-datatable").DataTable({
        responsive: true,
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'></i>",
                next: "<i class='ri-arrow-right-s-line'></i>"
            }
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
    });
    new $.fn.dataTable.FixedHeader(fixedHeaderTable);
});
