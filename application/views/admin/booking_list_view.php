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
			<h4 class="panel-title"><?=$sub_title?></h4>
		</div>
		<div class="panel-body">
			<table class="table  table-bordered responsive" id="data-table">
				<thead>
					<tr>
						<th>Sr. No</th>
						<th>Name</th>
						<th>Mobile No</th>
						<th>Email ID</th>
						<th>Order Date</th>
						<th>Total Amount</th>
						<th>Action</th>
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

