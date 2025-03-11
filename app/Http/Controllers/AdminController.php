<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TicketSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function admin(){
        $openTicketsCount = TicketSeeder::where('status', 'open')->count();
        $pendingTicketsCount = TicketSeeder::where('status', 'pending')->count();
        $closedTicketsCount = TicketSeeder::where('status', 'closed')->count();
        $inprogressTicketsCount = TicketSeeder::where('status', 'in progress')->count();
        $solvedTicketsCount = TicketSeeder::where('status', 'solved')->count();
    
        // Ambil data aplikasi dan hitung jumlah tiket
        $applicationsData = TicketSeeder::selectRaw('aplikasi, COUNT(*) as count')
            ->groupBy('aplikasi')
            ->get();
    
        // Tentukan aplikasi yang ingin ditampilkan pada pie chart
        $applications = [
            'INSLOPE (Sistem Manajemen Lereng Jalan)',
            'SMD (Sistem Masukan Data)',
            'SIDAKO-POK'
        ];
    
        // Pastikan setiap aplikasi ada di data, jika tidak, set count ke 0
        foreach ($applications as $app) {
            $existingApp = $applicationsData->firstWhere('aplikasi', $app);
            if (!$existingApp) {
                // Push data dalam bentuk objek koleksi untuk konsistensi
                $applicationsData->push((object) ['aplikasi' => $app, 'count' => 0]);
            }
        }
    
        // Debug untuk memastikan data yang dikirim sudah sesuai
        // dd($applicationsData);
    
        // Mengirim data ke view
        return view('admindashboard', compact('openTicketsCount', 'pendingTicketsCount', 'closedTicketsCount', 'inprogressTicketsCount', 'solvedTicketsCount', 'applicationsData'));
    }
    

    function user(){
        $listTicket = TicketSeeder::where('nama', Auth::user()->name)->get();
        $agents = User::whereIn('id', $listTicket->pluck('agent'))->get()->keyBy('id');
        // dd($listTicket);
        return view('userdashboard', compact('listTicket', 'agents'));
    }

    public function agent() {
        // Ambil ID user yang sedang login
        $userId = Auth::id();
    
        // Ambil hanya tiket dengan status yang diperbolehkan dan agent yang sesuai
        $listTicket = TicketSeeder::whereIn('status', ['open', 'in progress', 'solved', 'closed'])
                            ->where('agent', $userId)
                            ->get();
        $agents = User::whereIn('id', $listTicket->pluck('agent'))->get()->keyBy('id');
    
        return view('userdashboard', compact('listTicket', 'agents'));
    }
    
    function supervisor(){
        $openTicketsCount = TicketSeeder::where('status', 'open')->count();
        $pendingTicketsCount = TicketSeeder::where('status', 'pending')->count();
        $closedTicketsCount = TicketSeeder::where('status', 'closed')->count();
        $inprogressTicketsCount = TicketSeeder::where('status', 'in progress')->count();
        $solvedTicketsCount = TicketSeeder::where('status', 'solved')->count();
    
        // Ambil data aplikasi dan hitung jumlah tiket
        $applicationsData = TicketSeeder::selectRaw('aplikasi, COUNT(*) as count')
            ->groupBy('aplikasi')
            ->get();
    
        // Tentukan aplikasi yang ingin ditampilkan pada pie chart
        $applications = [
            'INSLOPE (Sistem Manajemen Lereng Jalan)',
            'SMD (Sistem Masukan Data)',
            'SIDAKO-POK'
        ];
    
        // Pastikan setiap aplikasi ada di data, jika tidak, set count ke 0
        foreach ($applications as $app) {
            $existingApp = $applicationsData->firstWhere('aplikasi', $app);
            if (!$existingApp) {
                // Push data dalam bentuk objek koleksi untuk konsistensi
                $applicationsData->push((object) ['aplikasi' => $app, 'count' => 0]);
            }
        }
    
        // Debug untuk memastikan data yang dikirim sudah sesuai
        // dd($applicationsData);
    
        // Mengirim data ke view
        return view('admindashboard', compact('openTicketsCount', 'pendingTicketsCount', 'closedTicketsCount', 'inprogressTicketsCount', 'solvedTicketsCount', 'applicationsData'));
    }
}
