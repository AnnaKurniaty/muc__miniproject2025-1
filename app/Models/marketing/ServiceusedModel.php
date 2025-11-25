<?php

namespace App\Models\marketing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceusedModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql_marketing';
    protected $table = 'serviceused';

    protected $fillable = [
        'proposal_id',
        'service_name',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function proposal()
    {
        return $this->belongsTo(ProposalModel::class, 'proposal_id');
    }

    public function timesheets()
    {
        return $this->hasMany(\App\Models\activity\TimesheetModel::class, 'serviceused_id');
    }

    public function getTimespentAttribute()
    {
        $totalMinutes = $this->timesheets->sum(function ($timesheet) {
            $start = strtotime($timesheet->timestart);
            $end = strtotime($timesheet->timefinish);
            return ($end - $start) / 60; // minutes
        });
        $hours = floor($totalMinutes / 60);
        $minutes = $totalMinutes % 60;
        return sprintf('%02d:%02d', $hours, $minutes);
    }
}
