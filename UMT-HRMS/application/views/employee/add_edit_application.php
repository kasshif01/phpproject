<?php
$error_str = validation_errors();

if ($error_str == '') {
    if ($application_id == 0) {
        $date_from = '';
        $date_to = '';
        $no_of_days = '';
        $leave_type = '';
        $reason = '';
        $officiating_officer = '';
    } else {
        if ($applications->num_rows() > 0) {
            $app = $applications->row();
            $date_from = $app->date_from;
            $date_to = $app->date_to;
            $no_of_days = $app->no_of_days;
            $leave_type = $app->leave_type;
            $reason = $app->reason;
            $officiating_officer = $app->officiating_officer;
        } else {
            redirect('employee/application/add_edit_application');
        }
    }
} else {
    $date_from = set_value('date_from');
    $date_to = set_value('date_to');
    $no_of_days = set_value('no_of_days');
    $leave_type = set_value('leave_type');
    $reason = set_value('reason');
    $officiating_officer = set_value('officiating_officer');
}
?>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Submit an application</h5>
        <div class="heading-elements">

        </div>
    </div>

    <div class="panel-body">


        <form class="form-horizontal form-validate" method="post" action="" enctype="multipart/form-data">
            <fieldset class="content-group">
                <legend class="text-bold">Application Details</legend>


                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Start Date</label>
                    <div class="col-lg-6">
                        <input type="text" id="date_pick" class="form-control" value="<?php echo $date_from; ?>" placeholder="" name="date_from" required>

                    </div>
                </div>

                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">End Date</label>
                    <div class="col-lg-6">
                        <input type="text" id="date_pick1" class="form-control" value="<?php echo $date_to; ?>" placeholder="" name="date_to" required>

                    </div>
                </div>

                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">No of days</label>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" value="<?php echo $no_of_days; ?>" placeholder="" name="no_of_days" required>

                    </div>
                </div>
                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Leave Type</label>
                    <div class="col-lg-6">
                        <select  class="form-control" name="leave_type" required>
                            <?php
                            $leave_types = $this->Leaves_model->get_all_leave_types();
                            if ($leave_types->num_rows() > 0) {
                                foreach ($leave_types->result_array() as $type) {
                                    ?>

                                    <option value="<?php echo $type['leave_type_name'] ?>"><?php echo $type['leave_type_name'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Reason</label>
                    <div class="col-lg-6">
                        <textarea type="text" class="form-control" value="<?php echo $reason; ?>" placeholder="" name="reason" required></textarea>

                    </div>
                </div>
                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Officiating Officer</label>
                    <div class="col-lg-6">
                        <select  class="form-control" name="officiating_officer" required>
                            <?php
                            $employees = $this->Employees_model->get_emp_by_dep_id();
                            if ($employees->num_rows() > 0) {
                                foreach ($employees->result_array() as $emp) {
                                    ?>

                                    <option value="<?php echo $emp['emp_id'] ?>"><?php echo $emp['emp_firstname'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>

                    </div>
                </div>


                <div class="col-lg-3 col-lg-offset-9">
                    <button type="submit" name="submit" class="btn bg-blue">Send application</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<script>
    var dateToday = new Date();

    $(document).ready(function () {


        $("#date_pick").datepicker({
            format: 'yyyy-mm-dd',
            startDate: dateToday,
            autoclose: true,
            todayHighlight: true
        });

        $("#date_pick1").datepicker({
            format: 'yyyy-mm-dd',
            startDate: dateToday,
            autoclose: true,
            todayHighlight: true
        });

    });
</script>
