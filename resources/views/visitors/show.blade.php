@extends('visitors.layout')
@section('content')
    <div class="row mt-2 mb-2">
        <h3>Rincian pengunjung #{{$visitor->id}}</h3>
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
        <div class="card">
            <div class="card-body">
                <dl class="row mt-2">
                    <dt class="col-sm-3">Nama</dt>
                    <dd class="col-sm-9">{{$visitor->name}}.</dd>
                    <dt class="col-sm-3">Alamat</dt>
                    <dd class="col-sm-9">{{$visitor->identity}}.</dd>
                    <dt class="col-sm-3">Asal kota</dt>
                    <dd class="col-sm-9">{{$visitor->city}}.</dd>
                    <dt class="col-sm-3">Tanggal pengisian</dt>
                    <dd class="col-sm-9">{{$visitor->date}}.</dd>
                    <dt class="col-sm-3">Tanggal/jam kunjungan</dt>
                    <dd class="col-sm-9">{{$visitor->start}}.</dd>
                    <dt class="col-sm-3">Tempat yang dikunjungi</dt>
                    <dd class="col-sm-9">{{$visitor->visits}}.</dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="pull-right mt-2 mb-2">
        <a class="btn btn-primary" href="{{ route('visitors.index') }}">Kembali</a>
    </div>
@endsection
