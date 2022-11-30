<?php

    include('../includes/dbconnection.php');

    $fid = intval($_GET['fid']);//gradeId

        $queryss=mysqli_query($con,"select * from tbldepartment where facultyId=".$fid." ORDER BY departmentName ASC");                        
        $countt = mysqli_num_rows($queryss);

        $q=mysqli_query($con,"select * from tbladmin where adminTypeId=2");                        
        $cownt = mysqli_num_rows($q);

        if($countt > 0){                       
            echo '<label for="select" class=" form-control-label">Section</label>
            <select required name="departmentId" onchange="showLecturer(this.value)" class="custom-select form-control">';
            echo'<option value="">--Select Section--</option>';
                while ($row = mysqli_fetch_array($queryss)) {
                echo'<option value="'.$row['Id'].'" >'.$row['departmentName'].'</option>';
                }
                echo '</select>';

            echo '<br><br><label for="select" class=" form-control-label">Teacher</label>
            <select required name="teacher" onchange="showLecturer(this.value)" class="custom-select form-control">';
            echo'<option value="">--Select Teacher--</option>';
                while ($rowT = mysqli_fetch_array($q)) {
                echo'<option value="'.$rowT['firstName'].'" >'.$rowT['firstName'].'</option>';
                }
                echo '</select>';
        }

?>

