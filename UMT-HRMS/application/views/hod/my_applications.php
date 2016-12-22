<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Applications</h5>


    </div>

    <div class="panel-body">

        Below is a list of Applications
    </div>
    <div class="panel-body">

        <fieldset class="content-group" style='border-bottom:1px solid #ddd; '>
            <div class='pull-left' style='padding-top:20px;'>Applications</div>
            <div class='pull-right text-right' style='margin-bottom: 10px;'>



            </div>

        </fieldset>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Id</th>
                <th>Applicant Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Date From</th>
                <th>Date To</th>
                <th>days</th>
                <th>Type</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($applications->num_rows() > 0) {
                foreach ($applications->result_array() as $app) {


                    $class = "label-success";
                    $text = 'Active';
                    if ($app['application_status_id'] == 0) {
                        $class = "label-default";
                        $text = 'pending';
                    } elseif ($app['application_status_id'] == 1) {

                        $class = "label-success";
                        $text = 'Approved';
                    } elseif ($app['application_status_id'] == 2) {
                        $class = "label-danger";
                        $text = 'Disapproved';
                    }
                    ?>

                    <?php
                    $dep_id = $this->session->userdata('emp_department');


                    $department = $this->Employees_model->get_dep_by_id($dep_id);

                    $dep = $department->row();
                    $dep_name = $dep->dep_name;
                    ?>
                    <tr>
                        <td><?php echo $app['application_id']; ?></td>
                        <td><?php echo $this->session->userdata('emp_firstname'); ?></td>
                        <td><?php echo $dep_name; ?></td>
                        <td><?php echo $this->session->userdata('emp_designation'); ?></td>
                        <td><?php echo $app['date_from']; ?></td>
                        <td><?php echo $app['date_to']; ?></td>
                        <td><?php echo $app['no_of_days']; ?></td>
                        <td><?php echo $app['leave_type']; ?></td>
                        <td><?php echo $app['reason']; ?></td>
                        <td><a href="#"><span class="label <?php echo $class ?>"><?php echo $text ?></span></a></td>

                    </tr>

                <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>