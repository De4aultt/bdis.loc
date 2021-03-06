<!-- JS Scripts-->


<!-- jQuery Js -->
<script src="{{ url("assets/js/jquery-1.10.2.js") }}"></script>

<!-- Bootstrap Js -->
<script src="{{ url("assets/js/bootstrap.min.js") }}"></script>

<script src="{{ url("assets/materialize/js/materialize.min.js") }}"></script>

<!-- Metis Menu Js -->
<script src="{{ url("assets/js/jquery.metisMenu.js") }}"></script>
<!-- Morris Chart Js -->
<script src="{{ url("assets/js/morris/raphael-2.1.0.min.js") }}"></script>
<script src="{{ url("assets/js/morris/morris.js") }}"></script>


<script src="{{ url("assets/js/easypiechart.js") }}"></script>
<script src="{{ url("assets/js/easypiechart-data.js") }}"></script>

<script src="{{ url("assets/js/Lightweight-Chart/jquery.chart.js") }}"></script>
<!-- DATA TABLE SCRIPTS -->

<script src="{{ url("assets/js/dataTables/jquery.dataTables.min.js") }}"></script>
<script src="{{ url("assets/js/dataTables/dataTables.buttons.min.js") }}"></script>
<script src="{{ url("assets/js/dataTables/buttons.print.min.js") }}"></script>
<script src="{{ url("assets/js/dataTables/jquery.dataTables.js") }}"></script>
<script src="{{ url("assets/js/dataTables/dataTables.bootstrap.js") }}"></script>
<script>
        $(document).ready(function () {

            $('#dataTables-table').dataTable({

                language: {
                    "sProcessing": "Зачекайте...",
                    "sLengthMenu": "Показати _MENU_ записів",
                    "sZeroRecords": "Записи відсутні.",
                    "sInfo": "Записи з _START_ по _END_ із _TOTAL_ записів",
                    "sInfoEmpty": "Записи з 0 по 0 із 0 записів",
                    "sInfoFiltered": "(відфільтровано з _MAX_ записів)",
                    "sInfoPostFix": "",
                    "sSearch": "Пошук:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Перша",
                        "sPrevious": "Попередня",
                        "sNext": "Наступна",
                        "sLast": "Остання"
                    },
                    "oAria": {
                        "sSortAscending": ": активувати для сортування стовпців за зростанням",
                        "sSortDescending": ": активувати для сортування стовпців за спаданням"
                    }
                },

                buttons: [
                    {extend: 'print', text: 'Роздрукувати таблицю'}

                ],

                dom: '<"left"f><"right"l>rti<"right"B>p'
            });
        });

</script>
<!-- Custom Js -->
<script src="{{ url("assets/js/custom-scripts.js") }}"></script>