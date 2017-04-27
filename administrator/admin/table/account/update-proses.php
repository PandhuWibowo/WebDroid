<?php include"../../connection/database.php";?>

<?php
    if(isset($_POST["update"])){
        $noClnMhs = $_POST["noClnMhs"];
        $password = $_POST["password"];
        $jurusan = $_POST["jurusan"];

         try{
                $sql = "UPDATE cln_mhs SET jurusan=:jurusan WHERE noClnMhs=:noClnMhs";
                $stmt = $con->prepare($sql);                                  
                $stmt->bindParam(':jurusan', $jurusan, PDO::PARAM_STR);        
                $stmt->bindParam(':noClnMhs', $noClnMhs, PDO::PARAM_STR);   
                $stmt->execute();
                if($stmt){
                    echo "berhasil";
                    header('Location:../../account.php?msg=success');
                }
                else{
                    echo "tidak berhasil";
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