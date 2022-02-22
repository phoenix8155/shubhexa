<script type="text/javascript">
$(document).ready(function(e) {
	$('#demo-dt-basic').dataTable( {
		"responsive": true,
		"language": {
			"paginate": {
			"previous": '<i class="demo-psi-arrow-left"></i>',
			"next": '<i class="demo-psi-arrow-right"></i>'
			}
		}
	});

	$('#demo-dt-basic2').dataTable( {
	"responsive": true,
	"language": {
		"paginate": {
			"previous": '<i class="demo-psi-arrow-left"></i>',
			"next": '<i class="demo-psi-arrow-right"></i>'
			}
		}
	});
});
</script>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-warning panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-add-user icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
				<a href="<?=file_path('admin')?>employee/view/" style="color:#fff;">
					<p class="text-2x mar-no text-semibold">1</p>
					<p class="mar-no">Total Employee</p>
				</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-info panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-add-user icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
				<a href="<?=file_path('admin')?>client/view" style="color:#fff;">
					<p class="text-2x mar-no text-semibold">1</p>
					<p class="mar-no">Total Client</p>
				</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-mint panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-receipt-4 icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
				<a href="<?=file_path('admin')?>task_mgmt/view/" style="color:#fff;">
					<p class="text-2x mar-no text-semibold">1</p>
					<p class="mar-no">Total Task</p>
				</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-danger panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="fa fa-comment icon-3x" style="font-size: 45px;"></i>
                </div>
            </div>
            <div class="media-body">
		      <a href="<?=file_path('admin')?>sms/view" style="color:#fff;">
		          <p class="text-2x mar-no text-semibold">1</p>
		          <p class="mar-no">Total SMS</p>
		      </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-danger panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="fa fa-file icon-3x" style="font-size: 45px;"></i>
                </div>
            </div>
            <div class="media-body">
		      <a href="<?=file_path('admin')?>upload_document_master/view" style="color:#fff;">
		          <p class="text-2x mar-no text-semibold">1</p>
		          <p class="mar-no">Received Document</p>
		      </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-mint panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-receipt-4 icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
				<a href="<?=file_path('admin')?>service_request/view" style="color:#fff;">
					<p class="text-2x mar-no text-semibold">1</p>
					<p class="mar-no">Service Request</p>
				</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-info panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-data-storage icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
				<a href="<?=file_path('admin')?>id_proof_master/view" style="color:#fff;">
					<p class="text-2x mar-no text-semibold">1</p>
					<p class="mar-no">ID/Proof List</p>
				</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-warning panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-add-user icon-3x"></i>
                </div>
            </div>

            <div class="media-body">
				<a href="<?=file_path('admin')?>support/view" style="color:#fff;">
					<p class="text-2x mar-no text-semibold">1</p>
					<p class="mar-no">Support</p>
				</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-warning panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="fa fa-calendar icon-3x" style="font-size: 45px;"></i>
                </div>
            </div>
            <div class="media-body">
				<a href="<?=file_path('admin')?>appointment_approvel/view" style="color:#fff;">
					<p class="text-2x mar-no text-semibold">1</p>
					<p class="mar-no">Appointment </p>
				</a>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-12">
        <div class="panel">
			<div class="panel-body">
				<h3>Notification</h3>
				<div align="right">
					<a id="mark_as_read" href="<?=base_url()?>index.php/admin/<?=$this->uri->rsegment(1)?>/updateAllSeenStatus" class="btn btn-success">Mark as all read</a>
				</div><br>
				<table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
						<th>No</th>
						<th>Member Name</th>
						<th>Message</th>
						<th>Time</th>
						</tr>
					</thead>
					<tbody>
						<?php for ($i = 0; $i < count($result); $i++) {$row = $i + 1;?>
						<tr>
							<td class="<?=$bg_color?>"><?=$row?></td>
							<td class="<?=$bg_color?>"><?=$result[$i]['member_name']?></td>
							<td class="<?=$bg_color?>"><?=$result[$i]['message']?></td>
							<td class="<?=$bg_color?>"><?=get_time_ago($result[$i]['timedt'])?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div> -->
