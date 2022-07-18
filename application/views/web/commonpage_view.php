<div class="page-content">
	<div class="aon-page-benner-area">
      <div class="aon-page-banner-row" style="background-image: url(<?=asset_path('web/')?>images/banner/search-bg.png)">
        <div class="sf-overlay-main" style="opacity:0.8; background-color:#022279;"></div>
        <div class="sf-banner-heading-wrap">
          <div class="sf-banner-heading-area">
            <div class="sf-banner-heading-large"><?=$title?></div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="<?=file_path()?>"> Home </a></li>
                <!-- <li>Payment Success</li> -->
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
                    <p class="error-comment"><?=$msg?></p>
            		<a href="<?=file_path()?>home" class="site-button">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
	.datanotfound {
	    width: 100%;
	}
	.aon-search-result-area {
	    min-height: unset;
	}
	p.error-comment{
    font-size: 18px !important;
    font-weight: 600;
    color: black;
	}
</style>
