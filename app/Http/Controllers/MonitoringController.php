<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Exports\MonitoringExport;
use App\Models\Histori;
use Maatwebsite\Excel\Facades\Excel;

class MonitoringController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil nilai filter dari request
        $month = $request->input('month');
        $year = $request->input('year');
        $regional = $request->input('regional');
        $status = $request->input('status');

        // Query dasar
        $query = Entry::query();

        // Menambahkan kondisi filter jika ada
        if ($month) {
            $query->whereMonth('tmt', $month);
        }
        if ($year) {
            $query->whereYear('tmt', $year);
        }
        if ($regional) {
            $query->where('regional', 'like', '%' . $regional . '%');
        }
        if ($status) {
            $query->where('status', $status);
        }

        // Mengambil data yang sudah difilter
        $data = $query->get();

        // Mengirim data ke view monitoring
        return view('backend.home.monitoring', ['data' => $data]);
    }

    public function export(Request $request)
    {
        // Get the filtered data for export
        $month = $request->input('month');
        $year = $request->input('year');
        $regional = $request->input('regional');
        $status = $request->input('status');

        return Excel::download(new MonitoringExport($month, $year, $regional, $status), 'monitoring.xlsx');
    }

    public function delete(Request $request)
    {
        $selectedIds = $request->input('selected');
        $reason = $request->input('reason'); // Alasan penghapusan dari modal

        if ($selectedIds) {
            // Ambil data yang akan dihapus
            $entries = Entry::whereIn('id', $selectedIds)->get();

            // Simpan ke histori sebelum menghapus
            foreach ($entries as $entry) {
                Histori::create([
                    'id_kantor' => $entry->id_kantor,
                    'nama_kantor' => $entry->nama_kantor,
                    'jenis_kantor' => $entry->jenis_kantor,
                    'pso_non_pso' => $entry->pso_non_pso,
                    'kcu_kc' => $entry->kcu_kc,
                    'nomor_nde' => $entry->nomor_nde,
                    'tanggal_nde' => $entry->tanggal_nde,
                    'pejabat_pengirim_nde' => $entry->pejabat_pengirim_nde,
                    'regional' => $entry->regional,
                    'jenis_pengajuan' => $entry->jenis_pengajuan,
                    'biaya_yang_diajukan' => $entry->biaya_yang_diajukan,
                    'masa_sewa' => $entry->masa_sewa,
                    'tmt' => $entry->tmt,
                    'sd' => $entry->sd,
                    'kinerja_2021' => $entry->kinerja_2021,
                    'kinerja_2022' => $entry->kinerja_2022,
                    'kinerja_2023' => $entry->kinerja_2023,
                    'tanggal_submit_surat' => $entry->tanggal_submit_surat,
                    'perihal' => $entry->perihal,
                    'keterangan' => $entry->keterangan,
                    'status' => $entry->status,
                    'tanggal_edit' => $entry->tanggal_edit,
                    'action_type' => 'delete',
                    'AlasanPenghapusan' => $reason // Tambahkan alasan
                ]);
            }

            // Hapus data
            Entry::whereIn('id', $selectedIds)->delete();

            return redirect()->route('home.monitoring')->with('success', 'Data berhasil dihapus.');
        }
        return redirect()->route('home.monitoring')->with('error', 'Tidak ada data yang dipilih.');
    }

}