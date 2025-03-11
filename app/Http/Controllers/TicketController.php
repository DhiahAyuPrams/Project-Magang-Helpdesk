<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TicketNote;
use App\Models\TicketSeeder;
use Illuminate\Http\Request;
use App\Events\MessageCreate;
use App\Models\TicketAttachment; 
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index (){
        $listTicket = TicketSeeder::all();
        $agents = User::whereIn('id', $listTicket->pluck('agent'))->get()->keyBy('id');
        // dd($agent);
        return view('ticketlist', compact('listTicket', 'agents'));
    }
    public function tambahticket (Request $request) {
        // dd($request->all());
        TicketSeeder::create([
           'nama'=> $request->nama,
           'aplikasi'=> $request->aplikasi,
           'subjek'=> $request->subjek,
           'deskripsi'=> $request->deskripsi,
           'prioritas'=> $request->prioritas,
           'status' => 'open',
        ]);

        return redirect('ticket-list');
    }

    public function detail($id)
    {
        $ticket = TicketSeeder::with('notes.user', 'attachments')->findOrFail($id);
        $timITUsers = User::where('role', 'Tim IT')->get();

        // Ambil nama agent dari tabel users
        $agent = User::find($ticket->agent); 

        // Panggil status tiket
        $status = $ticket->status;

        return view('ticketdetail', compact('ticket', 'status', 'timITUsers', 'agent'));
    }

    public function detailtimit($id)
    {
        $ticket = TicketSeeder::with('notes.user', 'attachments')->findOrFail($id);
        
        // Panggil status tiket
        $status = $ticket->status;
        // dd($status);

        return view('ticketdetailtimit', compact('ticket', 'status'));
    }




    public function update(Request $request, $id)
{
    $ticket = TicketSeeder::findOrFail($id);

    // Trim status untuk menghindari spasi tersembunyi
    $ticket->status = trim($request->status);

    // Simpan agent (jika ada)
    if ($request->has('timIT')) {
        $ticket->agent = $request->timIT;
    }

    // Jika prioritas masih null, baru diupdate
    if (is_null($ticket->prioritas)) {
        $ticket->prioritas = $request->prioritas;
    }

    // Simpan perubahan ke database
    $ticket->save();
    // dd($tiket);
    return redirect()->back()->with('success', 'Ticket status updated successfully.');
}


    //USER
    public function store(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'subjek' => 'required|string',
        'aplikasi' => 'required|string',
        'deskripsi' => 'required|string',
    ]);

    // Simpan tiket baru
    $ticket = TicketSeeder::create([
        'nama' => $request->nama,
        'subjek' => $validatedData['subjek'],
        'aplikasi' => $validatedData['aplikasi'],
        'deskripsi' => $validatedData['deskripsi'],
    ]);

    // Simpan lampiran jika ada
    if ($request->hasFile('attachments')) {
        foreach ($request->file('attachments') as $file) {
            // Menyimpan file ke folder 'attachments' dalam storage/public
            $path = $file->store('attachments', 'public');

            // Menyimpan path file di tabel lampiran
            TicketAttachment::create([
                'ticket_id' => $ticket->id,
                'file_path' => $path,
            ]);
        }
    }

    if (Auth::user()->role == 'Pimpinan') {
        return redirect('ticket-list')->with('success', 'Ticket created successfully with attachments!');
    }

    return redirect('dashboard-user')->with('success', 'Ticket created successfully with attachments!');
}

    public function storeNote(Request $request, $ticketId)
    {
        $request->validate([
            'note' => 'required|string|max:5000',
        ]);

        TicketNote::create([
            'ticket_id' => $ticketId,
            'user_id' => auth()->id(),
            'note' => $request->note,
        ]);

        return redirect()->back()->with('success', 'Catatan berhasil ditambahkan.');
    }

    public function saveFeedback(Request $request, $id)
    {
        $ticket = TicketSeeder::findOrFail($id);

        // Simpan feedback dan rating
        $ticket->feedback = $request->feedback;
        $ticket->rating = $request->rating;
        $ticket->save();

        return redirect()->back()->with('success', 'Feedback berhasil dikirim.');
    }


}
