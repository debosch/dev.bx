<?php

interface IPrinter
{
    public function print(): void;
}

class TextDocument implements IPrinter
{
    protected $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function print(): void
    {
        echo "TextDocument: {$this->text}\n";
    }
}

class PdfDocument implements IPrinter
{
    protected $text;

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function print(): void
    {
        echo "PdfDocument: {$this->text}\n";
    }
}

abstract class PrintFactory
{
    protected $text;

    abstract public function createPrinter(string $text): IPrinter;
}

class TextDocumentFactory extends PrintFactory
{
    public function createPrinter(string $text): IPrinter
    {
        $document = new TextDocument($text);
        $document->print();

        return $document;
    }
}

class PdfDocumentFactory extends PrintFactory
{
    public function createPrinter(string $text): IPrinter
    {
        $document = new PdfDocument();
        $document->setText($text);
        $document->print();

        return $document;
    }
}

class DocumentPrinter
{
    public const DOCUMENT_TYPE_TEXT = "text";
    public const DOCUMENT_TYPE_PDF = "pdf";

    private static function printDocumentByType(PrintFactory $documentType, string $text): void
    {
        $documentType->createPrinter($text);
    }

    public static function print(string $type, string $text)
    {
        if ($type === self::DOCUMENT_TYPE_TEXT)
        {
            $factory = new TextDocumentFactory();
        }
        else if ($type === self::DOCUMENT_TYPE_PDF)
        {
            $factory = new PdfDocumentFactory();
        }
        else
        {
            throw new TypeError("Wrong document type");
        }

        self::printDocumentByType($factory, $text);
    }
}

$documentText = 'here we go';

DocumentPrinter::print(DocumentPrinter::DOCUMENT_TYPE_TEXT, $documentText);
DocumentPrinter::print(DocumentPrinter::DOCUMENT_TYPE_PDF, $documentText);

/*
 	Воспользуйтесь шаблоном проектирования "Фабричный метод"

	$documentText = 'Document text here';

	DocumentPrinter::print('text', $documentText);
	//TextDocument

	DocumentPrinter::print('pdf', $documentText);
	//PdfDocument
 */
