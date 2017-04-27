<?php include"../../connection/database.php";?>

<?php
    if(isset($_POST["update"])){
        $id_tes         = $_POST['id_tes'];
        $id_soal        = $_POST["id_soal"];
        $jwbn_soal      = $_POST["jwbn_soal"];
        $nilai_ujian    = $_POST["nilai_ujian"];

         try{
                $sql = "UPDATE detail_ujian SET jwbn_soal=:jwbn_soal, nilai_ujian=:nilai_ujian WHERE id_tes=:id_tes AND id_soal=:id_soal";
                $stmt = $con->prepare($sql);                                  
                $stmt->bindParam(':jwbn_soal', $jwbn_soal, PDO::PARAM_STR);
                $stmt->bindParam(':nilai_ujian', $nilai_ujian, PDO::PARAM_STR);        
                $stmt->bindParam(':id_tes', $id_tes, PDO::PARAM_STR);
                $stmt->bindParam(':id_soal',$id_soal, PDO::PARAM_STR);   
                $stmt->execute();
                if($stmt){
                    header('Location:../../detail_ujian.php?msg=success');
                }
                else{
                    header('Location:../../detail_ujian.php?msg=failed');
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