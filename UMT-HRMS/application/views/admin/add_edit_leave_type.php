<?php
$error_str = validation_errors();

if ($error_str == '') {
    if ($type_id == 0) {

        $leave_type_name = '';
        $leave_type_description = '';
    } else {
        if ($leave_types->num_rows() > 0) {
            $type = $leave_types->row();

            $leave_type_name = $type->leave_type_name;
            $leave_type_description = $type->leave_type_description;
        } else {
            redirect('admin/leaves/add_edit_leave_type');
        }
    }
} else {

    $leave_type_name = set_value('leave_type_name');
    $leave_type_description = set_value('leave_type_description');
}
?>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Add a leave type</h5>
        <div class="heading-elements">

        </div>
    </div>

    <div class="panel-body">


        <form class="form-horizontal form-validate" method="post" action="" enctype="multipart/form-data">
            <fieldset class="content-group">



                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Title</label>
                    <div class="col-lg-6">
                        <input type="text"  class="form-control" value="<?php echo $leave_type_name; ?>" placeholder="" name="leave_type_name" required>
                    </div>
                </div>

                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Description</label>
                    <div class="col-lg-6">
                        <textarea  class="form-control" value="<?php echo $leave_type_description; ?>" placeholder="" name="leave_type_description" ></textarea>

                    </div>
                </div>




                <div class="col-lg-3 col-lg-offset-9">
                    <button type="submit" name="submit" class="btn bg-blue">Save</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
