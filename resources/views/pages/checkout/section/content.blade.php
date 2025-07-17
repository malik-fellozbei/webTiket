<section class="bg-slate-50 mt-16">
    <div class="container mx-auto px-4 py-8 md:py-12">
        @if (empty($snapToken))
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12 items-start">
            <div class="lg:col-span-2 space-y-8">
                <form action="{{ route('checkout.pay') }}" method="POST" class="space-y-8" x-data="{ sameAsBilling: true }">
                    @csrf
                    @foreach ($individualTickets as $index => $ticket)
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-slate-800 border-b pb-4 mb-6">
                            Ticket {{ $index + 1 }}: <span class="text-purple-600">{{ $ticket['name'] }}</span>
                        </h2>
                        <input type="hidden" name="attendees[{{ $index }}][ticket_id]" value="{{ $ticket['ticket_id'] }}">

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="first-name-{{$index}}" class="block text-sm font-medium text-slate-700">First Name <span class="text-red-500 text-xs">*</span></label>
                                    <input type="text" name="attendees[{{ $index }}][first_name]" id="first-name-{{$index}}" value="{{ old('attendees.'.$index.'.first_name') }}" required class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                    @error('attendees.'.$index.'.first_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="last-name-{{$index}}" class="block text-sm font-medium text-slate-700">Last Name <span class="text-red-500 text-xs">*</span></label>
                                    <input type="text" name="attendees[{{ $index }}][last_name]" id="last-name-{{$index}}" value="{{ old('attendees.'.$index.'.last_name') }}" required class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                    @error('attendees.'.$index.'.last_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="birthdate-{{$index}}" class="block text-sm font-medium text-slate-700">Birthdate <span class="text-red-500 text-xs">*</span></label>
                                    <input type="date" name="attendees[{{ $index }}][birthdate]" id="birthdate-{{$index}}" value="{{ old('attendees.'.$index.'.birthdate') }}" required class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                    @error('attendees.'.$index.'.birthdate')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="identity-number-{{$index}}" class="block text-sm font-medium text-slate-700">ID Card Number (KTP) / Passport Number <span class="text-red-500 text-xs">*</span></label>
                                    <input inputmode="numeric" oninput="this.value = this.value.replace(/\D+/g, '')" type="text" name="attendees[{{ $index }}][identity_number]" id="identity-number-{{$index}}" value="{{ old('attendees.'.$index.'.identity_number') }}" required maxlength="16" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                    @error('attendees.'.$index.'.identity_number')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="email-{{$index}}" class="block text-sm font-medium text-slate-700">Email Address <span class="text-red-500 text-xs">*</span></label>
                                <input type="email" name="attendees[{{ $index }}][email]" id="email-{{$index}}" value="{{ old('attendees.'.$index.'.email') }}" required class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                @error('attendees.'.$index.'.email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="phone-{{$index}}" class="block text-sm font-medium text-slate-700">Phone Number (start with +) <span class="text-red-500 text-xs">*</span></label>
                                <input type="tel" name="attendees[{{ $index }}][phone]" id="phone-{{$index}}" value="{{ old('attendees.'.$index.'.phone') }}" required class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                @error('attendees.'.$index.'.phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                    @endforeach

                    <div class="mt-8">
                        <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-4 text-lg rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            Confirm & Pay
                        </button>
                    </div>
                </form>
            </div>
            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-slate-800 border-b pb-3 mb-4">Order Summary</h2>
                        <div class="space-y-4">
                            @php
                            $totalPrice = 0;
                            $totalQuantity = 0;
                            @endphp
                            @foreach ($cart['tickets'] as $item)
                            @php
                            $totalQuantity += $item['selected_quantity'];
                            $totalPrice += $item['selected_quantity'] * $item['price'];
                            @endphp
                            <div class="flex justify-between items-start text-sm">
                                <div>
                                    <p class="font-semibold text-slate-700">{{ $item['selected_quantity'] }}x {{ $item['name'] }}</p>
                                    <p class="text-slate-500">@ {{ number_format($item['price'], 0, ',', '.') }}</p>
                                </div>
                                <p class="font-semibold text-slate-800">Rp. {{ number_format($item['price'] * $item['selected_quantity'], 0, ',', '.') }}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4 pt-4 border-t flex justify-between items-center">
                            <span class="text-slate-800 font-bold text-lg">Total Payment</span>
                            <span class="font-bold text-2xl text-purple-600">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (isset($snapToken))
        <div class="text-center">
            <h2 class="text-2xl font-bold">Your order has been created!</h2>
            <p class="text-slate-600 mt-2">Please complete your payment.</p>
            <button id="pay-button" class="mt-6 bg-purple-600 text-white font-bold py-3 px-8 rounded-lg">Pay Now</button>
        </div>

        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function() {
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        window.location.href = '/payment-success/' + '{{ $order->transaction_code }}';
                    }
                    , onPending: function(result) {
                        alert("Waiting for your payment!");
                    }
                    , onError: function(result) {
                        window.location.href = '/payment-failed'
                    }
                    , onClose: function() {
                        alert('You closed the popup without finishing the payment');
                    }
                });
            };

            document.getElementById('pay-button').click();

        </script>
        @endif
    </div>
</section>
