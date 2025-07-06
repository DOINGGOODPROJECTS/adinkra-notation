<x-app-layout>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-1 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('locale.notation', ['suffix'=>'s'])</li>
                </ol>
            </nav>
            <h2 class="h4">@lang('locale.submission', ['suffix'=>'']) N° {{ $submission->id }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ $submission->photo }}" style="height: 150px; width: 150px" class="avatar-xl" alt="PHOTO">
                            <a href="{{ route('submissions.show', $submission->id) }}" target="_blank">
                                <svg fill="#000000" version="1.1" style="height: 25px; width: 25px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 45.057 45.057" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="_x35_8_24_"> <g> <path d="M19.558,25.389c-0.067,0.176-0.155,0.328-0.264,0.455c-0.108,0.129-0.24,0.229-0.396,0.301 c-0.156,0.072-0.347,0.107-0.57,0.107c-0.313,0-0.572-0.068-0.78-0.203c-0.208-0.137-0.374-0.316-0.498-0.541 c-0.124-0.223-0.214-0.477-0.27-0.756c-0.057-0.279-0.084-0.564-0.084-0.852c0-0.289,0.027-0.572,0.084-0.853 c0.056-0.281,0.146-0.533,0.27-0.756c0.124-0.225,0.29-0.404,0.498-0.541c0.208-0.137,0.468-0.203,0.78-0.203 c0.271,0,0.494,0.051,0.666,0.154c0.172,0.105,0.31,0.225,0.414,0.361c0.104,0.137,0.176,0.273,0.216,0.414 c0.04,0.139,0.068,0.25,0.084,0.33h2.568c-0.112-1.08-0.49-1.914-1.135-2.502c-0.644-0.588-1.558-0.887-2.741-0.895 c-0.664,0-1.263,0.107-1.794,0.324c-0.532,0.215-0.988,0.52-1.368,0.912c-0.38,0.392-0.672,0.863-0.876,1.416 c-0.204,0.551-0.307,1.165-0.307,1.836c0,0.631,0.097,1.223,0.288,1.77c0.192,0.549,0.475,1.021,0.847,1.422 s0.825,0.717,1.361,0.949c0.536,0.23,1.152,0.348,1.849,0.348c0.624,0,1.18-0.105,1.668-0.312 c0.487-0.209,0.897-0.482,1.229-0.822s0.584-0.723,0.756-1.146c0.172-0.422,0.259-0.852,0.259-1.283h-2.593 C19.68,25.023,19.627,25.214,19.558,25.389z"></path> <polygon points="26.62,24.812 26.596,24.812 25.192,19.616 22.528,19.616 25.084,28.184 28.036,28.184 30.713,19.616 28,19.616 "></polygon> <path d="M33.431,0H5.179v45.057h34.699V6.251L33.431,0z M36.878,42.056H8.179V3h23.706v4.76h4.992L36.878,42.056L36.878,42.056z"></path> </g> </g> </g> </g></svg>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="first_name">@lang('locale.full_name')</label> 
                            <input class="form-control" id="first_name" type="text" value="{{ $submission->fullname }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>@lang('locale.birthday')</label>
                            <input class="form-control" itype="text" value="{{ $submission->birthday }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name">@lang('locale.nationality')</label> 
                            <input class="form-control" id="last_name" type="text"  value="{{ $submission->nationality }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>@lang('locale.country')</label>
                            <input class="form-control" type="text" value="{{ $submission->country }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>@lang('locale.address')</label> 
                            <input class="form-control" type="text"  value="{{ $submission->address }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>@lang('locale.phone')</label> 
                            <input class="form-control" type="text"  value="{{ $submission->phone }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>@lang('locale.email')</label>
                            <input class="form-control" type="text" value="{{ $submission->email }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>@lang('locale.award_category')</label> 
                            <input class="form-control" type="text"  value="{{ $submission->award_category }}" readonly>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label>@lang('locale.occupation')</label> 
                            <input class="form-control" type="text"  value="{{ $submission->occupation }}" readonly>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="accordion mt-2" id="accordionPricing">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            @lang('locale.organization')
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionPricing">
                                        <div class="accordion-body">
                                            <p class="text-muted">{{ $submission->organization }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>@lang('locale.organization_website')</label> 
                            <input class="form-control" type="text" value="{{ $submission->organization_website }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>@lang('locale.personnal_website')</label> 
                            <input class="form-control" type="text"  value="{{ $submission->personnal_website }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>@lang('locale.team_count')</label> 
                            <input class="form-control" type="text" value="{{ $submission->team_count }}" readonly>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="accordion mt-2" id="organizationPresentation">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingTwo">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            @lang('locale.organization_presentation')
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#organizationPresentation">
                                        <div class="accordion-body">
                                            <p class="text-muted" style="text-align: justify">{{ $submission->organization_presentation }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label>@lang('locale.leadership_skills')</label> 
                            <input class="form-control" type="text" value="{{ $submission->leadership_skills }}" readonly>
                        </div>

                        <div class="col-12">
                            <div class="accordion mt-2" id="realizations">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingThree">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            @lang('locale.realisations')
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#realizations">
                                        <div class="accordion-body">
                                            <p class="text-muted" style="text-align: justify">{{ $submission->realisations }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="accordion mt-2" id="community-impact">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingFour">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                            @lang('locale.community_impacts')
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#community-impact">
                                        <div class="accordion-body">
                                            <p class="text-muted" style="text-align: justify">{{ $submission->community_impact }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="accordion mt-2" id="leadership-challenge">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingFive">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                            @lang('locale.leadership_challenges')
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#leadership-challenge">
                                        <div class="accordion-body">
                                            <p class="text-muted" style="text-align: justify">{{ $submission->leadership_challenge }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="accordion mt-2" id="contribution">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingSix">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                            @lang('locale.contributions')
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix" data-bs-parent="#contribution">
                                        <div class="accordion-body">
                                            <p class="text-muted" style="text-align: justify">{{ $submission->contribution }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="accordion mt-2" id="expected_from_adinkra">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingSeven">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                            @lang('locale.expected_from_adinkra')
                                        </button>
                                    </h2>
                                    <div id="collapseSeven" class="accordion-collapse collapse show" aria-labelledby="headingSeven" data-bs-parent="#expected_from_adinkra">
                                        <div class="accordion-body">
                                            <p class="text-muted" style="text-align: justify">{{ $submission->expected_from_adinkra }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="accordion mt-2" id="leadership_award">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingEight">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                            @lang('locale.leadership_awards')
                                        </button>
                                    </h2>
                                    <div id="collapseEight" class="accordion-collapse collapse show" aria-labelledby="headingEight" data-bs-parent="#leadership_award">
                                        <div class="accordion-body">
                                            <p class="text-muted" style="text-align: justify">{{ $submission->leadership_award }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="accordion mt-2" id="biography">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingNine">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                                            @lang('locale.biography')
                                        </button>
                                    </h2>
                                    <div id="collapseNine" class="accordion-collapse collapse show" aria-labelledby="headingNine" data-bs-parent="#biography">
                                        <div class="accordion-body">
                                            <p class="text-muted" style="text-align: justify">{{ $submission->biography }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="accordion mt-2" id="biography">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingNine">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                                            @lang('locale.motivation_video')
                                        </button>
                                    </h2>
                                    <div id="collapseNine" class="accordion-collapse collapse show" aria-labelledby="headingNine" data-bs-parent="#biography">
                                        <div class="accordion-body">
                                            @if(Illuminate\Support\Str::contains($submission->motivation_video, 'youtu'))
                                                @php
                                                    $url = $submission->motivation_video;
                                                    // Gérer les deux cas : youtube.com/watch?v=... ou youtu.be/...
                                                    $videoId = Illuminate\Support\Str::contains($url, 'youtu.be')
                                                        ? Illuminate\Support\Str::afterLast($url, '/')
                                                        : Illuminate\Support\Str::afterLast($url, 'v=');
                                                @endphp

                                                <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/{{ $videoId }}"
                                                    title="Vidéo de motivation"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                                </iframe>
                                            @else
                                                <p class="text-muted" style="text-align: justify">
                                                    <a href="{{ $submission->motivation_video }}" target="_blank">
                                                        {{ $submission->motivation_video }}
                                                    </a>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="accordion mt-2" id="biography">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white" id="headingNine">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                                            @lang('locale.additional_video')
                                        </button>
                                    </h2>
                                    <div id="collapseNine" class="accordion-collapse collapse show" aria-labelledby="headingNine" data-bs-parent="#biography">
                                        <div class="accordion-body">
                                            @if(Illuminate\Support\Str::contains($submission->others_video_link, 'youtu'))
                                                @php
                                                    $url = $submission->others_video_link;
                                                    // Gérer les deux cas : youtube.com/watch?v=... ou youtu.be/...
                                                    $videoId = Illuminate\Support\Str::contains($url, 'youtu.be')
                                                        ? Illuminate\Support\Str::afterLast($url, '/')
                                                        : Illuminate\Support\Str::afterLast($url, 'v=');
                                                @endphp

                                                <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/{{ $videoId }}"
                                                    title="Vidéo de motivation"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                                </iframe>
                                            @else
                                                <p class="text-muted" style="text-align: justify">
                                                    <a href="{{ $submission->others_video_link }}" target="_blank">
                                                        {{ $submission->others_video_link }}
                                                    </a>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ $evaluations->isNotEmpty() ? route('evaluations.updatestore') : route('evaluations.store') }}" method="post">
        @csrf
        <input type="hidden" name="jury_id" value="{{ auth()->id() }}">
        <input type="hidden" name="submission_id" value="{{ $submission->id }}">
        <div class="row">
            <div class="col-12">
                <div class="card card-body border-0 shadow mb-4">
                    <div class="card-header">
                        <h4 class="card-title">@lang('locale.notation', ['suffix'=>''])</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="leadership">Leadership & Vision (20%) <span class="text-danger">*</span></label>
                                    <ul>
                                        <li style="font-size: 11px">Proven leadership within their field or community.</li>
                                        <li style="font-size: 11px">Clarity of vision for generating impact.</li>
                                        <li style="font-size: 11px">Ability to inspire and mobilize others.</li>
                                    </ul>
                                    <input type="number" id="leadership" name="criteria_id[1]" class="form-control"
                                        placeholder="@lang('locale.notation', ['suffix'=>'']) / 20"
                                        min="0" max="20" step="0.01" value="{{ $evaluations->isNotEmpty() ? $evaluations->firstwhere('criteria_id', 1)->score : '' }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="innovation">Innovation & Creativity (20%) <span class="text-danger">*</span></label>
                                    <ul>
                                        <li style="font-size: 11px">Creativity in addressing major challenges in their sector.</li>
                                        <li style="font-size: 11px">Use of innovative solutions to drive change.</li>
                                        <li style="font-size: 11px">Ability to adapt and scale initiatives.</li>
                                    </ul>
                                    <input type="number" id="innovation" name="criteria_id[2]" value="{{ $evaluations->isNotEmpty() ? $evaluations->firstwhere('criteria_id', 2)->score : '' }}" step="0.01" class="form-control" placeholder="@lang('locale.notation', ['suffix'=>'']) / 20" min="0" max="20" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="impact">Impact & Achievements (40%) <span class="text-danger">*</span></label>
                                    <ul>
                                        <li style="font-size: 11px">Tangible accomplishments in business, social innovation, or civic engagement.</li>
                                        <li style="font-size: 11px">Scale and sustainability of their work.</li>
                                        <li style="font-size: 11px">Proven track record of positive change.</li>
                                    </ul>
                                    <input type="number" id="impact" step="0.01" name="criteria_id[3]" class="form-control" value="{{ $evaluations->isNotEmpty() ? $evaluations->firstwhere('criteria_id', 3)->score : '' }}" placeholder="@lang('locale.notation', ['suffix'=>'']) / 40" min="0" max="40" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="contribution">Contribution to Strengthening Africa-Diaspora Ties(20%) <span class="text-danger">*</span></label>
                                    <ul>
                                        <li style="font-size: 11px">Potential to foster stronger economic or social ties between Africa and the diaspora.</li>
                                        <li style="font-size: 11px">Commitment to contributing to the Adinkra network and future cohorts.</li>
                                    </ul>
                                    <input type="number" id="contribution" step="0.01" name="criteria_id[4]" class="form-control" value="{{ $evaluations->isNotEmpty() ? $evaluations->firstwhere('criteria_id', 4)->score : '' }}" placeholder="@lang('locale.notation', ['suffix'=>'']) / 20" min="0" max="20" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-sm btn-gray-800 w-100">
                                    @lang('locale.submit')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    
</x-app-layout>
