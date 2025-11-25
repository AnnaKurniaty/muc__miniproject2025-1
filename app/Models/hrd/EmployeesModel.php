<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql_hrd';
    protected $table = 'employees'; // sesuaikan dengan nama table di DB
    
    protected $fillable = [
        'fullname',
        'status',
    ];

    public function timesheets()
    {
        return $this->hasMany(\App\Models\activity\TimesheetModel::class, 'employees_id');
    }
}