@extends('main_blade.main')

@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="ml-2 font-weight-bold">RENCANA KERJA</h5>
                                @can('Administrator')
                                    <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                                        data-target="#exampleModal">
                                        + BUAT RENCANA
                                    </button>
                                    <x-modal_buat_rencana :proyek="$proyek" />
                                @endcan
                            </div>

                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">PEKERJAAN</th>
                                        <th scope="col">ALAT KERJA</th>
                                        <th scope="col">WAKTU PENGERJAAN</th>
                                        <th scope="col">STATUS</th>
                                        @can('Administrator')
                                        <th scope="col">EDIT</th>
                                        <th scope="col">HAPUS</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rencana as $rencana)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $rencana->pekerjaan }}</td>
                                            <td>{{ $rencana->alat }}</td>
                                            <td>{{ \Carbon\Carbon::parse($rencana->time_str)->format('Y-m-d') }} s/d
                                                {{ \Carbon\Carbon::parse($rencana->time_end)->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="input-group">
                                                    @if ($rencana->status == 0)
                                                        <form method="POST"
                                                            action="{{ route('rencana.update', $rencana->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="text" name="status" id="status"
                                                                value="1" hidden>
                                                            <button type="submit" class="btn btn-secondary"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Klik jika status selesai" @unless (Gate::allows('Administrator')) disabled @endunless>Proses</button>
                                                        </form>
                                                    @else
                                                        <form method="POST"
                                                            action="{{ route('rencana.update', $rencana->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="text" name="status" id="status"
                                                                value="0" hidden>
                                                            <button type="submit" class="btn btn-success"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Klik jika status belum selesai" @unless (Gate::allows('Administrator')) disabled @endunless>Selesai</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                            @can('Administrator')
                                            <td>
                                                <button type="button" class="btn btn-info text-white" data-toggle="modal"
                                                data-target="#exampleModal{{ $rencana->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                        <path
                                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                    </svg>
                                                </button>
                                                <x-modal_edit_rencana :proyek="$proyek" :rencana="$rencana"/>
                                            </td>
                                            <td>
                                                <form action="{{ route('rencana.destroy', $rencana->id) }}" method="POST">
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tableRows = document.querySelectorAll("tbody tr");

            tableRows.forEach(function(row) {
                row.addEventListener("click", function() {
                    var href = row.getAttribute("data-href");
                    if (href) {
                        window.location = href;
                    }
                });
            });
        });
    </script>
    <script>
        // Menghindari penyebaran event hanya pada tombol
        document.querySelectorAll('tbody tr .no-propagation').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.stopPropagation(); // Mencegah event klik menyebar ke elemen tr
            });
        });
    </script>
@endsection
