<?php

namespace App\Models;

use CodeIgniter\Model;

class IndividualMemberModel extends Model
{
    protected $table            = 'individual_members';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['employeeNumber', 'name', 'affiliation', 'studyProgram', 'role', 'province', 'validityPeriod'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';
}
