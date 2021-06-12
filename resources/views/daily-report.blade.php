<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" />
    </head>
    <body>
        <div class="container-fluid col-sm-12 mt-3">
            <table id="daily-breakdown-vaccination-by-district-report" class="cell-border compact stripe" style="width: 100%;">
                <thead>
                    <tr>
                        <th>日期</th>
                        <th>縣市別</th>
                        <th>總人口數</th>
                        <th>前次累計接種人數更新</th>
                        <th>新增接種人數</th>
                        <th>累計接種人數</th>
                        <th>累計接種率（％）</th>
                        <th>累計配送劑數</th>
                        <th>剩餘庫存量（％）</th>
                    </tr>
                </thead>
            </table>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
        <script>
            $(function () {
                $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
                    className: "btn",
                });

                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

                $.fn.dataTable.ext.classes.sPageButton = "";

                $("#daily-breakdown-vaccination-by-district-report").DataTable({
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Chinese-traditional.json",
                    },
                    buttons: dtButtons,
                    dom: 'lBfrtip<"actions">',
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route("get-daily-breakdown-by-district-data") }}',
                    columns: [
                        { data: "a01", name: "a01" },
                        { data: "a02", name: "a02" },
                        { data: "a03", name: "a03" },
                        { data: "a04", name: "a04" },
                        { data: "a05", name: "a05" },
                        { data: "a06", name: "a06" },
                        { data: "a07", name: "a07" },
                        { data: "a08", name: "a08" },
                        { data: "a09", name: "a09" },
                    ],
                    lengthMenu: [10, 25, 50, 100],
                    order: [[0, "desc"], [8, "desc"]],
                    pageLength: 10,
                    responsive: true,
                    scrollX: true,
                    searching: false,
                });

                $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
                    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
                });
            });
        </script>
    </body>
</html>