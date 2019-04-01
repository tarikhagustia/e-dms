@extends('layouts.app')
@section('title', __('Upload Document'))
@section('content')
    <div class="row">
        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{__('Document')}}</h4>
                    <p class="text-muted font-14 mb-4">{{__('Browse documents')}}</p>
                    <div class="table-responsive">
                        <table id="table-document"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#table-document').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("document.datatable")}}',
        columns: [
            {data: 'row', name: 'row', orderable : false, title : '{{__("No")}}', searchable : false},
            {data: 'category.name', name: 'category.name', title : '{{__("Category")}}'},
            {data: 'title', name: 'title', title : '{{__("Title")}}'},
            {data: 'created_at', name: 'created_at', title : '{{__("Uploaded at")}}'},
            {data: 'action', name: 'action', orderable : false, title : '{{__("action")}}', searchable : false},
        ]
    });
  });
</script>
@endsection
