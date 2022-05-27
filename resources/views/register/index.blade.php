@extends('layouts.main')

@section('body')

<section id="home" class="bg-[url('/img/bgaboutus.jpg')] bg-cover bg-no-repeat">
  <div class="container m-auto py-24 ">
    <div class="flex flex-col gap-10">
      <div class="w-full self-center">
        <img src={{ asset('img/LogoDekranasda.jpg')}} alt="logodekranasda" class="w-60 h-60 rounded-full m-auto" />
      </div>
      <div class="w-full self-center ">
        <h1 class="text-2xl font-bold text-center text-white">
          DEKRANASDA KABUPATEN BANDUNG BARAT
        </h1>
        <h1 class="text-2xl font-bold text-center text-white mt-4">
          DAFTAR
        </h1>
      </div>
      <div class="mx-auto md:w-1/3">
        <form action="/register" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-floating">
            <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
              id="name" placeholder="Nama Lengkap" required value="{{ old('name') }}">
            <label for="name">Nama Lengkap</label>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="username" class="form-control rounded-top @error('username') is-invalid @enderror"
              id="username" placeholder="Username (Nama Pengguna)" required value="{{ old('username') }}">
            <label for="username">Username (Nama Pengguna)</label>
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="contact" class="form-control rounded-top" id="contact" placeholder="Nomor HP"
              value="{{ old('contact') }}">
            <label for="contact">Nomor HP</label>
            @error('contact')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="noktp" class="form-control rounded-top" id="noktp" placeholder="Nomor KTP"
              value="{{ old('noktp') }}">
            <label for="noktp">Nomor KTP</label>
            @error('noktp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="address" class="form-control rounded-top" id="address" placeholder="Alamat"
              value="{{ old('address') }}">
            <label for="address">Alamat</label>
            @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
              placeholder="nama@contoh.com" required value="{{ old('email') }}">
            <label for="email">Email</label>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password"
              class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
              placeholder="Kata Sandi" required>
            <label for="password">Kata Sandi</label>
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="rt" class="form-control rounded-top" id="rt" placeholder="Media Sosial"
              value="{{ old('rt') }}">
            <label for="rt">RT</label>
            @error('rt')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="rw" class="form-control rounded-top" id="rw" placeholder="Media Sosial"
              value="{{ old('rw') }}">
            <label for="rw">RW</label>
            @error('rw')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="kecamatan" class="form-control rounded-top" id="kecamatan"
              placeholder="Media Sosial" value="{{ old('kecamatan') }}">
            <label for="kecamatan">Kecamatan</label>
            @error('kecamatan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="kelurahan_desa" class="form-control rounded-top" id="kelurahan_desa"
              placeholder="Media Sosial" value="{{ old('kelurahan_desa') }}">
            <label for="kelurahan_desa">Kelurahan/Desa</label>
            @error('kelurahan_desa')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="kodepos" class="form-control rounded-top" id="kodepos" placeholder="Media Sosial"
              value="{{ old('kodepos') }}">
            <label for="kodepos">Kode Pos</label>
            @error('kodepos')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="">
            <label for="profile_picture" class="form-label text-white font-semibold mt-3">Foto Profil</label>
            <img class="img-preview img-fluid">
            <input class="form-control @error('profile_picture') is-invalid @enderror" type="file" id="profile_picture"
              name="profile_picture" onchange="previewImage()">
            @error('profile_picture')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg w-full text-white"
            type="submit">Daftar</button>
          <small class="d-block mt-2 text-white text-md">Sudah punya akun? masuk <a href="/login">disini</a></small>
        </form>
      </div>
    </div>
  </div>
</section>
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