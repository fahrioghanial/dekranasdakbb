<?php

namespace App\Exports;

use App\Models\UpdateHistory;
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
    $update_histories = UpdateHistory::latest()->get();

    $user_picture_link = asset('storage/' . $user->identity->profile_picture);
    if (null !== $update_histories->where('user_id', $user->id)) {
      $last_updated_by = $update_histories->where('user_id', $user->id)->first()->admin->name . ", pada " . $update_histories->where('user_id', $user->id)->first()->created_at->format('d-m-Y');
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
      $user->identity->noktp,
      $user->identity->address,
      $user->identity->rt,
      $user->identity->rw,
      $user->territory->kecamatan,
      $user->territory->kelurahan_desa,
      $user->territory->kodepos,
      $user->crafts_count,
      $user->identity->phone,
      $user->email,
      $user->identity->facebook,
      $user->identity->instagram,
      $user->identity->whatsapp,
      $status_keanggotaan,
      $user->created_at->format("d-m-Y"),
      $last_updated_by,
    ];
  }
}
