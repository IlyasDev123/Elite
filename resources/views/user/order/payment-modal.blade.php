@section('styles')
    <style>
        .StripeElement {
            box-sizing: border-box;
            width: 100%;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.996);
            box-shadow: 0 1px 3px 0 #e2e6eb;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
            border: 1px solid #bfc5ca;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #bfc5ca;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #d6d6c2 !important;
        }
    </style>
@endsection

<div class="modal fade" id="payment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="payment" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pay Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="m-4">
                <h5> Price : {{ $order->submitOrder->price }}</h5>
            </div>
            <form method="POST" action="{{ route('payment') }}" class="card-form mt-3 mb-3">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="payment_method" class="payment-method">
                    <input type="hidden" name="submit_order_id" value="{{ $order->submitOrder->id }}">
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <div class="col-12">
                        <input class="StripeElement mb-3" name="card_holder_name" placeholder="Card holder name"
                            required>
                        <div id="card-element"></div>
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

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
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
        })
    </script>
@endsection
