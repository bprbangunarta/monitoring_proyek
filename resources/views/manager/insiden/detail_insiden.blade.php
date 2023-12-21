@extends('main_blade.main')


@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="card col-lg-12">
                        <div class="d-flex justify-content-between card-header bg-dark text-white">
                            <h5 class="">LAPORAN INSIDEN</h5>
                            <button type="button" class="btn btn-info text-white ml-auto" data-toggle="modal"
                                data-target=".bd-edit-insiden{{ $insiden->id }}-modal-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                </svg>
                            </button>
                            <x-modal_edit_insiden :proyek="$proyek" :insiden="$insiden" />
                        </div>
                        <div class="card-body">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4><strong>{{ $insiden->judul }}</strong></h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><strong>DESKRIPSI:</strong></h5>
                                    <p class="card-text">{{ $insiden->detail }}</p>
                                </div>
                            </div>

                            <div class="card text-center">
                                <div class="card-header">
                                    <h5 class="card-title"><strong>FOTO:</strong></h5>
                                </div>
                                <div class="card-body">
                                    <div class="image-container">
                                        <div class="d-flex justify-content">
                                            @foreach ($insiden->image as $img)
                                                <button type="button" data-toggle="modal"
                                                    data-target=".bd-edit{{ $img->id }}-modal-lg">
                                                    <img class="img-thumbnail w-40 h-40 ml-1"
                                                        src="/storage/{{ $img->img }}" alt="Foto"></button>
                                                <!-- Large modal -->
                                                <div class="modal fade bd-edit{{ $img->id }}-modal-lg" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="image-container" style="position: relative;">
                                                                <img class="img-thumbnail w-full h-full"
                                                                    src="/storage/{{ $img->img }}" alt="Foto">
                                                                <form action="/image/{{ $img->id }}" method="POST"
                                                                    style="position: absolute; top: 10px; right: 10px;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-outline-danger text-white">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            height="2em" viewBox="0 0 448 512">
                                                                            <path
                                                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Manajer : {{ $proyek->manager }}</h5>
                                    </div>
                                    <div class="card-footer text-muted">
                                        {{ $insiden->created_at }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <x-modal_buat_laporan :proyek="$proyek" />



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
