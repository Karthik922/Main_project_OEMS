    <?php
	session_start();
include "database.php";

if(!isset($_SESSION["AID"]))
{
	header("location:alogin.php");
}
     if(isset($_POST["Import"])){
		    
     
        $filename=$_FILES["file"]["tmp_name"]; 
        if (($_FILES["file"]["type"] == "text/csv"))
        {
			if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
              while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
               {
				   $regno=$getData[0];
				   $sqll="SELECT REGNO FROM `student` WHERE REGNO=$regno";
			       $ress=$db->query($sqll);
				   if($ress->num_rows>0==null)
				   {
					   $sql="INSERT INTO `student` (`ID`, `REGNO`, `NAME`, `DOB`, `EMAIL`, `CLG`, `DEP`) VALUES(NULL,'{$getData[0]}','{$getData[1]}','{$getData[2]}','{$getData[3]}','{$getData[4]}','{$getData[5]}')";
               //  $sql = "INSERT into employeeinfo (emp_id,firstname,lastname,email,reg_date) 
                      // values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
                       $result = mysqli_query($db, $sql);	
				   }
				   
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File Or Duplicate Record Caannot Inserted.\");
                  window.location = \"index.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"ahome.php\"
              </script>";
            }
               }
			 

          
               fclose($file);  
         }

        }
        else
        {
			header("location:excel.php?mes=CSV File Only Allow Other File Not Allow");

        }		
         
      }   
     ?>