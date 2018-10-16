<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;



class ProductNotBelongToCurrentUser extends Exception
{

    public  function  render()
    {
        return ['error'=>'this product not belong to this user'];
    }
    //
}
