<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Pribadi</title>
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
    <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="text-2xl font-extrabold tracking-wide text-primary">
        AmikomEventHub</div>      
        <div class="flex gap-6 font-extrabold tracking-wide font-semibold text-lg">
        <a href="/profil" class="hover:text-primary transition">Profil</a>
        <a href="/katalog" class="hover:text-primary transition">Katalog</a>
        <a href="/bantuan" class="hover:text-primary transition">Bantuan</a>
      </div>
    </div>
  </nav>

  <div class="flex flex-1 items-center justify-center">
    <div class="bg-surface shadow-2xl rounded-2xl p-8 max-w-md w-full border border-slate-200">
      <div class="flex flex-col items-center">
        <img src="foto/saya.jpg" 
             alt="Foto Profil" 
             class="w-28 h-28 object-cover rounded-full border-4 border-primary shadow-md mb-4 
             hover:scale-110 transition duration-300">
        <h1 class="text-2xl font-bold text-textMain">Andhara Elirica</h1>
        <p class="text-primary font-medium">Mahasiswa Sistem Informasi</p>
      </div>
      <p class="text-textSecondary text-center mt-4">
        Haihai! Saya adalah mahasiswa dengan ketertarikan akan dunia IT yang tinggi. 
        Mohon bantuannya ya!
      </p>
      <div class="mt-6 space-y-2 text-sm text-textMain text-center">
        <p><span class="font-semibold">Email:</span> andhara@students.amikom.ac.id</p>
        <p><span class="font-semibold">Telepon:</span> 0895-3658-xxxxx</p>
        <p><span class="font-semibold">Lokasi:</span> Yogyakarta, Indonesia</p>
      </div>
      <div class="flex justify-center gap-4 mt-6">
        <a href="#" class="px-4 py-2 bg-primary text-white rounded-lg 
            hover:bg-primaryHover transition">
          Instagram
        </a>
        <a href="#" class="px-4 py-2 bg-primary text-white rounded-lg 
            hover:bg-primaryHover transition">
          LinkedIn
        </a>
      </div>
    </div>
  </div>
</body>
</html>