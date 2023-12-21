@extends('main_blade.main')

@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID.</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>
                                            <div class="user-panel">
                                                <div class="image">
                                                    <button type="button" class="btn" data-toggle="modal"
                                                        data-target="#example{{ $user->username }}">
                                                        @if ($user->profil === null)
                                                            <img src="/dist/img/user2-160x160.jpg"
                                                                class="img-circle elevation-2" alt="User Image">
                                                        @else
                                                            <img src="/storage/{{ $user->profil }}"
                                                                class="img-circle elevation-2" alt="User Image">
                                                        @endif
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#example{{ $user->id }}">
                                                @if ($user->role == 0)
                                                    Client
                                                @elseif($user->role == 1)
                                                    Administrator
                                                @elseif($user->role == 2)
                                                    Pengawas
                                                @elseif($user->role == 3)
                                                    Manajer
                                                @endif
                                            </button></td>
                                        <td>
                                            <form action="/administrator/{{ $user->id }}" method="POST">
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
                                    </tr>

                                    <div class="modal fade" id="example{{ $user->username }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Image View</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="image text-center">
                                                    @if ($user->profil === null)
                                                        <img src="/dist/img/user2-160x160.jpg" class="elevation-3 mt-2 mb-2"
                                                            alt="User Image">
                                                    @else
                                                        <img src="/storage/{{ $user->profil }}"
                                                            class="elevation-3 mt-2 mb-2" alt="User Image">
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="example{{ $user->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah role</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/administrator/{{ $user->id }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text"
                                                                    for="inputGroupSelect01">Role</label>
                                                            </div>
                                                            <select class="custom-select" name="role" id="role">
                                                                <option selected>Ubah Role?</option>
                                                                <option value="0">Client</option>
                                                                <option value="1">Administrator</option>
                                                                <option value="2">Pengawas</option>
                                                                <option value="3">Manajer Proyek</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>

                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
