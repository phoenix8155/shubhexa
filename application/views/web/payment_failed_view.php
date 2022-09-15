<div class="page-content">
	<div class="aon-page-benner-area">
      <div class="aon-page-banner-row" style="background-image: url(<?=asset_path('web/')?>images/banner/payment-success.png)">
        <div class="sf-overlay-main" style="opacity:0.8; background-color:#022279;"></div>
        <div class="sf-banner-heading-wrap">
          <div class="sf-banner-heading-area">
            <div class="sf-banner-heading-large"><?=$title?></div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="<?=file_path()?>"> Home </a></li>
                <li>Payment Failed</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="aon-search-result-area padding-top-search-section">
        <div class="row">
            <div class="page-notfound datanotfound">
                <div class="page-notfound-content m-b30">
                    <h3 class="error-comment red-color">Oops! Sorry your booking was Failed. Please try again</h3>
                    <i class="fa fa-times-circle custom-fa-times"></i>
            		</div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
  .custom-fa-times {
    font-size: 60px;
    color: #ff0000;
  }
  .red-color {
    color: #ff0000;
  }
	.datanotfound {
	    width: 100%;
	}
	.aon-search-result-area {
	    min-height: unset;
	}
</style>
