#!/bin/sh

# Hentikan script jika ada perintah yang gagal
set -e

echo "Menunggu layanan Ngrok siap..."

# Export URL sebagai environment variable agar bisa digunakan oleh Vite
export VITE_SERVER_HOST="irvine.rumahfinancemalik.my.id"
export APP_URL="irvine.rumahfinancemalik.my.id"

# Jalankan perintah asli untuk Vite
echo "Menginstall dependensi NPM (jika perlu)..."
npm install

echo "🚀 Memulai server Vite dengan HMR..."
# 'exec' akan menggantikan proses script dengan proses npm
exec npm run dev -- --host
