document.addEventListener('DOMContentLoaded', function() {
    // Enhanced Form Validation
    const form = document.getElementById('registrationForm');
    if (form) {
        // Input validation functions
        const validateName = (name) => {
            return name.trim().length >= 2 && /^[a-zA-Z\s]+$/.test(name);
        };

        const validateEmail = (email) => {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        };

        const validatePhone = (phone) => {
            const phoneRegex = /^[6-9]\d{9}$/; // Indian mobile number validation
            return phoneRegex.test(phone);
        };

        // Real-time validation
        const inputs = form.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('is-invalid', 'is-valid');
                
                switch(this.name) {
                    case 'full_name':
                        if (validateName(this.value)) {
                            this.classList.add('is-valid');
                        } else {
                            this.classList.add('is-invalid');
                        }
                        break;
                    case 'email':
                        if (validateEmail(this.value)) {
                            this.classList.add('is-valid');
                        } else {
                            this.classList.add('is-invalid');
                        }
                        break;
                    case 'phone':
                        if (validatePhone(this.value)) {
                            this.classList.add('is-valid');
                        } else {
                            this.classList.add('is-invalid');
                        }
                        break;
                }
            });
        });

        // Form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = form.querySelector('input[name="full_name"]');
            const email = form.querySelector('input[name="email"]');
            const phone = form.querySelector('input[name="phone"]');
            const className = form.querySelector('select[name="class"]');
            const testCenter = form.querySelector('select[name="test_center"]');

            let isValid = true;

            // Validate each field
            if (!validateName(name.value)) {
                name.classList.add('is-invalid');
                isValid = false;
            }

            if (!validateEmail(email.value)) {
                email.classList.add('is-invalid');
                isValid = false;
            }

            if (!validatePhone(phone.value)) {
                phone.classList.add('is-invalid');
                isValid = false;
            }

            if (!className.value) {
                className.classList.add('is-invalid');
                isValid = false;
            }

            if (!testCenter.value) {
                testCenter.classList.add('is-invalid');
                isValid = false;
            }

            if (isValid) {
                // Simulate form submission
                const submitButton = form.querySelector('button[type="submit"]');
                submitButton.disabled = true;
                submitButton.innerHTML = 'Submitting...';

                // Simulated AJAX submission (replace with actual backend logic)
                setTimeout(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful!',
                        text: 'We will contact you shortly with further details.',
                        confirmButtonText: 'OK'
                    });
                    form.reset();
                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Register Now';
                    inputs.forEach(input => input.classList.remove('is-valid', 'is-invalid'));
                }, 1500);
            }
        });
    }

    // Responsive Interactions
    const handleResponsiveMenus = () => {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        if (navbarToggler && navbarCollapse) {
            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!navbarCollapse.contains(e.target) && 
                    !navbarToggler.contains(e.target) && 
                    navbarCollapse.classList.contains('show')) {
                    navbarToggler.click();
                }
            });

            // Close mobile menu when a link is clicked
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
                        navbarToggler.click();
                    }
                });
            });
        }
    };

    // Smooth scrolling for navigation links
    const smoothScroll = () => {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    };

    // Animate benefit cards on scroll
    const animateBenefitCards = () => {
        const benefitCards = document.querySelectorAll('.benefit-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        benefitCards.forEach(card => {
            card.style.opacity = 0;
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });
    };

    // Function to display sample papers
    function displaySamplePapers(userClass) {
        console.log('Displaying sample papers for class:', userClass); // Log the class being processed
        const samplePapers = document.querySelectorAll('.sample-paper-card');
        samplePapers.forEach(paper => {
            console.log('Checking paper for class:', paper.dataset.class); // Log each paper's class
            if (paper.dataset.class === userClass) {
                paper.style.display = 'block';
                console.log('Showing paper for class:', paper.dataset.class); // Log when showing paper
            } else {
                paper.style.display = 'none';
                console.log('Hiding paper for class:', paper.dataset.class); // Log when hiding paper
            }
        });
    }

    // Function to handle user login
    function handleLogin() {
        fetch('/path/to/login.php', {
            method: 'POST',
            body: JSON.stringify({ email, password }),
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log('Login response:', data); // Log the response data
            if (data.success) {
                // Store user data, including class
                localStorage.setItem('userData', JSON.stringify(data));
                // Call displaySamplePapers with the class from the response
                displaySamplePapers(data.class);
            } else {
                console.error(data.message);
            }
        });
    }

    // Run responsive functions
    handleResponsiveMenus();
    smoothScroll();
    animateBenefitCards();

    // Add sweet alert for better notifications
    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
    document.body.appendChild(script);
});
