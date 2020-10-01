<?php

use App\Models\Cart;

function cart()
{
    return Cart::getFromSession();
}
