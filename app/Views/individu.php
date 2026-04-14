<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-primary">
                    Direktori Anggota Individu
                </h1>
                <p class="text-gray-600">
                    Daftar anggota perorangan (dosen, praktisi, mahasiswa) APTIKOM Jatim.
                </p>
            </div>
            <div class="relative">
                <input
                    type="text"
                    id="search-input"
                    placeholder="Cari anggota..."
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full md:w-64 focus:ring-2 focus:ring-secondary focus:border-transparent outline-none"
                />
                <i data-lucide="search" class="absolute left-3 top-2.5 text-gray-400 w-[18px] h-[18px]"></i>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="member-table">
                    <thead class="bg-[#1A2B48] text-white">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                                Nomor Anggota
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                                Nama Lengkap
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                                Afiliasi / Institusi
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                                Masa Berlaku
                            </th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="table-body">
                        <!-- Data will be rendered here by JS -->
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="flex-1 flex justify-between sm:hidden">
                    <button id="prev-btn-mobile" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Previous
                    </button>
                    <button id="next-btn-mobile" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Next
                    </button>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing <span id="showing-start" class="font-medium">0</span> to <span id="showing-end" class="font-medium">0</span> of <span id="total-results" class="font-medium">0</span> results
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination" id="pagination-nav">
                            <!-- Pagination buttons will be rendered here -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="detail-modal" class="fixed inset-0 z-[9999] overflow-y-auto hidden">
    <!-- Background overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="modal-overlay"></div>

    <!-- Modal container -->
    <div class="flex min-h-full items-center justify-center p-4">
        <!-- Modal panel -->
        <div class="relative bg-white rounded-lg shadow-xl max-w-2xl w-full mx-auto">
            <!-- Header -->
            <div class="bg-primary px-6 py-4 flex items-center justify-between rounded-t-lg">
                <h3 class="text-lg font-bold text-white">Detail Anggota Individu</h3>
                <button id="close-modal-x" class="text-white hover:text-gray-200 transition-colors">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- Content -->
            <div class="bg-white px-6 py-6" id="modal-content">
                <!-- Modal content will be injected here -->
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-6 py-4 flex justify-end rounded-b-lg">
                <button id="close-modal-btn" class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Data from PHP
    const allMembers = <?= json_encode($members) ?>;
    let filteredMembers = [...allMembers];
    let currentPage = 1;
    const itemsPerPage = 10;

    const tableBody = document.getElementById('table-body');
    const searchInput = document.getElementById('search-input');
    const paginationNav = document.getElementById('pagination-nav');
    const showingStart = document.getElementById('showing-start');
    const showingEnd = document.getElementById('showing-end');
    const totalResults = document.getElementById('total-results');
    
    const detailModal = document.getElementById('detail-modal');
    const modalContent = document.getElementById('modal-content');
    const modalOverlay = document.getElementById('modal-overlay');
    const closeModalX = document.getElementById('close-modal-x');
    const closeModalBtn = document.getElementById('close-modal-btn');

    function formatDate(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });
    }

    function renderTable() {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const pageItems = filteredMembers.slice(startIndex, endIndex);

        tableBody.innerHTML = '';

        if (pageItems.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada data yang sesuai dengan pencarian.
                    </td>
                </tr>
            `;
        } else {
            pageItems.forEach(member => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-gray-50 transition-colors';
                tr.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">
                        ${member.employeeNumber}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                        ${member.name}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        ${member.affiliation}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        ${formatDate(member.validityPeriod)}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <button class="detail-btn inline-flex items-center gap-1 px-3 py-1.5 bg-primary text-white text-xs font-medium rounded-lg hover:bg-primary/90 transition-colors" data-id="${member.id}">
                            <i data-lucide="eye" class="w-[14px] h-[14px]"></i>
                            Detail
                        </button>
                    </td>
                `;
                tableBody.appendChild(tr);
            });
        }

        // Update stats
        showingStart.textContent = filteredMembers.length > 0 ? startIndex + 1 : 0;
        showingEnd.textContent = Math.min(endIndex, filteredMembers.length);
        totalResults.textContent = filteredMembers.length;

        // Re-initialize Lucide icons
        lucide.createIcons();
        
        // Add event listeners
        document.querySelectorAll('.detail-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = parseInt(btn.getAttribute('data-id'));
                const member = allMembers.find(m => m.id === id);
                if (member) openModal(member);
            });
        });

        renderPagination();
    }

    function renderPagination() {
        const totalPages = Math.ceil(filteredMembers.length / itemsPerPage);
        paginationNav.innerHTML = '';

        if (totalPages <= 1) return;

        // Previous button
        const prevBtn = createPaginationButton('prev', currentPage > 1);
        paginationNav.appendChild(prevBtn);

        // Page numbers
        for (let i = 1; i <= totalPages; i++) {
            const pageBtn = createPaginationButton(i, true, i === currentPage);
            paginationNav.appendChild(pageBtn);
        }

        // Next button
        const nextBtn = createPaginationButton('next', currentPage < totalPages);
        paginationNav.appendChild(nextBtn);
    }

    function createPaginationButton(type, enabled, active = false) {
        const btn = document.createElement('button');
        btn.className = `relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium ${
            active ? 'z-10 bg-secondary border-secondary text-white' : 'bg-white text-gray-500 hover:bg-gray-50'
        } ${!enabled ? 'opacity-50 cursor-not-allowed' : ''}`;
        
        if (type === 'prev') {
            btn.innerHTML = '<i data-lucide="chevron-left" class="w-5 h-5"></i>';
            if (enabled) btn.onclick = () => { currentPage--; renderTable(); };
        } else if (type === 'next') {
            btn.innerHTML = '<i data-lucide="chevron-right" class="w-5 h-5"></i>';
            if (enabled) btn.onclick = () => { currentPage++; renderTable(); };
        } else {
            btn.textContent = type;
            if (enabled && !active) btn.onclick = () => { currentPage = type; renderTable(); };
        }

        return btn;
    }

    function openModal(member) {
        modalContent.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Nomor Anggota</label>
                    <p class="text-sm font-medium text-primary">${member.employeeNumber}</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Nama Lengkap</label>
                    <p class="text-sm font-bold text-gray-900">${member.name}</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Afiliasi / Institusi</label>
                    <p class="text-sm text-gray-700">${member.affiliation}</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Program Studi</label>
                    <p class="text-sm text-gray-700">${member.studyProgram || '-'}</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Peran</label>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                        ${member.role}
                    </span>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Provinsi</label>
                    <p class="text-sm text-gray-700">${member.province}</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Masa Berlaku</label>
                    <p class="text-sm text-gray-700">${formatDate(member.validityPeriod)}</p>
                </div>
            </div>
        `;
        detailModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        lucide.createIcons();
    }

    function closeModal() {
        detailModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Event listeners
    searchInput.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase();
        filteredMembers = allMembers.filter(member => 
            member.name.toLowerCase().includes(query) ||
            member.affiliation.toLowerCase().includes(query) ||
            member.employeeNumber.toLowerCase().includes(query)
        );
        currentPage = 1;
        renderTable();
    });

    closeModalX.addEventListener('click', closeModal);
    closeModalBtn.addEventListener('click', closeModal);
    modalOverlay.addEventListener('click', closeModal);

    // Initial render
    renderTable();
</script>

<?= $this->endSection() ?>
