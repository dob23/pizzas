<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Order $order)
    {
        // Cliente solo puede ver sus propios pedidos
        if ($user->hasRole('cliente')) {
            return $order->client_id === $user->client->id;
        }
        
        // Empleados pueden ver pedidos de su sucursal
        if ($user->hasRole('empleado')) {
            return $order->branch_id === $user->employee->branch_id;
        }
        
        // Admin puede ver todo
        return $user->hasRole('administrador');
    }

    public function update(User $user, Order $order)
    {
        // Solo admin o empleados de la misma sucursal pueden modificar
        return $user->hasRole('administrador') || 
               ($user->hasRole('empleado') && $order->branch_id === $user->employee->branch_id);
    }
}
