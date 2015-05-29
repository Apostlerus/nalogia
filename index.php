<?php

/**
 * function which find solution:)
 * 
 * @param string $a first string
 * @param string $b second string
 */
 function solution($a, $b) 
{
     if ($a === $b) {
         return 'РАВЕНСТВО'; 
     }
     $encoding = mb_detect_encoding($a);
     $aLen = mb_strlen($a,$encoding);
     $bLen = mb_strlen($b,$encoding);
     for($i = 0; $i<$aLen; $i++) {
         $aDel = mb_substr($a,0,$i, $encoding) . mb_substr($a, $i+1, $aLen, $encoding );
         if ($aDel === $b) {
             return 'УДАЛИТЬ ' . mb_substr($a, $i,1,$encoding);
         }
     }
     for($i = 0; $i<$bLen; $i++) {
         $bIns = mb_substr($b,0,$i, $encoding) . mb_substr($b, $i+1, $bLen, $encoding );
         if ($bIns === $a) {
             return 'ВСТАВИТЬ ' . mb_substr($b, $i, 1, $encoding);
         }
     }
     for($i=0; $i<$aLen; $i++) {
         $firstPart = mb_substr($a,0,$i, $encoding);
         $lastPart = mb_substr($a, $i+2, $aLen, $encoding );
         $firstLetter = mb_substr($a,$i,1, $encoding);
         $secondLetter = mb_substr($a,$i+1,1, $encoding);
         $aSwap = $firstPart . $secondLetter . $firstLetter . $lastPart;
         if ($aSwap === $b) {
             return 'ПОМЕНЯТЬ ' . $firstLetter . ' и ' . $secondLetter;
         }
     }
     return 'НЕВОЗМОЖНО';
 }
