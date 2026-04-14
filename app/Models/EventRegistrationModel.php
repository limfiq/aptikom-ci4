<?php

namespace App\Models;

use CodeIgniter\Model;

class EventRegistrationModel extends Model
{
    protected $table            = 'event_registrations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'event_id', 'full_name', 'institution', 'email',
        'phone', 'study_program', 'role', 'notes', 'status',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'registered_at';
    protected $updatedField  = 'updatedAt';

    /**
     * Cek apakah email sudah terdaftar untuk event ini.
     */
    public function alreadyRegistered(int $eventId, string $email): bool
    {
        return $this->where('event_id', $eventId)
                    ->where('email', $email)
                    ->where('status !=', 'cancelled')
                    ->countAllResults() > 0;
    }
}
