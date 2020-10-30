<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use App\Client;
 
class MailController extends Controller
{
    public function sendBuilding(Request $request)
    {
    	$name 	= $request->name;
    	$email 	= $request->email;

    	if(empty($name) || empty($email)){
    		return response()->json(['message' => 'Error, existen datos vacios que son requeridos.','statusType' => 'warning' , 'status' => 400], 200);
    	}

    	$client = Client::where('email',$email)->get();

    	if($client->count() > 0){
    		return response()->json(['message' => 'Error, el correo ya se encuentra registrado.','statusType' => 'warning' , 'status' => 400], 200);
    	}

        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'TradeGO';
        $objDemo->receiver = $request->name;
 
        Mail::to($request->email)
        	->cc('hablemos@tradego.co')
        	->send(new DemoEmail($objDemo));

        if( count(Mail::failures()) > 0 ) {
        	return response()->json(['message' => 'Error al enviar el correo, intentelo de nuevo más tarde.','statusType' => 'negative' , 'status' => 400], 200);
        }else{
        	$newClient = new Client;
        	$newClient->name 	= $name;
        	$newClient->email 	= $email;
        	$newClient->statue 	= 1;
        	$newClient->save();
        	return response()->json(['message' => 'Binvenido ','statusType' => 'positive' , 'status' => 200], 200);
        }

    }
}