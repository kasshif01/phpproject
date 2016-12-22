<?php
if ($employees->num_rows() > 0) {
    $emp = $employees->row();


    $emp_firstname = $emp->emp_firstname;
    $emp_lastname = $emp->emp_lastname;
    $emp_email = $emp->emp_email;
    $emp_avatar = $emp->emp_avatar;
    $emp_code = $emp->emp_code;
    $emp_designation = $emp->emp_designation;
    $emp_department = $emp->emp_department;
    $emp_date_of_birth = $emp->emp_date_of_birth;
    $emp_address = $emp->emp_address;
    $emp_contact = $emp->emp_contact;
}
?>

<div class="row">
    <div class="col-md-9">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Profile information</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <form action="" method="Post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>First name</label>
                                <input type="text" value="<?php echo $emp_firstname; ?>" name="emp_firstname" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Last name</label>
                                <input type="text" value="<?php echo $emp_lastname; ?>" name="emp_lastname" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="text" value="<?php echo $emp_email; ?>" name="emp_email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" value="<?php echo $emp_address; ?>" name="emp_address" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone #</label>
                                <input type="text" value="<?php echo $emp_contact; ?>" name="emp_contact" class="form-control">

                            </div>

                            <div class="col-md-6">
                                <label>Upload Profile Picture:</label>
                                <input type="file" id="file_input_1" class="file-input-ajax" >
                                <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    $department = $this->Employees_model->get_dep_by_id($emp->emp_department);
    $dep = $department->row();
    $dep_name = $dep->dep_name;
    ?>
    <div class="col-md-3">
        <div class="panel panel-body border-top-primary text-center" style="margin-bottom: 0px; ">
            <img src="<?php echo base_url(); ?>assets/emp_avatar/<?php echo $emp_avatar; ?>" class="img-circle" height="150" width="150"><br><br>
            <p class="text-muted" style="margin-bottom: 0px"><?php echo $emp_code ?></p>
            <p class="text-bold" style="margin-bottom: 0px"><?php echo $emp_designation ?></p>
            <p class="text-muted"><?php echo $dep_name ?></p>
        </div>
        <div class="panel container-fluid text-center" style="background-color: #1F4661; margin-bottom: 0px; border: 0px; border-radius: 0px; ">
            <h6 style="color: white"><a id="change_pass_anchor" style="color: white" href="#change_password_div">Change Password</a></h6>
        </div>

    </div>
</div>
<div class="row" id="change_password_div">

</div>



</div>

</div>
</div>

</div>

<script>
    var counter_global = 0;

    $(document).ready(function ()
    {


        $("#change_pass_anchor").on('click', function () {
            change_password();
        });



    });



    $(function () {

        $(".file-input-ajax").fileinput({
            uploadUrl: '<?php echo base_url(); ?>admin/employees/upload_avatar', // server upload action
            uploadAsync: true,
            maxFileCount: 1,
            maxFileSize: 5096,
            initialPreview: [],
            fileActionSettings: {
                removeIcon: '<i class="icon-bin"></i>',
                removeClass: 'btn btn-link btn-xs btn-icon',
                uploadIcon: '<i class="icon-upload"></i>',
                uploadClass: 'btn btn-link btn-xs btn-icon',
                indicatorNew: '<i class="icon-file-plus text-slate"></i>',
                indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
            }
        });

    });
    function change_password()
    {
        password = $('#password').val();
        cpassword = $('#cpassword').val();

        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo base_url(); ?>admin/employees/change_password/',
            data: {
                'password': password,
                'cpassword': cpassword

            },
            success: function (msg) {
                if (msg == 'success')
                {
                    $('#change_password_div').html('<span></span>');
                    new PNotify({
                        title: 'Password Changed',
                        width: "100%",
                        text: 'Changed Password has been successfully saved',
                        addclass: 'stack-custom-top bg-success',

                    });
                    counter_global = 0;
                } else
                {
                    if (counter_global > 0)
                    {
                        text = '';
                        len = $('#password').val().length;
                        if (len <= 5)
                        {
                            text = 'minimum password lenght is 6.';
                        }
                        password = $('#password').val();
                        cpassword = $('#cpassword').val();
                        if (password == '')
                        {
                            text = 'please fill password field.';
                        }

                        if (password != cpassword)
                        {
                            text = 'Confirm Password did not match with password.';
                        }
                        new PNotify({
                            title: 'Password Not Changed',
                            width: "100%",
                            text: text,
                            addclass: 'stack-custom-top bg-danger',

                        });
                    }
                    $('#change_password_div').html(msg);
                    //change_password_button
                    $("#change_password_button").on('click', function () {
                        change_password();
                    });
                    ++counter_global;
                }
            }
        });
    }
</script>