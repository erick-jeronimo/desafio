<?php

Interface Report {
    public function generate(string $title, string $content);
}

class XmlReportGenerator implements Report {
    public function generate(string $title, string $content) 
    {
        return 'xml/content';
    }
}

class PdfReportGenerator implements Report {
    public function generate(string $title, string $content) 
    {
        return 'pdf/content';
    }
}

class ReportService {
    private Report $xmlReport;
    private Report $pdfReport;

    public function __construct()
    {
        $this->xmlReport = new XmlReport();
        $this->pdfReport = new PdfReport();
    }

    public function generateXMLReport(string $title, string $content) 
    {
        return $this->xmlReport->generate(string $title, string $content);
    }

    public function generatePDFReport(string $title, string $content) 
    {
        return $this->pdfReport->generate(string $title, string $content);
    }
}

$reportService = new ReportService();

$reportService->generateXMLReport(new XmlReportGenerator('XML Report', 'XML Report Content'));
$reportService->generatePDFReport(new PdfReportGenerator('PDF Report', 'PDF Report Content'));