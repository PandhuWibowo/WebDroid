<?php include"../../connection/database.php";?>

<?php
    if(isset($_POST["simpan"])){
        $id_tes = $_POST["id_tes"];
        $noClnMhs = $_POST["noClnMhs"];
        //$nilai_ujian = $_POST["nilai_ujian"];

         try{
                $sql = "INSERT INTO ujian VALUES (:id_tes,:noClnMhs,NOW(),NOW())";
                $stmt = $con->prepare($sql);                                  
                $stmt->bindParam(':noClnMhs', $noClnMhs, PDO::PARAM_STR);
                //$stmt->bindParam(':nilai_ujian', $nilai_ujian, PDO::PARAM_STR);        
                $stmt->bindParam(':id_tes', $id_tes, PDO::PARAM_STR);   
                $stmt->execute();
                if($stmt){
                    header('Location:../../ujian.php?msg=success');
                }
                else{
                    header('Location:../../ujian.php?msg=failed');
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