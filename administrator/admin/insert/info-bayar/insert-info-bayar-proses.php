<?php include"../../connection/database.php";?>

<?php
    if(isset($_POST["simpan"])){
        $id_informasi   = $_POST['id_informasi'];
        $id_tes         = $_POST["id_tes"];
        $id_diskon      = $_POST["id_diskon"];
        $jml_bayar      = $_POST["jml_bayar"];

         try{
                $sql = "INSERT INTO informasi_bayar VALUES (:id_informasi,:id_tes,:id_diskon,:jml_bayar)";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':id_informasi', $id_informasi, PDO::PARAM_STR);                                  
                $stmt->bindParam(':id_tes', $id_tes, PDO::PARAM_STR);
                $stmt->bindParam(':id_diskon', $id_diskon, PDO::PARAM_STR);        
                $stmt->bindParam(':jml_bayar', $jml_bayar, PDO::PARAM_STR);   
                $stmt->execute();
                if($stmt){
                    header('Location:../../info-bayar.php?msg=success');
                }
                else{
                    header('Location:../../info-bayar.php?msg=failed');
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