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
                    <p>Definition for the term.</p>
                    <p>And some more placeholder definition text.</p>
                </dd>

                <dt class="col-sm-3">Another term</dt>
                <dd class="col-sm-9">This definition is short, so no extra paragraphs or anything.</dd>

                <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
                <dd class="col-sm-9">This can be useful when space is tight. Adds an ellipsis at the end.</dd>

                <dt class="col-sm-3">Nesting</dt>
                <dd class="col-sm-9">
                    <dl class="row">
                        <dt class="col-sm-4">Nested definition list</dt>
                        <dd class="col-sm-8">I heard you like definition lists. Let me put a definition list inside your
                            definition
                            list.</dd>
                    </dl>
                </dd>
            </dl>
        </div>
    </div>
    <table class="table table-responsive table-hover table-striped caption-top">
        <caption>Test tabel</caption>
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
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
                            <a class="btn btn-info" href="{{ route('visitors.show', $visitor->id) }}">Lihat</a>
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
        <tfoot>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Action</th>
            </tr>
        </tfoot>
    </table>
    <div class="row mt-4">
        {{ $visitors->links() }}
    </div>
@endsection
