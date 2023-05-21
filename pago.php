<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://www.paypal.com/sdk/js?client-id=AfUZ2Fnb-y_YXq7eaNYfBSjRyc-K424nIh7MBPwrLzkwlicRtrj_AnmOjKdpKG_-EiK372QUZzc8OOTX&locale=en_MX&currency=MXN"></script>

</head>

<body>

    <div id="paypal-button-container"></div>

    <script>
        paypal.Buttons({
            style: {
                color: 'black',
                shape: 'pill',
                label: 'buynow',
                layout: 'vertical',
                height: 55,
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 100
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                actions.order.capture().the(function(detalles) {
                    window.location.herf = "completado.html"
                });
            },

            onCancel: function(data) {
                alert("pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>
</body>

</html>