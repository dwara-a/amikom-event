<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Katalog Event</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#6E5034',
            primaryHover: '#5A412B',
            background: '#FFFDF1',
            surface: '#FFFFFF',
            accent: '#492828',
            textMain: '#1F1F1F',
            textSecondary: '#555555'
          }
        }
      }
    }
  </script>
</head>

<body class="bg-background min-h-screen flex flex-col">
    <nav class="bg-surface shadow-md border-b-4 border-accent">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="text-2xl font-extrabold uppercase tracking-wide text-primary">
            AmikomEventHub
        </div>
        <div class="flex gap-6 text-textMain font-semibold text-lg">
            <a href="/profil" class="hover:text-primary transition">Profil</a>
            <a href="/katalog" class="text-primary">Katalog</a>
            <a href="/bantuan" class="hover:text-primary transition">Bantuan</a>
        </div>
        </div>
    </nav>
    <div class="max-w-6xl mx-auto p-6 flex-1">
        <h1 class="text-3xl font-bold text-textMain mb-6">Katalog Event</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-surface p-5 rounded-xl shadow-md border flex flex-col">
                <img src="foto/refactory.jpg"
                    alt="Poster Event"
                    class="w-full h-48 object-cover rounded-lg mb-4">

                <div>
                <h2 class="font-bold text-lg text-textMain">
                    Refactory Hackathon 2025 X Amikom Yogyakarta, Total Hadiah Rp 20 Juta!
                </h2>
                <p class="text-sm text-textSecondary mt-2">
                    Refactory Hackathon 2025 adalah kompetisi bagi para coder dan pegiat teknologi.
                </p>
                </div>
                <div class="mt-auto pt-4">
                    <a href="https://informatika.amikom.ac.id/refactory-hackathon-2025-x-amikom-yogyakarta-total-hadiah-rp-20-juta/"
                        target="_blank"
                        class="block text-center w-full bg-primary text-white py-2 rounded-lg hover:bg-primaryHover transition">
                        Detail
                    </a>
                </div>
            </div>

            <div class="bg-surface p-5 rounded-xl shadow-md border flex flex-col"> 
                <img src="foto/aspirasi.jpeg"
                    alt="Poster Event"
                    class="w-full h-48 object-cover rounded-lg mb-4">

                <div>
                <h2 class="font-bold text-lg text-textMain">
                    Ruang Aspirasi HIMASI 2025/2026
                </h2>
                <p class="text-sm text-textSecondary mt-2">
                    Ruang Aspirasi hadir kembali untuk menampung semua aspirasi teman-teman Nih!
                </p>
                </div>
                <div class="mt-auto pt-4">
                <a href="https://ungu.in/RuangAspirasi2026"
                        target="_blank"
                        class="block text-center w-full bg-primary text-white py-2 rounded-lg hover:bg-primaryHover transition">
                        Detail
                    </a>
                </div>
            </div>

            <div class="bg-surface p-5 rounded-xl shadow-md border flex flex-col">
                <img src="foto/konversi.jpg"
                    alt="Poster Event"
                    class="w-full h-48 object-cover rounded-lg mb-4">

                <div>
                <h2 class="font-bold text-lg text-textMain">
                    Dibuka Periode Konversi Magang & MBKM Genap 2024/2025
                </h2>
                <p class="text-sm text-textSecondary mt-2">
                    Kepada mahasiswa yang mengikuti kegiatan MBKM semester Genap (Sekitar Februari – Agustus 2025).
                </p>
                </div>
                <div class="mt-auto pt-4">
                <a href="https://informatika.amikom.ac.id/dibuka-periode-konversi-magang-dan-mbkm-genap-2024-2025/"
                        target="_blank"
                        class="block text-center w-full bg-primary text-white py-2 rounded-lg hover:bg-primaryHover transition">
                        Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>