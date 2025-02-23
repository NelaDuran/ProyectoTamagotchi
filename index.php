<?php
class Mascota {

    protected $nombre;
    protected $energia;
    protected $hambre;
    protected $sueño;

    public function __construct($nombre, $energia, $hambre, $sueño) {
        $this->nombre = $nombre;
        $this->energia = $energia;
        $this->hambre = $hambre;
        $this->sueño = $sueño;
    }

    public function setEnergia($energia){
        $this->energia = $energia;
    }

    public function setHambre($hambre){
        $this->hambre = $hambre;
    }

    public function setSueño($sueño){
        $this->sueño = $sueño;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getEnergia(){
        return $this->energia;
    }

    public function getHambre(){
        return $this->hambre;
    }

    public function getSueño(){
        return $this->sueño;
    }
}

const JUGAR = 10;
const DORMIR = 10;
const LEER = 10;
const COMER = 10;

echo "Ingresar el nombre: \n";
$nombre = fgets(STDIN);
$mascota = new Mascota(trim($nombre), 100, 0, 0);
$salir = false;

do {
    echo "Seleccione la opcion \n";

    $menu = "1 - jugar \n";
    $menu .= "2 - leer \n";
    $menu .= "3 - comer \n";
    $menu .= "4 - dormir \n";
    $menu .= "5 - estado de la mascota \n";
    $menu .= "0 - salir \n";

    echo $menu;

    $opcionMenu = fgets(STDIN);

    if ($mascota->getEnergia() == 0) {
        echo "---------------------------------------\n";
        echo $mascota->getNombre() . " se acaba de morir\n";
        echo "---------------------------------------\n";
        $salir = true;
    }

    if($mascota->getSueño() == 100){
        echo "---------------------------------------\n";
        echo $mascota->getNombre() . " se acaba de morir\n";
        echo "---------------------------------------\n";
        $salir = true;
    }

    if($mascota->getHambre() == 100){
        echo "---------------------------------------\n";
        echo $mascota->getNombre() . " se acaba de morir\n";
        echo "---------------------------------------\n";
        $salir = true;
    }

    if($mascota->getHambre() == 70){
        echo "---------------------------------------\n";
        echo $mascota->getNombre()." tiene mucha hambre! \n";
        echo "---------------------------------------\n";
    }
    if($mascota->getSueño() == 70){
        echo "---------------------------------------\n";
        echo $mascota->getNombre()." tiene mucho Sueño! \n";
        echo "---------------------------------------\n";
    }
    if(!$salir){
        if($opcionMenu >= 0 && $opcionMenu <= 5){
            switch ($opcionMenu) {
                case 0:
                    echo "---------------------------------------\n";
                    $salir = true;
                    echo "Acabas de salir del juego\n";
                    echo "---------------------------------------\n";
                    break;
                case 1:
                    echo "---------------------------------------\n";
                    if ($mascota->getEnergia() > 10) {
                        jugar($mascota);
                    } else {
                        echo $mascota->getNombre() . " no tiene energia suficiente!\n";
                    }
                    echo "---------------------------------------\n";
                    break;
                case 2:
                    echo "---------------------------------------\n";
                    if ($mascota->getEnergia() > 10) {
                        leer($mascota);
                    } else {
                        echo $mascota->getNombre() . " no tiene energia suficiente!\n";
                    }
                    echo "---------------------------------------\n";
                    break;
                case 3:
                    echo "---------------------------------------\n";
                    if ($mascota->getHambre() > 0) {
                        comer($mascota);
                    } else {
                        echo $mascota->getNombre() . " no tiene hambre!\n";
                    }
                    echo "---------------------------------------\n";
                    break;
                case 4:
                    echo "---------------------------------------\n";
                    if ($mascota->getSueño() > 0) {
                        dormir($mascota);
                    }
                    echo "---------------------------------------\n";
                    break;
                case 5:
                    echo "---------------------------------------\n";
                    echo "Estado de la mascota:\n";
                    $estado = "---------------------------------------\n";
                    $estado .= "nombre:" . trim($mascota->getNombre()) . "\n";
                    $estado .= "energia:" . $mascota->getEnergia() . "\n";
                    $estado .= "hambre:" . $mascota->getHambre() . "\n";
                    $estado .= "sueño:" . $mascota->getSueño() . "\n";
                    $estado .= "---------------------------------------\n";
                    echo $estado;
                    break;
            }
        }else{
            echo "Seleccione una opcion dada \n";
        }
    }
} while ($salir== false);

function jugar($mascota)
{
    $mascota->setEnergia($mascota->getEnergia() - JUGAR);
    $mascota->setSueño($mascota->getSueño() + JUGAR);
    $mascota->setHambre($mascota->getHambre() + JUGAR);
    echo $mascota->getNombre() . " acaba de jugar!\n";
}

function leer($mascota)
{
    $mascota->setEnergia($mascota->getEnergia() - LEER);
    $mascota->setSueño($mascota->getSueño() + LEER);
    $mascota->setHambre($mascota->getHambre() + LEER);
    echo $mascota->getNombre() . " acaba de leer!\n";
}

function comer($mascota)
{
    if ($mascota->getEnergia() < 100) {
        $mascota->setEnergia($mascota->getEnergia() + COMER);
    }
    $mascota->setSueño($mascota->getSueño() + COMER);
    $mascota->setHambre($mascota->getHambre() - COMER);
    echo $mascota->getNombre() . " acaba de comer!\n";
}

function dormir($mascota)
{
    if ($mascota->getEnergia() < 100) {
        $mascota->setEnergia($mascota->getEnergia() + DORMIR);
    }
    $mascota->setSueño(0);
    $mascota->setHambre($mascota->getHambre() + DORMIR);
    echo $mascota->getNombre() . " acaba de dormir!\n";
}
