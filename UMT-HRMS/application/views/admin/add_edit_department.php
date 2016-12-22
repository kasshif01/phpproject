<?php
$error_str = validation_errors();

if ($error_str == '') {
    if ($dep_id == 0) {

        $name = '';
        
    } else {
        if ($departments->num_rows() > 0) {
            $dep = $departments->row();

            $name = $dep->dep_name;
            
        } else {
            redirect('admin/departments/add_edit_department');
        }
    }
} else {

    $name = set_value('dep_name');
   
}
?>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Add Department</h5>
        <div class="heading-elements">

        </div>
    </div>

    <div class="panel-body">
        <form class="form-horizontal form-validate" method="post" action="" enctype="multipart/form-data">
            <fieldset class="content-group">
                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Name</label>
                    <div class="col-lg-6">
                        <input type="text"  class="form-control" value="<?php echo $name; ?>" placeholder="" name="dep_name" required>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-offset-9">
                    <button type="submit" name="submit" class="btn bg-blue">Save</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
