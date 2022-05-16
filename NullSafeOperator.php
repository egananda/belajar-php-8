<?php


class Address
{
    public ?string $country;
}



class User
{
    public ?Address $address;
}


function getCountry(?User $user)
{
    // if ($user != null) {
    //     if ($user->address != null) {
    //         return $user->address->country;
    //     }
    // }

    // return null;


    return $user?->address?->country;
}


getCountry(null);
