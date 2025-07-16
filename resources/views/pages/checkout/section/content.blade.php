@extends('layouts.app')

@section('content')

@php
// Data ini seharusnya datang dari halaman sebelumnya (misal: keranjang belanja)
$orderSummary = [
'tickets' => [
['quantity' => 2, 'title' => 'Festival', 'price' => 300000],
['quantity' => 1, 'title' => 'Presale 1 - Seat A', 'price' => 300000],
],
'totalQuantity' => 3,
'totalPrice' => 900000,
];
@endphp

<x-navbarBlack />

<section class="bg-slate-50 mt-16">
    <div class="container mx-auto px-4 py-8 md:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12 items-start">

            {{-- Kolom Kiri: Form Informasi --}}
            <div class="lg:col-span-2 space-y-8">
                <form action="#" method="POST" class="space-y-8" x-data="{ sameAsBilling: true }">

                    {{-- Informasi Kontak & Alamat Penagihan --}}
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-slate-800 border-b pb-4 mb-6">Contact & Billing Details</h2>
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="first-name" class="block text-sm font-medium text-slate-700">First Name</label>
                                    <input type="text" name="first_name" id="first-name" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-slate-700">Last Name</label>
                                    <input type="text" name="last_name" id="last-name" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700">Email Address</label>
                                <input type="email" name="email" id="email" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-slate-700">Phone Number</label>
                                <input type="tel" name="phone" id="phone" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="address" class="block text-sm font-medium text-slate-700">Address</label>
                                <input type="text" name="address" id="address" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-slate-700">City</label>
                                    <input type="text" name="city" id="city" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="postal-code" class="block text-sm font-medium text-slate-700">Postal Code</label>
                                    <input type="text" name="postal_code" id="postal-code" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="country-code" class="block text-sm font-medium text-slate-700">Country Code</label>
                                <input type="text" name="country_code" id="country-code" value="IDN" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    {{-- Alamat Pengiriman --}}
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-slate-800 mb-4">Shipping Details</h2>
                        <div class="flex items-center">
                            <input id="same-as-billing" type="checkbox" x-model="sameAsBilling" class="h-4 w-4 text-purple-600 border-slate-300 rounded focus:ring-purple-500">
                            <label for="same-as-billing" class="ml-3 block text-sm text-slate-800">My shipping address is the same as my billing address.</label>
                        </div>

                        <div x-show="!sameAsBilling" x-transition class="mt-6 space-y-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="shipping-first-name" class="block text-sm font-medium text-slate-700">First Name</label>
                                    <input type="text" name="shipping_first_name" id="shipping-first-name" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="shipping-last-name" class="block text-sm font-medium text-slate-700">Last Name</label>
                                    <input type="text" name="shipping_last_name" id="shipping-last-name" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="shipping-email" class="block text-sm font-medium text-slate-700">Email Address</label>
                                <input type="email" name="shipping_email" id="shipping-email" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="shipping-phone" class="block text-sm font-medium text-slate-700">Phone Number</label>
                                <input type="tel" name="shipping_phone" id="shipping-phone" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="shipping-address" class="block text-sm font-medium text-slate-700">Address</label>
                                <input type="text" name="shipping_address" id="shipping-address" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="shipping-city" class="block text-sm font-medium text-slate-700">City</label>
                                    <input type="text" name="shipping_city" id="shipping-city" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="shipping-postal-code" class="block text-sm font-medium text-slate-700">Postal Code</label>
                                    <input type="text" name="shipping_postal_code" id="shipping-postal-code" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="shipping-country-code" class="block text-sm font-medium text-slate-700">Country Code</label>
                                <input type="text" name="shipping_country_code" id="shipping-country-code" value="IDN" class="mt-1 py-3 px-3 block w-full rounded-md border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="mt-8">
                        <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-4 text-lg rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            Confirm & Pay
                        </button>
                    </div>
                </form>
            </div>

            {{-- Kolom Kanan: Ringkasan Pesanan --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-slate-800 border-b pb-3 mb-4">Order Summary</h2>
                        <div class="space-y-4">
                            @foreach ($orderSummary['tickets'] as $item)
                            <div class="flex justify-between items-start text-sm">
                                <div>
                                    <p class="font-semibold text-slate-700">{{ $item['quantity'] }}x {{ $item['title'] }}</p>
                                    <p class="text-slate-500">@ IDR {{ number_format($item['price'], 0, ',', '.') }}</p>
                                </div>
                                <p class="font-semibold text-slate-800">IDR {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-4 pt-4 border-t space-y-2">
                            <div class="flex justify-between items-center text-slate-600">
                                <span>Subtotal</span>
                                <span>IDR {{ number_format($orderSummary['totalPrice'], 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center text-slate-600">
                                <span>Service Fee</span>
                                <span>IDR 10.000</span>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t flex justify-between items-center">
                            <span class="text-slate-800 font-bold text-lg">Total Payment</span>
                            <span class="font-bold text-2xl text-purple-600">IDR {{ number_format($orderSummary['totalPrice'] + 10000, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<x-footer />

@endsection
