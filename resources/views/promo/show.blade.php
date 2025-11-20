@extends('layouts.app')
@section('meta_title', $promoPage->title)
@section('meta_description', $promoPage->description)

@push('head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
@endpush

@section('content')

<section id="promo-section" class="wrapper flex row flex section-content section-remove-border">
    <div class="flex row ais section-remove-db_lr">
        @if($promoPage->company_logo)
        <img src="{{ Storage::url($promoPage->company_logo) }}" alt="{{ $promoPage->title }}" id="main-image">
        @endif

        <div id="promo-info" class="flex col">
            {{-- @php
                session(['success' => 'Ваш промо-код успешно активирован!']);
                session(['error' => 'Ваш промо-код успешно активирован!']);
                session()->forget(['success', 'error']);
            @endphp --}}
            <!-- Alerts -->
            @if(session('success'))
                <div class="alert alert-success alert-custom">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-custom">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            <h1 class="mb-3">{{ $promoPage->title }}</h1>
            @if($promoPage->main_image)
                <div class="flex row aie" id="company-logo-wrapper">
                    <img src="{{ Storage::url($promoPage->main_image) }}" alt="{{ $promoPage->company_name }}" id="company-logo">
                    <h2>{{$promoPage->company_name}}</h2>
                </div>
            @endif
            <!-- Countdown -->
            <div class="countdown" id="countdown">
                <div class="countdown-item">
                    <span class="countdown-number" id="days">0</span>
                    <span><small class="countdown-label">days</small></span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="hours">0</span>
                    <span><small class="countdown-label">hours</small></span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="minutes">0</span>
                    <span><small class="countdown-label">minutes</small></span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="seconds">0</span>
                    <span><small class="countdown-label">seconds</small></span>
                </div>
            </div>
            <!-- Stats -->
            @if($promoPage->max_participants)
                <div class="stats-section flex col">
                    <h5>
                        <i class="fas fa-users"></i>
                        Participants: {{ $promoPage->current_participants }} / {{ $promoPage->max_participants }}
                    </h5>
                    <div class="progress-custom w-full">
                        <div class="progress-bar-custom" style="width: {{ $promoPage->getParticipationProgress() }}%"></div>
                    </div>
                </div>
            @endif
            @if($promoPage->description)
                <p>{{ $promoPage->description }}</p>
            @endif

            <!-- Prize Section -->
            @if($promoPage->prize_title || $promoPage->prize_description)
                <div class="flex col prize-section">
                    @if($promoPage->prize_title)
                        <h3>
                            <i class="fas fa-gift text-warning"></i>
                            {{ $promoPage->prize_title }}
                        </h3>
                    @endif
                    @if($promoPage->prize_description)
                        <p>{{ $promoPage->prize_description }}</p>
                    @endif
                </div>
            @endif

            <!-- Participation Requirements -->
            @if($promoPage->participation_condition->value !== 'public')
                <div class="requirements-info mb-4">
                    <h5><i class="fas fa-info-circle"></i>Participation Requirements</h5>
                    <p class="text-muted">{{ $promoPage->getConditionRequirementsText() }}</p>
                    @if($promoPage->condition_description)
                        <p class="small text-muted">{{ $promoPage->condition_description }}</p>
                    @endif
                </div>
            @endif



            <!-- Participation Form -->
            @if($promoPage->canParticipate())
                @if($conditionCheck['can_participate'])
                    @if($hasParticipated)
                        <!-- Already Participated Message -->
                        <div class="tai_c">
                            <!-- Success Icon -->
                            <div class="success-icon">
                                <i class="fas fa-check"></i>
                            </div>

                            <!-- Success Message -->
                            <h2 class="success-title">You're Already Registered!</h2>
                            <p class="success-message">
                                {{ $promoPage->success_message ?? 'Thank you for participating in our giveaway! You have been successfully registered.' }}
                            </p>

                            <!-- Giveaway Information -->
                            {{-- <div class="info-grid">
                                <div class="info-card">
                                    <h5><i class="fas fa-gift"></i> Giveaway</h5>
                                    <p>{{ $promoPage->title }}</p>
                                </div>

                                @if($promoPage->company_name)
                                <div class="info-card">
                                    <h5><i class="fas fa-building"></i> Organized by</h5>
                                    <p>{{ $promoPage->company_name }}</p>
                                </div>
                                @endif

                                <div class="info-card">
                                    <h5><i class="fas fa-calendar"></i> End Date</h5>
                                    <p>{{ $promoPage->end_date->format('F j, Y \a\t g:i A') }}</p>
                                </div>

                                <div class="info-card">
                                    <h5><i class="fas fa-users"></i> Participants</h5>
                                    <p>{{ $promoPage->current_participants }} / {{ $promoPage->max_participants ? number_format($promoPage->max_participants) : '∞' }}</p>
                                </div>
                            </div> --}}
                            <div class="promo-cards wrap">
                                <div class="card">
                                    <div class="flex-center"><i class="fas fa-gift"></i></div>
                                    <div class="flex col">
                                        <h5>Giveaway</h5>
                                        <p>{{ $promoPage->title }}</p>
                                    </div>
                                </div>

                                @if($promoPage->company_name)
                                <div class="card">
                                    <div class="flex-center"><i class="fas fa-building"></i></div>
                                    <div class="flex col">
                                        <h5>Organized by</h5>
                                        <p>{{ $promoPage->company_name }}</p>
                                    </div>
                                </div>
                                @endif

                                <div class="card">
                                    <div class="flex-center"><i class="fas fa-calendar"></i></div>
                                    <div class="flex col">
                                        <h5>End Date</h5>
                                        <p>{{ $promoPage->end_date->format('F j, Y \a\t g:i A') }}</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="flex-center"><i class="fas fa-users"></i></div>
                                    <div class="flex col">
                                        <h5>Participants</h5>
                                        <p>{{ $promoPage->current_participants }} / {{ $promoPage->max_participants ? number_format($promoPage->max_participants) : '∞' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Next Steps -->
                            <div class="alert alert-info" role="alert">
                                <h6><i class="fas fa-info-circle"></i> What's Next?</h6>
                                <ul class="text-start">
                                    <li><span>Keep an eye on your email for updates</span></li>
                                    <li><span>The winner will be announced after {{ $promoPage->end_date->format('F j, Y') }}</span></li>
                                    <li><span>Make sure to check your spam folder</span></li>
                                    <li><span>Follow us on social media for updates</span></li>
                                </ul>
                            </div>

                            <!-- Social Sharing -->
                            <div class="social-share">
                                <h6>Share with friends:</h6>
                                <div>
                                    <a href="https://www.facebook.com/share/1CsV1iz9mr/?mibextid=wwXIfr" target="_blank" class="social-btn facebook">
                                        <i class="fab fa-facebook-f"></i> Facebook
                                    </a>
                                    <a href="https://www.instagram.com/duma_global?igsh=MTZ6d3l3ZzV6M3NkdA==" target="_blank" class="social-btn instagram">
                                        <i class="fab fa-instagram"></i> Instagram
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="participation-form">
                            <h4 class="tai_c">Register to participate in the giveaway from {{ $promoPage->company_name ?? 'our company' }}</h4>
                            @if($conditionCheck['user_data'])
                                <div class="alert alert-success mb-4">
                                    <i class="fas fa-check-circle"></i>
                                    <span>You meet all participation requirements!</span>

                                    @if(isset($conditionCheck['user_data']['orders_count']))
                                        <p>You have {{ $conditionCheck['user_data']['orders_count'] }} completed orders.</p>
                                    @endif
                                    @if(isset($conditionCheck['user_data']['total_order_amount']))
                                        <p>Your total order amount: ${{ number_format($conditionCheck['user_data']['total_order_amount'], 2) }}</p>
                                    @endif
                                    @if(isset($conditionCheck['user_data']['qualifying_orders']))
                                        <p>You have {{ $conditionCheck['user_data']['qualifying_orders'] }} qualifying orders.</p>
                                    @endif
                                </div>
                            @endif
                        <!-- Success Message (hidden by default) -->
                        <div id="successMessage" class="success-content" style="display: none;">
                            <!-- Success Icon -->
                            <div class="success-icon">
                                <i class="fas fa-check"></i>
                            </div>

                            <!-- Success Message -->
                            <h2 class="success-title">Registration Successful!</h2>
                            <p class="success-message" id="successText">
                                Thank you for participating in our giveaway! You have been successfully registered.
                            </p>

                            <!-- Giveaway Information -->
                            <div class="info-grid">
                                <div class="info-card">
                                    <h5><i class="fas fa-gift"></i> Giveaway</h5>
                                    <p id="successGiveawayTitle">{{ $promoPage->title }}</p>
                                </div>

                                <div class="info-card" id="successCompanyCard" style="display: {{ $promoPage->company_name ? 'block' : 'none' }};">
                                    <h5><i class="fas fa-building"></i> Organized by</h5>
                                    <p id="successCompanyName">{{ $promoPage->company_name }}</p>
                                </div>

                                <div class="info-card">
                                    <h5><i class="fas fa-calendar"></i> End Date</h5>
                                    <p id="successEndDate">{{ $promoPage->end_date->format('F j, Y \a\t g:i A') }}</p>
                                </div>

                                <div class="info-card">
                                    <h5><i class="fas fa-users"></i> Participants</h5>
                                    <p><span id="successParticipantCount">{{ $promoPage->current_participants }}</span> / {{ $promoPage->max_participants ? number_format($promoPage->max_participants) : '∞' }}</p>
                                </div>
                            </div>

                            <!-- Next Steps -->
                            <div class="alert alert-info" role="alert">
                                <h6><i class="fas fa-info-circle"></i> What's Next?</h6>
                                <ul class="text-start">
                                    <li><span>Keep an eye on your email for updates</span></li>
                                    <li><span>The winner will be announced after {{ $promoPage->end_date->format('F j, Y') }}</span></li>
                                    <li><span>Make sure to check your spam folder</span></li>
                                    <li><span>Follow us on social media for updates</span></li>
                                </ul>
                            </div>

                            <!-- Social Sharing -->
                            <div class="social-share">
                                <h6>Share with friends:</h6>
                                <a href="https://www.facebook.com/share/1CsV1iz9mr/?mibextid=wwXIfr" target="_blank" class="social-btn facebook">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                                <a href="https://www.instagram.com/duma_global?igsh=MTZ6d3l3ZzV6M3NkdA==" target="_blank" class="social-btn instagram">
                                    <i class="fab fa-instagram"></i> Instagram
                                </a>
                            </div>
                        </div>

                        <form id="registerForm" class="flex col" action="{{ route('promo.participate', $promoPage->slug) }}" method="POST">
                            @csrf
                            <div class="flex col">
                                @foreach($promoPage->form_fields as $index => $field)
                                    @php
                                        $fieldName = $field['name'] ?? 'field_' . $index;
                                        $isNameField = in_array($fieldName, ['first_name', 'last_name']) ||
                                                      in_array($field['type'] ?? '', ['text']) && $index < 2;
                                    @endphp
                                        @php
                                            $defaultValue = old($fieldName);
                                            if (!$defaultValue && $conditionCheck['user_data'] && isset($conditionCheck['user_data'][$fieldName])) {
                                                $defaultValue = $conditionCheck['user_data'][$fieldName];
                                            }

                                            // Determine input type and attributes for phone fields
                                            $inputType = $field['type'];
                                            $inputAttributes = '';
                                            if ($field['type'] === 'tel' || str_contains(strtolower($field['label'] ?? ''), 'phone') || str_contains(strtolower($fieldName), 'phone')) {
                                                $inputType = 'tel';
                                                $inputAttributes = 'pattern="[+]?[0-9\s\-\(\)]*" title="Please enter a valid phone number"';
                                            }
                                        @endphp

                                        <div class="text-input flex col" @error($fieldName) error @enderror>
                                            <span>
                                                {{ $field['label'] ?? $field['placeholder'] ?? '' }}
                                                @if($field['required'] ?? false) *@endif
                                            </span>

                                            @if($field['type'] === 'select')
                                                <select class="inputWrapper @error($fieldName) is-invalid @enderror"
                                                        id="{{ $fieldName }}" name="{{ $fieldName }}"
                                                        {{ ($field['required'] ?? false) ? 'required' : '' }}>
                                                    <option value="">Select...</option>
                                                    @if(isset($field['options']))
                                                        @foreach($field['options'] as $option)
                                                            <option value="{{ $option }}" {{ old($fieldName) === $option ? 'selected' : '' }}>
                                                                {{ $option }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            @else
                                                <input type="{{ $inputType }}"
                                                       class="inputWrapper @error($fieldName) is-invalid @enderror"
                                                       id="{{ $fieldName }}"
                                                       name="{{ $fieldName }}"
                                                       value="{{ $defaultValue }}"
                                                       placeholder="{{ $field['placeholder'] ?? $field['label'] ?? '' }}"
                                                       {{ ($field['required'] ?? false) ? 'required' : '' }}
                                                       {!! $inputAttributes !!}>
                                            @endif
                                        </div>
                                        @error($fieldName)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                @endforeach
                            </div>
                            <div>
                                <button type="submit" class="w-full">
                                    <i class="fas fa-gift"></i>
                                    {{ $promoPage->button_text }}
                                </button>
                            </div>
                        </form>
                        </div>
                    @endif
                @else
                    <!-- User doesn't meet participation conditions -->
                    <div class="tai_c">
                        <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                        <h4>Unable to Participate</h4>
                        <div class="mb-3">
                            @foreach($conditionCheck['errors'] as $error)
                                <p class="mb-1">{{ $error }}</p>
                            @endforeach
                        </div>
                        @if($promoPage->participation_condition->requiresOrderData())
                            <a href="{{ route('cabinet.index') }}" class="button">
                                <i class="fas fa-user"></i> Go to Cabinet
                            </a>
                        @elseif(!$promoPage->participation_condition->requiresOrderData())
                            <a href="{{ route('home') }}" class="button">
                                <i class="fas fa-shopping-cart"></i> Make an Order
                            </a>
                        @endif
                    </div>
                @endif
            @else
                    <div class="tai_c">
                        <i class="fas fa-clock h1 text-muted"></i>
                        <h4>Giveaway Ended</h4>
                        <p class="text-muted">Thank you to all participants!</p>
                    </div>
                @endif
                <!-- Terms -->
                @if($promoPage->terms_and_conditions)
                    <div class="terms">
                        <h6><i class="fas fa-info-circle"></i> Participation Terms:</h6>
                        <p>{!! nl2br(e($promoPage->terms_and_conditions)) !!}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

    <script>
        // Countdown timer
        function updateCountdown() {
            const endDate = new Date('{{ $promoPage->end_date->toISOString() }}');
            const now = new Date();
            const diff = endDate - now;

            if (diff <= 0) {
                document.getElementById('countdown').innerHTML = '<div class="countdown-item"><span class="countdown-number text-warning">Giveaway Ended</span></div>';
                return;
            }

            const days = Math.max(0, Math.floor(diff / (1000 * 60 * 60 * 24)));
            const hours = Math.max(0, Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
            const minutes = Math.max(0, Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60)));
            const seconds = Math.max(0, Math.floor((diff % (1000 * 60)) / 1000));

            document.getElementById('days').textContent = days;
            document.getElementById('hours').textContent = hours;
            document.getElementById('minutes').textContent = minutes;
            document.getElementById('seconds').textContent = seconds;
        }

        // Update countdown every second
        updateCountdown();
        setInterval(updateCountdown, 1000);

        // Form submission with AJAX
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registerForm');
            const successMessage = document.getElementById('successMessage');

            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(form);

                    // Check form data size (rough estimate)
                    let formSize = 0;
                    for (let [key, value] of formData.entries()) {
                        formSize += key.length + (typeof value === 'string' ? value.length : 0);
                    }

                    // If form is too large (> 1MB), show error
                    if (formSize > 1024 * 1024) {
                        alert('Form data is too large. Please reduce the amount of text in your fields.');
                        return;
                    }
                    const submitButton = form.querySelector('button[type="submit"]');
                    const originalText = submitButton.innerHTML;

                    // Show loading state
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Registering...';
                    submitButton.disabled = true;

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(data => Promise.reject(data));
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Update success message content
                            if (data.success_content) {
                                document.getElementById('successText').textContent = data.success_content.success_message;
                                document.getElementById('successGiveawayTitle').textContent = data.success_content.title;
                                document.getElementById('successEndDate').textContent = data.success_content.end_date;
                                document.getElementById('successParticipantCount').textContent = data.success_content.current_participants;

                                if (data.success_content.company_name) {
                                    document.getElementById('successCompanyName').textContent = data.success_content.company_name;
                                    document.getElementById('successCompanyCard').style.display = 'block';
                                } else {
                                    document.getElementById('successCompanyCard').style.display = 'none';
                                }
                            }

                            // Update participant count in stats section
                            if (data.new_participant_count) {
                                const participantElements = document.querySelectorAll('[data-participant-count]');
                                participantElements.forEach(el => {
                                    el.textContent = data.new_participant_count;
                                });
                            }

                            // Hide form with fade effect
                            form.style.transition = 'opacity 0.5s ease-out';
                            form.style.opacity = '0';

                            setTimeout(() => {
                                form.style.display = 'none';

                                // Show success message with fade effect
                                successMessage.style.display = 'block';
                                successMessage.style.opacity = '0';
                                successMessage.style.transition = 'opacity 0.5s ease-in';

                                setTimeout(() => {
                                    successMessage.style.opacity = '1';
                                }, 50);

                            }, 500);
                        } else {
                            // Handle validation errors
                            if (data.errors) {
                                let errorMessage = 'Please fix the following errors:\\n';
                                Object.values(data.errors).forEach(error => {
                                    if (Array.isArray(error)) {
                                        errorMessage += '• ' + error[0] + '\\n';
                                    } else {
                                        errorMessage += '• ' + error + '\\n';
                                    }
                                });
                                alert(errorMessage);
                            } else {
                                alert(data.message || 'An error occurred. Please try again.');
                            }

                            // Restore button
                            submitButton.innerHTML = originalText;
                            submitButton.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);

                        let errorMessage = 'An error occurred. Please try again.';
                        if (error.message) {
                            errorMessage = error.message;
                        } else if (error.errors) {
                            errorMessage = 'Please fix the following errors:\\n';
                            Object.values(error.errors).forEach(err => {
                                if (Array.isArray(err)) {
                                    errorMessage += '• ' + err[0] + '\\n';
                                } else {
                                    errorMessage += '• ' + err + '\\n';
                                }
                            });
                        }

                        // Show error with better formatting
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'alert alert-danger';
                        errorDiv.style.marginTop = '1rem';
                        errorDiv.innerHTML = '<i class="fas fa-exclamation-triangle"></i> ' + errorMessage.replace(/\\n/g, '<br>');

                        // Remove any existing error messages
                        const existingError = form.querySelector('.alert-danger');
                        if (existingError) {
                            existingError.remove();
                        }

                        // Add error message after form
                        form.appendChild(errorDiv);

                        // Restore button
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                    });
                });
            }
        });

        // Phone number formatting
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInputs = document.querySelectorAll('input[type="tel"]');

            phoneInputs.forEach(function(input) {
                input.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, ''); // Remove non-digits

                    // Format US phone number
                    if (value.length >= 10) {
                        if (value.startsWith('1') && value.length === 11) {
                            // Format: +1 (XXX) XXX-XXXX
                            value = '+1 (' + value.slice(1, 4) + ') ' + value.slice(4, 7) + '-' + value.slice(7, 11);
                        } else if (value.length === 10) {
                            // Format: (XXX) XXX-XXXX
                            value = '(' + value.slice(0, 3) + ') ' + value.slice(3, 6) + '-' + value.slice(6, 10);
                        }
                    } else if (value.length >= 6) {
                        // Partial formatting: XXX-XXX
                        value = value.slice(0, 3) + '-' + value.slice(3);
                    }

                    e.target.value = value;
                });

                // Allow only numbers, spaces, dashes, parentheses, and plus
                input.addEventListener('keypress', function(e) {
                    const allowedChars = /[0-9\s\-\(\)\+]/;
                    if (!allowedChars.test(e.key) && !['Backspace', 'Delete', 'Tab', 'Enter'].includes(e.key)) {
                        e.preventDefault();
                    }
                });
            });
        });

        // // Auto-hide alerts after 5 seconds
        // setTimeout(function() {
        //     const alerts = document.querySelectorAll('.alert');
        //     alerts.forEach(function(alert) {
        //         alert.style.opacity = '0';
        //         setTimeout(function() {
        //             alert.remove();
        //         }, 300);
        //     });
        // }, 5000);
    </script>
<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>
@endsection

@push('styles')
    <link rel="stylesheet" href="/css/promo.css">
    <style>
        .info-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 1.5rem;
            border-left: 4px solid {{ $promoPage->button_color ?? '#007bff' }};
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .info-card h5 {
            color: {{ $promoPage->button_color ?? '#007bff' }};
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
    </style>
@endpush
