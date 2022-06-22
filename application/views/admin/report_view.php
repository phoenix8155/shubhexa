<script>
$(document).ready(function(e) {
	$('#data-table').dataTable({
		"bProcessing": true,
		"iDisplayLength": 25,
		"responsive": true,
		"bDestroy": true,
		"responsive": true
	});
});
</script>

<div class="contentpanel">
	<!-------------->
	<div class="panel panel-default">
		<div class="panel-body">
			<form action="" method="get">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 form-group">
						<?php $search_type = $this->input->get('search_type');?>
						<select class="form-control" name="search_type" id="search_type">
							<option <?=($search_type == '') ? 'selected="selected"' : ''?> value="">All</option>
							<option <?=($search_type == 'today') ? 'selected="selected"' : ''?> value="today">Today</option>
							<option <?=($search_type == 'this_week') ? 'selected="selected"' : ''?> value="this_week">This Week</option>
							<option <?=($search_type == 'last_week') ? 'selected="selected"' : ''?> value="last_week">Last Week</option>
							<option <?=($search_type == 'this_month') ? 'selected="selected"' : ''?> value="this_month">This Month</option>
							<option <?=($search_type == 'last_month') ? 'selected="selected"' : ''?> value="last_month">Last Month</option>
							<option <?=($search_type == 'last_3_month') ? 'selected="selected"' : ''?> value="last_3_month">Last 3 Months</option>
							<option <?=($search_type == 'last_6_month') ? 'selected="selected"' : ''?> value="last_6_month">Last 6 Months</option>
							<option <?=($search_type == 'last_12_month') ? 'selected="selected"' : ''?> value="last_12_month">Last 12 Months</option>
							<option <?=($search_type == 'this_year') ? 'selected="selected"' : ''?> value="this_year">This Year</option>
							<option <?=($search_type == 'last_year') ? 'selected="selected"' : ''?> value="last_year">Last Year</option>
						</select>
					</div>                            
				</div>
				<div class="row mt-3">
					<div class="col-md-12 col-md-offset-4">
						<input type="submit" name="filter" id="filter" value="Filter" class="btn rounded-pill btn-success">
						<input type="submit" name="reset" id="reset" value="Reset" class="btn rounded-pill btn-danger">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="contentpanel">
	<!-------------->
	<div class="panel panel-default">
		
		<div class="text-right pad-10">
			<a href="<?=file_path('admin')?><?=$this->uri->rsegment(1)?>/export" class="btn btn-sm btn-mint">Export</a>
		</div>
		<div class="panel-body">
			<table class="table  table-bordered responsive" id="data-table" width="100%">
				<thead>
					<tr>
						<th>Sr. No</th>
						<th>Name</th>
						<th>Mobile No</th>
						<th>Email ID</th>
						<th>Order Number</th>
						<th>Total Order</th>
						<th>Payment Date</th>
						<th>Total Amount</th>
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
	.pad-10 {
		padding: 10px;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(e) {
		$( "#reset" ).on( "click", function(e) {
			e.preventDefault();
			window.location="<?=file_path('admin/report/view')?>";
		});
	});
</script>

