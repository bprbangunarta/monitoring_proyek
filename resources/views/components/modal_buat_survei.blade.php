<!-- Modal Laporan -->
<div class="modal fade bd-buat-survei-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">BUAT SURVEI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/pengawas/survei" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Proyek" name="proyek_id" id="proyek_id" value="{{ $proyek->id }}" hidden>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">SURVEI :</label>
                        </div>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" placeholder="Judul Survei" name="judul" id="judul" value="{{ old('judul') }}" required>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            Tambah Foto :
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card" style="width: 6rem; height: 6rem;">
                                    <div class="image text-center">
                                        <img class="img1-view" src="/dist/img/tambah_gambar.png" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="input-group absolute" style="width: 100px; height: 100px; position: absolute; top: 0; bottom: 0; left: 0; right: 0; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5); opacity: 0; cursor: pointer;">
                                        <div class="custom-file" style="width: 100%; height: 100%;">
                                            <label class="btn h-20 w-40 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <input id="img1" name="img1" type="file" class="pointer-events-none absolute inset-0 h-full w-full opacity-0" onchange="viewImg('img1')" value="{{ old('img1') }}">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card" style="width: 6rem; height: 6rem;">
                                    <div class="image text-center">
                                        <img class="img2-view" src="/dist/img/tambah_gambar.png" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="input-group absolute" style="width: 100px; height: 100px; position: absolute; top: 0; bottom: 0; left: 0; right: 0; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5); opacity: 0; cursor: pointer;">
                                        <div class="custom-file" style="width: 100%; height: 100%;">
                                            <label class="btn h-20 w-40 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <input id="img2" name="img2" type="file" class="pointer-events-none absolute inset-0 h-full w-full opacity-0" onchange="viewImg('img2')" value="{{ old('img2') }}">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card" style="width: 6rem; height: 6rem;">
                                    <div class="image text-center">
                                        <img class="img3-view" src="/dist/img/tambah_gambar.png" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="input-group absolute" style="width: 100px; height: 100px; position: absolute; top: 0; bottom: 0; left: 0; right: 0; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5); opacity: 0; cursor: pointer;">
                                        <div class="custom-file" style="width: 100%; height: 100%;">
                                            <label class="btn h-20 w-40 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <input id="img3" name="img3" type="file" class="pointer-events-none absolute inset-0 h-full w-full opacity-0" onchange="viewImg('img3')" value="{{ old('img3') }}">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="width: 6rem; height: 6rem;">
                                    <div class="image text-center">
                                        <img class="img4-view" src="/dist/img/tambah_gambar.png" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="input-group absolute" style="width: 100px; height: 100px; position: absolute; top: 0; bottom: 0; left: 0; right: 0; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5); opacity: 0; cursor: pointer;">
                                        <div class="custom-file" style="width: 100%; height: 100%;">
                                            <label class="btn h-20 w-40 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <input id="img4" name="img4" type="file" class="pointer-events-none absolute inset-0 h-full w-full opacity-0" onchange="viewImg('img4')" value="{{ old('img4') }}">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="width: 6rem; height: 6rem;">
                                    <div class="image text-center">
                                        <img class="img5-view" src="/dist/img/tambah_gambar.png" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="input-group absolute" style="width: 100px; height: 100px; position: absolute; top: 0; bottom: 0; left: 0; right: 0; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5); opacity: 0; cursor: pointer;">
                                        <div class="custom-file" style="width: 100%; height: 100%;">
                                            <label class="btn h-20 w-40 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <input id="img5" name="img5" type="file" class="pointer-events-none absolute inset-0 h-full w-full opacity-0" onchange="viewImg('img5')" value="{{ old('img5') }}">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <textarea class="form-control @error('detail') is-invalid @enderror" rows="3" placeholder="Deskripsi kerja" name="detail" id="detail">{{ old('detail') }}</textarea>
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

