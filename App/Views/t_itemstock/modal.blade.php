<!-- modal -->
<div id="modalItemstockdetail" tabindex="-1" role="dialog" aria-labelledby="groupUserModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="groupUserModalLabel" class="modal-title">{{lang('Form.itemstockdetail')}}</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="card-body">
        <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar
                                  -->
        </div>
        <div class="material-datatables">
          <div id = "datatables_wrapper" class = "dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table data-page-length="5" id = "tableModalItemstockdetail" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                    <thead class=" text-default">
                        
                        <th># </th>
                        <th>{{   lang('Form.name')}}</th>
                    </thead>
                    <tfoot class=" text-default">
                      <tr role = "row">
                        <th># </th>
                        <th>{{   lang('Form.name')}}</th>
                      </tr>
                    </tfoot>
                    <tbody>
                   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type = "text/javascript">
  var tableItemstockdetail ;
  $(document).ready(function() {  
    loadModalItemstockdetail();
  });

  function loadModalItemstockdetail(){
    tableItemstockdetail  = $("#tableModalItemstockdetail").DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
      responsive: true,
      language: {
      search: "_INPUT_",
      "search": "{{  lang('Form.search')}}"+" : ",
    },
        "columnDefs": [ 
        {
          targets: 'disabled-sorting', 
          orderable: false
        },
        {
              "targets": [ 0 ],
              "visible": false,
              "searchable": false
          }
        ],
        "processing": true,
        "serverSide": true,
        ajax:{
            url : "{{  baseUrl('titemstockdetail/getDataModal') }}",
            dataSrc : 'data'
        },
        stateSave: true
    });
     // Edit record
     tableItemstockdetail.on( 'click', '.rowdetail', function () {
        $tr = $(this).closest('tr');

        var data = tableItemstockdetail.row($tr).data();
        var id = $tr.attr('id');

        $("#T_Itemstockdetail_Id").val(data[0]);
        $("#itemstockdetailname").val(data[1]);
        $('#modalItemstockdetail').modal('hide');
     } );
  }

  $('#tableModalItemstockdetail').on('show.bs.modal', function (e) {
      tableItemstockdetail.ajax.reload(null, true);
    })
</script>