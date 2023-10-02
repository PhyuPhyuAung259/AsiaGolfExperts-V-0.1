<?php
namespace Themes\Golf\Golf\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Modules\Booking\Models\Booking;
use Themes\Golf\Golf\Models\Golf;
use Themes\Golf\Golf\Models\GolfDate;

class AvailabilityController extends \Themes\Golf\Golf\Controllers\AvailabilityController
{
    protected $golfClass;
    protected $golfDateClass;
    protected $bookingClass;
    protected $indexView = 'Golf::admin.availability';

    public function __construct(Golf $golfClass, GolfDate $golfDateClass,Booking $bookingClass)
    {
        $this->setActiveMenu(route('golf.admin.index'));
        $this->middleware('dashboard');
        $this->golfDateClass = $golfDateClass;
        $this->bookingClass = $bookingClass;
        $this->golfClass = $golfClass;
    }



}
