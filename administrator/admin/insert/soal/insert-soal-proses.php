<?php include"../../connection/database.php";?>

<?php
    if(isset($_POST["simpan"])){
        // //AUTONUMBER START
        // $query = $con->query("select MAX(RIGHT(id_soal,4)) as max_id from soal ORDER BY id_soal");
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
        $id_soal        = $_POST["id_soal"];
        $isi_soal       = addslashes($_POST["isi_soal"]);
        $isi_soal2      = htmlentities($isi_soal);
        $isi_soal3      = htmlspecialchars($isi_soal2);
        //$id_soal = $_POST["id_soal"];
        $bbt_nilai  = $_POST["bbt_nilai"];

         try{
                $sql = "INSERT INTO soal VALUES (:id_soal,:isi_soal,:bbt_nilai)";
                $stmt = $con->prepare($sql);                                  
                $stmt->bindParam(':id_soal', $id_soal, PDO::PARAM_STR);
                //$stmt->bindParam(':id_soal', $id_soal, PDO::PARAM_STR);
                $stmt->bindParam(':isi_soal', $isi_soal3, PDO::PARAM_STR);
                $stmt->bindParam(':bbt_nilai', $bbt_nilai, PDO::PARAM_STR);        
                //$stmt->bindParam(':noClnMhs', $noClnMhs, PDO::PARAM_STR);   
                $stmt->execute();
                if($stmt){
                    header('Location:../../soal.php?msg=success');
                }
                else{
                    header('Location:../../soal.php?msg=failed');
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