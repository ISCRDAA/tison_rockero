<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<script src="https://www.paypal.com/sdk/js?client-id=Aac83YyIIWO0b3KkQn8bbOAqK0uZ4x70f9v96R8kg272b25p6s0u0ghQaKTKZHun8fQZxPKhTKfn1qyK 
currency=MXN"></script>

</head>
<body>

<div id="paypal-bytton.conteiner"></div>
    
<script>
    paypal.Buttons({
        style:{
            color:'blue',
            shape: 'pill',
            label:'pay'
        },
        createOrder: function(data, actions){
            return actions.order.create({
                purchase-units: [{
                    amount: {
                        value: 100
                    }
                }]
            });
        },

        onApprove: function(data, actions) {
            actions.order.capture().the(function (detalles){
                window.location.herf="completado.html"
        });
        },

        onCancel:funcion(data){
            alert("pago cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
    </script>
</body>
</html>