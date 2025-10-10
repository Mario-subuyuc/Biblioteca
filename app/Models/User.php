<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Reader;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'gender',
        'two_factor_code',
        'two_factor_expires_at',
    ];

    // Para SoftDeletes
    protected $dates = [
        'deleted_at', // para SoftDelete
    ];

    // Relación con lectores de 1a1
    public function reader()
    {
        return $this->hasOne(Reader::class);
    }

    // Relación con directivos de 1a1
    public function directive()
    {
        return $this->hasOne(Directive::class);
    }

    // Relación con material de 1a1
    public function materials()
    {
        return $this->hasMany(Material::class, 'user_id');
    }

    // Relación con visitantes de 1 a muchos
    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

    // Relación con eventos de muchos a muchos
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user')->withTimestamps();
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function regenerateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();
    }

    public function clearTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }
}
