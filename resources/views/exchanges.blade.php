@extends('layouts.monster.app')

@section('head-title')
    Cora | Exchanges: Nexmo
@endsection

@section('breadcrumb-title')
    Exchanges > {{ $title }}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }} User Exchanges</h4>
                    <h6 class="card-subtitle">Export data via Copy, CSV, Excel, PDF & Print</h6>
                    <div class="table-responsive m-t-40">
                        <table id="exchange-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                @foreach($exchanges[0]->toArray() as $key => $value)
                                    <th>{{ $key }}</th>
                                @endforeach
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                @foreach($exchanges[0]->toArray() as $key => $value)
                                    <th>{{ $key }}</th>
                                @endforeach
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($exchanges as $exchange)
                                <tr>
                                    @foreach($exchange->toArray() as $key => $value)
                                    <td>{{ $value }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('plugins')

    <!-- This is data table -->
    <script src="/monster/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    
    $('#exchange-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    
@endsection