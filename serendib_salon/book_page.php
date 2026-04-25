<?php
// Include header if needed, but I'll make it standalone like index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment | Serendib Men's Salon</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="padding-top: 80px;">

    <!-- Header -->
    <header class="header">
        <div class="container nav-container">
            <a href="index.php" class="logo">
                <i class="fa-solid fa-scissors"></i> Serendib Men's <span>Salon</span>
            </a>
            <button class="mobile-menu-btn" onclick="document.querySelector('.nav-menu').classList.toggle('active')">
                <i class="fa-solid fa-bars"></i>
            </button>
            <nav class="nav-menu">
                <a href="index.php">Home</a>
                <a href="services.php">Services</a>
                <a href="about.php">About</a>
                <a href="my_bookings.php">My Bookings</a>
                <a href="admin.php">Admin</a>
            </nav>
        </div>
    </header>

    <section class="booking">
        <div class="container booking-container">
            <div class="booking-info">
                <h2>Book Your Appointment</h2>
                <p>Reserve your spot online and get ready to look your best. Choose your service, date, and time below.</p>
                <div class="contact-details">
                    <p><i class="fa-solid fa-phone"></i> 0783843082</p>
                    <p><i class="fa-solid fa-envelope"></i> nuwanprabhathtgdm@gmail.com</p>
                    <p><i class="fa-solid fa-location-dot"></i> Anywhere in Colombo</p>
                </div>
            </div>
            <div class="booking-form-wrapper">
                <form action="book.php" method="POST" class="booking-form">
                    <div class="input-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required placeholder="John Doe">
                    </div>
                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="john@example.com">
                    </div>
                    <div class="input-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required placeholder="077xxxxxxx">
                    </div>
                    <div class="input-group">
                        <label for="service">Select Service</label>
                        <select id="service" name="service" required>
                            <option value="">-- Choose a Service --</option>
                            <option value="Haircut & Styling">Haircut & Styling</option>
                            <option value="Beard Grooming">Beard Grooming</option>
                            <option value="Hot Towel Shave">Hot Towel Shave</option>
                            <option value="Men's Facial">Men's Facial</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label for="service_type">Service Location</label>
                        <select id="service_type" name="service_type" required>
                            <option value="Salon">At Salon</option>
                            <option value="Home">Home Service</option>
                        </select>
                    </div>

                    <div class="input-group" id="home_address_group" style="display: none;">
                        <label for="home_address">Home Address (Required for Home Service)</label>
                        <textarea id="home_address" name="home_address" rows="3" placeholder="Enter your full address here..."></textarea>
                        
                        <div style="background: rgba(212, 175, 55, 0.1); border-left: 4px solid var(--primary-color); padding: 15px; margin-top: 10px; border-radius: 4px;">
                            <p style="margin: 0; font-size: 14px; color: #fff;">
                                <strong><i class="fa-solid fa-circle-exclamation"></i> Notice for Home Service:</strong><br>
                                A non-refundable advance payment of <strong>Rs. 500</strong> is required to confirm home visits. 
                                Please deposit/transfer the amount to:<br>
                                <span style="color: var(--primary-color); font-size: 16px; font-weight: bold;">Account No: 90615114</span><br>
                                (Send the payment slip via WhatsApp to 0783843082 to get your booking confirmed).
                            </p>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="input-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <label>Available Time Slots (1.5 Hour Duration)</label>
                        <div id="time-slots" class="time-slots-grid">
                            <p style="color: var(--text-muted); font-size: 14px;">Please select a date first to view available times.</p>
                        </div>
                        <input type="hidden" id="time" name="time" required>
                    </div>

                    <button type="submit" class="btn-primary full-width" id="btn-confirm" disabled>Confirm Booking</button>
                </form>
            </div>
        </div>
    </section>

    <style>
        .time-slots-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }
        .time-slot {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .time-slot:hover:not(.booked) {
            border-color: var(--primary-color);
            background: rgba(212, 175, 55, 0.1);
        }
        .time-slot.selected {
            background: var(--primary-color);
            color: var(--dark-bg);
            border-color: var(--primary-color);
            font-weight: bold;
        }
        .time-slot.booked {
            background: rgba(244, 67, 54, 0.1);
            border-color: rgba(244, 67, 54, 0.3);
            color: #f44336;
            cursor: not-allowed;
            text-decoration: line-through;
        }
    </style>

    <script>
        const dateInput = document.getElementById('date');
        const timeSlotsContainer = document.getElementById('time-slots');
        const timeHiddenInput = document.getElementById('time');
        const confirmBtn = document.getElementById('btn-confirm');
        const serviceTypeSelect = document.getElementById('service_type');
        const homeAddressGroup = document.getElementById('home_address_group');
        const homeAddressInput = document.getElementById('home_address');

        // Toggle Home Address Field
        serviceTypeSelect.addEventListener('change', function() {
            if (this.value === 'Home') {
                homeAddressGroup.style.display = 'block';
                homeAddressInput.required = true;
            } else {
                homeAddressGroup.style.display = 'none';
                homeAddressInput.required = false;
            }
        });

        // 24 Hours, 1.5 Hour intervals
        const generateSlots = () => {
            const slots = [];
            let h = 0;
            let m = 0;
            while (h < 24) {
                const hourStr = h < 10 ? '0' + h : h;
                const minStr = m === 0 ? '00' : '30';
                slots.push(`${hourStr}:${minStr}`);
                
                m += 30; // add 1 hour 30 mins (30 mins here, 1 hour below)
                if (m >= 60) {
                    h++;
                    m -= 60;
                }
                h++;
            }
            return slots;
        };

        const allSlots = generateSlots();

        dateInput.addEventListener('change', function() {
            const selectedDate = this.value;
            timeHiddenInput.value = '';
            confirmBtn.disabled = true;

            if (!selectedDate) {
                timeSlotsContainer.innerHTML = '<p style="color: var(--text-muted); font-size: 14px;">Please select a date first.</p>';
                return;
            }

            timeSlotsContainer.innerHTML = '<p>Loading available slots...</p>';

            fetch(`get_booked_times.php?date=${selectedDate}`)
                .then(res => res.json())
                .then(bookedTimes => {
                    timeSlotsContainer.innerHTML = '';
                    
                    allSlots.forEach(slot => {
                        const div = document.createElement('div');
                        div.className = 'time-slot';
                        
                        // Convert 24h to 12h format for display
                        let [h, m] = slot.split(':');
                        let ampm = h >= 12 ? 'PM' : 'AM';
                        let displayH = h % 12 || 12;
                        div.innerText = `${displayH}:${m} ${ampm}`;

                        if (bookedTimes.includes(slot)) {
                            div.classList.add('booked');
                            div.title = "Already Booked";
                        } else {
                            div.onclick = function() {
                                // Remove selected from all
                                document.querySelectorAll('.time-slot').forEach(el => el.classList.remove('selected'));
                                this.classList.add('selected');
                                timeHiddenInput.value = slot;
                                confirmBtn.disabled = false;
                            };
                        }
                        timeSlotsContainer.appendChild(div);
                    });
                })
                .catch(err => {
                    timeSlotsContainer.innerHTML = '<p style="color:red;">Error loading times.</p>';
                });
        });
    </script>
</body>
</html>
