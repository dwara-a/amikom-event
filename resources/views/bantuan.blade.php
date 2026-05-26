<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bantuan</title>
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
            <a href="/katalog" class="hover:text-primary transition">Katalog</a>
            <a href="/bantuan" class="text-primary">Bantuan</a>
        </div>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto p-6 flex-1">
        <h1 class="text-3xl font-bold text-textMain mb-6">Bantuan (FAQ)</h1>
        <div class="space-y-4">
            <div class="bg-surface p-4 rounded-lg shadow">
                <h2 class="font-semibold text-textMain">Apa itu AmikomEventHub?</h2>
                <p class="text-textSecondary mt-2">AmikomEventHub adalah platform untuk menampilkan berbagai event kampus dan kegiatan mahasiswa.</p>
            </div>
            <div class="bg-surface p-4 rounded-lg shadow">
                <h2 class="font-semibold text-textMain">Bagaimana cara mengikuti event?</h2>
                <p class="text-textSecondary mt-2">Klik tombol "Detail" pada event yang diinginkan, lalu ikuti link pendaftaran yang tersedia.</p>
            </div>
            <div class="bg-surface p-4 rounded-lg shadow">
                <h2 class="font-semibold text-textMain">Apakah event berbayar?</h2>
                <p class="text-textSecondary mt-2">Beberapa event gratis, namun ada juga yang berbayar tergantung penyelenggara.</p>
            </div>
            <div class="bg-surface p-4 rounded-lg shadow">
                <h2 class="font-semibold text-textMain">Siapa yang bisa mengakses platform ini?</h2>
                <p class="text-textSecondary mt-2">Mahasiswa Amikom dan masyarakat umum dapat mengakses informasi event di platform ini.</p>
            </div>
        </div>

        <div class="mt-10 bg-surface p-6 rounded-xl shadow border">
            <h2 class="text-xl font-bold text-textMain mb-4">Kirim Pertanyaan</h2>
            <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-textMain mb-1">Nama</label>
                <input type="text" placeholder="Masukkan nama" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
            </div>
            <div>
                <label class="block text-sm font-medium text-textMain mb-1">Email</label>
                <input type="email" placeholder="Masukkan email" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
            </div>
            <div>
                <label class="block text-sm font-medium text-textMain mb-1">Pertanyaan</label>
                <textarea rows="4" placeholder="Tulis pertanyaan kamu..." 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
            </div>
            <button type="submit" 
                    class="w-full bg-primary text-white py-2 rounded-lg hover:bg-primaryHover transition">
                Kirim
            </button>
            </form>
        </div>
    </div>
</body>
</html>
