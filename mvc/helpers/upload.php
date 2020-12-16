<?php 
class Upload {
    
    function uploadFile($target_dir, $file)
    {
        $nameFile = $file["name"];
        $target_file = $target_dir . basename($nameFile);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($file["size"] > 500000) {
            $message = "File quá lớn, vui lòng sử dụng file nhẹ hơn!";
            $uploadOk = false;
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $message = "File của bạn không phải file ảnh, vui lòng chọn file khác!";
            $uploadOk = false;
        }


        // Check if $uploadOk is set to 0 by an error
        if (!$uploadOk) {
            echo "<script type='text/javascript'>alert('$message');</script>";
            // if everything is ok, try to upload file
        } else move_uploaded_file($file["tmp_name"], $target_file);

        return (object) array('name' => $nameFile, 'status' => $uploadOk);
    }

    function uploadFileRandomName($target_dir, $file)
    {
        $nameFile = strtotime("now") . $file["name"];
        $target_file = $target_dir . basename($nameFile);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($file["size"] > 500000) {
            $message = "File quá lớn, vui lòng sử dụng file nhẹ hơn!";
            $uploadOk = false;
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $message = "File của bạn không phải file ảnh, vui lòng chọn file khác!";
            $uploadOk = false;
        }


        // Check if $uploadOk is set to 0 by an error
        if (!$uploadOk) {
            echo "<script type='text/javascript'>alert('$message');</script>";
            // if everything is ok, try to upload file
        } else move_uploaded_file($file["tmp_name"], $target_file);

        return (object) array('name' => $nameFile, 'status' => $uploadOk);
    }
}

?>