@extends('main_blade.main')

@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">

                        @can('Administrator')
                            @if (Request::is('administrator/*'))
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#exampleModal">
                                    BUAT PROYEK
                                </button>
                                @error('name_proyek')
                                    <span class="text-tiny+ text-danger">{{ $message }}</span>
                                @enderror
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">DATA PROYEK</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="/administrator/proyek">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text">NAMA PROYEK :
                                                            </label>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('name_proyek') is-invalid @enderror"
                                                            placeholder="Nama Proyek" name="name_proyek" id="name_proyek"
                                                            value="{{ old('name_proyek') }}" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text">NAMA
                                                                KLIEN</label>
                                                        </div>
                                                        <select class="custom-select" name="klien" id="klien">
                                                            <option selected>Pilih Klien...</option>
                                                            @foreach ($klien as $user)
                                                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01">NAMA
                                                                PENGAWAS</label>
                                                        </div>
                                                        <select class="custom-select" name="pengawas" id="pengawas">
                                                            <option selected>Pilih Pengawas...</option>
                                                            @foreach ($pengawas as $user)
                                                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01">NAMA
                                                                MANAGER</label>
                                                        </div>
                                                        <select class="custom-select" name="manager" id="manager">
                                                            <option selected>Pilih Manager...</option>
                                                            @foreach ($manager as $user)
                                                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label class="input-group-text">WAKTU PENGERJAAN</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="startDate">Tgl Awal:</label>
                                                        </div>
                                                        <input type="date" id="time_str" name="time_str" required>

                                                        <label class="bold ml-1 badge-info mb-0 text-prepend">s/d</label>

                                                        <div class="input-group-prepend ml-1">
                                                            <label class="input-group-text" for="endDate">Tgl Akhir:</label>
                                                        </div>
                                                        <input type="date" id="time_end" name="time_end" required>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">{{ $role }}</label>
                                        </div>
                                        <select class="custom-select" id="nameManager" name="nameManager">
                                            <option selected>Pilih...</option>
                                            @foreach ($users as $user)
                                                <option data-url="{{ $link }}{{ $user->name }}">{{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                        @endcan
                        @can('Pengawas')
                            @if (Request::is('manager/*'))
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"
                                                for="inputGroupSelect01">{{ $role }}</label>
                                        </div>
                                        <select class="custom-select" id="nameManager" name="nameManager">
                                            <option selected>Pilih...</option>
                                            @foreach ($users as $user)
                                                <option data-url="{{ $link }}{{ $user->name }}">
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                        @endcan

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA PROYEK</th>
                                    <th scope="col">NAMA KLIEN</th>
                                    <th scope="col">PENGAWAS</th>
                                    <th scope="col">MENEJER</th>
                                    <th scope="col">WAKTU PENGERJAAN</th>
                                    <th scope="col">DETAIL</th>
                                    <th scope="col">MENU</th>
                                    @can('Administrator')
                                        <th scope="col">HAPUS</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyeks as $proyek)
                                    <tr>
                                        <th scope="row"> <a class="text-dark"
                                                href="/manager/proyek/{{ $proyek->id }}/edit">{{ $proyek->id }} </a>
                                        </th>
                                        <td><a class="text-dark"
                                                href="/manager/proyek/{{ $proyek->id }}/edit">{{ $proyek->name_proyek }}</a>
                                        <td><a class="text-dark"
                                                href="/manager/proyek/{{ $proyek->id }}/edit">{{ $proyek->klien }}</a>
                                        </td>
                                        </td>
                                        <td><a class="text-dark"
                                                href="/manager/proyek/{{ $proyek->id }}/edit">{{ $proyek->pengawas }}</a>
                                        </td>
                                        <td><a class="text-dark"
                                                href="/manager/proyek/{{ $proyek->id }}/edit">{{ $proyek->manager }}</a>
                                        </td>
                                        <td><a class="text-dark"
                                                href="/manager/proyek/{{ $proyek->id }}/edit">{{ \Carbon\Carbon::parse($proyek->time_str)->format('Y-m-d') }}
                                                s/d
                                                {{ \Carbon\Carbon::parse($proyek->time_end)->format('Y-m-d') }}</a></td>
                                        <td><a class="text-dark" href="/proyek/detail/{{ $proyek->id }}/edit">
                                                <button type="button" class="btn btn-info text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                    </svg>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            @if ($proyek->is_str === 0)
                                                @can('Administrator')
                                                    <form method="POST" action="/mulai/proyek/{{ $proyek->id }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="is_str" id="is_str" value="1"
                                                            hidden>
                                                        <button type="submit" class="btn btn-secondary"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Klik untuk mulai proyek">Mulai Proyek</button>
                                                    </form>
                                                @endcan
                                            @else
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Menu Proyek
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="/rencana/{{ $proyek->id }}">Rencana</a>
                                                        <a class="dropdown-item"
                                                            href="/laporan/{{ $proyek->id }}" @can('Pengawas') hidden @endcan>Laporan</a>
                                                        <a class="dropdown-item"
                                                            href="/insiden/{{ $proyek->id }}" @can('Pengawas') hidden @endcan>Insiden</a>
                                                        <a class="dropdown-item"
                                                            href="/survei/{{ $proyek->id }}" @can('Manajer_Proyek') hidden @endcan>Survei</a>
                                                        @can('Administrator')
                                                            <div class="dropdown-divider"></div>
                                                            <form method="POST" action="/mulai/proyek/{{ $proyek->id }}"
                                                                class="text-center">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="text" name="is_str" id="is_str"
                                                                    value="0" hidden>
                                                                <button type="submit" class="btn btn-secondary">Hentikan
                                                                    proyek</button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        @can('Administrator')
                                            <td>
                                                <form action="/administrator/proyek/{{ $proyek->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                            viewBox="0 0 448 512">
                                                            <path
                                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nameManagerSelect = document.getElementById("nameManager");

            nameManagerSelect.addEventListener("change", function() {
                const selectedOption = nameManagerSelect.options[nameManagerSelect.selectedIndex];
                const url = selectedOption.getAttribute("data-url");
                if (url) {
                    window.location.href = url;
                }
            });
        });
    </script>
@endsection
