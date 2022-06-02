<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav id="sidebar-admin-wraper">
    <div class="admin-nav">
        <ul class="">
           <!--  <li class="active">
            	<a href="#"><i class="fa fa-dashboard"></i><span class="admin-nav-text">Dashboard</span></a>
            </li> -->
            <li>
                <a href="<?=file_path()?>my_account/profile/view"><i class="fa fa-user-circle-o"></i><span class="admin-nav-text">Profile</span></a>
            </li>

            <li>
            	<a href="<?=file_path()?>cart"><i class="fa fa-opencart"></i><span class="admin-nav-text">My Cart</span></a>
            </li>
            <li>
            	<a href="<?=file_path()?>my_bookings"><i class="fa fa-calendar"></i><span class="admin-nav-text">My Booking</span></a>
            </li>
            <li>
            	<a href="<?=file_path()?>my_wishlist"><i class="fa fa-calendar-check-o"></i><span class="admin-nav-text">My Wishlist</span></a>
            </li>
            <?php if ($this->session->userdata['user']['loginWithOther'] == false) {?>
            <li>
            	<a href="<?=file_path()?>my_account/changePassword"><i class="fa fa-cogs"></i><span class="admin-nav-text">Change Password</span></a>
            </li>
        <?php }?>
        </ul>
    </div>
</nav>
