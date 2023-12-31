<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
    	'description', 
    	'specialty_id',
    	'doctor_id',
    	'patient_id',
    	'scheduled_date',
    	'scheduled_time',
    	'type'
    ];


	//N $appointment-> specialty 1
	public function specialty(){
		return $this->belongsTo(Specialty::class);
	}

	// N$appointment->doctor 1
	public function doctor()
	{
		return $this->belongsTo(User::class);
	}

	// N $appointment->patient 1
	public function patient()
	{
		return $this->belongsTo(User::class);
	}

	// 1 -1
	// citas medicas -> cancelacion->justificacion
	public function cancellation()
	{
    return $this->hasOne(CancelledAppointment::class);
	}

	//acceso
	//appointments-> scheluded_time_12
	public function getScheduledTime12Attribute()
	{
	         return (new Carbon($this->scheduled_time))
			        ->format('g:i A');

	}



}
