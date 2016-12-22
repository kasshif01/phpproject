<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Leave types</h5>


    </div>

    <div class="panel-body">

        Below is a list of Leave types
    </div>
    <div class="panel-body">

        <fieldset class="content-group" style='border-bottom:1px solid #ddd; '>
            <div class='pull-left' style='padding-top:20px;'>Leave types</div>
            <div class='pull-right text-right' style='margin-bottom: 10px;'>

                <a href="<?php echo base_url() ?>admin/leaves/add_edit_leave_type" class="btn bg-blue btn-xs">Add
                    Leave type </a>



            </div>

        </fieldset>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if ($leave_types->num_rows() > 0) {
                foreach ($leave_types->result_array() as $type) {
                    ?>

                    <tr>
                        <td><?php echo $type['leave_type_id']; ?></td>
                        <td><?php echo $type['leave_type_name']; ?></td>
                        <td><?php echo $type['leave_type_description']; ?></td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="<?php echo base_url() ?>admin/leaves/add_edit_leave_type/<?php echo $type['leave_type_id']; ?>">Edit</a>
                                        </li>
                                        <li><a onclick="return confirm('Are you sure you want to delete this item?');"
                                               href="<?php echo base_url(); ?>admin/leaves/delete_leave_type/<?php echo $type['leave_type_id']; ?>">Delete</a>
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