<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6 max-w-4xl mx-auto animate-in fade-in duration-500">
    <div class="flex items-center gap-4">
        <a href="/admin/events" class="p-2 bg-white rounded-xl shadow-sm border border-gray-100 text-gray-400 hover:text-primary transition-all">
            <i data-lucide="chevron-left" class="w-6 h-6"></i>
        </a>
        <div>
            <h1 class="text-2xl font-black text-gray-900"><?= $title ?></h1>
            <p class="text-[10px] text-gray-400 italic uppercase tracking-widest font-bold">Portal Events Management</p>
        </div>
    </div>

    <div class="bg-white rounded-[32px] shadow-xl shadow-gray-200/50 p-8 border border-gray-100">
        <form action="<?= isset($event) ? '/admin/events/update/'.$event['id'] : '/admin/events/store' ?>" method="post" class="space-y-8">
            <?= csrf_field() ?>

            <!-- Title Input -->
            <div class="space-y-3">
                <label for="title" class="text-sm font-black text-gray-900">Judul Kegiatan</label>
                <input type="text" name="title" id="title" value="<?= old('title', $event['title'] ?? '') ?>" 
                       class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all font-medium text-gray-900" 
                       placeholder="Masukkan nama kegiatan..." required>
                <?php if (isset(session('errors')['title'])): ?>
                    <p class="text-red-500 text-xs font-bold italic"><?= session('errors')['title'] ?></p>
                <?php endif; ?>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Date Input -->
                <div class="space-y-3">
                    <label for="date" class="text-sm font-black text-gray-900">Tanggal Pelaksanaan</label>
                    <input type="date" name="date" id="date" value="<?= old('date', isset($event) ? date('Y-m-d', strtotime($event['date'])) : '') ?>" 
                           class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:bg-white focus:ring-4 focus:ring-primary/10 transition-all font-medium text-gray-900" 
                           required>
                </div>

                <!-- Type Select -->
                <div class="space-y-3">
                    <label for="type" class="text-sm font-black text-gray-900">Tipe Kegiatan</label>
                    <select name="type" id="type" 
                             class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:bg-white focus:ring-4 focus:ring-primary/10 transition-all font-medium text-gray-900 appearance-none cursor-pointer">
                        <?php foreach ($types as $type): ?>
                            <option value="<?= $type ?>" <?= old('type', $event['type'] ?? '') == $type ? 'selected' : '' ?>>
                                <?= ucfirst($type) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Location Input -->
            <div class="space-y-3">
                <label for="location" class="text-sm font-black text-gray-900">Lokasi / Platform</label>
                <div class="relative">
                    <i data-lucide="map-pin" class="absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-300 w-5 h-5"></i>
                    <input type="text" name="location" id="location" value="<?= old('location', $event['location'] ?? '') ?>" 
                           class="w-full bg-gray-50 border border-gray-100 rounded-2xl pl-12 pr-5 py-4 focus:bg-white focus:ring-4 focus:ring-primary/10 transition-all font-medium text-gray-900" 
                           placeholder="Contoh: Jakarta / Zoom Meeting" required>
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-3">
                <label for="description" class="text-sm font-black text-gray-900">Deskripsi Singkat</label>
                <textarea name="description" id="description" rows="4" 
                          class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:bg-white focus:ring-4 focus:ring-primary/10 transition-all font-medium text-gray-900 leading-relaxed" 
                          placeholder="Berikan ringkasan mengenai kegiatan ini..."><?= old('description', $event['description'] ?? '') ?></textarea>
            </div>

            <!-- Registration Link -->
            <div class="space-y-3">
                <label for="link" class="text-sm font-black text-gray-900">Link Pendaftaran / Info Lanjut</label>
                <input type="url" name="link" id="link" value="<?= old('link', $event['link'] ?? '') ?>" 
                       class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:bg-white focus:ring-4 focus:ring-primary/10 transition-all font-medium text-gray-900" 
                       placeholder="https://example.com/daftar">
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 pt-6">
                <button type="submit" class="flex-grow bg-primary text-white px-8 py-5 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20 flex items-center justify-center gap-3">
                    <i data-lucide="<?= isset($event) ? 'save' : 'plus' ?>" class="w-5 h-5"></i>
                    <?= isset($event) ? 'Simpan Perubahan' : 'Terbitkan Kegiatan' ?>
                </button>
                <a href="/admin/events" class="px-8 py-5 bg-white border-2 border-gray-50 text-gray-400 hover:text-gray-600 rounded-3xl transition-all font-black text-sm flex items-center justify-center">
                    Batalkan
                </a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
