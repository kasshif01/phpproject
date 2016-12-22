<?php

defined('BASEPATH') OR exit('No direct script access allowed');


if (!function_exists('upload_custom')) {

    function upload_custom($tmp_folder, $destination_path, $file_name, $allowed_extentions = array('jpg', 'jpeg', 'png', 'gif')) {

        $file = $file_name;
        $path = PATH_DIR . $destination_path . $file;
        if (image_type_check($file_name, $allowed_extentions)) {
            if (move_uploaded_file($tmp_folder, $path)) {
                return $file;
            } else {
                return 'error upload';
            }
        } else {
            return 'error ext';
        }
    }

}

if (!function_exists('image_type_check')) {

    function image_type_check($image, $allowed_extentions = array('jpg', 'jpeg', 'png', 'gif')) {
        if ($image != '') {
            $tmp_ext = explode('.', $image);
            $extension = end($tmp_ext);
            $extension = strtolower($extension);
            //$extension=  strtolower(end(explode(".",$image)));
            $ext = $allowed_extentions;
            if (in_array($extension, $ext)) {
                return true;
            }
        } else {
            return false;
        }
    }

}

if (!function_exists('resizeImage')) {

    function resizeImage($source_image_path, $source_image_name, $new_image_name, $width, $height) {
        $CI_ins = & get_instance();
        $config['image_library'] = 'GD2';
        $config['source_image'] = $source_image_path . $source_image_name;
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = TRUE;
        $config['quality'] = '100%';
        $config['new_image'] = $source_image_path . '/thumbs/' . $new_image_name . $source_image_name;
        $config['width'] = $width;
        $config['height'] = $height;
        $CI_ins->load->library('image_lib', $config);
        $CI_ins->image_lib->initialize($config);
        if (!$CI_ins->image_lib->resize()) {
            echo $CI_ins->image_lib->display_errors();
        }
    }

}

if (!function_exists('resize_Image')) {

    function resize_Image($source_image_path, $dest_path, $width, $height) {
        $CI_ins = & get_instance();
        $config['image_library'] = 'GD2';
        $config['source_image'] = $source_image_path;
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = TRUE;
        $config['quality'] = '100%';
        $config['new_image'] = $dest_path;
        $config['width'] = $width;
        $config['height'] = $height;
        $CI_ins->load->library('image_lib', $config);
        $CI_ins->image_lib->initialize($config);
        if (!$CI_ins->image_lib->resize()) {
            echo $CI_ins->image_lib->display_errors();
        }
    }

}


if (!function_exists('check_session_logic_admin')) {

    function check_session_logic_admin($current_con_id = 0) {
        $CI_ins = & get_instance();

        $role_id = $CI_ins->session->userdata('role_id');
        if ($role_id != 1) {
            redirect('login');
        }
    }

}

if (!function_exists('check_session_logic_hod')) {

    function check_session_logic_hod($current_con_id = 0) {
        $CI_ins = & get_instance();

        $role_id = $CI_ins->session->userdata('role_id');
        if ($role_id != 2) {
            redirect('login');
        }
    }

}

if (!function_exists('check_session_logic_emp')) {

    function check_session_logic_emp($current_con_id = 0) {
        $CI_ins = & get_instance();

        $role_id = $CI_ins->session->userdata('role_id');
        if ($role_id != 3) {
            redirect('login');
        }
    }

}



