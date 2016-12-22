<?php
$error_str = validation_errors();

if ($error_str == '') {
    if ($emp_type_id == 0) {

        $title = '';
        $annual_leaves = '';
        
    } else {
        if ($employee_types->num_rows() > 0) {
            $type = $employee_types->row();

            $title = $type->title;
            $annual_leaves = $type->annual_leaves;
            
        } else {
            redirect('admin/employees/add_edit_emp_type');
        }
    }
} else {

    $title = set_value('title');
    $annual_leaves = set_value('annual_leaves');
   
}
?>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Add Employee Type</h5>
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
                    <label class="control-label col-lg-3">Annual Leaves</label>
                    <div class="col-lg-6">
                        <input type="number"  class="form-control" value="<?php echo $annual_leaves; ?>" placeholder="" name="annual_leaves" required>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-offset-9">
                    <button type="submit" name="submit" class="btn bg-blue">Save</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
