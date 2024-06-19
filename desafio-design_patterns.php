<?php

/**
 * Enum que corresponde aos tipos de reports possíveis no sistema
 */
Enum ReportGeneratorType
{
    case XML;
    case PDF;
}

/**
 * Interface que padroniza o contrato de Report
 */
Interface ReportGenerator
{
    public function generate(string $title, string $content);
}

/**
 * Classes que implementam o domínio
 */
class XmlReportGenerator implements ReportGenerator {
    public function generate(string $title, string $content) 
    {
        echo "XML Report: $title / $content";
    }
}

class PdfReportGenerator implements ReportGenerator {
    public function generate(string $title, string $content) 
    {
        echo "PDF Report: $title / $content";
    }
}

/**
 * Classe que implementa o strategy pattern
 */
class ReportService
{
    private Report $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function generate(string $title, string $content) 
    {
        return $this->report->generate($title, $content);
    }
}

/**
 * Interface que representa o abstract factory pattern
 */
Interface ReportFactoryInterface
{
    public function createReportGenerator(ReportGeneratorType $reportGeneratorType): Report;
}

/**
 * Classe concreta que representa o abstract factory pattern
 */
class ReportFactory implements ReportFactoryInterface
{
    public function createReportGenerator(ReportGeneratorType $reportGeneratorType): Report
    {
        return match ($reportGeneratorType) {
            ReportType::XML => new XmlReport,
            ReportType::PDF => new PdfReport,
        };
    }
}

$report = new ReportService(
    (new ReportFactory())->createReportGenerator(ReportGeneratorType::XML)
);

$report->generate('XML Report Title', 'XML Report Content');