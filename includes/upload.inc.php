<?php

        if(isset($_POST['submit-image'])){
			include 'curd.inc.php';
			$id = $_SESSION['id'];
            $file = $_FILES['file'];

            $file_name = $file['name'];
            $file_tmp_name = $file['tmp_name'];
            $file_type = $file['type'];
            $file_size = $file['size'];
            $file_error = $file['error'];

            $file_ext = explode('.', $file_name);
            $file_actual_ext = strtolower(end($file_ext));

            $allowed = array('jpg');

            if(in_array($file_actual_ext, $allowed)){
                if($file_error === 0){
                    if($file_size < 250000000){
                        $full_file_name = "profile". $id . "." . $file_actual_ext;
                        $file_direction = "../uploads/" . $full_file_name;
                        move_uploaded_file($file_tmp_name, $file_direction);
                        $sql = "UPDATE users SET profile_img_status = 1 WHERE id='$id';";
                        $stmt = mysqli_stmt_init($con);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
						$_SESSION['profile_img_status'] = 1;
                        header("Location: ../profile.php?status=image_successfully_uploaded");
                        exit();
                    } else {
                        header("Location: ../profile.php?error=too_large_file");
                        exit();
                    }
                } else {
                    header("Location: ../profile.php?error=uploading_error");
                    exit();
                }
            } else {
                header("Location: ../profile.php?error=invalid_file_fromat");
                exit();
            }
        }
