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
                    <li class="breadcrumb-item active" aria-current="page">@lang('locale.jury', ['suffix'=>app()->getLocale() == 'en' ? 'ies' : ''])</li>
                </ol>
            </nav>
            <h2 class="h4">@lang('locale.jury', ['suffix'=>app()->getLocale() == 'en' ? 'ies' : ''])</h2>
            <p class="mb-0">@lang('locale.jury_members_list')</p>
        </div>
        <div class="btn-toolbar mb-1 mb-md-0">
            <a data-bs-toggle="modal" data-bs-target="#new-jury" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg> @lang('locale.new_member')
            </a>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive py-4">
            <table class="table table-flush table-hover table-striped" id="datatable">
                <thead class="thead-light">
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">@lang('locale.full_name')</th>
                    <th class="border-gray-200">@lang('locale.email')</th>
                    <th class="border-gray-200">@lang('locale.submission', ['suffix'=>'s'])</th>
                    <th class="border-gray-200">@lang('locale.result', ['suffix'=>'s'])</th>
                    <th class="border-gray-200">@lang('locale.action', ['suffix'=>'s'])</th>
                </thead>
                <tbody>
                    @foreach ($juries as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><span class="fw-normal">{{ $item->name }}</span></td>
                        <td><span class="fw-normal">{{ $item->email }}</span></td>
                        <td><span class="fw-normal">{{ $item->assignments->count() }}</span></td>
                        <td><span class="fw-bold">{{ $item->evaluations->count() }}</span></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="new-jury" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card p-3 p-lg-4">
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center text-md-center mb-4 mt-md-0">
                        <h1 class="mb-0 h4">@lang('locale.new_member')</h1>
                    </div>
                    <form action="{{ route('users.store') }}" class="mt-4" method="POST">
                        @csrf
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="name">@lang('locale.full_name')</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg> 
                                </span>
                                <input type="text" class="form-control" name="name" placeholder="@lang('locale.full_name')" id="name" required>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="email">@lang('locale.email')</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg> 
                                </span>
                                <input type="email" class="form-control" name="email" placeholder="@lang('locale.your_email')" id="email" required>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password">@lang('locale.password')</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd"></path>
                                    </svg> 
                                </span>
                                <input type="password" name="password" placeholder="@lang('locale.password')" class="form-control" id="password" required>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password_confirmation">@lang('locale.password_confirmation')</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd"></path>
                                    </svg> 
                                </span>
                                <input type="password" name="password_confirmation" placeholder="@lang('locale.password_confirmation')" class="form-control" id="password_confirmation" required>
                            </div>
                        </div>
                        <!-- End of Form -->
                        <div class="d-grid"><button class="btn btn-gray-800">@lang('locale.submit')</button></div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
