<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Apicustomer;
use App\Http\Resources\Ftpapi;
use App\Http\Controllers\PowerCloudRest;
   
class ApiController extends BaseController
{
    
    public function index()
    {
    }
    
    public function store(Request $request)
    {
        $pc = new PowerCloudRest();
        $input = $request->all();
        $validator = Validator::make($input, [
            'surname' => 'required',
            'firstName' => 'required',
            'business' => 'required',
            'client_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Refused from FTP', $validator->errors());       
        }
        
        // Send the data to Powercloud
        $powercloud_response = $pc->createOrder($input);
        // Check the success status and send response back
        $success  = !(isset($powercloud_response['success'])) || $powercloud_response['success'] != true ? false : true; 
        if ($success){
            return $this->sendResponse(new Ftpapi($powercloud_response), 'Order created.',200);
        }
        else{
             return $this->sendError('Refused from Powercloud', new Ftpapi($powercloud_response), 400);
        }
        
    }
   
    public function show($id)
    {

    }
    
    public function update(Request $request, Apicustomer $blog)
    {
    }
   
    public function destroy(Apicustomer $apicustomer)
    {

    }
}