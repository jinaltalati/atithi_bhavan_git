<div id="left">
	<?php if($this->session->userdata('role_id') == '1') { ?>
    <div class="subnav subnav-hidden">
        <div class="subnav-title"> <a href="javascript:void(0);" class='toggle-subnav <?php echo ($this->router->class == 'admins')?"active":"";?>'><i class="glyphicon-notes"></i><span>Admins</span></a> </div>
        <ul class="subnav-menu">
            <li> <a href="<?php echo base_url(); ?>admins/">Admins</a> </li>
            <li> <a href="<?php echo base_url(); ?>admins/add/">Add Admin</a> </li>
        </ul>
    </div>

    <div class="subnav subnav-hidden">
        <div class="subnav-title"> <a href="javascript:void(0);" class='toggle-subnav <?php echo ($this->router->class == 'press')?"active":"";?>'><i class="glyphicon-notes"></i><span>Press</span></a> </div>
        <ul class="subnav-menu">
            <li> <a href="<?php echo base_url(); ?>press/">Press</a> </li>
            <li> <a href="<?php echo base_url(); ?>press/add/">Add Press</a> </li>
        </ul>
    </div>

    <div class="subnav subnav-hidden">
        <div class="subnav-title"> <a href="javascript:void(0);" class='toggle-subnav <?php echo ($this->router->class == 'paper')?"active":"";?>'><i class="glyphicon-notes"></i><span>Paper</span></a> </div>
        <ul class="subnav-menu">
            <li> <a href="<?php echo base_url(); ?>paper/">Paper</a> </li>
            <li> <a href="<?php echo base_url(); ?>paper/add/">Add Paper</a> </li>
        </ul>
    </div>

    <div class="subnav subnav-hidden">
        <div class="subnav-title"> <a href="javascript:void(0);" class='toggle-subnav <?php echo ($this->router->class == 'size')?"active":"";?>'><i class="glyphicon-notes"></i><span>Size</span></a> </div>
        <ul class="subnav-menu">
            <li> <a href="<?php echo base_url(); ?>size/">Size</a> </li>
            <li> <a href="<?php echo base_url(); ?>size/add/">Add Size</a> </li>
        </ul>
    </div>
	<?php } ?>

    <div class="subnav subnav-hidden">
        <div class="subnav-title"> <a href="javascript:void(0);" class='toggle-subnav <?php echo ($this->router->class == 'dailyentry')?"active":"";?>'><i class="glyphicon-notes"></i><span>Daily Entries</span></a> </div>
        <ul class="subnav-menu">
            <li> <a href="<?php echo base_url(); ?>dailyentry/">Daily Entries</a> </li>
            <li> <a href="<?php echo base_url(); ?>dailyentry/add/">Add Entry</a> </li>
        </ul>
    </div>
</div>