<?php 



function delete_directory($dir)
{
if ($handle = opendir($dir))
{
$array = array();
 
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
 
            if(is_dir($dir.$file))
            {
                if(!@rmdir($dir.$file)) // Empty directory? Remove it
                {
                delete_directory($dir.$file.'/'); // Not empty? Delete the files inside it
                }
            }
            else
            {
               @unlink($dir.$file);
            }
        }
    }
    closedir($handle);
 
    @rmdir($dir);
}
 
}
 
?>
