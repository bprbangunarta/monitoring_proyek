@extends('main_blade.main')

@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="content-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <h1 class="m-0"></h1>

                                    <div class="card" style="width: 18rem;">
                                        <div class="image text-center">
                                            @if (auth()->user()->profil === null)
                                                <img class="rounded-circle border border-dark mt-1"
                                                    src="/dist/img/user2-160x160.jpg" alt="Avatar" width="160"
                                                    height="160">
                                            @else
                                                <img class="rounded-circle border border-dark mt-1"
                                                    src="/storage/{{ auth()->user()->profil }}" alt="Avatar"
                                                    width="160" height="160">
                                            @endif
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"></li>
                                            <li class="list-group-item"><strong>NAMA:</strong> {{ auth()->user()->name }}
                                            </li>
                                            <li class="list-group-item"><strong>USER NAME:</strong>
                                                {{ auth()->user()->username }}
                                            </li>
                                            <li class="list-group-item"><strong>EMAIL:</strong> {{ auth()->user()->email }}
                                            </li>
                                            @if (auth()->user()->perusahaan)
                                                <li class="list-group-item"><strong>PERUSAHAAN:</strong>
                                                    {{ auth()->user()->perusahaan }}</li>
                                            @else
                                                <li class="list-group-item"><strong>PERUSAHAAN:</strong> <span
                                                        class="text-danger">Harap
                                                        diisi</span></li>
                                            @endif
                                        </ul>
                                        <div class="card-body">
                                            <a href="/user/{{ auth()->user()->id }}/edit"
                                                class="card-link badge badge-primary">Edit
                                                Profile</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="font-weight-bold">PROYEK SAYA</h5>
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA PROYEK</th>
                                    <th scope="col">NAMA KLIEN</th>
                                    <th scope="col">NAMA PENGAWAS</th>
                                    <th scope="col">NAMA MANAGER</th>
                                    <th scope="col">WAKTU PENGERJAAN</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyek as $pr)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $pr->name_proyek }}</td>
                                        <td>{{ $pr->klien }}</td>
                                        <td>{{ $pr->pengawas }}</td>
                                        <td>{{ $pr->manager }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pr->time_str)->format('Y-m-d') }} s/d
                                            {{ \Carbon\Carbon::parse($pr->time_end)->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="input-group">
                                                @if ($pr->is_str == 2)
                                                    <button type="submit" class="btn btn-primary " data-toggle="tooltip"
                                                        data-placement="top" title="Klik jika status selesai"
                                                        @unless (Gate::allows('Administrator')) disabled @endunless>Selesai</button>
                                                @else
                                                    <button type="submit" class="btn btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Klik jika status belum selesai"
                                                        @unless (Gate::allows('Administrator')) disabled @endunless>Proses</button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
