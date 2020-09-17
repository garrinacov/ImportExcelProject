<?php
namespace App\Service;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;

class ExcelHandler
{
     public static function read ($file) {
          if (!$file instanceof File && !$file instanceof UploadedFile) {
              abort(500, "file must be instance of File or UploadedFile");
          }
          $reader = IOFactory::load($file);
          $worksheet = $reader->getActiveSheet();
          $rows = [];
          $headers = [];
          foreach ($worksheet->getRowIterator() AS $row) {
              $cellIterator = $row->getCellIterator();
              $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
              $cells = [];
              foreach ($cellIterator as $cell) {
                  $cells[] = $cell->getValue();
              }
              if (count($headers) == 0) {
                  $headers = array_map('strtolower', $cells);
              } else {
                  $rows[] = array_combine($headers, $cells);
              }
          }
          $rows = collect($rows);
          return $rows;
      }
}