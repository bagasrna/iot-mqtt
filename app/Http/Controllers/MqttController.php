<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Support\Facades\Validator;

class MqttController extends Controller
{
    public function publish(Request $request)
    {
        $rules = [ 
            'room' => 'required|string',
            'type' => 'required|string|in:LOCK,UNLOCK',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        $mqttData = [
            'data' => $request->type,
        ];

        $mqttMessage = json_encode($mqttData);

        MQTT::publish($request->room, $mqttMessage);

        return response()->json([
            'status' => 'success',
            'data' => [
                'room' => $request->room,
                'type' => $request->type
            ]
        ]);
    }
}
