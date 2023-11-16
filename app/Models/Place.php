<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Place extends Authenticatable
{
    use HasFactory;


    protected $guard = 'customers';

    protected $fillable = [
        'name',
        'long',
        'lat',
        'type',
        'filenames',
        'area',
        'email',
        'password',
        'safety',
        'access_token',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'password',
        'access_token'
    ];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['filenames'] = json_encode($value);
    }

    public function rating()
    {
      return $this->hasMany(Rating::class);
    }

    public function notify($message)
    {
        Http::withBasicAuth('AC1be547a9a931a0f595bc2df8c73d46b8', '1b01d86ce8270c2abcdf4515eed3c6a1')->asForm()->post('https://api.twilio.com/2010-04-01/Accounts/AC1be547a9a931a0f595bc2df8c73d46b8/Messages.json',[
            'To' => "whatsapp:+$this->phone_number",
            'From' => 'whatsapp:+14155238886',
            'Body' => "$message"
        ]);
    }
}
