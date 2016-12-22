<?php
$error_str = validation_errors();

if ($error_str == '') {
    if ($policy_id == 0) {

        $title = '';
        $description = '';
    } else {
        if ($leave_policies->num_rows() > 0) {
            $pol = $leave_policies->row();

            $title = $pol->title;
            $description = $pol->description;
        } else {
            redirect('admin/leaves/add_edit_leave_policy');
        }
    }
} else {

    $title = set_value('title');
    $description = set_value('description');
}
?>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Add a leave policy</h5>
        <div class="heading-elements">

        </div>
    </div>

    <div class="panel-body">


        <form class="form-horizontal form-validate" method="post" action="" enctype="multipart/form-data">
            <fieldset class="content-group">



                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Title</label>
                    <div class="col-lg-6">
                        <input type="text"  class="form-control" value="<?php echo $title; ?>" placeholder="" name="title" required>
                    </div>
                </div>

                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Description</label>
                    <div class="col-lg-6">
                        <textarea class="form-control" value="<?php echo $description; ?>" placeholder="" name="description" required></textarea>

                    </div>
                </div>




                <div class="col-lg-3 col-lg-offset-9">
                    <button type="submit" name="submit" class="btn bg-blue">Save</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
