@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('fail') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Profil Saya</h1>
</div>

<div class="col-lg-8 mb-5">
  <form method="post" action="/dashboard/user/{{ $user->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="profile_picture" class="form-label d-block">Foto Profil</label>
      <input type="hidden" name="oldImage" value="{{ $user->profile_picture }}">
      @if ($user->profile_picture)
      <img src="{{ asset('storage/'. $user->profile_picture) }}" class="img-preview img-fluid mb-3">
      @else
      <img class="img-preview img-fluid mb-3">
      @endif
      <input class="form-control @error('profile_picture') is-invalid @enderror" type="file" id="profile_picture"
        name="profile_picture" onchange="previewImage()">
      @error('profile_picture')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="name">Nama Lengkap</label>
      <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
        placeholder="Nama Lengkap" required value="{{ old('name', $user->name) }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="username">Username (Nama Pengguna)</label>
      <input type="text" name="username" class="form-control rounded-top @error('username') is-invalid @enderror"
        id="username" placeholder="Username (Nama Pengguna)" required value="{{ old('username', $user->username) }}">
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="contact">Nomor HP</label>
      <input type="text" name="contact" class="form-control rounded-top" id="contact" placeholder="Nomor Kontak"
        value="{{ old('contact', $user->contact) }}">
      @error('contact')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="noktp">Nomor KTP</label>
      <input type="text" name="noktp" class="form-control rounded-top" id="noktp" placeholder="Nomor KTP"
        value="{{ old('noktp', $user->noktp) }}">
      @error('noktp')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="address">Alamat</label>
      <input type="text" name="address" class="form-control rounded-top" id="address" placeholder="Alamat"
        value="{{ old('address', $user->address) }}">
      @error('address')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="rt">RT</label>
      <input type="text" name="rt" class="form-control rounded-top" id="rt" placeholder="RT"
        value="{{ old('rt', $user->rt) }}">
      @error('rt')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="rw">RW</label>
      <input type="text" name="rw" class="form-control rounded-top" id="rw" placeholder="RW"
        value="{{ old('rw', $user->rw) }}">
      @error('rw')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="kecamatan">Kecamatan</label>
      <input type="text" name="kecamatan" class="form-control rounded-top" id="kecamatan" placeholder="Kecamatan"
        value="{{ old('kecamatan', $user->kecamatan) }}">
      @error('kecamatan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="kelurahan_desa">Kelurahan/Desa</label>
      <input type="text" name="kelurahan_desa" class="form-control rounded-top" id="kelurahan_desa"
        placeholder="Kelurahan/Desa" value="{{ old('kelurahan_desa', $user->kelurahan_desa) }}">
      @error('kelurahan_desa')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="kodepos">Kode Pos</label>
      <input type="text" name="kodepos" class="form-control rounded-top" id="kodepos" placeholder="Kode Pos"
        value="{{ old('kodepos', $user->kodepos) }}">
      @error('kodepos')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="email">Alamat Email</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
        placeholder="nama@contoh.com" required value="{{ old('email', $user->email) }}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="instagram">Instagram</label>
      <input type="text" name="instagram" class="form-control rounded-top" id="instagram" placeholder="Instagram"
        value="{{ old('instagram', $user->instagram) }}">
    </div>
    <div class="mb-3">
      <label for="facebook">Facebook</label>
      <input type="text" name="facebook" class="form-control rounded-top" id="facebook" placeholder="Facebook"
        value="{{ old('facebook', $user->facebook) }}">
    </div>
    <div class="mb-3">
      <label for="twitter">Twitter</label>
      <input type="text" name="twitter" class="form-control rounded-top" id="twitter" placeholder="Twitter"
        value="{{ old('twitter', $user->twitter) }}">
    </div>
    <div class="mb-3">
      <label for="old-password">Kata Sandi Lama</label>
      <input type="password" name="old_password"
        class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
        placeholder="Kata Sandi">
    </div>
    <div class="mb-3">
      <label for="password">Kata Sandi Baru</label>
      <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
        id="password" placeholder="Kata Sandi">
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <a href="/dashboard/user" class="btn btn-success">Batal</a>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </form>
</div>
<script>
  function previewImage() {
    const image = document.querySelector('#profile_picture');
    const imgPreview = document.querySelector('.img-preview');
  
    imgPreview.style.display = 'block';
  
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
  
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection