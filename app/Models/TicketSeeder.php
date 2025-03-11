<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TicketSeeder extends Model
{
    protected $table = "ticket";
    protected $primaryKey ="id";
    protected $fillable = ['id','nama', 'aplikasi', 'subjek', 'deskripsi', 'prioritas', 'agent','status'];

    public function notes()
    {
        return $this->hasMany(TicketNote::class, 'ticket_id', 'id'); // Tentukan kedua kolom
    }

    public function attachments()
    {
        return $this->hasMany(TicketAttachment::class, 'ticket_id');
    }

    

}
