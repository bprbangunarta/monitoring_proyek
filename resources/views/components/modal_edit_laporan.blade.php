<!-- Modal Laporan -->
<div class="modal fade bd-edit-laporan{{ $laporan->id }}-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">EDIT LAPORAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/laporan/{{ $laporan->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Proyek" name="proyek_id"
                            id="proyek_id" value="{{ $laporan->proyek->id }}" hidden>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">PEKERJAAN :</label>
                        </div>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                            placeholder="Nama Pekerjaan" name="pekerjaan" id="pekerjaan"
                            value="{{ old('pekerjaan', $laporan->pekerjaan) }}" required>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            Tambah Foto :
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                @foreach ($laporan->image as $img)
                                    <div class="card" style="width: 6rem; height: 6rem;">
                                        <div class="image text-center">
                                            <img class="laporan{{ $laporan->id }}{{ $img->id }}-view"
                                                src="/storage/{{ $img->img }}"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                        <div class="input-group absolute"
                                            style="width: 100px; height: 100px; position: absolute; top: 0; bottom: 0; left: 0; right: 0; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5); opacity: 0; cursor: pointer;">
                                            <div class="custom-file" style="width: 100%; height: 100%;">
                                                <label
                                                    class="btn h-20 w-40 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                    <input id="laporan{{ $laporan->id }}{{ $img->id }}"
                                                        name="laporan{{ $laporan->id }}{{ $img->id }}"
                                                        type="file"
                                                        class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                                                        onchange="viewImg('laporan{{ $laporan->id }}{{ $img->id }}')">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="card" style="width: 6rem; height: 6rem;">
                                    <div class="image text-center">
                                        <img class="new_img{{ $laporan->id }}-view"
                                            src="/dist/img/tambah_gambar.png"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="input-group absolute"
                                        style="width: 100px; height: 100px; position: absolute; top: 0; bottom: 0; left: 0; right: 0; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5); opacity: 0; cursor: pointer;">
                                        <div class="custom-file" style="width: 100%; height: 100%;">
                                            <label
                                                class="btn h-20 w-40 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <input id="new_img{{ $laporan->id }}"
                                                    name="new_img{{ $laporan->id }}"
                                                    type="file"
                                                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                                                    onchange="viewImg('new_img{{ $laporan->id }}')">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <span class="text-dark mt-3">Deskripsi : </span>
                    <div class="input-group mb-3">
                        <textarea class="form-control @error('detail') is-invalid @enderror" rows="3" placeholder="Deskripsi kerja"
                            name="detail" id="detail">{{ old('detail', $laporan->detail) }}</textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
