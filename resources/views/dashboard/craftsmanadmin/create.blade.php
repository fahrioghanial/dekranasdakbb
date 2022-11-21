@extends('dashboard.layouts.main')

@section('container')
<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  @if(session()->has('fail'))
  <div class="alert alert-error mb-3">
    {{ session('fail') }}
  </div>
  @endif
  <p class="text-2xl font-semibold mb-5">Tambah Anggota Perajin</p>
  <div class="md:w-1/2 bg-white p-3 rounded-md">
    <form method="post" action="/dashboard/adminuser/adduser" enctype="multipart/form-data">
      @csrf
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Foto Profil</span>
        </label>
        <img class="img-preview w-1/2">
        <input type="file" name="profile_picture"
          class="p-2 rounded-md w-full @error('profile_picture') border-red-600 @enderror bg-white" id="profile_picture"
          placeholder="Foto Profil" onchange="previewImage()">
        @error('profile_picture')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Nama Lengkap</span>
        </label>
        <input type="text" name="name"
          class="input input-bordered w-full {{ $errors->has('name')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="name" placeholder="Nama Lengkap" autofocus value="{{ old('name') }}">
        @error('name')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full hidden">
        <label class="label">
          <span class="label-text text-black">Username (Nama Pengguna)</span>
        </label>
        <input type="text" name="username"
          class="input input-bordered w-full {{ $errors->has('username')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="username" placeholder="namapengguna" value="{{ old('username') }}">
        @error('username')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Nomor HP</span>
        </label>
        <input type="text" name="contact"
          class="input input-bordered w-full {{ $errors->has('contact')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="contact" placeholder="Nomor HP" value="{{ old('contact') }}">
        @error('contact')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Nomor KTP</span>
        </label>
        <input type="text" name="noktp"
          class="input input-bordered w-full {{ $errors->has('noktp')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="noktp" placeholder="Nomor KTP" value="{{ old('noktp') }}">
        @error('noktp')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Alamat</span>
        </label>
        <input type="text" name="address"
          class="input input-bordered w-full {{ $errors->has('address')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="address" placeholder="Alamat" value="{{ old('address') }}">
        @error('address')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">RT</span>
        </label>
        <input type="text" name="rt"
          class="input input-bordered w-full {{ $errors->has('rt')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="rt" placeholder="RT" value="{{ old('rt') }}">
        @error('rt')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">RW</span>
        </label>
        <input type="text" name="rw"
          class="input input-bordered w-full {{ $errors->has('rw')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="rw" placeholder="RW" value="{{ old('rw') }}">
        @error('rw')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full ">
        <label class="label">
          <span class="label-text text-black">Kecamatan</span>
        </label>
        <input type="text" name="kecamatan"
          class="input input-bordered w-full {{ $errors->has('kecamatan')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="kecamatan" placeholder="Kecamatan" value="{{ old('kecamatan') }}">

        @error('kecamatan')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Kelurahan/Desa</span>
        </label>
        <input type="text" name="kelurahan_desa"
          class="input input-bordered w-full {{ $errors->has('kelurahan_desa')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="kelurahan_desa" placeholder="Kelurahan/Desa" value="{{ old('kelurahan_desa') }}">
        @error('kelurahan_desa')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Kode Pos</span>
        </label>
        <input type="text" name="kodepos"
          class="input input-bordered w-full {{ $errors->has('kodepos')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="kodepos" placeholder="Kode Pos" value="{{ old('kodepos') }}">
        @error('kodepos')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Email</span>
        </label>
        <input type="email" name="email"
          class="input input-bordered w-full {{ $errors->has('email')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="email" placeholder="Email" value="{{ old('email') }}">
        @error('email')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Instagram <br>(masukkan username Instagram tanpa "@", contoh:
            dekranasdakbb)</span>
        </label>
        <input type="text" name="instagram"
          class="input input-bordered w-full {{ $errors->has('instagram')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="instagram" placeholder="Instagram" value="{{ old('instagram') }}">
        @error('instagram')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Facebook <br>(masukkan username Facebook tanpa "@". Contoh:
            dekranasdakbb)</span>
        </label>
        <input type="text" name="facebook"
          class="input input-bordered w-full {{ $errors->has('facebook')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="facebook" placeholder="Facebook" value="{{ old('facebook') }}">
        @error('facebook')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Whatsapp <br>(masukkan dengan awalan 0, contoh: 085123456789)</span>
        </label>
        <input type="text" name="whatsapp"
          class="input input-bordered w-full {{ $errors->has('whatsapp')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="whatsapp" placeholder="Whatsapp" value="{{ old('whatsapp') }}">
        @error('whatsapp')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full" id="password_field2">
        <label class="label">
          <span class="label-text text-black">Kata Sandi</span>
        </label>
        <div>
          <p class="text-black font-semibold">(Kata sandi bawaan sesuai dengan Nomor KTP)</p>
        </div>
      </div>
      <div class="flex flex-col gap-3 mt-5">
        <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg w-full text-white text-xl font-semibold"
          type="submit">Tambahkan Anggota</button>
        <a class="rounded-lg py-2 px-3 bg-red-600 hover:bg-red-900 text-white text-xl font-semibold text-center"
          href="/dashboard/user">
          Batal
        </a>
      </div>
    </form>
  </div>
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

  document.querySelector('#name').addEventListener('change', (event) => {
    fetch('/username/checkUsername?name='+ document.querySelector('#name').value)
    .then(response => response.json())
    .then(data => {document.querySelector('#username').value = data.username; console.log(data.username)})
  })


  function togglePassword() {
    if (document.querySelector("#password").type == "password") {
      document.querySelector("#password").type = "text";
      document.querySelector("#eye").classList.remove("bi-eye-fill");
      document.querySelector("#eye").classList.add("bi-eye-slash-fill");
    } else {
      document.querySelector("#password").type = "password";
      document.querySelector("#eye").classList.remove("bi-eye-slash-fill");
      document.querySelector("#eye").classList.add("bi-eye-fill");
    }
  }

  function togglePasswordConfirm() {
    if (document.querySelector("#password_confirmation").type == "password") {
      document.querySelector("#password_confirmation").type = "text";
      document.querySelector("#eye_confirm").classList.remove("bi-eye-fill");
      document.querySelector("#eye_confirm").classList.add("bi-eye-slash-fill");
    } else {
      document.querySelector("#password_confirmation").type = "password";
      document.querySelector("#eye_confirm").classList.remove("bi-eye-slash-fill");
      document.querySelector("#eye_confirm").classList.add("bi-eye-fill");
    }
  }
</script>
@endsection