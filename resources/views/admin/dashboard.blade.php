@extends('layouts.app')
@section('title', 'Dasbor Admin - Pengaduan Prasarana Sekolah')

@section('content')
    <div style="margin-bottom: 2rem;">
        <h1 style="margin-bottom: 0.5rem;">Dasbor Admin</h1>
        <p style="color: var(--text-muted);">Gambaran umum pengaduan yang masuk dari seluruh siswa.</p>
    </div>

    <div class="grid grid-cols-3" style="margin-bottom: 2rem;">
        <div class="card glass" style="border-left: 4px solid var(--status-pending);">
            <h3 style="color: var(--text-muted); font-size: 0.875rem; text-transform: uppercase;">Menunggu Validasi</h3>
            <p style="font-size: 2.5rem; font-weight: 800; color: var(--text);">{{ $pending }}</p>
        </div>
        <div class="card glass" style="border-left: 4px solid var(--status-processing);">
            <h3 style="color: var(--text-muted); font-size: 0.875rem; text-transform: uppercase;">Sedang Diproses</h3>
            <p style="font-size: 2.5rem; font-weight: 800; color: var(--text);">{{ $processing }}</p>
        </div>
        <div class="card glass" style="border-left: 4px solid var(--status-resolved);">
            <h3 style="color: var(--text-muted); font-size: 0.875rem; text-transform: uppercase;">Selesai Ditangani</h3>
            <p style="font-size: 2.5rem; font-weight: 800; color: var(--text);">{{ $resolved }}</p>
        </div>
    </div>

    <div class="card glass" style="padding: 1.5rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h2 style="font-size: 1.25rem; margin: 0;">Daftar Pengaduan Siswa</h2>
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.report') }}" target="_blank" class="btn btn-outline"
                    style="font-size: 0.875rem; padding: 0.5rem 1rem;">🖨️ Cetak Laporan</a>
            @endif
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelapor</th>
                        <th>Judul & Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($complaints as $c)
                        <tr>
                            <td style="font-weight: 600;">
                                #{{ str_pad($c->id, 4, '0', STR_PAD_LEFT) }}
                                <form action="{{ route('complaints.destroy', $c->id) }}" method="POST" style="display:inline-block; margin-left: 5px;">
                                    @csrf
                                    <button type="submit" class="btn" style="background: #E10600; color: #FFFFFF; font-size: 0.7rem; padding: 2px 6px; border: none; border-radius: 3px; cursor: pointer;" onclick="return confirm('Hapus pengaduan?')">Hapus</button>
                                </form>
                            </td>
                            <td>
                                {{ $c->user->name }}<br>
                                <small style="color: var(--text-muted);">NIS/NIK: {{ $c->user->nik }}</small>
                            </td>
                            <td style="max-width: 300px;">
                                <strong>{{ $c->title }}</strong><br>
                                <span style="font-size:0.875rem; color:var(--text-muted);">{{ Str::limit($c->description, 50) }}</span>
                            </td>
                            <td>
                                @if($c->photo)
                                    @php
                                        // Membersihkan path agar tidak dobel storage/
                                        $cleanPath = ltrim($c->photo, 'storage/');
                                    @endphp
                                    <a href="{{ asset('storage/' . $cleanPath) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $cleanPath) }}" alt="Bukti"
                                            style="width:70px; height:60px; object-fit:cover; border-radius:6px; border:1px solid var(--border); cursor:pointer;">
                                    </a>
                                @else
                                    <span style="color:var(--text-muted); font-size:0.8rem;">—</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $c->status }}">
                                    {{ $c->status == 'pending' ? 'Menunggu' : ($c->status == 'processing' ? 'Diproses' : 'Selesai') }}
                                </span>
                            </td>
                            <td>
                                <div style="display:flex; flex-direction:column; gap:0.5rem;">
                                    @foreach($c->responses as $resp)
                                        <div style="background: #f8f9fa; border-left: 3px solid var(--primary); padding: 0.4rem; font-size: 0.8rem; border-radius: 4px; display: flex; justify-content: space-between;">
                                            <span>{{ $resp->response }}</span>
                                            <form action="{{ route('responses.destroy', $resp->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" style="color:red; border:none; background:none; cursor:pointer;">x</button>
                                            </form>
                                        </div>
                                    @endforeach

                                    <div style="display:flex; gap:0.5rem;">
                                        @if($c->status != 'resolved')
                                            <form action="{{ route('responses.store') }}" method="POST" style="display:flex; gap:0.25rem; flex:1;">
                                                @csrf
                                                <input type="hidden" name="complaint_id" value="{{ $c->id }}">
                                                <input type="text" name="response" placeholder="Balas..." class="form-control" style="flex:1; font-size:0.8rem;" required>
                                                <button type="submit" class="btn btn-primary" style="padding:0.2rem 0.5rem;">OK</button>
                                            </form>
                                        @endif

                                        <form action="{{ route('complaints.updateStatus', $c->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control" style="width:auto; font-size:0.8rem;" onchange="this.form.submit()">
                                                <option value="pending" {{ $c->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="processing" {{ $c->status == 'processing' ? 'selected' : '' }}>Proses</option>
                                                <option value="resolved" {{ $c->status == 'resolved' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada pengaduan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection