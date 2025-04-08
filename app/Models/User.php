<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'client_id'); 
    }

    
    public function cocinero()
    {
        return $this->hasOne(Cocinero::class, 'user_id');
    }

    
    use HasFactory, Notifiable;
    
    public const ROLE_ADMIN = 'administrador';
    public const ROLE_CAJERO = 'cajero';
    public const ROLE_COCINERO = 'cocinero';
    public const ROLE_MENSAJERO = 'mensajero';
    public const ROLE_CLIENTE = 'cliente';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
