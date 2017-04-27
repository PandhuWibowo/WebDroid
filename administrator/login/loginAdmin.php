<?php
include_once "../config.php";
session_start();

    class Administrator{
        private $db;
        
        public function __construct(){
            $this->db = new Connection();
            $this->db = $this->db->dbConnect();
        }

        public function Login($name, $pass){
            if(!empty($name) && !empty($pass)){
                $st = $this->db->prepare("SELECT * FROM administrator WHERE username=? and password=?");
                $st->bindParam(1, $name);
                $st->bindParam(2, $pass);
                $st->execute();

                if($st->rowCount()==1){
                    $_SESSION["username"] = $name;
                    header('Location: ../admin/');
                }else{?>
                    <script type="text/javascript">
                        alert ("Username atau Password tidak sesuai")
                        window.location.assign("../admin/");
                    </script><?php
                }
            }
            else{
                ?>
                    <script>
                        alert ("Silahkan lapor terhadap programmer jika tidak ada akun")
                        window.location.assign("../admin/");
                    </script><?php
                
            }
        }
    }
?>