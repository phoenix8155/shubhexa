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
                    <i class="demo-pli-receipt-4 icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
				<a href="<?=file_path('admin')?>category_list/view/" style="color:#fff;">
					<p class="text-2x mar-no text-semibold"><?=$resCategory[0]['totCategory'];?></p>
					<p class="mar-no">Total Category</p>
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
				<a href="<?=file_path('admin')?>celebrity_list/view" style="color:#fff;">
					<p class="text-2x mar-no text-semibold"><?=$resCelebrity[0]['totCelebrity'];?></p>
					<p class="mar-no">Total Celebrity</p>
				</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-mint panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-add-user icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
				<a href="<?=file_path('admin')?>user_list/view/" style="color:#fff;">
					<p class="text-2x mar-no text-semibold"><?=$resUser[0]['totUser'];?></p>
					<p class="mar-no">Total User</p>
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
		      <a href="<?=file_path('admin')?>testimonial_list/view" style="color:#fff;">
		          <p class="text-2x mar-no text-semibold"><?=$resTestimonials[0]['totTestimonials'];?></p>
		          <p class="mar-no">Total Testimonials</p>
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
		      <a href="<?=file_path('admin')?>promocode_list/view" style="color:#fff;">
		          <p class="text-2x mar-no text-semibold"><?=$resPromocode[0]['totPromocode'];?></p>
		          <p class="mar-no">Total Promocode</p>
		      </a>
            </div>
        </div>
    </div>
</div>
