<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- JAVASCRIPT  FILES ========================================= -->
<script  src="<?=asset_path('web/')?>js/jquery-3.6.0.min.js"></script><!-- JQUERY.MIN JS -->
<script  src="<?=asset_path('web/')?>js/popper.min.js"></script><!-- POPPER.MIN JS -->
<script  src="<?=asset_path('web/')?>js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script  src="<?=asset_path('web/')?>js/bootstrap-select.min.js"></script><!-- BOOTSTRAP SELECT -->
<script  src="<?=asset_path('web/')?>js/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script  src="<?=asset_path('web/')?>js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->
<script  src="<?=asset_path('web/')?>js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
<script  src="<?=asset_path('web/')?>js/counterup.min.js"></script><!-- COUNTERUP JS -->
<script  src="<?=asset_path('web/')?>js/waypoints-sticky.min.js"></script><!-- STICKY HEADER -->
<script  src="<?=asset_path('web/')?>js/isotope.pkgd.min.js"></script><!-- MASONRY  -->

<script  src="<?=asset_path('web/')?>js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->
<script  src="<?=asset_path('web/')?>js/slick.min.js"></script><!-- OWL  SLIDER  -->

<script  src="<?=asset_path('web/')?>js/theia-sticky-sidebar.js"></script><!-- STICKY SIDEBAR  -->
<script src="<?=asset_path('web/')?>js/m-custom-scrollbar.min.js"></script><!-- my account left panel scroller -->
<script src="<?=asset_path('web/')?>js/dropzone.js"></script><!-- Images upload -->

<script src="<?=asset_path('web/')?>js/bootstrap4-toggle.min.js"></script>
<script src="<?=asset_path('web/')?>js/jquery.dataTables.min.js"></script>
<script src="<?=asset_path('web/')?>js/dataTables.bootstrap4.min.js"></script>

<script  src="<?=asset_path('web/')?>js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="<?=asset_path('web/')?>js/lc_lightbox.lite.js" ></script><!-- IMAGE POPUP -->
<script  src="<?=asset_path('web/')?>js/bootstrap-slider.min.js"></script><!-- Form js -->

<script type="text/javascript">
	$(document).on('click', '.removeCart', function(e) {
        e.preventDefault();
		var data_id = $(this).data('value');

    	if(data_id==''){
    		alert('something went wrong!');

    	}else{

		    $.ajax({
		        type: "post",
		        dataType: 'json',
		        url: '<?php echo file_path() ?>cart/removeFromCart',
		        data: {data_id : data_id},
		        success:function(resp) {
		        	if(resp==true){
		        		window.location.reload();
		        	}else{
		        		alert('something went wrong!');
		        	}
		        },
		        error:function() {
		            //alert('failed');
		        }
		    });
    	}

	});
</script>
</body>
</html>
