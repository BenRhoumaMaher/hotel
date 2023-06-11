<?php
require("../include/header.php");
require("../app/app.php");
error_reporting(0);

if(!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href = 'http://localhost/hotel'</script>";
    exit;
}
?>
<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo ROOT; ?>/images/image_2.jpg')"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading">Pay Page</h2>
                <div class="container">
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script
                        src="https://www.paypal.com/sdk/js?client-id=AfVbeOuy4PCNzzLktz2QRplfMzka61YHT_dsXne1bOMb6lOcym4rNYZxvLH34kq0EbFgzx2Kw2uNbYTc&currency=USD">
                    </script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                    paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: '<?php echo $_SESSION['price']; ?>' // Can also reference a variable or function
                                    }
                                }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {

                                window.location.href = 'http://localhost/hotel';
                            });
                        }
                    }).render('#paypal-button-container');
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php require("../include/footer.php");  ?>