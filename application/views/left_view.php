<!-- <div id="left">
	<?php if($this->session->userdata('role_id') == '1') { ?>
    <div class="subnav subnav-hidden">
        <div class="subnav-title"> <a href="javascript:void(0);" class='toggle-subnav <?php echo ($this->router->class == 'admins')?"active":"";?>'><i class="glyphicon-notes"></i><span>Admins</span></a> </div>
        <ul class="subnav-menu">
            <li> <a href="<?php echo base_url(); ?>admins/">Admins</a> </li>
            <li> <a href="<?php echo base_url(); ?>admins/add/">Add Admin</a> </li>
        </ul>
    </div>

    <div class="subnav subnav-hidden">
        <div class="subnav-title"> <a href="javascript:void(0);" class='toggle-subnav <?php echo ($this->router->class == 'building')?"active":"";?>'><i class="glyphicon-notes"></i><span>Building</span></a> </div>
        <ul class="subnav-menu">
            <li> <a href="<?php echo base_url(); ?>building/">Building</a> </li>
            <li> <a href="<?php echo base_url(); ?>building/add/">Add Building</a> </li>
        </ul>
    </div>

    <div class="subnav subnav-hidden">
        <div class="subnav-title"> <a href="javascript:void(0);" class='toggle-subnav <?php echo ($this->router->class == 'room')?"active":"";?>'><i class="glyphicon-notes"></i><span>Room</span></a> </div>
        <ul class="subnav-menu">
            <li> <a href="<?php echo base_url(); ?>room/">Room</a> </li>
            <li> <a href="<?php echo base_url(); ?>room/add/">Add Room</a> </li>
        </ul>
    </div>

    <div class="subnav subnav-hidden">
        <div class="subnav-title"> <a href="javascript:void(0);" class='toggle-subnav <?php echo ($this->router->class == 'booking')?"active":"";?>'><i class="glyphicon-notes"></i><span>Booking</span></a> </div>
        <ul class="subnav-menu">
            <li> <a href="<?php echo base_url(); ?>booking/">Booked Room List</a> </li>
            <li> <a href="<?php echo base_url(); ?>booking/add/">Booking</a> </li>
        </ul>
    </div>
	<?php } ?>

   
</div>

<style type="text/css">
#left .subnav .subnav-title .active {
    background: none repeat scroll 0 0 #666;
}

#navigation .toggle-nav:hover {
    background-color: #666;
}

</style> -->