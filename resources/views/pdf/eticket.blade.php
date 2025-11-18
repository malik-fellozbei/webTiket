<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>E-Ticket - {{ $ticket->ticket_code }}</title>
    <style>
        /* Menggunakan font bawaan yang didukung dompdf */
        @page {
            margin: 0;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14px;
            color: #333;
            margin: 0;
            background-color: #f7f7f7;
        }

        .ticket-container {
            border: 1px solid #e0e0e0;
            background-color: #ffffff;
            width: 700px;
            margin: 40px auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .header-banner {
            background-color: #a77bff;
            /* Warna gradien ungu */
            padding: 20px;
            text-align: center;
            color: white;
        }

        .header-banner h1 {
            font-size: 28px;
            margin: 0;
            letter-spacing: 1px;
        }

        .main-content {
            padding: 30px;
        }

        .content-table {
            width: 100%;
            border-collapse: collapse;
        }

        .left-panel {
            width: 60%;
            padding-right: 30px;
            vertical-align: top;
        }

        .right-panel {
            width: 40%;
            text-align: center;
            vertical-align: top;
            padding-left: 30px;
            border-left: 1px dashed #cccccc;
        }

        .info-grid {
            width: 100%;
        }

        .info-grid td {
            padding-bottom: 12px;
            vertical-align: top;
        }

        .info-grid .label {
            color: #888;
            font-size: 12px;
            padding-right: 10px;
        }

        .info-grid .value {
            font-weight: bold;
            font-size: 15px;
        }

        .qr-code-container {
            margin-top: 10px;
        }

        .ticket-code {
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-top: 15px;
            color: #a77bff;
        }

        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            text-align: center;
            font-size: 12px;
            color: #999;
        }

    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="header-banner">
            <h1>{{ strtoupper($ticket->event->name) }}</h1>
        </div>

        <div class="main-content">
            <table class="content-table">
                <tr>
                    <td class="left-panel">
                        <h2 style="font-size: 20px; margin-top: 0; margin-bottom: 20px; color: #333;">Attendee & Event Details</h2>
                        <table class="info-grid">
                            <tr>
                                <td class="label">Name</td>
                                <td class="value">{{ ucwords($ticket->attendee->first_name ) }} {{ ucwords($ticket->attendee->last_name ) }}</td>
                            </tr>
                            <tr>
                                <td class="label">Category</td>
                                <td class="value">{{ $ticket->ticket->name }}</td>
                            </tr>
                            <tr>
                                <td class="label">Date</td>
                                <td class="value">{{ $ticket->event->start_time->format('l, d F Y') }}</td>
                            </tr>
                            <tr>
                                <td class="label">Time</td>
                                <td class="value">{{ $ticket->event->start_time->format('H:i A') }} WIB</td>
                            </tr>
                            <tr>
                                <td class="label">Location</td>
                                <td class="value">{{ $ticket->event->location_name }}</td>
                            </tr>
                            <tr>
                                <td class="label">Transaction ID</td>
                                <td class="value">{{ $ticket->order->transaction_code }}</td>
                            </tr>
                        </table>
                    </td>
                    <td class="right-panel">
                        <h2 style="font-size: 20px; margin-top: 0; margin-bottom: 10px; color: #333;">Scan for Entry</h2>
                        <div class="qr-code-container">
                            <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" style="width: 160px; height: 160px;">
                        </div>
                        <div class="ticket-code">{{ $ticket->ticket_code }}</div>
                    </td>
                </tr>
            </table>

            <div class="footer">
                Please present this e-ticket at the entrance. This ticket is valid for one person only.
            </div>
        </div>
    </div>
</body>
</html>
