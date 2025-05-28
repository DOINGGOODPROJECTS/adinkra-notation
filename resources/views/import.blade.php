<x-app-layout>
    @push('links')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">    
    @endpush

    <div class="accordion mt-4" id="accordionPricing">
        <div class="accordion-item">
            <h2 class="accordion-header bg-white" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Structure du Fichier Excel
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionPricing">
                <div class="accordion-body">
                    <p class="text-danger text-muted">Tel que les fichiers au format xlsx sont exportés des résultats des formulaires de Candidature de Adinkra Fellowship de TypeForm, importez comme tels</p>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-file-import me-2"></i>Importer un Fichier Excel
            </h6>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
            <p class="text-success text-muted bg-success">{{ session('success') }}</p>
            @endif
            <form action="{{ route('submissions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Fichier Excel -->
                <div class="mb-4">
                    <label class="form-label block mb-2">
                        Fichier Excel (.xlsx, .xls) <span class="text-danger">*</span>
                    </label>
                    
                    <!-- Zone de Drag & Drop compacte -->
                    <div 
                        x-data="{ isDragging: false }"
                        @dragenter.prevent="isDragging = true"
                        @dragleave.prevent="isDragging = false"
                        @dragover.prevent
                        @drop.prevent="isDragging = false; $refs.fileInput.files = event.dataTransfer.files"
                        class="border-2 border-dashed rounded-xl p-4 text-center transition-all cursor-pointer"
                        :class="{
                            'border-primary bg-primary-50': isDragging,
                            'border-gray-300': !isDragging,
                            'border-danger': $errors->has('file')
                        }"
                        style="height: 120px;"
                        onclick="document.getElementById('fileInput').click()"
                    >
                        <div class="flex flex-col items-center justify-center h-full">
                            <!-- Version compacte sans icône -->
                            <p x-show="!$refs.fileInput?.files?.length" class="text-sm mb-1">
                                <span class="text-primary font-medium">Cliquez pour sélectionner</span> ou glissez-déposez
                            </p>
                            
                            <!-- Fichier sélectionné (version compacte) -->
                            <template x-if="$refs.fileInput?.files?.length">
                                <div class="text-sm mt-1 px-3 py-1.5 bg-gray-100 rounded-full inline-flex items-center">
                                    <i class="fas fa-file-excel text-success me-2"></i>
                                    <span x-text="$refs.fileInput.files[0].name" class="truncate max-w-xs"></span>
                                    <button 
                                        type="button"
                                        @click.stop="$refs.fileInput.value = null"
                                        class="ms-2 text-danger hover:text-danger-dark"
                                    >
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                            </template>
                        </div>

                        <!-- Input caché -->
                        <input 
                            x-ref="fileInput"
                            id="fileInput"
                            type="file" 
                            class="hidden" 
                            name="file" 
                            accept=".xlsx,.xls"
                            required
                            @change="if ($event.target.files.length) { isDragging = false }"
                        >
                    </div>

                    <!-- Message d'erreur compact -->
                    @error('file')
                        <div class="text-danger text-xs mt-1 flex items-start">
                            <i class="fas fa-exclamation-circle mt-0.5 me-1"></i> 
                            <span>{{ $message }}</span>
                        </div>
                    @enderror

                    <!-- Lien modèle version compacte -->
                    <div class="mt-1">
                        <a href="/templates/submission-template.xlsx" class="text-primary hover:underline text-xs">
                            <i class="fas fa-download me-1"></i> Télécharger le modèle
                        </a>
                    </div>
                </div>

                <!-- Bouton d'import -->
                <button class="btn btn-block w-full btn-primary">
                    <i class="fas fa-upload me-2"></i>Importer
                </button>
            </form>
        </div>
    </div>    
</x-app-layout>
