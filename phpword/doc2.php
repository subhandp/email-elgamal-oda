<?php
require_once 'vendor/autoload.php';


$phpWord = new \PhpOffice\PhpWord\PhpWord();

$objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');


$phpWord = $objReader->load("test.docx");

foreach($phpWord->getSections() as $section) {
            foreach($section->getElements() as $element) {
                if(method_exists($element,'getText')) {
                    echo($element->getText() . "<br>");
                }
            }
        }

// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// print_r($objWriter);
// $objWriter->save("new_test.docx");