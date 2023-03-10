<x-layout>
    <label for="card-holder-name">Card Holder</label>
    <input id="card-holder-name" type="text" class="form-input rounded mb-4">

    <!-- Stripe Elements Placeholder -->
    <div id="card-element"></div>

    <button id="card-button" data-secret="{{ $intent->client_secret }}" class="rounded p-2 bg-blue-500 mt-4 text-white">
        Subscribe
    </button>

    <x-slot:scripts>
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            const stripe = Stripe('{{ config('cashier.key') }}');

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            cardButton.addEventListener('click', async (e) => {
                const { setupIntent, error } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );

                if (error) {
                    alert('an error occurred')
                } else {
                    console.log(setupIntent);
                }
            });
        </script>
    </x-slot:scripts>
</x-layout>
