<?php
function upload_photo($connection, $directory, $TAGinput_name, $column_name, $id_article){
    $target_file = $directory. basename($_FILES[$TAGinput_name]["name"]);
    $name_file = $_FILES[$TAGinput_name]["name"];
    $name_TMP = $_FILES[$TAGinput_name]["tmp_name"];

    $query = "UPDATE game_block_info
              SET $column_name = '$name_file'
              WHERE id = $id_article";

    if(mysqli_query($connection, $query) ){
        if(file_exists($target_file) )
            show_message_result("The file: $name_file is already uploaded!");
        elseif (move_uploaded_file($name_TMP, $target_file) )
            show_message_result('File: '.$name_file.' succesfull uploaded!');			   
        else
            show_message_result("Sorry, an error occurred while uploading the file!");
    }   
    else
        show_message_result("Error: ".mysqli_error($connection) );


}