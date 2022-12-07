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
      "Link Foto Profil",
      "Nama Lengkap",
      "Nama Usaha",
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
      'Terakhir Diubah Oleh',
    ];
  }

  public function map($user): array
  {
    $user_picture_link = asset('storage/' . $user->profile_picture);
    if (isset($user->updatedBy->name)) {
      $last_updated_by = $user->updatedBy->name . ", pada " . $user->updated_at->format('d-m-Y');
    } else $last_updated_by = "-";
    if ($user->is_admin) {
      $status_keanggotaan = "Administrator";
    } else {
      $user->status_keanggotaan ? $status_keanggotaan = "Diterima" : $status_keanggotaan = "Menunggu Persetujuan";
    }
    return [
      $user->id,
      $user_picture_link,
      $user->name,
      $user->business_name,
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
      $last_updated_by,
    ];
  }
}
