<?php include"../../connection/database.php";?>

<?php
    if(isset($_POST["update"])){
        $id = $_POST["id_diskon"];
        $jml_diskon = $_POST["jml_diskon"];
        $nilai_ujian = $_POST["nilai_ujian"];

         try{
                $sql = "UPDATE diskon SET jml_diskon=:jml_diskon, nilai_ujian=:nilai_ujian WHERE id_diskon=:id_diskon";
                $stmt = $con->prepare($sql);                                  
                $stmt->bindParam(':jml_diskon', $jml_diskon, PDO::PARAM_STR);
                $stmt->bindParam(':nilai_ujian', $nilai_ujian, PDO::PARAM_STR);        
                $stmt->bindParam(':id_diskon', $id, PDO::PARAM_STR);   
                $stmt->execute();
                if($stmt){
                    header('Location:../../discount.php?msg=success');
                }
                else{
                    header('Location:../../discount.php?msg=failed');
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