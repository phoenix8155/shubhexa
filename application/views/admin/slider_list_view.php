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
    });
</script>
<div class="contentpanel">
  <!-------------->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><?=$sub_title?>
      	<span class="pull-right">
  			<div class="btn-group pull-right">
                <a class="btn btn-success btn-small" href="<?=file_path('admin')?>/<?=$this->uri->rsegment(1)?>/addnew/add/<?=$option[0]['contain_name']?>">
        		Add New
        		</a>
        	</div>
        </span>
      </h4>
    </div>
    <div class="panel-body">
       <table class="table table-bordered responsive" id="data-table">
            <thead>
              <tr>
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


