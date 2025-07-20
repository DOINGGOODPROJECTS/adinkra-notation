<x-app-layout>
    @push('links')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css">
    @endpush
    <form action="{{ route('assignments.store') }}" method="post">
        @csrf
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
                        <li class="breadcrumb-item active" aria-current="page">@lang('locale.assignment', ['suffix'=>'s'])</li>
                    </ol>
                </nav>
                <h2 class="h4">@lang('locale.assignment', ['suffix'=>'s'])</h2>
                <p class="mb-0">@lang('locale.assignment_list')</p>
            </div>
            <div class="btn-toolbar mb-1 mb-md-0"></div>
        </div>
        <div class="mb-2">
            <div class="accordion mt-2" id="formAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header bg-white" id="headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            @lang('locale.assignment', ['suffix'=>''])
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#formAccordion">
                        <div class="accordion-body">
                            <div class="row my-2">
                                <div class="col-12 mb-3">
                                    <label for="assigned_to">Jury <span class="text-danger">*</span></label>
                                    <select id="assigned_to" class="w-100" name="user_id[]" multiple required>
                                        <option disabled>@lang('locale.jury', ['suffix'=>'s'])</option>
                                        @foreach ($juries as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name. " / ".$item->email." - ".$item->assignments->count()." ".__('locale.assignment', ['suffix'=>'']) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

<!--                                 <div class="col-12 mb-3">
                                    <label for="evaluation_deadline">DeadLine <span class="text-danger">*</span></label>
                                    <input type="date" name="evaluation_deadline" id="evaluation_deadline" class="form-control" required>
                                </div> -->
                                
                                <div class="col-12">
                                    <button class="btn btn-block text-center btn-gray-800 d-inline-flex align-items-center">
                                        @lang('locale.submit')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive py-4">
                    <table class="table user-table table-flush table-hover table-striped" id="datatable-vertical">
                        <thead class="thead-light">
                            <th class="border-gray-200">
                                <div class="form-check dashboard-check">
                                    <input class="form-check-input" type="checkbox" id="select-a"> 
                                    <label class="form-check-label" for="select-a"></label>
                                </div>
                            </th>
                            <th class="border-gray-200">@lang('locale.photo') & @lang('locale.cv')</th>
                            <th class="border-gray-200">@lang('locale.award_category')</th>
                            <th class="border-gray-200">LANGUE</th>
                            <th class="border-gray-200">@lang('locale.full_name')</th>
                            <th class="border-gray-200">@lang('locale.email') & @lang('locale.phone')</th>
                            <th class="border-gray-200">@lang('locale.country') & @lang('locale.address')</th>
                            <th class="border-gray-200">@lang('locale.occupation') & @lang('locale.personnal_website')</th>
                            <th class="border-gray-200">@lang('locale.organization') & @lang('locale.organization_website')</th>
                            <th class="border-gray-200">@lang('locale.team_count')</th>
                            <th class="border-gray-200">@lang('locale.assigned')</th>
                            <th class="border-gray-200">@lang('locale.action', ['suffix'=>'s'])</th>
                        </thead>
                        <tbody>
                            @foreach ($submissions as $item)
                            <tr>
                                <td>
                                    <div class="form-check dashboard-check">
                                        <input class="form-check-input" type="checkbox" id="userCheck{{ $item->id }}" name="ids[{{ $item->id }}]"> 
                                        <label class="form-check-label" for="userCheck{{ $item->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ $item->photo }}" class="avatar img-fluid me-3" alt="LOGO">
                                    <a href="{{ $item->cv }}" target="_blank">
                                        <svg fill="#000000" version="1.1" style="height: 25px; width: 25px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 45.057 45.057" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="_x35_8_24_"> <g> <path d="M19.558,25.389c-0.067,0.176-0.155,0.328-0.264,0.455c-0.108,0.129-0.24,0.229-0.396,0.301 c-0.156,0.072-0.347,0.107-0.57,0.107c-0.313,0-0.572-0.068-0.78-0.203c-0.208-0.137-0.374-0.316-0.498-0.541 c-0.124-0.223-0.214-0.477-0.27-0.756c-0.057-0.279-0.084-0.564-0.084-0.852c0-0.289,0.027-0.572,0.084-0.853 c0.056-0.281,0.146-0.533,0.27-0.756c0.124-0.225,0.29-0.404,0.498-0.541c0.208-0.137,0.468-0.203,0.78-0.203 c0.271,0,0.494,0.051,0.666,0.154c0.172,0.105,0.31,0.225,0.414,0.361c0.104,0.137,0.176,0.273,0.216,0.414 c0.04,0.139,0.068,0.25,0.084,0.33h2.568c-0.112-1.08-0.49-1.914-1.135-2.502c-0.644-0.588-1.558-0.887-2.741-0.895 c-0.664,0-1.263,0.107-1.794,0.324c-0.532,0.215-0.988,0.52-1.368,0.912c-0.38,0.392-0.672,0.863-0.876,1.416 c-0.204,0.551-0.307,1.165-0.307,1.836c0,0.631,0.097,1.223,0.288,1.77c0.192,0.549,0.475,1.021,0.847,1.422 s0.825,0.717,1.361,0.949c0.536,0.23,1.152,0.348,1.849,0.348c0.624,0,1.18-0.105,1.668-0.312 c0.487-0.209,0.897-0.482,1.229-0.822s0.584-0.723,0.756-1.146c0.172-0.422,0.259-0.852,0.259-1.283h-2.593 C19.68,25.023,19.627,25.214,19.558,25.389z"></path> <polygon points="26.62,24.812 26.596,24.812 25.192,19.616 22.528,19.616 25.084,28.184 28.036,28.184 30.713,19.616 28,19.616 "></polygon> <path d="M33.431,0H5.179v45.057h34.699V6.251L33.431,0z M36.878,42.056H8.179V3h23.706v4.76h4.992L36.878,42.056L36.878,42.056z"></path> </g> </g> </g> </g></svg>
                                    </a>
                                </td>
                                <td>{{ $item->award_category }}</td>
                                <td>{{ $item->lang }}</td>
                                <td>
                                    <div class="d-block">
                                        <span class="fw-bold"> {{ $item->fullname }}</span>
                                        <div class="small text-gray">
                                            <span class="__cf_email__">{{ $item->nationality }}</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-block">
                                        <span class="fw-bold"> {{ $item->phone }}</span>
                                        <div class="small text-gray">
                                            <span class="__cf_email__">{{ $item->email }}</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-block">
                                        <span class="fw-bold"> {{ $item->country }}</span>
                                        <div class="small text-gray">
                                            <span class="__cf_email__">{{ $item->address }}</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-block">
                                        <span class="fw-bold"> {{ $item->occupation }}</span>
                                        <div class="small text-gray">
                                            <span class="__cf_email__">{{ $item->personnal_website }}</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-block">
                                        <span class="fw-bold"> {{ $item->organization }}</span>
                                        <div class="small text-gray">
                                            <span class="__cf_email__">{{ $item->organization_website }}</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="fw-normal">{{ $item->team_count }}</span></td>
                                <td>
                                    <span class="fw-normal">
                                        @if ($item->assigned_to)
                                            <svg class="icon icon-xxs text-success me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                            </svg> @lang('locale.assigned')
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="icon icon-sm"><span class="fas fa-ellipsis-h icon-dark"></span></span>
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu py-0">
                                            <a class="dropdown-item rounded-top" href="https://demo.themesberg.com/volt-pro/invoice.html">
                                                <span class="fas fa-eye me-2"></span>View Details
                                            </a> 
                                            <a class="dropdown-item" href="transactions.html#"><span class="fas fa-edit me-2"></span>Edit</a> 
                                            <a class="dropdown-item text-danger rounded-bottom" href="transactions.html#">
                                                <span class="fas fa-trash-alt me-2"></span>Remove
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>


    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script>
        new DataTable('#datatable-vertical', {
            paging: false,
            scrollCollapse: true,
            scrollY: '400px'
        });
        document.addEventListener('DOMContentLoaded', function () {
            const masterCheckbox = document.getElementById('select-a');
            const checkboxes = document.querySelectorAll('tbody > tr > td > .form-check > input.form-check-input');

            masterCheckbox.onclick = function () {
                if (this.checked) {
                    console.log(checkboxes)

                    checkboxes.forEach(function(cb) { 
                        // alert('OK')
                        cb.setAttribute('checked', 'true'); 
                        cb.checked = true
                    });
                } else {
                    console.log(checkboxes)

                    checkboxes.forEach(function(cb) { 
                        // alert('OK')
                        cb.setAttribute('checked', 'false'); 
                        cb.checked = false
                    });
                }
            };
        });
    </script>
    @endpush
</x-app-layout>
