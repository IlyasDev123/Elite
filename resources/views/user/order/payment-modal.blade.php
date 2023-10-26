<div class="modal fade" id="payment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="payment" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pay Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="m-4 d-flex justify-content-around">
                <h5> Price : <span id="price">$</span></h5>
                <h5> Quantity : <span id="quantity">$</span></h5>
            </div>
            <form method="POST" action="{{ route('payment') }}" class="card-form mt-3 mb-3">
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="payment_method" class="payment-method">
                    <input type="hidden" name="order_id" value="" id="order_id">


                    <div class="col-12">
                        <input class="StripeElement mb-3" name="card_holder_name" placeholder="Card holder name"
                            required>
                        <div id="card-element"></div>
                    </div>

                    <div class="col-12 mt-3" id="shiping-detail">
                        <h1 class="mb-2">Shipping Address Detail</h1>

                        <label for="card_holder_name">Addres</label>
                        <input type="text" name="address" class="form-control  rounded" required>

                        <label for="card_holder_name mt-2">Phone Number</label>
                        <input type="number" name="phone_number" class="form-control  rounded" required>
                    </div>
                    <div id="card-errors" role="alert"></div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary pay">Pay Now</button>
                </div>
            </form>

        </div>
    </div>
</div>

@section('scripts-js')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        $('.payment-btn').on('click', function() {
            console.log('hello test');
            $('#price').text($(this).data('price'))
            $('#quantity').text($(this).data('profuct-quanity'))
            $('#order_id').val($(this).data('id'))
            var productType = $(this).data('product-type')
            if (productType == 2) {
                $('#shiping-detail').hide()
                $('#shiping-detail input').prop('disabled', true);
            } else {
                $('#shiping-detail').show()
                $('#shiping-detail input').prop('disabled', false);
            }
        });

        let stripe = Stripe("{{ env('STRIPE_KEY') }}")
        let elements = stripe.elements()
        let style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                border: '1px solid #bfc5ca',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        }
        let card = elements.create('card', {
            style: style
        })
        card.mount('#card-element')
        let paymentMethod = null
        $('.card-form').on('submit', function(e) {
            $('button.pay').attr('disabled', true)
            if (paymentMethod) {
                return true
            }
            stripe.confirmCardSetup(
                "{{ $intent->client_secret }}", {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: $('.card_holder_name').val()
                        }
                    }
                }
            ).then(function(result) {
                if (result.error) {
                    $('#card-errors').text(result.error.message)
                    $('button.pay').removeAttr('disabled')
                } else {
                    paymentMethod = result.setupIntent.payment_method
                    $('.payment-method').val(paymentMethod)
                    $('.card-form').submit()
                }
            })
            return false
        });
    </script>
@endsection
