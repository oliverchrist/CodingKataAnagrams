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
    private $hashmap;

    public function __construct($filepath) {
        $this->words = file($filepath);
        $wordNumber  = count($this->words);
        #trim words
        for($x = 0; $x < $wordNumber; $x++) {
            $tempWord                                                = trim($this->words[$x]);
            $this->words[$x]                                         = $tempWord;
            $this->hashmap[$this->sortWord(strtolower($tempWord))][] = $tempWord;
        }
        #Ausgabe aller Anagrame
        $x = 1;
        foreach($this->hashmap as $hashArray){
            if(count($hashArray)>1){
                echo $x++ . '. Anagrams: ' . implode(', ', $hashArray) . "\n\n";
            }
        }
    }
    /*
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
    */
    public function sortWord($word) {
        $wordArray = preg_split('/\B/', $word);
        sort($wordArray);
        $word = implode($wordArray);
        return $word;
    }
    /*
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
    */
}

?>
