@extends('layouts.app')

@section('title', 'Entry')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Entry Form</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('home.entry') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="regional" class="form-label">Regional</label>
                        <select class="form-control" id="regional" name="regional" required>
                            <option value="">Pilih Regional</option>
                            @foreach ($regionals as $regional)
                                <option value="{{ $regional }}">{{ $regional }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_kantor" class="form-label">Nama Kantor</label>
                        <select class="form-control" id="nama_kantor" name="nama_kantor_id" required>
                            <option value="">Pilih Nama Kantor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kantor" class="form-label">Jenis Kantor</label>
                        <input type="text" class="form-control" id="jenis_kantor" name="jenis_kantor" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="pso_non_pso" class="form-label">PSO/Non-PSO</label>
                        <input type="text" class="form-control" id="pso_non_pso" name="pso_non_pso" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kcu" class="form-label">KCU</label>
                        <input type="text" class="form-control" id="kcu" name="kcu_kc" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kc" class="form-label">KC</label>
                        <input type="text" class="form-control" id="kc" name="kcu_kc" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_nde" class="form-label">Nomor NDE</label>
                        <input type="text" class="form-control" id="nomor_nde" name="nomor_nde" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_nde" class="form-label">Tanggal NDE</label>
                        <input type="date" class="form-control" id="tanggal_nde" name="tanggal_nde" required>
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal" required>
                    </div>
                    <div class="mb-3">
                        <label for="pejabat_pengirim_nde" class="form-label">Pejabat Pengirim NDE</label>
                        <input type="text" class="form-control" id="pejabat_pengirim_nde" name="pejabat_pengirim_nde" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_pengajuan" class="form-label">Jenis Pengajuan</label>
                        <input type="text" class="form-control" id="jenis_pengajuan" name="jenis_pengajuan" required>
                    </div>
                    <div class="mb-3">
                        <label for="biaya_yang_diajukan" class="form-label">Biaya yang Diajukan</label>
                        <input type="text" class="form-control" id="biaya_yang_diajukan" name="biaya_yang_diajukan" required>
                    </div>
                    <div class="mb-3">
                        <label for="masa_sewa" class="form-label">Masa Sewa</label>
                        <input type="text" class="form-control" id="masa_sewa" name="masa_sewa" required>
                    </div>
                    <div class="mb-3">
                        <label for="tmt" class="form-label">TMT</label>
                        <input type="date" class="form-control" id="tmt" name="tmt" required>
                    </div>
                    
                    <div class="mb-3 mt-3">
                        <label for="sd" class="form-label">SD</label>
                        <input type="date" class="form-control" id="sd" name="sd" required>
                        <div class="mb-3">
                        <label for="kinerja_2021" class="form-label mt-3">Kinerja 2021</label>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2021_kurlog" name="kinerja_2021_kurlog" placeholder="Kurlog" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2021_jaskug" name="kinerja_2021_jaskug" placeholder="Jaskug" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2021_ritel" name="kinerja_2021_ritel" placeholder="Ritel" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2021_biaya" name="kinerja_2021_biaya" placeholder="Biaya" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="kinerja_2021_total" name="kinerja_2021_total" placeholder="Total" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="kinerja_2022" class="form-label">Kinerja 2022</label>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2022_kurlog" name="kinerja_2022_kurlog" placeholder="Kurlog" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2022_jaskug" name="kinerja_2022_jaskug" placeholder="Jaskug" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2022_ritel" name="kinerja_2022_ritel" placeholder="Ritel" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2022_biaya" name="kinerja_2022_biaya" placeholder="Biaya" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="kinerja_2022_total" name="kinerja_2022_total" placeholder="Total" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="kinerja_2023" class="form-label">Kinerja 2023</label>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2023_kurlog" name="kinerja_2023_kurlog" placeholder="Kurlog" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2023_jaskug" name="kinerja_2023_jaskug" placeholder="Jaskug" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2023_ritel" name="kinerja_2023_ritel" placeholder="Ritel" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="kinerja_2023_biaya" name="kinerja_2023_biaya" placeholder="Biaya" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="kinerja_2023_total" name="kinerja_2023_total" placeholder="Total" readonly>
                    </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#regional').change(function() {
            var regional = $(this).val();
            if (regional) {
                $.ajax({
                    url: '/home/get-kantor-by-regional/' + regional,
                    type: 'GET',
                    success: function(data) {
                        $('#nama_kantor').empty().append('<option value="">Pilih Nama Kantor</option>');
                        $.each(data, function(index, value) {
                            $('#nama_kantor').append('<option value="'+ value.nama_kantor + ' - ' + value.id_kantor +'">'+ value.nama_kantor + ' - ' + value.id_kantor +'</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: ", status, error);
                    }
                });
            } else {
                $('#nama_kantor').empty().append('<option value="">Pilih Nama Kantor</option>');
            }
        });

        $('#nama_kantor').change(function() {
            var nama_kantor_id = $(this).val();
            if (nama_kantor_id) {
                var nama_kantor = nama_kantor_id.split(' - ')[0];
                $.ajax({
                    url: '/home/get-kantor-details/' + nama_kantor,
                    type: 'GET',
                    success: function(data) {
                        $('#jenis_kantor').val(data.jenis_kantor);
                        $('#pso_non_pso').val(data.pso_non_pso);
                        $('#kcu').val(data.kcu);
                        $('#kc').val(data.kc);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: ", status, error);
                    }
                });
            }
        });
        

        function calculateKinerja(year) {
            var kurlog = ($(`#kinerja_${year}_kurlog`).val()) || 0;
            var jaskug = ($(`#kinerja_${year}_jaskug`).val()) || 0;
            var ritel = ($(`#kinerja_${year}_ritel`).val()) || 0;
            var biaya = ($(`#kinerja_${year}_biaya`).val()) || 0;

            var kurlogResult = kurlog * 0.2;
            var jaskugResult = jaskug * 0.6;
            var ritelResult = ritel * 0.2;

            var total = kurlogResult + jaskugResult + ritelResult - biaya;
            $(`#kinerja_${year}_total`).val(total);
        }

        $('#kinerja_2021_kurlog, #kinerja_2021_jaskug, #kinerja_2021_ritel, #kinerja_2021_biaya').on('input', function() {
            calculateKinerja(2021);
        });

        $('#kinerja_2022_kurlog, #kinerja_2022_jaskug, #kinerja_2022_ritel, #kinerja_2022_biaya').on('input', function() {
            calculateKinerja(2022);
        });

        $('#kinerja_2023_kurlog, #kinerja_2023_jaskug, #kinerja_2023_ritel, #kinerja_2023_biaya').on('input', function() {
            calculateKinerja(2023);
        });
    });
</script>
@endsection