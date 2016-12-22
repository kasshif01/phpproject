<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-dep_name">Departments</h5>
    </div>

    <div class="panel-body">

        Below is a list of Departments
    </div>
    <div class="panel-body">

        <fieldset class="content-group" style='border-bottom:1px solid #ddd; '>
            <div class='pull-left' style='padding-top:20px;'>Leave policies</div>
            <div class='pull-right text-right' style='margin-bottom: 10px;'>
                <a href="<?php echo base_url() ?>admin/departments/add_edit_department" class="btn bg-blue btn-xs">Add
                    Deparmtent </a>
            </div>
        </fieldset>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($departments->num_rows() > 0) {
                foreach ($departments->result_array() as $dep) {
                    ?>
                    <tr>
                        <td><?php echo $dep['dep_id']; ?></td>
                        <td><?php echo $dep['dep_name']; ?></td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="<?php echo base_url() ?>admin/departments/add_edit_department/<?php echo $dep['dep_id']; ?>">Edit</a>
                                        </li>
                                        <li><a onclick="return confirm('Are you sure you want to delete this item?');"
                                               href="<?php echo base_url(); ?>admin/departments/delete_department/<?php echo $dep['dep_id']; ?>">Delete</a>
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