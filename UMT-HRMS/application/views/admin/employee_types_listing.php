<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-dep_name">Employee Types</h5>
    </div>

    <div class="panel-body">

        Below is a list of Employee Types
    </div>
    <div class="panel-body">

        <fieldset class="content-group" style='border-bottom:1px solid #ddd; '>
            <div class='pull-left' style='padding-top:20px;'>Leave policies</div>
            <div class='pull-right text-right' style='margin-bottom: 10px;'>
                <a href="<?php echo base_url() ?>admin/employees/add_edit_emp_type" class="btn bg-blue btn-xs">Add
                    Employee Type </a>
            </div>
        </fieldset>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Annual Leaves</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($employee_types->num_rows() > 0) {
                foreach ($employee_types->result_array() as $type) {
                    ?>
                    <tr>
                        <td><?php echo $type['id']; ?></td>
                        <td><?php echo $type['title']; ?></td>
                        <td><?php echo $type['annual_leaves']; ?></td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="<?php echo base_url() ?>admin/employees/add_edit_emp_type/<?php echo $type['id']; ?>">Edit</a>
                                        </li>
                                        <li><a onclick="return confirm('Are you sure you want to delete this item?');"
                                               href="<?php echo base_url(); ?>admin/employees/delete_emp_type/<?php echo $type['id']; ?>">Delete</a>
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