<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactInfoModel extends Model
{
    protected $table            = 'contact_info';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'officeName', 'address', 'city', 'province', 'postalCode', 
        'phone', 'email', 'weekdayHours', 'weekendHours', 
        'latitude', 'longitude', 'facebook', 'twitter', 'instagram', 'linkedin'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';
}
