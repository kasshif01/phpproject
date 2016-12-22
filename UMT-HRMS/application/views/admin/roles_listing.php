<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Roles</h5>


    </div>

    <div class="panel-body">

        Below is a list of Roles
    </div>
    <div class="panel-body">

        <fieldset class="content-group" style='border-bottom:1px solid #ddd; '>
            <div class='pull-left' style='padding-top:20px;'>Roles</div>
            <div class='pull-right text-right' style='margin-bottom: 10px;'>




            </div>

        </fieldset>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Role Id</th>
                <th>Role Name</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if ($roles->num_rows() > 0) {
                foreach ($roles->result_array() as $rol) {
                    ?>

                    <tr>
                        <td><?php echo $rol['role_id']; ?></td>
                        <td><?php echo $rol['role_name']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>