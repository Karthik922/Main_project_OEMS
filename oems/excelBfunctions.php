    <?php
	session_start();
include "database.php";

if(!isset($_SESSION["EXMNE_ID"]))
{
	header("location:flogin.php");
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
				  
				   $question=$getData[0];
				  // echo $question;
				   //$sqll="SELECT QUESTIONS FROM `partaquestions` WHERE QUESTIONS={$question}";
			       //$ress=$db->query($sqll);
				   //$ro=$ress->fetch_array();
				   //$org_quest=$ro["QUESTIONS"];
				   //echo $org_quest;
				   //if($org_quest!=$question)
				  // {
					   $sq="INSERT INTO `partbquestions` (`QIDB`, `CU_ID`, `EXTITLE_ID`, `QUESTIONS`, `OP1`, `OP2`, `OP3`, `OP4`, `OP5`, `CORRECT_ANSWER`,`QTYPE`) VALUES (NULL, '{$_POST["cla"]}', '{$_POST["etle"]}', '{$getData[0]}', '{$getData[1]}', '{$getData[2]}', '{$getData[3]}', '{$getData[4]}', '{$getData[5]}', '{$getData[6]}','{$getData[7]}')";
							
					//   $sql="INSERT INTO `student` (`ID`, `REGNO`, `NAME`, `DOB`, `EMAIL`, `CLG`, `DEP`) VALUES(NULL,'{$getData[0]}','{$getData[1]}','{$getData[2]}','{$getData[3]}','{$getData[4]}','{$getData[5]}')";
               //  $sql = "INSERT into employeeinfo (emp_id,firstname,lastname,email,reg_date) 
                      // values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
                       $result = mysqli_query($db, $sq);	
				   //}
				   
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File Or Duplicate Record Caannot Inserted.\");
                  window.location = \"fhome.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"fhome.php\"
              </script>";
            }
               }
			 

          
               fclose($file);  
         }

        }
        else
        {
			header("location:AddExcelA.php?mes=CSV File Only Allow Other File Not Allow");

        }		
         
      }   
     ?>