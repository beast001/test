@extends('layouts.dashboardApplicantTemp')

@section('style_push')
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

@endsection

@section('content')

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><a href="/new_application" class="btn-info font-bold" style="margin-right: 20px; padding: 10px">New Application </a>
                    <a href="/renew_application" class="btn-danger font-bold " style="margin-left: 20px; padding: 10px">Application Renewal </a></h5>
            </div>
            <div class="ibox-content">

                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Status</th>
                        <th>Date Applied</th>
                        <th>Application Type</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($renewal_applications as $application)
                        <tr class="gradeX">
                            <td>{{$application->id}}</td>
                            <td>{{$application->name}} </td>
                            <td>{{ $application->company }}</td>
                            <td class="center">{{ $application->status }}</td>
                            <td class="center">{{ $application->created_at->diffForHumans()}}</td>
                            <td class="center">Renewal</td>
                            <td class="center"><a href="/renewal_cert{{$application->id}}" target="_blank"> <i class="fa fa-eye"></i> </a>| <a href="/print_renew{{$application->id}}" target="_blank"> <i class="fa fa-print"></i></a></i></td>
                        </tr>
                    @endforeach
                    @foreach($new_applications as $application)
                        <tr class="gradeX">
                            <td>{{$application->id}}</td>
                            <td>{{$application->name}} </td>
                            <td>{{ $application->company_name }}</td>
                            <td class="center">{{ $application->status }}</td>
                            <td class="center">{{ $application->created_at->diffForHumans() }}</td>
                            <td class="center">New application</td>
                            <td class="center"><a href="/new_cert{{$application->id}}" target="_blank"> <i class="fa fa-eye"> </i> </a>| <a href="/print_new{{$application->id}}" target="_blank"> <i class="fa fa-print"></i></a></td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('script_push')
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>


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

@endsection
