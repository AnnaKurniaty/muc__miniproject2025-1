<?php

namespace App\Models\activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimesheetModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql'; // assuming activity db
    protected $table = 'timesheet';

    protected $fillable = [
        'employees_id',
        'serviceused_id',
        'date',
        'timestart',
        'timefinish',
        'description',
    ];

    public function serviceused()
    {
        return $this->belongsTo(\App\Models\marketing\ServiceusedModel::class, 'serviceused_id');
    }

    public function employee()
    {
        return $this->belongsTo(\App\Models\hrd\EmployeesModel::class, 'employees_id');
    }
}
