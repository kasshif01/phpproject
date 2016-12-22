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

            </div>

        </fieldset>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Policy Id</th>
                <th>Title</th>
                <th>Description</th>


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
                    </tr>
                    <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>