<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketNote extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id', 'user_id', 'note'];

    public function ticket()
    {
        return $this->belongsTo(TicketSeeder::class, 'ticket_id'); // Sesuaikan dengan model TicketSeeder
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
