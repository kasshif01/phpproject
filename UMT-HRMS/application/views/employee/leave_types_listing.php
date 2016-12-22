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





            </div>

        </fieldset>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>

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
                    </tr>
                    <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>