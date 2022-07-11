<link href="<?=asset_path()?>plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
<link href="<?=asset_path()?>plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
<link href="<?=asset_path()?>plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
<script src="<?=asset_path()?>plugins/data-tables/jquery.dataTables.js"></script>
<script src="<?=asset_path()?>plugins/data-tables/DT_bootstrap.js"></script>
<script>
	$(document).ready(function(e) {
        $('#data-table').dataTable({
			"bProcessing": true,
			"iDisplayLength": 25,
			"responsive": true,
			"bDestroy": true
		});
    // Multi Delete code
    $(document).on('click', '.btn_delete', function (e) {
      var unique_id='';
      var coun=0;
      $('.wall_chk').each( function( i , e ) {
        if(e.checked==true){
        coun++;
        unique_id+=e.value+',';
        }
      });
      var url ='<?php echo file_path('admin') . $this->uri->segment(2) ?>/deleteMultiple?unique_id='+unique_id;
      //alert (url);
      var con=confirm('Are You Sure Delete '+coun+' Record ?');
      if(con){
      $.ajax({url:url,success:function(result){
        list_data();
        }});
        $('.wall_chk').each( function( i , e ) {if(e.checked==true){$(this).parent().parent().remove()} });
      }
    });
    //dELETE ALL RADIO BUTTON SELECT
    $(document).on('click', '#selecctall', function (e) {
      var chk='';
      if($(this).hasClass('sel_all')) {
        $(this).removeClass('sel_all');$(this).addClass('unselect_all');
        chk=true;
        $(this).html('Unselect All');
        }
      else{
        $(this).removeClass('unselect_all');$(this).addClass('sel_all');
        chk=false;
        $(this).html('Select All');
      }
      $('.wall_chk').each( function( i , e ) {
        e.checked=chk;
      });
    } );
    // end Multi Delete code
  });
</script>
<div class="contentpanel">
  <!-------------->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><?=$sub_title?>
      	<span class="pull-right">
          <div class="btn-group pull-right">
            <a class="btn btn-success btn-small" href="<?=file_path('admin')?><?=$this->uri->rsegment(1)?>/addnew/add">Add New</a><a class="btn btn-danger btn-small btn_delete" href="" style="margin-left: 5px;">Delete Selected</a>
          </div>
        </span>
      </h4>
    </div>
    <div class="panel-body">
      <table class="table table-bordered responsive" id="data-table">
        <thead>
          <tr>
            <th><input type="checkbox" id = "selecctall" class="btn btn-mint sel_all"></th>
            <th>Sr. No</th>
            <th>Title</th>
            <th>Image</th>
            <th>Date</th>
            <th>Opration</th>
          </tr>
        </thead>
        <tbody>
          <?=$html?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<style>
.btn_custom {
  padding: 3px 15px !important;
}
</style>


