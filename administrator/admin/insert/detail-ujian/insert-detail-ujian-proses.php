<?php include"../../connection/database.php";?>

<?php
    if(isset($_POST["simpan"])){
        
        $id_tes = $_POST["id_tes"];
        $jwbn_soal = $_POST["jwbn_soal"];
        $id_soal = $_POST["id_soal"];
        $nilai_ujian = $_POST["nilai_ujian"];

         try{
                $sql = "INSERT INTO detail_ujian VALUES (:id_tes,:id_soal,:jwbn_soal,:nilai_ujian)";
                $stmt = $con->prepare($sql);                                  
                $stmt->bindParam(':id_tes', $id_tes, PDO::PARAM_STR);
                $stmt->bindParam(':id_soal', $id_soal, PDO::PARAM_STR);
                $stmt->bindParam(':jwbn_soal', $jwbn_soal, PDO::PARAM_STR);
                $stmt->bindParam(':nilai_ujian', $nilai_ujian, PDO::PARAM_STR);        
                //$stmt->bindParam(':noClnMhs', $noClnMhs, PDO::PARAM_STR);   
                $stmt->execute();
                if($stmt){
                    header('Location:../../detail_ujian.php?msg=success');
                }
                else{
                    header('Location:../../detail_ujian?msg=failed');
                }
                // $query = "UPDATE cln_mhs SET password = '$password', jurusan = '$jurusan' WHERE noClnMhs = '$noClnMhs'";
                // $stmt = $con->prepare($query);
                // $stmt->execute();
                // if($stmt){
                //     header('Location:../../account.php?msg=success');
                // }
                // else{
                //     echo "Belum diupdate";
                // }
                // $stmt = $con->query("UPDATE cln_mhs SET password = '$password', jurusan = '$jurusan' WHERE noClnMhs = '$noClnMhs'");
                
                // $stmt->execute();
                // if($stmt){
                //     header('Location:../../account.php?msg=success');
                // }
                // else{
                //     echo "Belum diupdate";
                // }
            }catch(PDOException $ex){
                echo $ex->getMessage();
            }
        // if(!empty($jurusan)){
        //     try{
        //         $query = "UPDATE cln_mhs SET password = '$password', jurusan = '$jurusan' WHERE noClnMhs = '$noClnMhs'";
        //         $stmt = $con->prepare($query);
        //         $stmt->execute();
        //         if($stmt){
        //             header('Location:../../account.php?msg=success');
        //         }
        //         else{
        //             echo "Belum diupdate";
        //         }
        //         // $stmt = $con->query("UPDATE cln_mhs SET password = '$password', jurusan = '$jurusan' WHERE noClnMhs = '$noClnMhs'");
                
        //         // $stmt->execute();
        //         // if($stmt){
        //         //     header('Location:../../account.php?msg=success');
        //         // }
        //         // else{
        //         //     echo "Belum diupdate";
        //         // }
        //     }catch(PDOException $ex){
        //         echo $ex->getMessage();
        //     }
        // }else{
        //     echo "Enter your program study";
        // }
    }
?>