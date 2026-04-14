<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardMemberModel extends Model
{
    protected $table            = 'board_members';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'position', 'department', 'period', 'image', 'description', 'order'];

    // Dates
    protected $useTimestamps = false;
}
