<section class="relative bg-white">
    <div class="w-full h-[450px] bg-cover bg-center relative">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>
        <img src="{{ Storage::url($event->thumbnail) }}" alt="{{ $event->name }} Hero Image" class="w-full h-full object-cover">
    </div>

    <div class="container mx-auto px-4 pb-16 -mt-32 md:-mt-48 relative z-10">
        <h1 class="text-4xl md:text-5xl font-black text-white mb-8">{{ $event->name }}</h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            <div class="lg:col-span-2 space-y-4" id="ticket-list-container">
                @forelse($tickets as $ticket)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden" data-ticket-id="{{ $ticket->id }}">
                    <div class="p-6 grid grid-cols-1 md:grid-cols-6 gap-4 items-center">
                        <div class="md:col-span-3">
                            <h3 class="text-xl font-bold text-slate-800">{{ $ticket->name }}</h3>
                            <div class="text-xs text-slate-500 mt-2 space-y-1">
                                <p>{{ $event->start_time->format('F d, Y - h:i A') }}</p>
                                <p>{{ $event->location_name }}, {{ $event->location_city }}</p>
                            </div>
                            <a href="#" class="text-xs font-semibold text-purple-600 hover:underline mt-2 inline-block">View Detail</a>
                        </div>
                        <div class="md:col-span-1 text-left md:text-center">
                            <p class="text-lg font-semibold text-slate-700 currency-price">{{ $ticket->price }}</p>
                        </div>
                        <div class="md:col-span-2 flex justify-start md:justify-end ticket-controls">
                            @if ($ticket->quantity === 0)
                            <span class="bg-pink-900 text-white font-semibold py-2 px-5 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">Tiket Sold Out</span>
                            @else
                            <button class="add-to-cart-button bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold py-2 px-5 rounded-lg shadow-md hover:shadow-lg hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105">
                                Tambah
                            </button>
                            <div class="quantity-selector hidden flex items-center gap-2">
                                <button class="decrease-quantity-button w-8 h-8 rounded-full bg-slate-200 text-slate-600 hover:bg-slate-300 transition-transform duration-200 active:scale-90">-</button>
                                <span class="selected-quantity-display font-bold text-slate-800 w-8 text-center">0</span>
                                <button class="increase-quantity-button w-8 h-8 rounded-full bg-slate-200 text-slate-600 hover:bg-slate-300 transition-transform duration-200 active:scale-90">+</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="bg-white rounded-xl shadow-lg p-6 text-center text-slate-500">
                    Belum ada tiket yang tersedia untuk event ini.
                </div>
                @endforelse
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-slate-800 border-b pb-3 mb-4">Orders</h2>
                        <div id="selected-tickets-list">
                            <div class="min-h-[100px] flex items-center justify-center bg-slate-50 rounded-lg p-4 empty-cart-message">
                                <p class="text-sm text-slate-400">Your selected tickets will show here.</p>
                            </div>
                            {{-- Selected tickets will be rendered here by JS --}}
                        </div>
                        <div class="mt-4 pt-4 border-t flex justify-between items-center">
                            <span class="text-slate-600 font-medium total-summary-text">Total (0 Ticket)</span>
                            <span class="font-bold text-2xl text-slate-800 total-price-display">Rp0</span>
                        </div>
                        <a href="{{ route('checkout') }}">
                            <button id="select-ticket-button" class="cursor-pointer mt-4 w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-3 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                Select Ticket
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const initialTicketsData = @json($initialTicketsData);


    let selectedTicketsState = {};

    document.addEventListener('DOMContentLoaded', () => {

        initialTicketsData.forEach(ticket => {
            selectedTicketsState[ticket.id] = {
                id: ticket.id
                , name: ticket.name
                , price: parseFloat(ticket.price)
                , available_quantity: ticket.available_quantity
                , selected_quantity: 0
            };
        });


        document.querySelectorAll('.currency-price').forEach(el => {
            const price = parseFloat(el.textContent);
            el.textContent = formatCurrency(price);
        });

        setupEventListeners();
        updateOrderSummary();
    });

    function setupEventListeners() {
        const ticketListContainer = document.getElementById('ticket-list-container');

        ticketListContainer.addEventListener('click', (event) => {
            const target = event.target;
            const ticketCard = target.closest('[data-ticket-id]');
            if (!ticketCard) return;

            const ticketId = parseInt(ticketCard.dataset.ticketId);
            const ticketState = selectedTicketsState[ticketId];

            if (target.classList.contains('add-to-cart-button')) {
                if (ticketState.available_quantity > 0) {
                    ticketState.selected_quantity = 1;
                    toggleTicketControls(ticketCard, true);
                    updateTicketQuantityDisplay(ticketCard, ticketState.selected_quantity);
                    updateOrderSummary();
                }
            } else if (target.classList.contains('increase-quantity-button')) {
                if (ticketState.selected_quantity < ticketState.available_quantity) {
                    ticketState.selected_quantity++;
                    updateTicketQuantityDisplay(ticketCard, ticketState.selected_quantity);
                    updateOrderSummary();
                }
            } else if (target.classList.contains('decrease-quantity-button')) {
                ticketState.selected_quantity--;
                if (ticketState.selected_quantity <= 0) {
                    ticketState.selected_quantity = 0;
                    toggleTicketControls(ticketCard, false);
                }
                updateTicketQuantityDisplay(ticketCard, ticketState.selected_quantity);
                updateOrderSummary();
            }
        });
    }

    function toggleTicketControls(ticketCard, showSelector) {
        const addButton = ticketCard.querySelector('.add-to-cart-button');
        const quantitySelector = ticketCard.querySelector('.quantity-selector');

        if (showSelector) {
            addButton.classList.add('hidden');
            quantitySelector.classList.remove('hidden');
        } else {
            addButton.classList.remove('hidden');
            quantitySelector.classList.add('hidden');
        }
    }

    function updateTicketQuantityDisplay(ticketCard, quantity) {
        const quantityDisplay = ticketCard.querySelector('.selected-quantity-display');
        if (quantityDisplay) {
            quantityDisplay.textContent = quantity;
        }
    }

    function updateOrderSummary() {
        const selectedTicketsListEl = document.getElementById('selected-tickets-list');
        const emptyCartMessageEl = selectedTicketsListEl.querySelector('.empty-cart-message');
        const totalSummaryTextEl = document.querySelector('.total-summary-text');
        const totalPriceDisplayEl = document.querySelector('.total-price-display');
        const selectTicketButton = document.getElementById('select-ticket-button');

        let totalQuantity = 0;
        let totalPrice = 0;
        let ticketsHtml = '';

        for (const id in selectedTicketsState) {
            const ticket = selectedTicketsState[id];
            if (ticket.selected_quantity > 0) {
                totalQuantity += ticket.selected_quantity;
                totalPrice += ticket.selected_quantity * ticket.price;
                ticketsHtml += `
                    <div class="flex justify-between items-center text-sm">
                        <div>
                            <p class="font-semibold text-slate-700">${ticket.selected_quantity}x ${ticket.name}</p>
                            <p class="text-slate-500">${formatCurrency(ticket.price)}</p>
                        </div>
                        <p class="font-semibold text-slate-800">${formatCurrency(ticket.price * ticket.selected_quantity)}</p>
                    </div>
                `;
            }
        }


        if (totalQuantity === 0) {
            selectedTicketsListEl.innerHTML = `
                <div class="min-h-[100px] flex items-center justify-center bg-slate-50 rounded-lg p-4 empty-cart-message">
                    <p class="text-sm text-slate-400">Your selected tickets will show here.</p>
                </div>
            `;
            selectTicketButton.disabled = true;
        } else {
            selectedTicketsListEl.innerHTML = ticketsHtml;
            selectTicketButton.disabled = false;
        }


        totalSummaryTextEl.textContent = `Total (${totalQuantity} Ticket)`;
        totalPriceDisplayEl.textContent = formatCurrency(totalPrice);
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency'
            , currency: 'IDR'
            , minimumFractionDigits: 0
        }).format(amount);
    }

</script>
