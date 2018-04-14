<?php
class elgamal{
 
	public static $p,$g,$x,$y,$k;
	/*
	$p : Bilangan prima Acak (Public)
	$g : Bilangan acak  ( g < p)  (Public)
	$x : Bilangan acak  (x < p)(Privat)
	$y : y = gx mod p(public)
	*/
	public function __construct($p,$g,$x,$y,$k){
	 
	$this->p = $p;$this->g = $g;
	$this->x = $x;$this->y = $y;
	$this->k = $k;
	 
	}
	 
	public function _key($batas){
	 
	$this->p = $this->_p($batas);
	$this->g = $this->_g();
	$this->x = $this->_x();
	$this->y = $this->_y();
	$this->k = $this->_k();
	 
	}
	 
	//Membangkitkan Bilangan p (Privat and Public Key)
	private function _p($batas){
	 
		$tmpP = rand($batas,$batas*10);
		$cek = '0';
		for ($i=2;$i<$tmpP;$i++){
		 
			if (($tmpP % $i) == 0){
			 
				$cek = '1';
				break;
			 
			}
			 
		}
		if ($cek == '0'){
		 
			return $tmpP;
		 
		}
		else{
		  
			return $this->_p($batas); 
		 
		}
	 
	}
	 
	//Membangkitkan Bilangan g (Public key)
	private function _g(){
	 
		return rand(1, $this->p - 1);
	 
	}
	 
	//membangkitkan bilangan x (Privat Key)
	private function _x(){
	 
		return rand(1, $this->p - 2);
	 
	}
	 
	//membangkitkan bilangan y (Public Key)
	private function _y(){
	 
		return  $this->_rekursifMod($this->g,$this->x,$this->p);
	}
	 

	 
	//Membangkitkan Bilangan K
	private function _k(){
	 
		return rand(1,$this->p - 2);
	 
	}
	 
	//Pencarian Modulus
	public function _rekursifMod($basis,$pangkat,$mod){
	 
		if ($pangkat <= 2)
			return ((pow($basis,$pangkat)) % $mod);
		else{
		 
			$s = $pangkat % 2;
			if ($s == 0){
				 
				$b = $pangkat / 2;
				$b1 = $b; $b2 = $b;
			 
			}
			else{
				 
				$b = floor($pangkat/2);
				$b1 = $b; $b2 = $b + 1;
			 
			}

			return ((($this->_rekursifMod($basis,$b1,$mod)) * ($this->_rekursifMod($basis,$b2,$mod))) % $mod);
		 
		}
	 
	}
	 


  //Enkripsi Plaintext
  public function _enkripsi($plainText){
   	set_time_limit(3000);
    $ascii = $this->_toAscii($plainText);
    $ascii = explode(" ", $ascii);
    $chipperText = [];
    for ($i=0;$i<(count($ascii));$i++){
       
    		$k = $this->_k();

      		$a = $this->_rekursifMod($this->g,$k,$this->p);
			
			$b = ((($this->_rekursifMod($this->y,$k,$this->p))*($this->_rekursifMod((int)$ascii[$i], 1, $this->p))) % $this->p);
      		
      		// $a = bcmod(bcpow($this->g, $k), $this->p);
      		// $b = bcmod(bcmul(bcpow($this->y, $k), (int)$ascii[$i]), $this->p); 

			$chp = $a.".".$b;
			array_push($chipperText, $chp);
     
    }
    $chipperText = implode(" ", $chipperText);
    return $chipperText;
   
  }


  //Dekripsi Chippertext
  public function _dekripsi($chipperText, $p, $k){
   	set_time_limit(300);
    $t = explode(" ",$chipperText);
    $ascii = [];
    for ($i=0;$i<(count($t));$i++){
      	
      	$pasanganChipher = explode(".", $t[$i]); 
        $pkt = $p - 1 - $k;
        $a = $this->_rekursifMod($pasanganChipher[0],$pkt,$p);
        $b = (($pasanganChipher[1]*$a) % $p);
        
        array_push($ascii, $b);
    }

    $ascii = implode(" ", $ascii);

    return $this->_toText($ascii);
   
  }


  //Ubah Text ke Ascii
  public function _toAscii($text){
   
    $ascii = [];
    for ($i=0;$i<(strlen($text));$i++){
     
      $char = substr($text,$i,1);
      $a = ord($char);
      array_push($ascii, $a);
     
    }

    $ascii = implode(" ", $ascii);

    return $ascii;
   
  }

	 
  //Ubah Ascii ke Text
  public function _toText($ascii){
    
    $ascii = explode(" ", $ascii);
    $text = "";
    for ($i=0; $i < count($ascii); $i++) { 
      $text .= chr($ascii[$i]);
    }

    return $text;
   
  }
	 
}
?>