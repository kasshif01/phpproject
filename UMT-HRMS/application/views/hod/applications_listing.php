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
                <th>No of days</th>
                <th>Type</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php ?>
            <?php
            if ($applications->num_rows() > 0) {
                foreach ($applications->result_array() as $app) {

                    $emp_info = $this->Employees_model->get_employee_by_id($app['emp_id']);

                    $emp = $emp_info->row();

                    $emp_firstname = $emp->emp_firstname;
                    $emp_code = $emp->emp_code;
                    $emp_lastname = $emp->emp_lastname;
                    $emp_designation = $emp->emp_designation;
                    $emp_department = $emp->emp_department;


                    $app_id = $app['application_id'];



                    if ($app['application_status_id'] == 0) {
                        $span = '<a onclick= update_status_approve("' . $app_id . '");><span class="label label-success">Approve</span></a> <a onclick= update_status_disapprove("' . $app_id . '");><span class="label label-danger">Disapprove</span></a>';
                    } elseif ($app['application_status_id'] == 1) {

                        $span = '<span class="label label-success">Approved</span>';
                    } elseif ($app['application_status_id'] == 2) {
                        $span = '<span class="label label-danger">Disapproved</span>';
                    }
                    ?>

                    <?php
                    $department = $this->Employees_model->get_dep_by_id($emp->emp_department);

                    $dep = $department->row();
                    $dep_name = $dep->dep_name;
                    ?>
                    <tr>
                        <td><?php echo $emp_code; ?></td>
                        <td><?php echo $emp_firstname; ?> <?php echo $emp_lastname; ?></td>
                        <td><?php echo $dep_name; ?></td>
                        <td><?php echo $emp_designation; ?></td>
                        <td><?php echo $app['date_from']; ?></td>
                        <td><?php echo $app['date_to']; ?></td>
                        <td><?php echo $app['no_of_days']; ?></td>
                        <td><?php echo $app['leave_type']; ?></td>
                        <td><?php echo $app['reason']; ?></td>
                        <td><?php echo $span; ?></td>

                    </tr>

                <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>
<script>

    function update_status_approve(app_id)
    {
        application_id = app_id;

        $.ajax({
            type: 'POST',
            async: true,
            url: '<?php echo base_url(); ?>HOD/applications/approve_application',
            data: {
                'application_id': application_id,

            },
            success: function (msg) {

                location.reload();


            }
        });
    }

    function update_status_disapprove(app_id)
    {

        application_id = app_id;

        $.ajax({
            type: 'POST',
            async: true,
            url: '<?php echo base_url(); ?>HOD/applications/disapprove_application',
            data: {
                'application_id': application_id,

            },
            success: function (msg) {


            }
        });
    }



</script>