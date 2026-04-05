<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporWarga - Aplikasi Pengaduan Masyarakat</title>
    
    <!-- Google Fonts: Nunito (Khas Admin Mazer) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#435ebe',
                        primaryHover: '#32478c',
                        mazerDark: '#25396f',
                        mazerText: '#607080',
                        mazerBg: '#f2f7ff',
                        mazerCard: '#ffffff'
                    },
                    fontFamily: {
                        sans: ['Nunito', 'sans-serif'],
                    },
                    boxShadow: {
                        'mazer': '0 2px 10px rgba(0, 0, 0, 0.05)',
                        'mazer-lg': '0 10px 20px rgba(0, 0, 0, 0.05)',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Utilities for Mazer Look */
        body {
            background-color: #f2f7ff;
            color: #607080;
        }
        h1, h2, h3, h4, h5, h6 {
            color: #25396f;
        }
        .mazer-card {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .mazer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #435ebe 0%, #5b76d6 100%);
        }
    </style>
</head>
<body class="antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <header class="bg-white/90 backdrop-blur-md shadow-mazer sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                    <div class="bg-primary text-white p-2 rounded-xl">
                        <i class="ph ph-megaphone text-2xl"></i>
                    </div>
                    <span class="font-extrabold text-2xl text-mazerDark tracking-tight">Lapor<span class="text-primary">Warga</span></span>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#beranda" class="text-mazerDark font-bold hover:text-primary transition">Beranda</a>
                    <a href="#statistik" class="text-mazerText font-semibold hover:text-primary transition">Statistik</a>
                    <a href="#fitur" class="text-mazerText font-semibold hover:text-primary transition">Fitur</a>
                    <a href="#alur" class="text-mazerText font-semibold hover:text-primary transition">Alur Laporan</a>
                </nav>

                <!-- Action Buttons (Desktop) -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-mazerText font-semibold hover:text-primary transition">Masuk</a>
                    <a href="#" class="bg-primary hover:bg-primaryHover text-white px-6 py-2.5 rounded-xl font-bold shadow-md shadow-primary/30 transition-all">
                        Buat Laporan
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-mazerText hover:text-primary focus:outline-none p-2">
                        <i class="ph ph-list text-3xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full shadow-mazer-lg">
            <div class="px-4 pt-2 pb-6 space-y-2">
                <a href="#beranda" class="block px-3 py-3 rounded-lg text-mazerDark font-bold bg-mazerBg">Beranda</a>
                <a href="#statistik" class="block px-3 py-3 rounded-lg text-mazerText font-semibold hover:bg-mazerBg">Statistik</a>
                <a href="#fitur" class="block px-3 py-3 rounded-lg text-mazerText font-semibold hover:bg-mazerBg">Fitur</a>
                <a href="#alur" class="block px-3 py-3 rounded-lg text-mazerText font-semibold hover:bg-mazerBg">Alur Laporan</a>
                <div class="border-t border-gray-100 my-2 pt-4 flex flex-col gap-3">
                    <a href="#" class="block text-center px-3 py-3 text-mazerDark font-semibold border border-gray-200 rounded-xl hover:bg-gray-50">Masuk</a>
                    <a href="#" class="block text-center px-3 py-3 bg-primary text-white rounded-xl font-bold shadow-md shadow-primary/30">Buat Laporan</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
        <section id="beranda" class="relative pt-20 pb-24 lg:pt-32 lg:pb-40 overflow-hidden">
            <!-- Decorative blobs -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-200/50 rounded-full blur-3xl opacity-60"></div>
                <div class="absolute top-40 -left-24 w-72 h-72 bg-indigo-200/50 rounded-full blur-3xl opacity-60"></div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Hero Text -->
                    <div class="max-w-2xl text-center lg:text-left order-2 lg:order-1">
                        <div class="inline-block bg-blue-100 text-primary font-bold px-4 py-1.5 rounded-full text-sm mb-6 border border-blue-200">
                            📢 Layanan Pengaduan Resmi & Terpercaya
                        </div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-mazerDark leading-[1.15] tracking-tight mb-6">
                            Suara Anda Adalah <br>
                            <span class="text-transparent bg-clip-text bg-gradient-primary">Perubahan Kita</span>
                        </h1>
                        <p class="text-lg sm:text-xl text-mazerText mb-8 leading-relaxed">
                            Laporkan masalah infrastruktur, lingkungan, dan pelayanan publik di sekitar Anda dengan mudah, aman, dan pantau proses penyelesaiannya secara transparan.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <a href="#" class="bg-primary hover:bg-primaryHover text-white px-8 py-4 rounded-xl font-bold text-lg shadow-lg shadow-primary/30 transition-all flex items-center justify-center gap-2">
                                <i class="ph ph-paper-plane-right text-xl"></i>
                                Tulis Pengaduan
                            </a>
                            <a href="#alur" class="bg-white hover:bg-gray-50 text-mazerDark px-8 py-4 rounded-xl font-bold text-lg shadow-mazer transition-all flex items-center justify-center gap-2 border border-gray-100">
                                <i class="ph ph-info text-xl"></i>
                                Pelajari Alur
                            </a>
                        </div>
                    </div>

                    <!-- Hero Image / Composition (Mazer Style) -->
                    <div class="relative order-1 lg:order-2">
                        <!-- Abstract Dashboard UI Representation -->
                        <div class="relative w-full max-w-lg mx-auto">
                            <!-- Main Card -->
                            <div class="bg-white rounded-2xl shadow-mazer-lg border border-gray-100 p-6 relative z-10 transform translate-x-4 lg:translate-x-0">
                                <div class="flex items-center justify-between mb-6 border-b border-gray-100 pb-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-primary">
                                            <i class="ph ph-user-circle text-2xl"></i>
                                        </div>
                                        <div>
                                            <div class="h-3 w-24 bg-gray-200 rounded-full mb-2"></div>
                                            <div class="h-2 w-16 bg-gray-100 rounded-full"></div>
                                        </div>
                                    </div>
                                    <div class="px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full">Selesai</div>
                                </div>
                                <div class="space-y-3 mb-6">
                                    <div class="h-4 w-3/4 bg-gray-200 rounded-full"></div>
                                    <div class="h-4 w-full bg-gray-100 rounded-full"></div>
                                    <div class="h-4 w-5/6 bg-gray-100 rounded-full"></div>
                                </div>
                                <div class="w-full h-32 bg-blue-50 rounded-xl flex items-center justify-center border border-blue-100 border-dashed">
                                    <i class="ph ph-image text-4xl text-blue-300"></i>
                                </div>
                            </div>

                            <!-- Floating Elements -->
                            <div class="absolute -top-6 -left-6 bg-white p-4 rounded-xl shadow-mazer-lg border border-gray-100 z-20 animate-bounce" style="animation-duration: 3s;">
                                <div class="flex items-center gap-3">
                                    <div class="bg-green-100 text-green-500 p-2 rounded-lg">
                                        <i class="ph ph-check-circle text-xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-xs text-mazerText font-semibold">Status</div>
                                        <div class="text-sm text-mazerDark font-bold">Laporan Diterima</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="absolute -bottom-8 -right-4 bg-white p-4 rounded-xl shadow-mazer-lg border border-gray-100 z-20">
                                <div class="flex items-center gap-4">
                                    <div class="bg-orange-100 text-orange-500 p-3 rounded-full">
                                        <i class="ph ph-bell-ringing text-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-xl text-mazerDark font-extrabold">24/7</div>
                                        <div class="text-xs text-mazerText font-semibold">Respon Cepat</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section (Mazer Card Style) -->
        <section id="statistik" class="py-12 bg-white border-y border-gray-100">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Stat 1 -->
                    <div class="mazer-card p-6 flex items-center gap-4">
                        <div class="w-14 h-14 rounded-xl bg-blue-100 text-primary flex items-center justify-center shrink-0">
                            <i class="ph ph-files text-3xl"></i>
                        </div>
                        <div>
                            <h6 class="text-mazerText font-semibold text-sm uppercase tracking-wide">Total Laporan</h6>
                            <h3 class="text-2xl font-extrabold text-mazerDark mt-1">12.450</h3>
                        </div>
                    </div>
                    <!-- Stat 2 -->
                    <div class="mazer-card p-6 flex items-center gap-4">
                        <div class="w-14 h-14 rounded-xl bg-green-100 text-green-600 flex items-center justify-center shrink-0">
                            <i class="ph ph-check-circle text-3xl"></i>
                        </div>
                        <div>
                            <h6 class="text-mazerText font-semibold text-sm uppercase tracking-wide">Selesai</h6>
                            <h3 class="text-2xl font-extrabold text-mazerDark mt-1">10.210</h3>
                        </div>
                    </div>
                    <!-- Stat 3 -->
                    <div class="mazer-card p-6 flex items-center gap-4">
                        <div class="w-14 h-14 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center shrink-0">
                            <i class="ph ph-spinner-gap text-3xl"></i>
                        </div>
                        <div>
                            <h6 class="text-mazerText font-semibold text-sm uppercase tracking-wide">Diproses</h6>
                            <h3 class="text-2xl font-extrabold text-mazerDark mt-1">1.840</h3>
                        </div>
                    </div>
                    <!-- Stat 4 -->
                    <div class="mazer-card p-6 flex items-center gap-4">
                        <div class="w-14 h-14 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center shrink-0">
                            <i class="ph ph-buildings text-3xl"></i>
                        </div>
                        <div>
                            <h6 class="text-mazerText font-semibold text-sm uppercase tracking-wide">Instansi</h6>
                            <h3 class="text-2xl font-extrabold text-mazerDark mt-1">85+</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="fitur" class="py-20 lg:py-28">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h4 class="text-primary font-bold uppercase tracking-wider mb-2">Mengapa LaporWarga?</h4>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-mazerDark mb-4">Layanan Pengaduan yang Lebih Baik</h2>
                    <p class="text-lg text-mazerText">Kami merancang sistem yang mempermudah masyarakat dan instansi untuk terhubung dan menyelesaikan masalah bersama-sama.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="mazer-card p-8 border-t-4 border-t-primary">
                        <div class="w-16 h-16 rounded-2xl bg-blue-50 text-primary flex items-center justify-center mb-6">
                            <i class="ph ph-shield-check text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-mazerDark mb-3">Aman & Anonim</h3>
                        <p class="text-mazerText leading-relaxed">
                            Kerahasiaan identitas Anda adalah prioritas kami. Anda dapat memilih untuk melaporkan masalah secara anonim untuk perlindungan ekstra.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="mazer-card p-8 border-t-4 border-t-green-500">
                        <div class="w-16 h-16 rounded-2xl bg-green-50 text-green-500 flex items-center justify-center mb-6">
                            <i class="ph ph-magnifying-glass text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-mazerDark mb-3">Mudah Ditelusuri</h3>
                        <p class="text-mazerText leading-relaxed">
                            Dapatkan nomor tiket untuk setiap laporan. Pantau status pengaduan Anda secara real-time dari diterimanya hingga selesai ditindaklanjuti.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="mazer-card p-8 border-t-4 border-t-orange-500">
                        <div class="w-16 h-16 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center mb-6">
                            <i class="ph ph-lightning text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-mazerDark mb-3">Respon Cepat</h3>
                        <p class="text-mazerText leading-relaxed">
                            Laporan langsung diteruskan ke instansi terkait yang berwenang, mempercepat birokrasi dan memastikan masalah ditangani secepatnya.
                        </p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="mazer-card p-8 border-t-4 border-t-purple-500">
                        <div class="w-16 h-16 rounded-2xl bg-purple-50 text-purple-500 flex items-center justify-center mb-6">
                            <i class="ph ph-camera text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-mazerDark mb-3">Dukungan Bukti Visual</h3>
                        <p class="text-mazerText leading-relaxed">
                            Lampirkan foto dan lokasi akurat (GPS) kejadian untuk memperkuat laporan Anda, sehingga petugas lapangan lebih mudah menemukan lokasi.
                        </p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="mazer-card p-8 border-t-4 border-t-cyan-500">
                        <div class="w-16 h-16 rounded-2xl bg-cyan-50 text-cyan-500 flex items-center justify-center mb-6">
                            <i class="ph ph-users text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-mazerDark mb-3">Forum Terbuka</h3>
                        <p class="text-mazerText leading-relaxed">
                            Lihat laporan publik di sekitar Anda, berikan dukungan (upvote) agar laporan tersebut mendapatkan prioritas lebih tinggi oleh instansi.
                        </p>
                    </div>

                    <!-- Feature 6 -->
                    <div class="mazer-card p-8 border-t-4 border-t-rose-500">
                        <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-500 flex items-center justify-center mb-6">
                            <i class="ph ph-chart-bar text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-mazerDark mb-3">Data Terpusat</h3>
                        <p class="text-mazerText leading-relaxed">
                            Semua data laporan dianalisis untuk membantu pemerintah memetakan wilayah rawan dan mengoptimalkan pembangunan daerah.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Alur Laporan Section -->
        <section id="alur" class="py-20 lg:py-28 bg-white border-t border-gray-100">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h4 class="text-primary font-bold uppercase tracking-wider mb-2">Langkah Mudah</h4>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-mazerDark mb-4">Bagaimana Cara Kerjanya?</h2>
                    <p class="text-lg text-mazerText">Hanya butuh 4 langkah sederhana untuk membuat perubahan di lingkungan Anda.</p>
                </div>

                <div class="relative">
                    <!-- Line connecting steps (hidden on mobile) -->
                    <div class="hidden lg:block absolute top-1/2 left-[10%] right-[10%] h-1 bg-blue-100 -translate-y-1/2 z-0"></div>

                    <div class="grid lg:grid-cols-4 gap-12 lg:gap-6 relative z-10">
                        <!-- Step 1 -->
                        <div class="text-center relative">
                            <div class="w-20 h-20 mx-auto bg-white rounded-2xl shadow-mazer border-2 border-primary text-primary flex items-center justify-center mb-6 relative z-10 transition hover:scale-110">
                                <i class="ph ph-pencil-simple text-3xl font-bold"></i>
                                <div class="absolute -top-3 -right-3 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold text-sm shadow-md">1</div>
                            </div>
                            <h3 class="text-xl font-bold text-mazerDark mb-2">Tulis Laporan</h3>
                            <p class="text-mazerText text-sm">Ceritakan keluhan Anda secara jelas, sertakan foto dan lokasi detail.</p>
                        </div>

                        <!-- Step 2 -->
                        <div class="text-center relative">
                            <div class="w-20 h-20 mx-auto bg-white rounded-2xl shadow-mazer border-2 border-primary text-primary flex items-center justify-center mb-6 relative z-10 transition hover:scale-110">
                                <i class="ph ph-check-square-offset text-3xl font-bold"></i>
                                <div class="absolute -top-3 -right-3 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold text-sm shadow-md">2</div>
                            </div>
                            <h3 class="text-xl font-bold text-mazerDark mb-2">Proses Verifikasi</h3>
                            <p class="text-mazerText text-sm">Laporan akan divalidasi oleh admin untuk diteruskan ke instansi terkait.</p>
                        </div>

                        <!-- Step 3 -->
                        <div class="text-center relative">
                            <div class="w-20 h-20 mx-auto bg-white rounded-2xl shadow-mazer border-2 border-primary text-primary flex items-center justify-center mb-6 relative z-10 transition hover:scale-110">
                                <i class="ph ph-wrench text-3xl font-bold"></i>
                                <div class="absolute -top-3 -right-3 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold text-sm shadow-md">3</div>
                            </div>
                            <h3 class="text-xl font-bold text-mazerDark mb-2">Tindak Lanjut</h3>
                            <p class="text-mazerText text-sm">Instansi terkait akan memproses keluhan dan memberikan update perkembangan.</p>
                        </div>

                        <!-- Step 4 -->
                        <div class="text-center relative">
                            <div class="w-20 h-20 mx-auto bg-white rounded-2xl shadow-mazer border-2 border-green-500 text-green-500 flex items-center justify-center mb-6 relative z-10 transition hover:scale-110">
                                <i class="ph ph-flag-checkered text-3xl font-bold"></i>
                                <div class="absolute -top-3 -right-3 w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold text-sm shadow-md">4</div>
                            </div>
                            <h3 class="text-xl font-bold text-mazerDark mb-2">Selesai</h3>
                            <p class="text-mazerText text-sm">Masalah terselesaikan. Anda dapat memberikan rating kepuasan pelayanan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-primary -z-20"></div>
            <!-- Decorative Pattern -->
            <div class="absolute inset-0 opacity-10 -z-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
            
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6">Siap Membuat Perubahan?</h2>
                <p class="text-blue-100 text-lg md:text-xl max-w-2xl mx-auto mb-10">
                    Jangan biarkan fasilitas publik yang rusak atau masalah lingkungan dibiarkan. Laporkan sekarang dan jadilah bagian dari solusi.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="bg-white text-primary hover:bg-gray-50 px-8 py-4 rounded-xl font-bold text-lg shadow-lg transition-all flex items-center justify-center gap-2">
                        Buat Laporan Sekarang
                        <i class="ph ph-arrow-right font-bold"></i>
                    </a>
                    <a href="#" class="bg-primaryHover text-white hover:bg-[#25396f] px-8 py-4 rounded-xl font-bold text-lg border border-blue-400/30 transition-all flex items-center justify-center gap-2">
                        Unduh Aplikasi (Android/iOS)
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white pt-16 pb-8 border-t border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 md:gap-8 mb-12">
                <!-- Brand Column -->
                <div class="md:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="bg-primary text-white p-1.5 rounded-lg">
                            <i class="ph ph-megaphone text-xl"></i>
                        </div>
                        <span class="font-extrabold text-xl text-mazerDark">Lapor<span class="text-primary">Warga</span></span>
                    </div>
                    <p class="text-mazerText mb-6 text-sm leading-relaxed">
                        Platform pengaduan masyarakat terpadu untuk memfasilitasi komunikasi antara warga dan instansi pemerintah secara transparan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-mazerBg text-mazerDark flex items-center justify-center hover:bg-primary hover:text-white transition">
                            <i class="ph ph-facebook-logo text-xl"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-mazerBg text-mazerDark flex items-center justify-center hover:bg-primary hover:text-white transition">
                            <i class="ph ph-twitter-logo text-xl"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-mazerBg text-mazerDark flex items-center justify-center hover:bg-primary hover:text-white transition">
                            <i class="ph ph-instagram-logo text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Links 1 -->
                <div>
                    <h4 class="font-bold text-mazerDark mb-6 uppercase text-sm tracking-wider">Tautan Cepat</h4>
                    <ul class="space-y-4">
                        <li><a href="#beranda" class="text-mazerText hover:text-primary transition text-sm">Beranda</a></li>
                        <li><a href="#fitur" class="text-mazerText hover:text-primary transition text-sm">Fitur Aplikasi</a></li>
                        <li><a href="#alur" class="text-mazerText hover:text-primary transition text-sm">Alur Pengaduan</a></li>
                        <li><a href="#" class="text-mazerText hover:text-primary transition text-sm">Statistik Publik</a></li>
                    </ul>
                </div>

                <!-- Links 2 -->
                <div>
                    <h4 class="font-bold text-mazerDark mb-6 uppercase text-sm tracking-wider">Bantuan</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-mazerText hover:text-primary transition text-sm">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-mazerText hover:text-primary transition text-sm">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-mazerText hover:text-primary transition text-sm">FAQ</a></li>
                        <li><a href="#" class="text-mazerText hover:text-primary transition text-sm">Panduan Pengguna</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-bold text-mazerDark mb-6 uppercase text-sm tracking-wider">Hubungi Kami</h4>
                    <ul class="space-y-4">
                        <li class="flex gap-3 text-mazerText text-sm">
                            <i class="ph ph-map-pin-line text-lg text-primary shrink-0"></i>
                            <span>Gedung Pelayanan Publik, Lt. 3<br>Jl. Merdeka No. 1, Jakarta Raya</span>
                        </li>
                        <li class="flex items-center gap-3 text-mazerText text-sm">
                            <i class="ph ph-envelope-simple text-lg text-primary shrink-0"></i>
                            <span>support@laporwarga.go.id</span>
                        </li>
                        <li class="flex items-center gap-3 text-mazerText text-sm">
                            <i class="ph ph-phone text-lg text-primary shrink-0"></i>
                            <span>1500-123 (Layanan Bebas Pulsa)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-8 text-center">
                <p class="text-sm text-mazerText">
                    &copy; <span id="year"></span> LaporWarga. All rights reserved. <br class="md:hidden">Designed inspired by Admin Mazer.
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Interactions -->
    <script>
        // Set current year in footer
        document.getElementById('year').textContent = new Date().getFullYear();

        // Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking a link
        const menuLinks = menu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
            });
        });

        // Simple Navbar Shadow effect on scroll
        const header = document.querySelector('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                header.classList.add('shadow-mazer');
                header.classList.remove('shadow-sm');
            } else {
                header.classList.remove('shadow-mazer');
                header.classList.add('shadow-sm');
            }
        });
    </script>
</body>
</html>