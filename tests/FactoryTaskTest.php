<?php

use \PHPUnit\Framework\TestCase;

require_once(__DIR__.'/../lib/FactoryTask.php');

class FactoryTaskTest extends TestCase
{
    public function testTextDocument()
    {
        $document = new TextDocument("textDocumentTest");
        $document->print();
        self::expectOutputString("TextDocument: textDocumentTest\n");
    }

    public function testPdfDocument()
    {
        $document = new PdfDocument();
        $document->setText("pdfDocumentTest");
        $document->print();
        self::expectOutputString("PdfDocument: pdfDocumentTest\n");
    }

    public function testTextDocumentFactory()
    {
        $documentFactory = new TextDocumentFactory();
        $documentFactory->createPrinter("textPrinterTest");
        self::expectOutputString("TextDocument: textPrinterTest\n");
    }

    public function testPdfDocumentFactory()
    {
        $documentFactory = new PdfDocumentFactory();
        $documentFactory->createPrinter("pdfPrinterTest");
        self::expectOutputString("PdfDocument: pdfPrinterTest\n");
    }

    public function testDocumentPrinter()
    {
        DocumentPrinter::print(DocumentPrinter::DOCUMENT_TYPE_PDF, "documentPrinterPdfTest");
        self::expectOutputString("PdfDocument: documentPrinterPdfTest\n");

        self::expectException("TypeError");
        DocumentPrinter::print("other type", "documentPrinterPdfTest");

        DocumentPrinter::print(DocumentPrinter::DOCUMENT_TYPE_TEXT, "documentPrinterTextTest");
        self::expectOutputString("TextDocument: documentPrinterTextTest\n");
    }
}
