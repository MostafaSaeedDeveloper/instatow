<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SuperDispatchController extends Controller
{
    public function check_price(Request $request) {
        $api = env('SUPERDISPATCH_PRICING_API_KEY');

         $lead = Lead::findOrFail($request->lead_id);
        // $from_zip = "90001";
        // $to_zip = "10001";
        $from_zip = $lead->from_zip;
        $to_zip = $lead->to_zip;

           $data = [
            "pickup" => [
                "zip" => $from_zip
            ],
            "delivery" => [
                "zip" => $to_zip
            ],
            "trailer_type" => "open",
            "vehicles" => [
                [
                    "type" => "sedan",
                    "is_inoperable" => false,
                    "make" => "Ford",
                    "model" => "Fusion",
                    "year" => "2021"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'x-api-key' => $api,
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
        ])->post('https://pricing-insights.superdispatch.com/api/v1/recommended-price', $data);

    if ($response->successful()) {
        return response()->json([
            'recommended_price' => $response['data']['price']
        ]);
    }

    return response()->json([
    'recommended_price' => null,
    'error' => 'Error: Please check destinations'
], 422);

    }

    public function api() {
    $clientId = env('SUPERDISPATCH_CLIENT_ID');
    $clientSecret = env('SUPERDISPATCH_CLIENT_SECRET');

    $response = Http::withBasicAuth($clientId, $clientSecret)
        ->asForm()
        ->post('https://api.shipper.superdispatch.com/oauth/token', [
            'grant_type' => 'client_credentials',
        ]);

    if (!$response->successful()) {
        return response()->json([
            'error' => 'Token request failed',
            'details' => $response->json(),
        ], $response->status());
    }

    $accessToken = $response['access_token'];



$data = [
    "number" => "ORDER-4532",
    "inspection_type" => "standard",
    "purchase_order_number" => "PO 0006",
    "dispatcher_name" => "Sherry Turner",
    "sales_representative" => "Alma Dubois",
    "price" => 325,
    "broker_fee" => 50,
    "instructions" => "string",
    "loadboard_instructions" => "string",
    "payment" => [
        "method" => "other",
        "terms" => "other",
        "notes" => "The company (broker, dealer, auction, rental company, etc.) that originated this dispatch sheet.",
        "amount" => 550,
        "reference_number" => "YWO-0293",
        "sent_date" => "2019-11-19T10:33:29.112+0000"
    ],
    "customer_payment" => [
        "tariff" => 3,
        "deposit" => 140,
        "amount" => 100,
        "terms" => "2_days",
        "notes" => "The company (broker, dealer, auction, rental company, etc.) that originated this dispatch sheet.",
        "method" => "cash",
        "reference_number" => "string",
        "received_date" => "2019-11-19T10:33:29.112+0000"
    ],
    "invoice" => [
        "adjusted_invoice_date" => "2019-11-19T10:33:29.112+0000",
        "date" => null,
        "number" => null,
        "sent_date" => null
    ],
    "pickup" => [
        "first_available_pickup_date" => "2019-11-20T10:33:29.112+0000",
        "scheduled_at" => "2019-11-20T10:33:29.112+0000",
        "scheduled_ends_at" => "2019-11-22T10:33:29.112+0000",
        "scheduled_at_by_customer" => "2019-11-20T10:33:29.112+0000",
        "scheduled_ends_at_by_customer" => "2019-11-20T10:33:29.112+0000",
        "notes" => "string",
        "date_type" => "estimated",
        "save_as_new" => null,
        "save_as_new_contact" => null,
        "venue" => [
            "address" => "8 Philmont Dr.",
            "city" => "Memphis",
            "state" => "TN",
            "zip" => 38106,
            "name" => "First Rate Choice",
            "business_type" => "DEALER",
            "contact_name" => "Mary Johnson",
            "contact_title" => "Billing",
            "contact_email" => null,
            "contact_phone" => "202-555-0147",
            "contact_mobile_phone" => "202-555-0148"
        ]
    ],
    "delivery" => [
        "scheduled_at" => "2019-11-20T10:33:29.112+0000",
        "scheduled_ends_at" => "2019-11-22T10:33:29.112+0000",
        "scheduled_at_by_customer" => "2019-11-20T10:33:29.112+0000",
        "scheduled_ends_at_by_customer" => "2019-11-20T10:33:29.112+0000",
        "notes" => "string",
        "date_type" => "estimated",
        "save_as_new" => null,
        "save_as_new_contact" => null,
        "venue" => [
            "address" => "8 Philmont Dr.",
            "city" => "Memphis",
            "state" => "TN",
            "zip" => 38106,
            "name" => "First Rate Choice",
            "business_type" => "DEALER",
            "contact_name" => "Mary Johnson",
            "contact_title" => "Billing",
            "contact_email" => null,
            "contact_phone" => "202-555-0147",
            "contact_mobile_phone" => "202-555-0148"
        ]
    ],
    "customer" => [
        "address" => "8 Philmont Dr.",
        "city" => "Memphis",
        "state" => "TN",
        "zip" => 38106,
        "name" => "First Rate Choice",
        "business_type" => "DEALER",
        "email" => "user@example.com",
        "notes" => "Test note",
        "phone" => "202-555-0173",
        "save_as_new" => true,
        "contact_name" => "Alan Parrish",
        "contact_title" => "Billing",
        "contact_phone" => "202-555-0173",
        "contact_mobile_phone" => "202-555-0174",
        "contact_email" => "frchoice@gmail.com",
        "counterparty_contact_guid" => "701f461d-1328-4a7b-a753-410dad35dba6",
        "save_as_new_contact" => true
    ],
    "vehicles" => [
        [
            "status" => "new",
            "vin" => "1G8AL52F03Z157046",
            "year" => 2012,
            "make" => "BMW",
            "model" => "X6",
            "color" => "string",
            "curb_weight" => 2729,
            "curb_weight_unit" => "lbs",
            "inspection_type" => "standard",
            "is_modified" => true,
            "is_inoperable" => false,
            "lot_number" => "string",
            "price" => 60,
            "tariff" => 3,
            "type" => "sedan"
        ]
    ],
    "transport_type" => "OPEN",
    "tags" => ["new", "old"]
];




           $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
        ])->get('https://api.shipper.superdispatch.com/v1/public/orders/ef49d16c-fe90-4bb9-b7ed-bcf6070e71dd');

        dd($response['data']['object']);

    }
}
