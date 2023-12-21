<!-- Modal buat Rencana -->
<div class="modal fade" id="exampleModal{{ $rencana->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DATA PROYEK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/rencana/full/update/{{ $rencana->id }}">
                @method('PUT')
                @csrf
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Proyek" name="proyek_id"
                            id="proyek_id" value="{{ $proyek->id }}" hidden>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">PEKERJAAN :
                            </label>
                        </div>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                            placeholder="Nama Pekerjaan" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $rencana->pekerjaan) }}"
                            required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">ALAT :
                            </label>
                        </div>
                        <input type="text" class="form-control @error('alat') is-invalid @enderror"
                            placeholder="Nama Alat kerja" name="alat" id="alat" value="{{ old('alat', $rencana->alat) }}">
                    </div>

                    <label class="input-group-text">WAKTU PENGERJAAN</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="startDate">Tgl Awal:</label>
                        </div>
                        <input type="date" id="time_str" name="time_str" value="{{ old('time_str', \Carbon\Carbon::parse($rencana->time_end)->format('Y-m-d')) }}" required>

                        <label class="bold ml-1 badge-info mb-0 text-prepend">s/d</label>

                        <div class="input-group-prepend ml-auto">
                            <label class="input-group-text" for="endDate">Tgl Akhir:</label>
                        </div>
                        <input type="date" id="time_end" name="time_end" value="{{ old('time_end', \Carbon\Carbon::parse($rencana->time_end)->format('Y-m-d')) }}"  required>
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
