<?php
$err = '';
$success = false;
function button($text)
{
    $text = $text;
    include_once ('frontend/components/subcomponents/button.php');
}

function isValidFileType()
{
    //set allowed file types here
    $allowed = array(
        'csv'
    );
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed))
    {
        $err = 'You must upload a csv file!';
        return false;
    }
    return true;
}

function csvToJson($fname) {
    // open csv file
    if (!($fp = fopen($fname, 'r', 'utf-8-sig'))) {
        die("Can't open file...");
    }
    
    //read csv headers
    $key = fgetcsv($fp,"1024",",");

      $json = array();
      while ($row = fgetcsv($fp,"1024",",")) {
           $json[] = array_combine($key, $row);
  }

    echo "<br><hr>";

    // release file handle
    fclose($fp);

    // encode array to json
    return json_encode($json, JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT);
}


if (isset($_SERVER['REQUEST_METHOD']))
{
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if (isset($_POST['fileupload']))
        {
            if ($_FILES["file"]["error"] == 4)
            {
                $err = 'You must upload a file!';
            }
            else
            {
                //continue
                if (isValidFileType())
                {
                    $success = true;
                    $uploadOk = 1;
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    // Make sure that the file doesn't already exists
                    if (!file_exists($target_file))
                    {
                        // Check file size
                        if ($_FILES["file"]["size"] < 500000)
                        {
                            // Check if $uploadOk is set to 0 by an error
                            if ($uploadOk == 1)
                            {
                                // if everything is ok, try to upload file
                                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
                                {
                                    echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
                                    if(csvToJson($target_file)){
                                        echo csvToJson($target_file);
                                        //delete file
                                        unlink($target_file);

                                    }  else {
                                        $err = "File could not be converted";
                                    }
                                }
                                else
                                {
                                    $err = "Sorry, there was an error uploading your file.";
                                }
                            }
                            else
                            {
                                $err = "Sorry, your file was not uploaded.";
                            }
                        }
                        else
                        {
                            $err = "Sorry, your file is too large.";
                            $uploadOk = 0;
                        }
                    }
                    else
                    {
                        $err = "Sorry, file already exists.";
                        $uploadOk = 0;
                    }

                }
            }
        }
    }
}
?>
