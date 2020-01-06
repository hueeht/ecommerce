<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
    const Waiting =   "Waiting";
    const Shipping =   "Shipping";
    const Shipped = "Shipped";
    const Canceled = "Canceled";
    const Approved = "Approved";
    const Denied = "Denied";
}
