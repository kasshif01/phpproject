<?php
$error_str = validation_errors();?>
<?php if ($error_str != ''){?>
<div class="alert alert-danger">
  <strong>CAUTION</strong> <?php echo $error_str;?>
</div>
 
<?php }
if ($error_str == '') {
    if ($employee_id == 0) {

        $emp_code = '';
        $role_id = '';
        $emp_type = '';
        $emp_firstname = '';
        $emp_lastname = '';
        $emp_email = '';
        $emp_date_of_birth = '';
        $emp_address = '';
        $emp_contact = '';
        $emp_designation = '';
        $emp_department = '';
        $emp_date_of_joining = '';
        $leave_balance = '';
    } else {
        if ($employees->num_rows() > 0) {
            $emp = $employees->row();

            $emp_code = $emp->emp_code;
            $role_id = $emp->role_id;
            $emp_type = $emp->emp_type;
            $emp_firstname = $emp->emp_firstname;
            $emp_lastname = $emp->emp_lastname;
            $emp_email = $emp->emp_email;
            $emp_date_of_birth = $emp->emp_date_of_birth;
            $emp_address = $emp->emp_address;
            $emp_contact = $emp->emp_contact;
            $emp_designation = $emp->emp_designation;
            $emp_department = $emp->emp_department;
            $emp_date_of_joining = $emp->emp_date_of_joining;
            $leave_balance = $emp->leave_balance;
        } else {
            redirect('admin/employees/add_edit_employee');
        }
    }
} else {

    $emp_code = set_value('emp_code');
    $role_id = set_value('role_id');
    $emp_type = set_value('emp_type');
    $emp_firstname = set_value('emp_firstname');
    $emp_lastname = set_value('emp_lastname');
    $emp_email = set_value('emp_email');
    $emp_date_of_birth = set_value('emp_date_of_birth');
    $emp_address = set_value('emp_address');
    $emp_contact = set_value('emp_contact');
    $emp_designation = set_value('emp_designation');
    $emp_department = set_value('emp_department');
    $emp_date_of_joining = set_value('emp_date_of_joining');
    $leave_balance = set_value('leave_balance');
}
?>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Employee Details</h5>
        <div class="heading-elements">

        </div>
    </div>

    <div class="panel-body">


        <form class="form-horizontal form-validate" method="post" action="" enctype="multipart/form-data">
            <fieldset class="content-group">



                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Emp Code</label>
                    <div class="col-lg-6">
                        <input type="text"  class="form-control" value="<?php echo $emp_code; ?>" placeholder="" name="emp_code" required>
                    </div>
                </div>

                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Role</label>
                    <div class="col-lg-6">
                        <select class="form-control" name="role_id" required>
                            <?php
                            $sel_admin = '';
                            $sel_hod = '';
                            $sel_emp = '';



                            if ($role_id == 1) {
                                $sel_admin = 'selected=selected';
                            } elseif ($role_id == 2) {
                                $sel_hod = 'selected=selected';
                            } elseif ($role_id == 3) {
                                $sel_emp = 'selected=selected';
                            }
                            ?>
                            <option value="1" <?php echo $sel_admin; ?>>Admin</option>
                            <option value="2" <?php echo $sel_hod; ?>>Head Of Department</option>
                            <option value="3" <?php echo $sel_emp; ?>>Employee</option>
                        </select>

                    </div>
                </div>

                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Type</label>
                    <div class="col-lg-6">
                        <?php
                            $emp_types = $this->Employees_model->get_all_emp_types();
                            if ($emp_types->num_rows() > 0) {
                                foreach ($emp_types->result_array() as $type) { ?>
                        <select class="form-control" name="emp_type" required>
                            
                                <?php
                                    $select = '';


                                    if ($emp_type == $type['dep_id']) {
                                        $select = 'selected=selected';
                                    }
                                    ?>

                                    <option value="<?php echo $type['id'] ?>" <?php echo $select; ?>><?php echo $type['title'] ?></option>
                                    </select>
                        <?php if($leave_balance == ''){?>
                                <input type="hidden" value="<?php echo $type['annual_leaves']?>" name="leave_balance">
                        <?php }else {?>
                                <input type="hidden" value="<?php echo $leave_balance?>" name="leave_balance">
                        <?php }?>
                        <?php
                                    
                                }
                            }
                            ?>
                        
                    </div>
                </div>
                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">First Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?php echo $emp_firstname; ?>" placeholder="" name="emp_firstname" required>

                    </div>
                </div>
                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Last Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?php echo $emp_lastname; ?>" placeholder="" name="emp_lastname" required>
                    </div>
                </div>

                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Email Address</label>
                    <div class="col-lg-6">
                        <input type="email" class="form-control" value="<?php echo $emp_email; ?>" placeholder="" name="emp_email" required>
                    </div>
                </div>
                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Date of birth</label>
                    <div class="col-lg-6">
                        <input type="text" id="date_pick1" class="form-control" value="<?php echo $emp_date_of_birth; ?>" placeholder="" name="emp_date_of_birth" required>
                    </div>
                </div>
                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Contact</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?php echo $emp_contact; ?>" placeholder="" name="emp_contact" required>
                    </div>
                </div>
                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Address</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?php echo $emp_address; ?>" placeholder="" name="emp_address" required>
                    </div>
                </div>
                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Designation</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?php echo $emp_designation; ?>" placeholder="" name="emp_designation" required>
                    </div>
                </div>

                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Department/Office</label>
                    <div class="col-lg-6">
                        <select  class="form-control" name="emp_department" required>

                            <?php
                            $departments = $this->Employees_model->get_all_departments();
                            if ($departments->num_rows() > 0) {
                                foreach ($departments->result_array() as $dep) {

                                    $select = '';


                                    if ($emp_department == $dep['dep_id']) {
                                        $select = 'selected=selected';
                                    }
                                    ?>

                                    <option value="<?php echo $dep['dep_id'] ?>" <?php echo $select; ?>><?php echo $dep['dep_name'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>

                    </div>
                </div>

                <div class="form-group  has-feedback ">
                    <label class="control-label col-lg-3">Date of joining</label>
                    <div class="col-lg-6">
                        <input type="text" id="date_pick" class="form-control" value="<?php echo $emp_date_of_joining; ?>" placeholder="" name="emp_date_of_joining" required>
                    </div>
                </div>

                <div class="col-lg-3 col-lg-offset-9">
                    <button type="submit" name="submit" class="btn bg-blue">Save</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<script>
    var dateToday = new Date();

    $(document).ready(function () {


        $("#date_pick").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });

        $("#date_pick1").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });

    });
</script>