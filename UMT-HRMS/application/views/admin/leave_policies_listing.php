<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Leave policies</h5>


    </div>

    <div class="panel-body">

        Below is a list of leave policies
    </div>
    <div class="panel-body">

        <fieldset class="content-group" style='border-bottom:1px solid #ddd; '>
            <div class='pull-left' style='padding-top:20px;'>Leave policies</div>
            <div class='pull-right text-right' style='margin-bottom: 10px;'>
                <a href="<?php echo base_url() ?>admin/leaves/add_edit_leave_policy" class="btn bg-blue btn-xs">Add
                    Leave policy </a>




            </div>

        </fieldset>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Policy Id</th>
                <th>Title</th>
                <th>Description</th>
                <th class="text-center">Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if ($leave_policies->num_rows() > 0) {
                foreach ($leave_policies->result_array() as $pol) {
                    ?>

                    <tr>
                        <td><?php echo $pol['policy_id']; ?></td>
                        <td><?php echo $pol['title']; ?></td>
                        <td><?php echo $pol['description']; ?></td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="<?php echo base_url() ?>admin/leaves/add_edit_leave_policy/<?php echo $pol['policy_id']; ?>">Edit</a>
                                        </li>
                                        <li><a onclick="return confirm('Are you sure you want to delete this item?');"
                                               href="<?php echo base_url(); ?>admin/leaves/delete_leave_policy/<?php echo $pol['policy_id']; ?>">Delete</a>
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