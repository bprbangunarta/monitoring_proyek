<!-- Modal edut Proyek -->
<div class="modal fade" id="exampleModa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DATA PROYEK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/administrator/proyek/{{ $proyek->id }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">NAMA PROYEK :
                            </label>
                        </div>
                        <input type="text" class="form-control @error('name_proyek') is-invalid @enderror"
                            placeholder="Nama Proyek" name="name_proyek" id="name_proyek"
                            value="{{ old('name_proyek', $proyek->name_proyek) }}" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">NAMA
                                KLIEN</label>
                        </div>
                        <select class="custom-select" name="klien" id="klien">
                            @foreach ($klien as $user)
                                @if (old('klien', $proyek->klien) == $user->name)
                                    <option value="{{ $user->name }}" selected>
                                        {{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->name }}">{{ $user->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">NAMA
                                PENGAWAS</label>
                        </div>
                        <select class="custom-select" name="pengawas" id="pengawas">
                            @foreach ($pengawas as $user)
                                @if (old('pengawas', $proyek->pengawas) == $user->name)
                                    <option value="{{ $user->name }}" selected>
                                        {{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->name }}">{{ $user->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">NAMA
                                MANAGER</label>
                        </div>
                        <select class="custom-select" name="manager" id="manager">
                            @foreach ($manager as $user)
                                @if (old('manager', $proyek->manager) == $user->name)
                                    <option value="{{ $user->name }}" selected>
                                        {{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->name }}">{{ $user->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <label class="input-group-text">WAKTU PENGERJAAN</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="startDate">Tgl Awal:</label>
                        </div>
                        <input type="date" id="time_str" name="time_str" class="text-dark"
                            value="{{ old('time_str', \Carbon\Carbon::parse($proyek->time_str)->format('Y-m-d')) }}"
                            required>

                        <label class="bold ml-1 badge-info mb-0 text-prepend">s/d</label>

                        <div class="input-group-prepend ml-auto">
                            <label class="input-group-text" for="endDate">Tgl Akhir:</label>
                        </div>
                        <input type="date" id="time_end" name="time_end" class="text-dark"
                            value="{{ old('time_end', \Carbon\Carbon::parse($proyek->time_end)->format('Y-m-d')) }}"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
