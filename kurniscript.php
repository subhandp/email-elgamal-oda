<?php

/**
* 
*/
// class elgamal
// {
// 	public static $p,$g, $x, $y, $k;

// 	public function _construct ($p,$g, $x, $y, $k){

// 		$this->p = $p; $thi->g = $g;
// 		$this->x = $x; $this-> = $y;
// 		$this->k = $k;

// 	}

// 	public function _key($batas){
// 		$this->p = $this->_p ($batas);
// 		$this->g = $this->_g();
// 		$this->x = $this->_x();
// 		$this->y = $this->_y($batas);
// 		$this->k = $this->_k();

// 	}

// private function _p($batas){

// 	$tmpP = rand ($batas,$batas*10);
// 	$cek ='0';
// 	for ($i=2; $i<$tmpP; $i++){

// 		if (($tmpP % $i) == 0){
// 			$cek='1';
// 			break;
// 		}
// 	}
// 	if ($cek == '0'){

// 		return $tmpP;
// 	}
// 	else{

// 		return $this-> _p($batas);
// 	}
// }

// private function _g(){
// 	return rand(1,$this->p - 1);
// }

// private function _y($batas){
// 	return $this-> _
// }


public function _rekursifMod ($basis,$pangkat, $mod){
	
	if ($pangkat <=2)
		return((pow($basis,$pangkat)) % $mod);
	else{
		$s = $pangkat % 2;
		if ($s == 0){
			$b = $pangkat/2;
			$b1 = $b; $b2 =$b;

		}
		else{

			$b= floor($pangkat/2);
			$b1 = $b; $b2 = $b + 1;

		}
		return ((($this -> _rekursifMod($basis,$b1,$mod)) * (this-> _rekursifMod($basis,$b2,$mod))) % $mod);
	}
}