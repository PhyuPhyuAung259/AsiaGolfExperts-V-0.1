<?php
namespace Themes\Findhouse\Property\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Themes\Findhouse\Property\Models\Property;
use Themes\Findhouse\Property\Models\PropertyDate;

class AvailabilityController extends \Themes\Findhouse\Property\Controllers\AvailabilityController
{
    protected $propertyClass;
    /**
     * @var PropertyDate
     */
    protected $propertyDateClass;
    protected $indexView = 'Property::admin.availability';

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/property');
        $this->middleware('dashboard');
    }

}
