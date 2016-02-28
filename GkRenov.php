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
     
    private $pdo;
    public function __construct() {
        try {

            $this->pdo = new PDO('mysql:host=' . HOTE . ';dbname=' . NOMBASE, LOGIN, MDP);
        } catch (Exception $ex) {
            die('<br /> pb connexion serveur bd :' . $ex->getMessage());
        }
    }

    private function recupImg ($dir){
        $tab = scandir($dir);
        $tabImg=array();
        foreach ($tab as &$fileName)
        {
            $ext = substr($fileName, strrpos($fileName, '.') + 1);
            if(in_array($ext, array("jpg","jpeg","png","gif")))
            {
                $tabImg[] = $fileName;
            }
        }       
        return $tabImg;
    }
    public function photoCarInBdd(){
        $dir = dirname(__FILE__).'/image/img1';
        $dir2 = dirname(__FILE__).'/image/img2';
        $tabCar1 = $this->recupImg($dir);
        $tabCar2 = $this->recupImg($dir2);
        
        $reponse = $this->pdo->query("select * from photocar1");
        $tabRep = $reponse->fetchAll();
        switch ($reponse->rowCount())
        {
            case 0: foreach($tabCar1 as $tab)
                    {
                        $this->pdo->query("insert into photocar1(nom)value("."'".$tab."'".");");
                    }
                    break;
            case 1: $n=0;
                    foreach($tabCar1 as $tab)
                    {
                        if($n<1)
                        {
                            $this->pdo->query("update photocar1 set nom="."'".$tab."'"."where id =".$tabRep[$n]['id'].";");
                        }
                        else {
                             $this->pdo->query("insert into photocar1(nom)value("."'".$tab."'".");");
                         }
                        $n++;
                    }
                    break;
            case 2: $n=0;
                    foreach($tabCar1 as $tab)
                    {
                        if($n<2)
                        {
                            $this->pdo->query("update photocar1 set nom="."'".$tab."'"."where id =".$tabRep[$n]['id'].";");
                        }
                         else {
                             $this->pdo->query("insert into photocar1(nom)value("."'".$tab."'".");");
                         }
                        $n++;
                    }
                    break;
            case 3: $n=0;
                    foreach($tabCar1 as $tab)
                    {
                    $this->pdo->query("update photocar1 set nom="."'".$tab."'"."where id =".$tabRep[$n]['id'].";");
                        $n++;
                    }
                    break;
        }
        $reponse2 = $this->pdo->query("select * from photocar2");
        $tabRep2 = $reponse2->fetchAll();
        switch ($reponse2->rowCount())
        {
            case 0: foreach($tabCar2 as $tab2)
                    {
                        $this->pdo->query("insert into photocar2(nom)value("."'".$tab2."'".");");
                    }
                    break;
            case 1: $n=0;
                    foreach($tabCar2 as $tab2)
                    {
                        if($n<1)
                        {
                            $this->pdo->query("update photocar2 set nom="."'".$tab2."'"."where id =".$tabRep2[$n]['id'].";");
                        }
                        else {
                             $this->pdo->query("insert into photocar2(nom)value("."'".$tab2."'".");");
                         }
                        $n++;
                    }
                    break;
            case 2: $n=0;
                    foreach($tabCar2 as $tab2)
                    {
                        if($n<2)
                        {
                            $this->pdo->query("update photocar2 set nom="."'".$tab2."'"."where id =".$tabRep2[$n]['id'].";");
                        }
                         else {
                             $this->pdo->query("insert into photocar2(nom)value("."'".$tab2."'".");");
                         }
                        $n++;
                    }
                    break;
            case 3: $n=0;
                    foreach($tabCar2 as $tab2)
                    {
                        $this->pdo->query("update photocar2 set nom="."'".$tab2."'"."where id =".$tabRep2[$n]['id'].";");
                        $n++;
                    }
                    break;
        }
    }
    /*private function getPhotoInBdd{
        $tabS =array();
        $reponse = $this->pdo->query("select * from photocar1");
        while($data = $reponse->fetch())
        {
            $tab = array();
            $
        }
        $reponse = $this->pdo->query("select * from photocar1");
        $tabRep = $reponse->fetchAll();
    }*/

    public function creatCar(){
        $reponse = $this->pdo->query("select nom from photocar1");
        $tabRep = $reponse->fetchAll();
        $reponse2 = $this->pdo->query("select nom from photocar2");
        $tabRep2 = $reponse2->fetchAll();
        echo'  <div class="item active">
                    <img src="image/img1/'.$tabRep[0]['nom'].'" alt="...">
                    <img src="image/img2/'.$tabRep2[0]['nom'].'" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item ">
                  <img src="image/img1/'.$tabRep[1]['nom'].'" alt="...">
                  <img src="image/img2/'.$tabRep2[1]['nom'].'" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                <div class="item ">
                    <img src="image/img1/'.$tabRep[2]['nom'].'" alt="...">
                    <img src="image/img2/'.$tabRep2[2]['nom'].'" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>';
        
        }
}
