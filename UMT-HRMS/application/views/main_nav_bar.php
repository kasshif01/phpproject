<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img class="img-circle" style="height:40px; margin-top:-11px;" src="<?php echo base_url(); ?>assets/images/logo.png" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li>
                <a class="sidebar-control sidebar-main-toggle hidden-xs">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">


            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url(); ?>assets/emp_avatar/<?php echo $this->session->userdata('emp_avatar'); ?>" alt="">
                    <span><?php echo $this->session->userdata('emp_firstname'); ?></span>
                    <i class="caret"></i>
                </a>
                <?php $role_id = $this->session->userdata('role_id'); ?>
                <ul class="dropdown-menu dropdown-menu-right">
                    <?php if ($role_id == 1) {
                        ?>
                        <li><a href="<?php echo base_url() ?>admin/profile"> <i class="icon-user-plus"></i> My profile</a></li>
                    <?php } ?>
                    <?php if ($role_id == 2) {
                        ?>  
                        <li><a href="<?php echo base_url() ?>HOD/profile"> <i class="icon-user-plus"></i> My profile</a></li>
                    <?php } ?>
                    <?php if ($role_id == 3) {
                        ?>  
                        <li><a href="<?php echo base_url() ?>employee/profile"> <i class="icon-user-plus"></i> My profile</a></li>
                    <?php } ?>
                    <li><a href="<?php echo base_url() ?>Login/logout"><i class="icon-switch2"></i> Logout </a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->