<?php

class complex {

	public function add($farray) {

		$cx2 = array_pop($farray); 
		$cx1 = (count($farray) > 1) ? $this->add($farray) : $farray[0];
		foreach($cx1 as $key => $value) {
			 $cx1[$key] += $cx2[$key];
		}

		return $cx1;
	}

	public function subtract($farray) {

		$cx2 = array_pop($farray); 
		$cx1 = (count($farray) > 1) ? $this->subtract($farray) : $farray[0];
		foreach($cx1 as $key => $value) {
			 $cx1[$key] -= $cx2[$key];
		}

		return $cx1;
	}

	public function multiply($farray) {

		$cx2 = array_pop($farray); 
		$cx1 = (count($farray) > 1) ? $this->multiply($farray) : $farray[0];
		
		$a = $cx1['a'] * $cx2['a'] - $cx1['b'] * $cx2['b'];
		$b = $cx1['a'] * $cx2['b'] + $cx1['b'] * $cx2['a'];

		$cx1['a'] = $a;
		$cx1['b'] = $b;

		return $cx1;
	}

	public function divide($farray) {

		$cx2 = array_pop($farray); 
		$cx1 = (count($farray) > 1) ? $this->divide($farray) : $farray[0];

		$a = ($cx1['a'] * $cx2['a'] + $cx1['b'] * $cx2['b']) / (pow($cx2['a'], 2) + pow($cx2['b'], 2));
		$b = ($cx2['a'] * $cx1['b'] - $cx1['a'] * $cx2['b']) / (pow($cx2['a'], 2) + pow($cx2['b'], 2));

		$cx1['a'] = $a;
		$cx1['b'] = $b;

		return $cx1;
	}

}

?>
