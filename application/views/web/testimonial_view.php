<div class="page-content">
    <div class="aon-page-benner-area">
      <div class="aon-page-banner-row" style="background-image: url(<?=asset_path('web/')?>images/banner/tastimonial.png)">
        <div class="sf-overlay-main" style="opacity:0.8; background-color:#022279;"></div>
        <div class="sf-banner-heading-wrap">
          <div class="sf-banner-heading-area">
            <div class="sf-banner-heading-large">Testimonial</div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="<?=file_path()?>"> Home </a></li>
                <li>Testimonial</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="aon-why-choose2-area-custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-content sf-caty-listResult-wrap">
		                <div class="container">
		                    <div class="section-content">
		                        <div class="row">
		                            <?php for ($i = 0; $i < count($result); $i++) {
	?>

		                            	<?php if ($result[$i]['img_name'] != "") {
		$img = $result[$i]['img_name'];
	} else {
		$img = 'default.png';
	}?>									<div class="col-lg-4 col-md-6">
				                            <div class="sf-review-box sf-shadow-box">
				                              <div class="sf-review-head clearfix">
				                                    <div class="sf-review-pic"><img src="<?=upload_path()?>testimonial/<?=$img?>" alt=""></div>
				                                    <div class="sf-review-info">
				                                      <h5 class="sf-review-name"><?=$result[$i]['first_name']?>, <?=$result[$i]['last_name']?></h5>
				                                      <div class="sf-review-feedback"><?=$result[$i]['designation']?></div>
				                                      <div class="sf-ow-pro-rating">
			                                                <?php if ($result[$i]['rating'] == '1') {?>
                            		<span class="fa fa-star"></span>
	                                <span class="fa fa-star text-gray"></span>
	                                <span class="fa fa-star text-gray"></span>
	                                <span class="fa fa-star text-gray"></span>
	                                <span class="fa fa-star text-gray"></span>

	<?php } elseif ($result[$i]['rating'] == '2') {?>
		<span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star text-gray"></span>
        <span class="fa fa-star text-gray"></span>
        <span class="fa fa-star text-gray"></span>
	<?php } elseif ($result[$i]['rating'] == '3') {?>
		<span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star text-gray"></span>
        <span class="fa fa-star text-gray"></span>
	<?php } elseif ($result[$i]['rating'] == '4') {?>
		<span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star text-gray"></span>
	<?php } elseif ($result[$i]['rating'] == '5') {?>
		<span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
	<?php }?>
			                                            </div>
				                                    </div>
				                                  <div class="sf-review-date"><?=date('M d, Y', strtotime($result[$i]['create_date']))?></div>
				                              </div>
				                              <div class="sf-review-body">
				                              	<span class="sf-review-write"><?=$result[$i]['feedback_title']?></span>
				                              	<span class="sf-review-write"><?=$result[$i]['feedback_description']?></span>
				                              </div>
				                            </div>
				                        </div>
		                            <?php }?>
		                            <!--Pagination Start-->
		                            <!-- <div class="site-pagination s-p-center">
		                                  <ul class="pagination">
		                                    <li class="page-item disabled">
		                                      <a class="page-link" href="#" tabindex="-1"><i class="fa fa-chevron-left"></i></a>
		                                    </li>
		                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
		                                    <li class="page-item active">
		                                      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
		                                    </li>
		                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
		                                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-ellipsis-h"></i></a></li>
		                                    <li class="page-item"><a class="page-link" href="#">11</a></li>
		                                    <li class="page-item">
		                                      <a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a>
		                                    </li>
		                                  </ul>
		                            </div> -->
		                            <!--Pagination End-->

		                        </div>
		                    </div>

		                </div>
		            </div>
                </div>
            </div>
        </div>
    </section>
</div>
<style type="text/css">
	.sf-review-body {
	    min-height: 210px;
	}
</style>
