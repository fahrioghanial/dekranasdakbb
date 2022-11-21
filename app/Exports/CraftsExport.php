<?php

namespace App\Exports;

use App\Models\Craft;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CraftsExport implements FromCollection, WithMapping, WithHeadings
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return Craft::all();
  }

  public function headings(): array
  {
    return [
      'Id',
      "Judul",
      "Foto Kerajinan",
      "Deskripsi",
      "Pembuat/Perajin",
      "Harga",
      "Kategori",
      "Pengunjung",
      'Tanggal Ditambahkan',
    ];
  }

  public function map($craft): array
  {
    return [
      $craft->id,
      $craft->title,
      $craft->image,
      $craft->description,
      $craft->craftsman->name,
      $craft->price,
      $craft->category->name,
      $craft->views,
      $craft->created_at->format("d-m-Y"),
    ];
  }
}
