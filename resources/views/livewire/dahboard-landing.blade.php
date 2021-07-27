@section('style_push')
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
@endsection
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>List of all applications:</h5>
            </div>

            <div class="ibox-content">

                {{--    <label class="fieldlabels">Order by status</label>
                    <form>
                         @csrf
                     <select name="filter">
                         <option value="pending">Pending</option>
                         <option value="rejected">Rejected</option>
                         <option value="approved">Approved</option>
                     </select>
                         <button type="submit">SET</button>
                     </form><br>--}}
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Date Applied</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applications as $application)
                        <tr class="gradeX">
                            <td>{{$application->id}}</td>
                            <td>{{$application->name}} </td>
                            <td>{{ $application->company_name }}</td>
                            <td class="center">{{ $application->status }} </td>
                            <td class="center">New app</td>
                            <td class="center">{{ $application->created_at->diffForHumans() }}</td>
                            <td class="center"><a href="/dashboard_new_apps_id_{{$application->id}}"> <i class="fa fa-eye"></i> </a></td>
                        </tr>
                    @endforeach
                    @foreach($renew_applications as $application)
                        <tr class="gradeX">
                            <td>{{$application->id}}</td>
                            <td>{{$application->name}} </td>
                            <td>{{ $application->company }}</td>
                            <td class="center">{{ $application->status }}</td>
                            <td class="center">Renewal</td>
                            <td class="center">{{ $application->created_at->diffForHumans() }}</td>
                            <td class="center"><a href="/dashboard_new_apps_id_{{$application->id}}"> <i class="fa fa-eye"></i> </a></td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
@section('script_push')
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>
    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
    <style>
        body.DTTT_Print {
            background: #fff;

        }
        .DTTT_Print #page-wrapper {
            margin: 0;
            background:#fff;
        }

        button.DTTT_button, div.DTTT_button, a.DTTT_button {
            border: 1px solid #e7eaec;
            background: #fff;
            color: #676a6c;
            box-shadow: none;
            padding: 6px 8px;
        }
        button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
            border: 1px solid #d2d2d2;
            background: #fff;
            color: #676a6c;
            box-shadow: none;
            padding: 6px 8px;
        }

        .dataTables_filter label {
            margin-right: 5px;

        }
    </style>
@endsection
