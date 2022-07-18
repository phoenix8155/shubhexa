<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Shubhexa - Back office | Admin Panel</title>

<!--chosen asset-->

  <link rel="stylesheet" href="<?=asset_path()?>/panel/choosen/chosen.css">

<!--chosen asset end-->

 <link rel="icon" href="<?=asset_path('web/')?>favicon.png" sizes="16x16">
<link href="<?=asset_path()?>panel/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=asset_path()?>panel/css/nifty.min.css" rel="stylesheet">
<link href="<?=asset_path()?>panel/plugins/pace/pace.min.css" rel="stylesheet">
<script src="<?=asset_path()?>panel/plugins/pace/pace.min.js"></script>
<link href="<?=asset_path()?>panel/css/demo/nifty-demo.min.css" rel="stylesheet">
<link href="<?=asset_path()?>panel/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
<script src="<?=asset_path()?>panel/js/jquery.min.js"></script>
<script src="<?=asset_path()?>panel/js/bootstrap.min.js"></script>
<script src="<?=asset_path()?>panel/js/nifty.min.js"></script>
<script src="<?=asset_path()?>panel/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="<?=asset_path()?>panel/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="<?=asset_path()?>panel/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<link href="<?=asset_path()?>panel/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?=asset_path()?>panel/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
<script src="<?=asset_path()?>panel/js/clipboard.min.js"></script>
<link rel="stylesheet" href="<?=asset_path()?>panel/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?=asset_path('web/')?>css/font-awesome.min.css">

<script src="<?=asset_path()?>panel/popup/js/lightbox.js"></script>
<script src="<?=asset_path()?>panel/popup/js/jquery.carouFredSel-5.5.0-packed.js"></script>
<script src="<?=asset_path()?>panel/popup/js/jquery.magnific-popup.js"></script>
<link  rel="stylesheet" type="text/css" href="<?=asset_path()?>panel/popup/css/lightbox.css">
<link rel="preload" as="font" type="font/woff2" href="//fonts.gstatic.com/s/poppins/v5/9VWMTeb5jtXkNoTv949Npfk_vArhqVIZ0nv9q090hN8.woff2" crossorigin>
<script>
		$( document ).ready(function() {
			 $(".delete_record").click(function(){
				if (!confirm("Do you want to delete")){
				  return false;
				}
			  });
		});

		// $( document ).ready(function() {
		// 	 $(".status_change").click(function(){
		// 		if (!confirm("Do you want to Accept")){
		// 		  return false;
		// 		}
		// 	  });
		// });
		$( document ).ready(function() {
			 $(".status_changes").click(function(){
				if (!confirm("Do you want to Accept")){
				  return false;
				}
			  });
		});
</script>

<script>

	$(document).on('click', '.popup-modal', function (e) {

			e.preventDefault();

			var url=$(this).attr('href');

			$.magnificPopup.open({items: { src:url},type: 'ajax',modal: true,preloader: false}, 0);

		});

		$(document).on('click', '.popup-modal-dismiss', function (e) {

			e.preventDefault();

			$.magnificPopup.close();

		});

		$(document).on('click', '.jconfirm', function (e) {

			var con=confirm('Are You Sure');

			if(!con){

				e.preventDefault();

				return false;

			}

		});

</script>


</head>

<body>

<style>
	body {
		font-size: 14px;
	}
	.menu-title{

		text-transform:uppercase;

	}
	.mainnav-menu li ul li a{

		text-transform:uppercase !important;

	}
	#mainnav-menu-wrap{

		background-color:#225887 !important;

	}
	.profile-wrap{

		background-color:#225887 !important;

	}
	#mainnav {

		color: #FFFFFF !important;

		font-weight: bold !important;

	}
	#mainnav-menu>.active {

    	background-color: #d4ebff !important;

	}

	#mainnav-menu>li>a:hover, #mainnav-menu>li>a:active {

		color: #000000 !important;

	}

	.mainnav-profile .mnp-name{

		color: #FFFFFF !important;

		font-weight: bold !important;

	}

	#mainnav .list-header{

		color: #FFFFFF !important;

		font-weight: bold !important;

	}

	#mainnav-menu ul .active-link a, .menu-popover .sub-menu ul .active-link a {

    	color: #225887 !important;

	}
	#mainnav-menu .active-link{

		background-color:#d4ebff !important;

	}
	  #mainnav-menu ul a:hover{

		  color: #000000 !important

	  }
	#mainnav-menu .active:not(.active-sub)>a {

    	color: #000000 !important;

	}

	#mainnav-menu > li:hover{
		background-color:#d4ebff !important;
	}
li.active.active-sub {
    color: #000000 !important;
}
li.active {
    color: #000000;
}

</style>
