<?php include"../../connection/database.php";?>

<?php
    if(isset($_POST["simpan"])){
        // //AUTONUMBER START
        // $query = $con->query("select MAX(RIGHT(id_diskon,4)) as max_id from diskon ORDER BY id_diskon");
        // $query->execute();
        // $hasil = $query->fetchAll();
        // //$sql = mysql_query($query);
        // //$hasil = mysql_fetch_array($sql);
        // $maxid = 0;
        // $maxid = $hasil['max_id'];
        // $maxid++;
        // switch (strlen($maxid)) {
        //         case 1 :
        //                 $idfix = "000" . $maxid;
        //                 break;
        //         case 2 :
        //                 $idfix = "00" . $maxid;
        //                 break;
        //         case 3 :
        //                 $idfix = "0" . $maxid;
        //                 break;
        //         default :
        //                 $idfix = $maxid;
        //                 break;
        // };

	    //AUTONUMBER END
        $id_diskon = $_POST["id_diskon"];
        $jml_diskon = $_POST["jml_discount"];
        $nilai_ujian = $_POST["nilai_ujian"];

         try{
                $sql = "INSERT INTO diskon VALUES (:id_diskon,:jml_diskon,:nilai_ujian)";
                $stmt = $con->prepare($sql);                                  
                $stmt->bindParam(':jml_diskon', $jml_diskon, PDO::PARAM_STR);
                $stmt->bindParam(':nilai_ujian', $nilai_ujian, PDO::PARAM_STR);        
                $stmt->bindParam(':id_diskon', $id_diskon, PDO::PARAM_STR);   
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