<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Payment</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <h1>Checkout Payment</h1>
    <button id="pay-button">Pay Now</button>

    <script>
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    console.log(result);
                }
            });
        };
    </script>
</body>
</html>