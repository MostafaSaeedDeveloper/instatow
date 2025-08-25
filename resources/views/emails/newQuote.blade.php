<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vehicle Shipping Quote</title>
</head>
<body>
    <p>Hi {{ $quote->customer->first_name }},</p>

    <p>
        This is transportation company <strong>INSTATOW</strong>. Do you still need to ship your vehicle? If you have any shipping date in mind, we can check what we have for you.
    </p>

    <p><strong>Shipping details below:</strong></p>
    <ul>
        <li><strong>Total Price:</strong> ${{ number_format($quote->tariff, 2) }}</li>
        <li>Door to Door transport</li>
        <li>Gas, taxes, tolls, insurance ($100,000.00) included</li>
        <li>Loading and Unloading fees included</li>
        <li>100 lbs of personal items can be placed in the vehicle</li>
        <li>Your vehicle will be on the same truck during the transportation</li>
        <li>Shipping will be insured bumper to bumper for $100,000 USD</li>
        <li>Guaranteed pick up and delivery</li>
    </ul>

    <p>
        To schedule the shipping we will need:
    </p>
    <ul>
        <li>Pick up address</li>
        <li>Name, phone # on pick up</li>
        <li>Delivery address</li>
        <li>Name, phone # on delivery</li>
        <li>Pick up date</li>
    </ul>

    <p>
        You can schedule your shipping online by following the link below and your shipping agent will contact you shortly to complete the booking:
        <br>
        <a href="#"></a>
    </p>

    <p>
        Your quote number is <strong>{{ $quote->serial }}</strong>
    </p>

    <p>
        Sincerely,<br>
        Your shipping agent<br>
        {{ $quote->agent->name }}<br>
        Direct:  {{ $quote->agent->phone }}
    </p>

    <hr>

</body>
</html>
