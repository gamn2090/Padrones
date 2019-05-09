<?php

namespace App\Imports;

use App\Padron;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;

class PadronsImport implements ToModel, WithChunkReading, WithBatchInserts, ShouldQueue, WithEvents
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Padron([
            'ruc'     => $row[0],
            'razon_social'     => $row[1],
            'estado_contribuyente'     => $row[2],
            'condicion_domicilio'     => $row[3],
            'ubigeo'     => $row[4],
            'tipo_via'     => $row[5],
            'nombre_via'     => $row[6],
            'codigo_zona'     => $row[7],
            'tipo_zona'     => $row[8],
            'numero'     => $row[9],
            'interior'     => $row[10],
            'lote'     => $row[11],
            'departamento'     => $row[12],
            'manzana'     => $row[13],
            'kilometro'     => $row[14],
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }
    public function batchSize(): int
    {
        return 10000;
    }
    public function registerEvents(): array
    {
        return [
            ImportFailed::class => function(ImportFailed $event) {
                $this->importedBy->notifiy(new ImportHasFailedNotification);
            },
        ];
    }

   
}
