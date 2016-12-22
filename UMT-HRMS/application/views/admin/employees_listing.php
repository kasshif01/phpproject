<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Employees</h5>


    </div>

    <div class="panel-body">

        Below is a list of Employees
    </div>
    <div class="panel-body">

        <fieldset class="content-group" style='border-bottom:1px solid #ddd; '>
            <div class='pull-left' style='padding-top:20px;'>Employees</div>
            <div class='pull-right text-right' style='margin-bottom: 10px;'>

                <a href="<?php echo base_url() ?>admin/employees/add_edit_employee" class="btn bg-blue btn-xs">Add
                    Employee </a>


            </div>

        </fieldset>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>

                <th>Emp code</th>
                <th>Role</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($employees->num_rows() > 0) {
                foreach ($employees->result_array() as $emp) {

                    $role = "";
                    $class = "label-success";
                    $text = 'Active';
                    if ($emp['emp_status_id'] == 0) {
                        $class = "label-default";
                        $text = 'Inactive';
                    }

                    if ($emp['role_id'] == 1) {
                        $role = "Admin";
                    } else if ($emp['role_id'] == 3) {
                        $role = "Employee";
                    } else if ($emp['role_id'] == 2) {
                        $role = "HOD";
                    }
                    ?>

                    <tr>

                        <td><?php echo $emp['emp_code']; ?></td>
                        <td><?php echo $role; ?></td>
                        <td><?php echo $emp['emp_firstname']; ?> <?php echo $emp['emp_lastname']; ?></td>
                        <td><?php echo $emp['emp_email']; ?></td>
                        <td><?php echo $emp['emp_contact']; ?></td>
                        <td><?php echo $emp['emp_address']; ?></td>
                        <td><?php echo $emp['emp_designation']; ?></td>

                        <?php
                        $department = $this->Employees_model->get_dep_by_id($emp['emp_department']);

                        $dep = $department->row();
                        $dep_name = $dep->dep_name;
                        ?>
                        <td><?php echo $dep_name; ?></td>

                        <td><a href="#"><span class="label <?php echo $class ?>"><?php echo $text ?></span></a></td>



                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="<?php echo base_url() ?>admin/employees/add_edit_employee/<?php echo $emp['emp_id']; ?>">Edit</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() ?>admin/employees/emp_leave_summary/<?php echo $emp['emp_id']; ?>">View leave history</a>
                                        </li>
                                        <li><a onclick="return confirm('Are you sure you want to delete this item?');"
                                               href="<?php echo base_url(); ?>admin/employees/delete_employee/<?php echo $emp['emp_id']; ?>">Delete</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>


                        </td>

                    </tr>
                    <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>