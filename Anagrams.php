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
        #trim words
        for($x = 0; $x < count($this->words); $x++) {
            $this->words[$x] = trim($this->words[$x]);
            
        }
        #Ausgabe aller Anagrame
        $x=1;
        foreach ($this->words as $word) {
            $anagrams = $this->getAnagrams($word);
            if(count($anagrams) > 0){
                echo $x++ . '. Anagrams of: ' . $word . "\n" . implode(', ', $anagrams) . "\n\n";
            }
        }
	}
	
	public function getWords(){
		return $this->words;
	}
	
	public function getAnagram($startWord){
		foreach($this->words as $word){
			if($this->compareWords($startWord, $word) === true){
				return $word;
			}
		}
		return false;
	}
	
	public function getAnagrams($startWord){
        $anagrams = array();
		foreach($this->words as $word){
			if($this->compareWords($startWord, $word) === true){
				$anagrams[] = $word;
			}
		}
		return $anagrams;
	}
	
	public function sortWord($word) {
        $wordArray = preg_split('/\B/', $word);
        sort($wordArray);
        $word = implode($wordArray);
        return $word;
	}
	
	public function compareWords($word1, $word2){
		#nur wenn gleich lang kann es ein Anagram sein
		if(strlen($word1) == strlen($word2) && $word1 != $word2){
			#in Array schreiben
			$sortedWord1 = $this->sortWord($word1);
			$sortedWord2 = $this->sortWord($word2);
			
			if($sortedWord1 == $sortedWord2) {
				return true;
			}
		}
		return false;
		
	}
}

?>
