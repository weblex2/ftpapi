<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Apicustomer;
use App\Http\Resources\Ftpapi;
   
class ApiController extends BaseController
{
    
    public function index()
    {
        $apicustomer = Apicustomer::all();
        return $this->sendResponse(Apicustomer::collection($apicustomer), 'Posts fetched.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'client_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $data['json'] = json_encode($input);
        $data['client_id'] = $input['client_id'];
        $res = Apicustomer::create($data);
        return $this->sendResponse(new Ftpapi($res), 'Customer created.');
        
    }
   
    public function show($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new ApicustomerResource($blog), 'Post fetched.');
    }
    
    public function update(Request $request, Aapicustomer $blog)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $blog->title = $input['title'];
        $blog->description = $input['description'];
        $apicustomer->save();
        
        return $this->sendResponse(new ApicustomerResource($blog), 'Post updated.');
    }
   
    public function destroy(Aapicustomer $apicustomer)
    {
        $apicustomer->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}