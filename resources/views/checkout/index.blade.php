<x-layout>
    <div class="bg-white">
        <!-- Background color split screen for large screens -->
        <div class="fixed top-0 left-0 hidden h-full w-1/2 bg-white lg:block" aria-hidden="true"></div>
        <div class="fixed top-0 right-0 hidden h-full w-1/2 bg-gray-50 lg:block" aria-hidden="true"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-x-16 lg:grid-cols-2 lg:px-8 xl:gap-x-48">
            <h1 class="sr-only">Order information</h1>

            <section aria-labelledby="summary-heading"
                     class="bg-gray-50 px-4 pt-16 pb-10 sm:px-6 lg:col-start-2 lg:row-start-1 lg:bg-transparent lg:px-0 lg:pb-16">
                <div class="mx-auto max-w-lg lg:max-w-none">
                    <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Order summary</h2>

                    <ul role="list" class="divide-y divide-gray-200 text-sm font-medium text-gray-900">
                        <li class="flex items-start space-x-4 py-6">
                            <img src="https://tailwindui.com/img/ecommerce-images/checkout-page-04-product-01.jpg"
                                 alt="Moss green canvas compact backpack with double top zipper, zipper front pouch, and matching carry handle and backpack straps."
                                 class="h-20 w-20 flex-none rounded-md object-cover object-center">
                            <div class="flex-auto space-y-1">
                                <h3>Micro Backpack</h3>
                                <p class="text-gray-500">Moss</p>
                                <p class="text-gray-500">5L</p>
                            </div>
                            <p class="flex-none text-base font-medium">$70.00</p>
                        </li>

                        <!-- More products... -->
                    </ul>

                    <dl class="hidden space-y-6 border-t border-gray-200 pt-6 text-sm font-medium text-gray-900 lg:block">
                        <div class="flex items-center justify-between">
                            <dt class="text-gray-600">Subtotal</dt>
                            <dd>$320.00</dd>
                        </div>

                        <div class="flex items-center justify-between">
                            <dt class="text-gray-600">Shipping</dt>
                            <dd>$15.00</dd>
                        </div>

                        <div class="flex items-center justify-between">
                            <dt class="text-gray-600">Taxes</dt>
                            <dd>$26.80</dd>
                        </div>

                        <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                            <dt class="text-base">Total</dt>
                            <dd class="text-base">$361.80</dd>
                        </div>
                    </dl>

                    <div
                        class="fixed inset-x-0 bottom-0 flex flex-col-reverse text-sm font-medium text-gray-900 lg:hidden">
                        <div class="relative z-10 border-t border-gray-200 bg-white px-4 sm:px-6">
                            <div class="mx-auto max-w-lg">
                                <button type="button" class="flex w-full items-center py-6 font-medium"
                                        aria-expanded="false">
                                    <span class="mr-auto text-base">Total</span>
                                    <span class="mr-2 text-base">$361.80</span>
                                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div>
                            <!--
                              Mobile summary overlay, show/hide based on mobile summary state.

                              Entering: "transition-opacity ease-linear duration-300"
                                From: "opacity-0"
                                To: "opacity-100"
                              Leaving: "transition-opacity ease-linear duration-300"
                                From: "opacity-100"
                                To: "opacity-0"
                            -->
                            <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

                            <!--
                              Mobile summary, show/hide based on mobile summary state.

                              Entering: "transition ease-in-out duration-300 transform"
                                From: "translate-y-full"
                                To: "translate-y-0"
                              Leaving: "transition ease-in-out duration-300 transform"
                                From: "translate-y-0"
                                To: "translate-y-full"
                            -->
                            <div class="relative bg-white px-4 py-6 sm:px-6">
                                <dl class="mx-auto max-w-lg space-y-6">
                                    <div class="flex items-center justify-between">
                                        <dt class="text-gray-600">Subtotal</dt>
                                        <dd>$320.00</dd>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <dt class="text-gray-600">Shipping</dt>
                                        <dd>$15.00</dd>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <dt class="text-gray-600">Taxes</dt>
                                        <dd>$26.80</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <form class="px-4 pt-16 pb-36 sm:px-6 lg:col-start-1 lg:row-start-1 lg:px-0 lg:pb-16">
                <div class="mx-auto max-w-lg lg:max-w-none">
                    <section aria-labelledby="contact-info-heading">
                        <h2 id="contact-info-heading" class="text-lg font-medium text-gray-900">Contact information</h2>

                        <div class="mt-6">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">
                                Email address
                            </label>
                            <div class="mt-1">
                                <input type="email" id="email-address" name="email-address" autocomplete="email"
                                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </section>

                    <section aria-labelledby="payment-heading" class="mt-10">
                        <h2 id="payment-heading" class="text-lg font-medium text-gray-900">Payment details</h2>

                        <form id="payment-form">

                            <div id="payment-element">
                                <!-- Elements will create form elements here -->
                            </div>

                            <button id="submit"
                                    class="w-full rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:order-last sm:w-auto"
                            >
                                Submit
                            </button>

                            <div id="error-message">
                                <!-- Display error message to your customers here -->
                            </div>
                        </form>
                    </section>
                </div>
            </form>
        </div>
    </div>

    <x-slot:scripts>
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe('{{ config('cashier.key') }}');

            const options = {
                clientSecret: '{{ $clientSecret }}',
            };

            // Set up Stripe.js and Elements to use in checkout form, passing the client secret obtained in step 3
            const elements = stripe.elements(options);

            // Create and mount the Payment Element
            const paymentElement = elements.create('payment');
            paymentElement.mount('#payment-element');

            const form = document.getElementById('payment-form');

            form.addEventListener('submit', async (event) => {
                event.preventDefault();

                const {error} = await stripe.confirmPayment({
                    //`Elements` instance that was used to create the Payment Element
                    elements,
                    confirmParams: {
                        return_url: 'https://example.com/order/123/complete',
                    },
                });

                if (error) {
                    // This point will only be reached if there is an immediate error when
                    // confirming the payment. Show error to your customer (for example, payment
                    // details incomplete)
                    const messageContainer = document.querySelector('#error-message');
                    messageContainer.textContent = error.message;
                } else {
                    // Your customer will be redirected to your `return_url`. For some payment
                    // methods like iDEAL, your customer will be redirected to an intermediate
                    // site first to authorize the payment, then redirected to the `return_url`.
                }
            });
        </script>
    </x-slot:scripts>
</x-layout>
