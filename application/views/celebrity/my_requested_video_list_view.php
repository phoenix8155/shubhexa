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
					<a class="btn btn-success btn-small" href="#">Add new</a>
				</div>
				</span>
			</h4>
		</div>
		<div class="panel-body">
			<table class="table  table-bordered responsive" id="data-table">
				<thead>
					<tr>
						<th>Sr. No</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Subject</th>
						<th>Message</th>
						<th>Create Date</th>
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

