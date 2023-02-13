<?php

namespace App\Helpers;

use PDF;

class PdfFacade
{
    private $view;
    private $data;
    private $directoryPath;
    private $fileName;
    private $destinationOption;
    private $orientation;

    public function __construct(string $view, array $data, string $fileName, string $directoryPath = null, string $destinationOption = 'D', $orientation = 'P')
    {
        $this->view = $view;
        $this->data = $data;
        $this->directoryPath = public_path('/public/uploads') . $directoryPath;
        $this->fileName = $fileName;
        $this->destinationOption = $destinationOption;
        $this->orientation = $orientation;
    }


    public function generatePdf()
    {
        if (!is_dir($this->directoryPath)) {
            mkdir($this->directoryPath, 0775, true);
        }
        $directoryFullPath = $this->directoryPath .$this->fileName;
        $pdf = PDF::loadView($this->view, $this->data);
        $pdf->save($directoryFullPath, $this->destinationOption);
        if (!is_dir($directoryFullPath))
            return true;
        else
            return false;

    }

    public function printPdf()
    {
        $pdf = PDF::loadView($this->view, $this->data, [], ['orientation' => $this->orientation]);
        return $pdf->stream($this->fileName);
    }
}
