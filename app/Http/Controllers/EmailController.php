<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\EmailList;
use App\Models\EmialConfig;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:email-list|email-send|sent-email|email-delete', ['only' => ['index', 'show']]);
        //  $this->middleware('permission:product-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $emails = Email::with('emailList')->latest()->paginate(5);
        // return $emails;
        return view('products.index', compact('emails'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('products.create');
    }


    public function save(Request $request)
    {
        request()->validate([
            'email' => 'required',
        ]);

        Email::create($request->all());

        return Redirect()->route('email.index');
    }


    public function delete($id)
    {
        Email::find($id)->delete();
        return Redirect()->route('email.index');
    }
    public function send()
    {
        return view('products.sendEmail');
    }
    public function sendEmail(Request $request)
    {
        try {
            $mails = Email::where('list_id','=',$request->list)->get();
            foreach($mails as $mail){
                $details = [
                    'title' => $mail->name,
                    'body' => $request->content
                ];
                Mail::to($mail)->send(new \App\Mail\MyTestMail($details));
            }
        } catch (\Exception $e) {
            Log::error(__FUNCTION__ . "->" . __CLASS__ . " | Execution: " . $e->getMessage());
            return redirect()->back()->with('message', $e->getMessage());
        }
       
        return Redirect()->back()->with('alert-success','mail sent');
    }
    public function settings()
    {
        return view('settings.edit');
    }
    public function settingStore(Request $request)
    {
        $model = new EmialConfig();
        if ($request->id != null) {
            $model = EmialConfig::find($request->id);
        }
        $model->driver = $request->driver;
        $model->host =  $request->host;
        $model->port = $request->port;
        $model->encryption = $request->encryption;
        $model->username = $request->username;
        $model->password = $request->password;
        $model->save();
        return Redirect()->back();
    }
}
