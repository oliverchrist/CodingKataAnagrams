<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Anagrams
 *
 * @author christ
 */
class Anagrams {
	private $words;

	public function __construct($filepath) {
		$this->words = file($filepath);
	}
	
	public function getWords(){
		return $this->words;
	}
	
	public function getAnagram($startWord){
		foreach($this->words as $word){
			echo $startWord . ', ' . $word . ', ' . $this->compareWords($startWord, $word);
			if($this->compareWords($startWord, $word)){
				return $word;
			}
		}
		return false;
	}
	
	public function compareWords($word1, $word2){
		$word1Arr = array();
		$word2Arr = array();
		#nur wenn gleich lang kann es ein Anagram sein
		if(strlen($word1) == strlen($word2)){
			#in Array schreiben
			for($x = 0; $x < strlen($word1); $x++){
				$word1Arr[] .= substr($word1, $x, 1);
				$word2Arr[] .= substr($word2, $x, 1);
			}
			sort($word1Arr);
			sort($word2Arr);
			for($x = 0; $x < count($word1Arr); $x++){
				if($word1Arr[$x] != $word2Arr[$x]){
					return false;
				}
			}
			return true;
		}
		return false;
		
	}
}

?>
