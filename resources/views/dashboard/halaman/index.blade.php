{{-- berfungsi untuk memanggil template yang ada di index bagian dashboard --}}
@extends('dashboard.index')

{{-- @section berfungsi untuk memanggil penanda di index bagian dashboard --}}
@section('konten')
    <p class="card-title">Halaman</p>
    <div class="pb3"><a href="{{ route('halaman.create') }} " class="btn btn-primary">+ Tambah Halaman</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Judul</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }} </td>
                        <td>{{ $item->judul }} </td>
                        <td>
                            <a href="{{ route('halaman.edit', $item->id) }} " class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Apakah yakin ingin menghapus!!!')"
                                action="{{ route('halaman.destroy', $item->id) }} " class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
