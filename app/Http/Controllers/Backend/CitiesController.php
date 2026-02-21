<?php

namespace App\Http\Controllers\backend;

use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Sector;
use Session;
use Gate;

class CitiesController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        if (Gate::denies('list_cities')) {
            abort(403);
        }
        $data = City::orderBy('order_list','asc')->paginate(20);
        return view('backend.pages.cities.index', compact('data'));
    }

    public function create()
    {
        if (Gate::denies('create_cities')) {
            abort(403);
        }
        $sectors = Sector::pluck('name','id');
        return view('backend.pages.cities.create',compact('sectors'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('create_cities')) {
            abort(403);
        }
        City::create($request->all());
        ResponseCache::clear();
        Session::flash('msg',  trans('lang.success_created'));
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/cities');
    }

    public function edit($id)
    {
        if (Gate::denies('edit_cities')) {
            abort(403);
        }
        $data  = City::where('id', $id)->first();
        $sectors = Sector::pluck('name','id');
        return view('backend.pages.cities.edit', compact('data','sectors'));
    }

    public function update(Request $request, $id)
    {
        if (Gate::denies('edit_cities')) {
            abort(403);
        }
        City::find($id)->update($request->all());
        ResponseCache::clear();
        Session::flash('msg',  trans('lang.success_updated'));
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/cities');
    }



    public function status($id, $status)
    {
        if (Gate::denies('publish_cities')) {
            abort(403);
        }
        $user = City::find($id);
        $user->status = $status;
        $user->save();
        ResponseCache::clear();
        return back();
    }

    public function destroy($id)
    {
        if (Gate::denies('delete_cities')) {
            abort(403);
        }
        $user = City::find($id);
        $user->delete();
        ResponseCache::clear();
        Session::flash('msg', ' Deleted! ');
        Session::flash('alert', 'danger');
        return back();
    }

    public function order_list($id, $order)
    {
        if (Gate::denies('order_cities')) {
            abort(403);
        }
        $data = City::find($id);
        $data->order_list = $order;
        ResponseCache::clear();
        $data->save();
        return back();
    }
     public function createShipment()
    {
        $wsdl = "http://track.smsaexpress.com/secom/smsawebservice.asmx?WSDL";
        $soapAction = "http://track.smsaexpress.com/secom/addShip";

        // Define the parameters for the request
        $params = [
            'passKey' => '6&r73o23s7py',
            'refNo' => 'eyasweet1',
            'sentDate' => date('Y-m-d'),
            'idNo' => '4367434',
            'cName' => 'abdus',
            'cntry' => 'SA',
            'cCity' => 'Riyadh',
            'cZip' => '',
            'cPOBox' => '',
            'cMobile' => '0555545555',
            'cTel1' => '',
            'cTel2' => '',
            'cAddr1' => 'ain sga',
            'cAddr2' => '',
            'shipType' => 'F15E24',
            'PCs' => 1,
            'cEmail' => 'abdubakr48@gmail.com',
            'carrValue' => '',
            'carrCurr' => '',
            'codAmt' =>'50',
            'weight' => '1',
            'custVal' => '50',
            'custCurr' => '',
            'insrAmt' => '',
            'insrCurr' => '',
            'itemDesc' => 'description',
            'sName' => 'eyasweets',
            'sContact' => 'eyasweets',
            'sAddr1' => 'your_sAddr1',
            'sAddr2' => '',
            'sCity' => 'your_sCity',
            'sPhone' => '05555555555',
            'sCntry' => 'SA',
            'prefDelvDate' => '',
            'gpsPoints' => '',
        ];

            $options = [
            'trace' => 1,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
        ];

   $options = [
            'trace' => 1,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
        ];

        try {
            $client = new \SoapClient($wsdl, $options);
            \Log::info('SOAP Request:', $params);
            $response = $client->__soapCall("addShip", [$params]);
     $responseData = json_decode(json_encode($response), true);
        
        // Log response
        \Log::info('SOAP Response:', $responseData);
        return response()->json($response);
        } catch (\SoapFault $fault) {
            return response()->json(['error' => $fault->getMessage()]);
        }
    
    
    }
        public function showTest()
    {
 
        return view('backend.pages.cities.test');
    }
}
