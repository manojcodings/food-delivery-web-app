<?php include('includes/header.php'); ?>

    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
                <p>We'd love to hear from you. Get in touch with us for any queries or feedback.</p>
            </div>

            <div class="contact-container">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Location</h4>
                            <p>B-2/261 Rohini Sector-6, New Delhi-85 Landmark: Rohini West Metro Station</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Phone</h4>
                            <p>9555660984</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>manojcodewith@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Opening Hours</h4>
                            <p>Mon - Sun: 10:00 AM - 11:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form-wrapper">
                    <form action="" method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" placeholder="Your message here..." required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
                    </form>
                    
                    <?php 
                        if(isset($_POST['submit'])) {
                            // In a real application, you would process the form here
                            echo "<div style='margin-top: 20px; padding: 15px; background: #d4edda; color: #155724; border-radius: 8px;'>
                                    Thank you! Your message has been sent successfully.
                                  </div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>
