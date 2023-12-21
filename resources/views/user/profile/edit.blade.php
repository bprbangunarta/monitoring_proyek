@extends('main_blade.main')

@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1 class="m-0"></h1>

                        <div class="card">
                            <div class="mt-3 pb-3 mx-5 text-center">
                                <div class="image">
                                    <div class="">
                                        @if (auth()->user()->profil === null)
                                            <img class="rounded border border-dark mt-1 profil-view img-fluid"
                                                src="/dist/img/user2-160x160.jpg" alt="Avatar">
                                        @else
                                            <img class="rounded border border-dark mt-1 profil-view img-fluid"
                                                src="/storage/{{ auth()->user()->profil }}" alt="Avatar">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <form action="/user/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <label for="profil"
                                                class="btn h-6 w-20 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"> Upload
                                                <input id="profil" name="profil" type="file"
                                                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                                                    onchange="viewImg('profil')" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ auth()->user()->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="name"
                                            id="name" value="{{ old('name', auth()->user()->name) }}">
                                        @error('name')
                                            <div class="text-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" class="form-control" placeholder="Masukan User Name"
                                            name="username" id="username"
                                            value="{{ old('username', auth()->user()->username) }}">
                                        @error('username')
                                            <div class="text-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Perusahaan</label>
                                        <input type="text" class="form-control" placeholder="Masukan Perusahaan"
                                            name="perusahaan" id="perusahaan"
                                            value="{{ old('perusahaan', auth()->user()->perusahaan) }}">
                                        @error('perusahaan')
                                            <div class="text-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());

        // ubah gambar yang akan di gunakan
        function viewImg(inputId) {
            const inputElement = document.getElementById(inputId); // Dapatkan elemen input file dengan ID yang sesuai
            const imgView = document.querySelector(
                `.${inputId}-view`); // Dapatkan elemen gambar tampilan dengan class yang sesuai

            // Pastikan ada file yang dipilih
            if (inputElement.files && inputElement.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Ubah sumber gambar tampilan
                    imgView.src = e.target.result;
                };

                // Baca file yang dipilih sebagai URL data
                reader.readAsDataURL(inputElement.files[0]);
            }
        }

        // auto slug
        const judul = document.querySelector('#judul');
        const url = document.querySelector('#url');

        judul.addEventListener('change', function() {
            fetch('/user/posts/isiUrl?judul=' + judul.value)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => url.value = data.url)
                .catch(error => {
                    console.error('Fetch error:', error);
                    // Tambahkan penanganan kesalahan di sini, seperti menampilkan pesan kepada pengguna
                });
        });
    </script>
@endsection
