<?php include"../../connection/database.php";?>

<?php
    if(isset($_POST["update"])){
        $id_tes               = $_POST['id_tes'];
        $noClnMhs             = $_POST["noClnMhs"];
        //$jml_bayar      = $_POST["jml_bayar"];
        //$id_tes         = $_POST["id_tes"];

         try{
                $sql = "UPDATE ujian SET noClnMhs=:noClnMhs, NOW(), NOW() WHERE id_tes=:id_tes";
                $stmt = $con->prepare($sql);                                  
                $stmt->bindParam(':noClnMhs', $noClnMhs, PDO::PARAM_STR);
                $stmt->bindParam(':id_tes', $id_tes, PDO::PARAM_STR);        
                //$stmt->bindParam(':id_diskon', $id, PDO::PARAM_STR);
                //$stmt->bindParam(':id_informasi',$id_informasi, PDO::PARAM_STR);   
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