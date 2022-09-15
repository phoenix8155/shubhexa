<script>
$(document).ready(function(e) {
	$('#data-table').dataTable({
		"bProcessing": false,
		"iDisplayLength": 25,
		"bDestroy": false,
		
	});
});
</script>
<script type="text/javascript" src="<?=asset_path()?>panel/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?=asset_path()?>panel/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=asset_path()?>panel/daterangepicker/daterangepicker.css" />
<div class="contentpanel">
	<!-------------->
	<div class="panel panel-default">
		<div class="panel-body">
			<form action="" method="get">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 form-group">
						<?php $select_type = $this->input->get('select_type');?>
						<select class="form-control" name="select_type" id="select_type">
							<option  value="">Select Filter</option>
							<option <?=($select_type == 'datewise') ? 'selected="selected"' : ''?> value="datewise">Date Wise</option>
							<option <?=($select_type == 'all_type') ? 'selected="selected"' : ''?> value="all_type">All Type</option>
						</select>
					</div> 
					<div class="col-md-4 col-md-offset-4 form-group dateWise">
						<?php $date_filter = $this->input->get('date_filter');?>
						<input type="text" class="form-control dateRangePicker" id="date_filter" name="date_filter" value="<?=$date_filter?>" placeholder="Start & End Date">
					</div>
					
					<div class="col-md-4 col-md-offset-4 form-group allType">
						<?php $all_type = $this->input->get('all_type');?>
						<select class="form-control" name="all_type" id="all_type">
							<option <?=($all_type == '') ? 'selected="selected"' : ''?> value="">----Select----</option>
							<option <?=($all_type == 'all') ? 'selected="selected"' : ''?> value="all">All</option>
							<option <?=($all_type == 'today') ? 'selected="selected"' : ''?> value="today">Today</option>
							<option <?=($all_type == 'this_week') ? 'selected="selected"' : ''?> value="this_week">This Week</option>
							<option <?=($all_type == 'last_week') ? 'selected="selected"' : ''?> value="last_week">Last Week</option>
							<option <?=($all_type == 'this_month') ? 'selected="selected"' : ''?> value="this_month">This Month</option>
							<option <?=($all_type == 'last_month') ? 'selected="selected"' : ''?> value="last_month">Last Month</option>
							<option <?=($all_type == 'last_3_month') ? 'selected="selected"' : ''?> value="last_3_month">Last 3 Months</option>
							<option <?=($all_type == 'last_6_month') ? 'selected="selected"' : ''?> value="last_6_month">Last 6 Months</option>
							<option <?=($all_type == 'last_12_month') ? 'selected="selected"' : ''?> value="last_12_month">Last 12 Months</option>
							<option <?=($all_type == 'this_year') ? 'selected="selected"' : ''?> value="this_year">This Year</option>
							<option <?=($all_type == 'last_year') ? 'selected="selected"' : ''?> value="last_year">Last Year</option>
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
			<table class="table  table-bordered responsive" id="data-table">
				<thead>
					<tr>
						<th>Sr. No</th>
						<th>Name</th>
						<th>Payment Id</th>
						<th>Mobile No</th>
						<th>Email ID</th>
						<th>Celebrity</th>
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
	.dateWise {
		display: none;
	}
	.allType {
		display: none;
	}
	.btn_custom {
		padding: 3px 15px !important;
	}
	.pad-10 {
		padding: 10px;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(e) {
		var select = $( "#select_type" ).val();
		displayTextboxOnLoad(select);

		$( "#reset" ).on( "click", function(e) {
			e.preventDefault();
			window.location="<?=file_path('admin/report/view')?>";
		});
		
		$('.dateRangePicker').daterangepicker({
			locale: {
				format: 'DD-MM-YYYY'
			}
		});
		$( "#select_type" ).on( "change", function(e) {
			e.preventDefault();
			selectType = this.value;
			displayTextboxOnLoad(selectType);
		});

		
	});

function displayTextboxOnLoad(selectType) {
	
	if(selectType == 'datewise') {
		$('.dateWise').css('display','block');
		$('.allType').css('display','none');		
		$('#all_type').val('');
		$('#filter').prop('disabled',false);
	} else if(selectType == 'all_type') { 
		
			$('#date_filter').val('');
			$('.dateWise').css('display','none');
			$('.allType').css('display','block');		
			$('#filter').prop('disabled',false);
		
	} else  { 
		$('#all_type').val('');
		$('#date_filter').val('');
		$('#filter').prop('disabled',true);
		$('.dateWise').css('display','none');
		$('.allType').css('display','none');		
	}

	$(document).on('change','#all_type',function() {
		if($('#all_type').val() != '') {
			$('#date_filter').val('');			
		}
	});

	
}
</script>

