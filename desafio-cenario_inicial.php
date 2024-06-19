<?php

class Report {
    public function generate(string $title, string $content, string $format) {
        if ($format === 'xml') {
            # gerar o documento em formato XML
        } else if ($format === 'pdf'){
            # gerar o documento em formato PDF
        }

        #outros formatos 
    }
}