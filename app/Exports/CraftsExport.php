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
      "Link Foto Kerajinan",
      "Deskripsi",
      "Pembuat/Perajin",
      "Nama Usaha",
      "Harga",
      "Kategori",
      "Pengunjung",
      'Tanggal Ditambahkan',
      'Terakhir Diubah Oleh',
    ];
  }

  public function map($craft): array
  {
    $craft_image_link = asset('storage/' . $craft->image);
    if (isset($craft->updatedBy->name)) {
      $last_updated_by = $craft->updatedBy->name . ", pada " . $craft->updated_at->format('d-m-Y');
    } else $last_updated_by = "-";
    return [
      $craft->id,
      $craft->title,
      $craft_image_link,
      $craft->description,
      $craft->craftsman->name,
      $craft->craftsman->business_name,
      $craft->price,
      $craft->category->name,
      $craft->views,
      $craft->created_at->format("d-m-Y"),
      $last_updated_by
    ];
  }
}
