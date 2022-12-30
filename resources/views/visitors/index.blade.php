@extends('visitors.layout')
@section('content')
    <div class="row">
        <h2 class="text-center mt-2 mb-2">Visit Antasena</h2>
    </div>
    <div class="row">
        <p class="mb-6">Registrasi dan pengecekan kunjungan terhadap seluruh pengujung Antasena untuk umum.</p>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Hal yang perlu diperhatikan:</h4>
        </div>
        <div class="card-body">
            <dl class="row mt-2">
                <dt class="col-sm-3">Description lists</dt>
                <dd class="col-sm-9">A description list is perfect for defining terms.</dd>

                <dt class="col-sm-3">Term</dt>
                <dd class="col-sm-9">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </dd>
            </dl>
        </div>
    </div>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block alert-dismissible fade show">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>	
      </div>
    @endif
    <div class="pull-right mt-2 mb-2">
        <a class="btn btn-primary" href="{{ route('visitors.create') }}">Tambah Data</a>
    </div>
    <table class="table table-responsive table-hover table-striped caption-top">
        <caption>Daftar Tamu</caption>
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Kunjungan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($visitors as $visitor)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->date }}</td>
                    <td>{{ $visitor->visits }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('visitors.destroy', $visitor->id) }}" method="POST">
                            @guest
                                <a class="btn btn-info" href="{{ route('visitors.show', $visitor->id) }}">Lihat</a>
                            @endguest
                            <a href="{{ route('visitors.edit', $visitor->id) }}" class="btn btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Data visitor belum Tersedia.
                </div>
            @endforelse
        </tbody>
        <tfoot class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Kunjungan</th>
                <th scope="col">Action</th>
            </tr>
        </tfoot>
    </table>
    <div class="row mt-4">
        {{ $visitors->links() }}
    </div>
@endsection
