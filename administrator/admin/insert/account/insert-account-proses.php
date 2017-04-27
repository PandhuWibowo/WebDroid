<?php include"../../connection/database.php";?>

<?php
    if(isset($_POST["simpan"])){
        //AUTONUMBER START
        $query = $con->query("select MAX(RIGHT(noClnMhs,4)) as max_id from cln_mhs ORDER BY noClnMhs");
        $query->execute();
        $hasil = $query->fetchAll();
        //$sql = mysql_query($query);
        //$hasil = mysql_fetch_array($sql);
        $maxid = 0;
        $maxid = $hasil['max_id'];
        $maxid++;
        switch (strlen($maxid)) {
                case 1 :
                        $idfix = "000" . $maxid;
                        break;
                case 2 :
                        $idfix = "00" . $maxid;
                        break;
                case 3 :
                        $idfix = "0" . $maxid;
                        break;
                default :
                        $idfix = $maxid;
                        break;
        };

	    //AUTONUMBER END
        //$noClnMhs = $_POST["noClnMhs"];
        $password = $_POST["password"];
        $jurusan = $_POST["jurusan"];

         try{
                $sql = "INSERT INTO cln_mhs VALUES ('CM$idfix',:jurusan,:password)";
                $stmt = $con->prepare($sql);                                  
                $stmt->bindParam(':jurusan', $jurusan, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);        
                //$stmt->bindParam(':noClnMhs', $noClnMhs, PDO::PARAM_STR);   
                $stmt->execute();
                if($stmt){
                    header('Location:../../account.php?msg=success');
                }
                else{
                    header('Location:../../account.php?msg=failed');
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