<?php 
include "config.php";
?>
<!doctype html>
<html>
    <head>
        <title>Makitweb - How to Export MySQL Table data as CSV file in PHP</title>
        <link href="style.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            
            <form method='post' action='download.php'>
            <input type='submit' value='Export' name='Export'>
            <table border='1' style='border-collapse:collapse;'>
             <tr> 
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Original ID By</th>
                    <th>Age</th> 
                    <th>General Location</th> 
                    <th>Notes</th>
                    <th>DNA</th>
                    <th>Date Ectracted</th>
                    <th>Date Geonotypd</th>
                    <th>Date DNA Taken</th>
                    <th>Date Tagged</th>

                    <th>Image Type</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr> 
                
           
            <?php 
            $query = "SELECT * FROM tbl_dragons ORDER BY id asc";
            $result = mysqli_query($con,$query);
            $user_arr = array();
            while($row = mysqli_fetch_array($result)){
                $id = $row['id'];
                $name = $row['name'];
                $gender = $row['gender'];
                $original_id_by = $row['original_id_by'];
                $dna = $row['dna'];
                $notes = $row['notes'];
                $age = $row['age'];
                $general_location = $row['general_location'];
                $sub_location = $row['sub_location'];
                $date_extrated = $row['date_extrated'];
                $profile_id = $row['profile_id'];
                $pit_tag = $row['pit_tag'];
                $date_tagged = $row['date_tagged'];
                $date_dna_taken = $row['date_dna_taken'];
                $genotyped_sample_no = $row['genotyped_sample_no'];
                $created = $row['created'];
                $status = $row['status']
                $user_arr[] = array($id,$name,$gender,$original_id_by,$dna,$notes,$age,$general_location,$sub_location,$date_extrated,$profile_id,$pit_tag,$date_extrated,$date_dna_taken,$date_dna_taken,$genotyped_sample_no,$created,$status);
            ?>
               
            <?php
            }
            ?>
            </table>
           
            <?php 
            $serialize_user_arr= serialize($user_arr);
            ?>
            <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
            </form>
        </div>
    </body>
</html>

