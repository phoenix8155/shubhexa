<div id="content">

            <div class="content-admin-main">

                <div class="admin-top-area d-flex flex-wrap justify-content-between m-b30 align-items-center">

                    <div class="admin-left-area">
                        <a class="nav-btn-admin d-flex justify-content-between align-items-center" id="sidebarCollapse">
                            <span class="nav-btn-text">Dashboard Menu</span>
                            <span class="fa fa-reorder"></span>
                        </a>
                    </div>

                    <div class="admin-area-mid">

                    </div>

                    <div class="admin-right-area">

                    </div>
                </div>


            	<div class="aon-admin-heading">
                	<h4>My Wishlist</h4>
                </div>

                <div class="card aon-card">
                    <div class="card-body aon-card-body">

                        <!-- Week Tabs-->
                        <div class="sf-availability-times-tab m-b50">
                            <div class="sf-custom-tabs sf-custom-new">
                                <!--Tabs Content-->
                                <div class="tab-content">

                                    <!--Upcoming-->
                                    <div id="Upcoming" class="tab-pane active">
                                        <div class="sf-tabs-content">
                                            <div class="sf-bs-data-table">
                                                <div class="table-responsive">
                                                    <table  class="table table-striped table-bordered example-dt-table aon-booking-table" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No</th>
                                                                <th>Celebrity Name</th>
                                                                <th>Amount</th>
                                                                <th>Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        	<?php for ($i = 0; $i < count($result); $i++) {
	// code...
	?>
                                                            <tr>
                                                            	<td><?=$i + 1;?></td>
                                                                <td>
                                                                    <div class="sf-booking-info-col">
                                                                        <span class="sf-booking-refid"><?=$result[$i]['fname']?><?=$result[$i]['lname']?></span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="inner">
                                                                        <h3>
                                                                            <span class="sf-booking-payment-info" title="">85.00 </span>

                                                                        </h3>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="<?=file_path()?>celebrity/view/<?=$result[$i]['celeb_id']?>" class="admin-button btn-sm viewBookings" title="View Celebrity">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a href="<?=file_path()?>my_wishlist/removeFromWishlist/<?=$result[$i]['id']?>" class="admin-button btn-sm " title="Remove from list">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>

                                                            </tr>

                                                        <?php }?>

                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>



            </div>

    	</div>

 </div>


 <!-- Modal add group-->
<div class="modal fade content-admin-main" id="downloadreport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog model-w800" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Range</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="sf-md-padding">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select Range</label>
                        <div class="aon-inputicon-box">
                            <input class="form-control sf-form-control" name="company_name" type="text">
                            <i class="aon-input-icon fa fa-calendar"></i>
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="admin-button" data-dismiss="modal">Cancel</button>
          <button type="button" class="admin-button">Apply</button>
        </div>
      </div>
    </div>
</div>
