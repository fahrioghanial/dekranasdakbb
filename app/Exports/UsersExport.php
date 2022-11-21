<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return User::withCount('crafts')->get();
  }

  public function headings(): array
  {
    return [
      'Id',
      "Nama Lengkap",
      "Nomor KTP",
      "Alamat",
      "RT",
      "RW",
      "Kecamatan",
      "Kelurahan/Desa",
      "Kode Pos",
      "Jumlah Produk",
      "Nomor HP",
      "Email",
      "Facebook",
      "Instagram",
      "Whatsapp",
      "Status Keanggotaan",
      'Tanggal Akun Dibuat',
    ];
  }

  public function map($user): array
  {
    if ($user->is_admin) {
      $status_keanggotaan = "Administrator";
    } else {
      $user->status_keanggotaan ? $status_keanggotaan = "Diterima" : $status_keanggotaan = "Menunggu Persetujuan";
    }
    return [
      $user->id,
      $user->name,
      $user->noktp,
      $user->address,
      $user->rt,
      $user->rw,
      $user->kecamatan,
      $user->kelurahan_desa,
      $user->kodepos,
      $user->crafts_count,
      $user->contact,
      $user->email,
      $user->facebook,
      $user->instagram,
      $user->whatsapp,
      $status_keanggotaan,
      $user->created_at->format("d-m-Y"),
    ];
  }
}
