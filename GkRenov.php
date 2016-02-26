<?php
/**
 * Description of GkRenov
 *
 * @author Quentin
 */

    define(HOTE, "localhost");
    define(LOGIN, "root");
    define(MDP, "");
    define(NOMBASE, "gkrenov");
    
class GkRenov {
    

    function connexionBd(){
        try {

            $bdd = new PDO('mysql:host=' . HOTE . ';dbname=' . NOMBASE, LOGIN, MDP);
        } catch (Exception $ex) {
            die('<br /> pb connexion serveur bd :' . $ex->getMessage());
        }
        return $bdd;
    }

    private function recupImg ($dir){
        $tab = scandir($dir);
        $tabImg=array();
        foreach ($tab as &$fileName)
        {
            $ext = substr($fileName, strrpos($fileName, '.') + 1);
            if(in_array($ext, array("jpg","jpeg","png","gif")))
                $tabImg[] = $fileName;
        }       
        return $tabImg;
    }
    public function photoCarInBdd(){
        $dir = dirname(__FILE__).'/image/img1';
        $dir2 = dirname(__FILE__).'/image/img2';
        $tabCar1 = $this->recupImg($dir);
        $tabCar2 = $this->recupImg($dir2);
        
        var_dump($tabCar1);
        var_dump($tabCar2);
    }
}
