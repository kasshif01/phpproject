<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="<?php echo base_url(); ?>assets/emp_avatar/<?php echo $this->session->userdata('emp_avatar'); ?>"
                                                        class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold"><?php
                            /* echo $this->session->userdata('user_firstname') . ' ' . $this->session->userdata('user_lastname'); */
                            ?> </span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-quill2 text-size-small"></i> <?php echo $this->session->userdata('emp_designation'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <?php
        $role_id = $this->session->userdata('role_id');



        if ($role_id == 1) {
            ?>
            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">

                        <!-- Main -->
                        <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                        <li><a href="<?php echo base_url() ?>admin/employees/applications"><i class="icon-stack"></i> <span>Applications</span></a>
                        <li><a href="<?php echo base_url() ?>admin/employees"><i class="icon-users"></i> <span>Employees</span></a>
                        <li><a href="<?php echo base_url() ?>admin/employees/employee_types"><i class="icon-users"></i> <span>Employee Types</span></a>
                        <li><a href="<?php echo base_url() ?>admin/departments"><i class="icon-users"></i> <span>Departments</span></a>
                        <li><a href="<?php echo base_url() ?>admin/employees/roles"><i class="icon-user-lock"></i> <span>Roles</span></a>
                        <li><a href="<?php echo base_url() ?>admin/Leaves/leave_types"><i class="icon-stack3"></i> <span>Leave types</span></a>
                        <li><a href="<?php echo base_url() ?>admin/Leaves"><i class="icon-clippy"></i> <span>Leave policies</span></a>
                        <li><a href="<?php echo base_url() ?>admin/calendar"><i class="icon-clippy"></i> <span>Leave Calendar</span></a>
                        </li>

                    </ul>

                </div>
            </div>
            <!-- /main navigation -->
            <?php
        }

        if ($role_id == 2) {
            ?>

            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">

                        <!-- Main -->
                        <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                        <li><a href="<?php echo base_url() ?>HOD/applications/add_edit_application"><i class="icon-pencil7"></i> <span>Submit an application</span></a>
                        <li><a href="<?php echo base_url() ?>HOD/applications"><i class="icon-stack"></i> <span>Applications for approval</span></a>
                        <li><a href="<?php echo base_url() ?>HOD/applications/my_applications"><i class="icon-stack"></i> <span>My Applications</span></a>
                        <li><a href="<?php echo base_url() ?>HOD/leaves/leave_types"><i class="icon-stack3"></i> <span>Leave types</span></a>
                        <li><a href="<?php echo base_url() ?>HOD/leaves/leave_policies"><i class="icon-clippy"></i> <span>Leave policies</span></a>
                        </li>

                    </ul>

                </div>
            </div>
            <!-- /main navigation -->
        <?php } if ($role_id == 3) { ?>
            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">

                        <!-- Main -->
                        <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                        <li><a href="<?php echo base_url() ?>employee/applications/add_edit_application"><i class="icon-pencil7"></i> <span>Submit an application</span></a>
                        <li><a href="<?php echo base_url() ?>employee/applications"><i class="icon-stack"></i> <span>Applications</span></a>
                        <li><a href="<?php echo base_url() ?>employee/leaves/leave_summary"><i class="icon-stack"></i> <span>Leave Calendar</span></a>
                        <li><a href="<?php echo base_url() ?>employee/leaves/leave_types"><i class="icon-stack3"></i> <span>Leave types</span></a>
                        <li><a href="<?php echo base_url() ?>employee/leaves/leave_policies"><i class="icon-clippy"></i> <span>Leave policies</span></a>
                        </li>

                    </ul>

                </div>
            </div>
            <!-- /main navigation -->
        <?php } ?>
    </div>
</div>