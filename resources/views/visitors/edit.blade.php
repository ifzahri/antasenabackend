@extends('visitors.layout')
@section('content')
    <div class="row mt-2 mb-2">
        <h3>Pengunjung</h3>
    </div>
    <div class="row mt-2 mb-2">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="row mt-2 mb-2">
        <div class="card border-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Registrasi Antasena</h5>
                <form action="{{ route('visitors.update',$visitor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="name">Nama lengkap</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{$visitor->name}}"
                                    placeholder="Nama lengkap" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="identity">NIK (Nomor Induk Kependudukan)</label>
                                <input type="number" id="identity" name="identity" class="form-control" value="{{$visitor->identity}}"
                                    placeholder="16 digit NIK" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{$visitor->email}}"
                                    placeholder="Email" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="phone_nr">Nomor Telepon</label>
                                <input type="number" id="phone_nr" name="phone_nr" class="form-control" value="{{$visitor->phone_nr}}"
                                    placeholder="Nomor Telepon" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="address">Alamat</label>
                                <textarea class="form-control" id="address" name="address" rows="4" placeholder="Alamat saat ini">{{$visitor->address}}</textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="city">Asal Kota/Daerah</label>
                                <input type="text" id="city" name="city" class="form-control" value="{{$visitor->city}}"
                                    placeholder="Asal kota saat ini" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="date">Rencana kunjungan</label>
                                    <input type="date" id="date" name="date" class="form-control" value="{{$visitor->date}}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="visits">Hal yang dikunjungi</label>
                                    <select class="form-select" aria-label="Default select example" id="visits"
                                        name="visits">
                                        <option selected>Pilih salah satu</option>
                                        <option value="1" {{ $visitor->visits == 1 ? 'selected' : '' }}>Workshop</option>
                                        <option value="2" {{ $visitor->visits == 2 ? 'selected' : '' }}>Markas Antasena</option>
                                        <option value="3" {{ $visitor->visits == 3 ? 'selected' : '' }}>Keduanya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$visitor->publiccheck}}" id="publiccheck"
                                    name="publiccheck">
                                <label class="form-check-label" for="publiccheck">
                                    Apakah anda mahasiswa ITS?
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Rubah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
