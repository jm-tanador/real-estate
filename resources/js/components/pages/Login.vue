<template>
    <div class="page-wrapper">
        <!-- Navigation Bar -->
        <nav class="navbar">
            <div class="logo">
                <span class="t-bar"></span>
                <span class="logo-text">REAL ESTATE<span>.</span></span>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Log In</a></li>
                <li class="active"><a href="#">Join</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <div class="search-bar">
                <span class="search-icon">🔍</span>
                <input type="text" placeholder="Search" />
            </div>
        </nav>

        <main class="content-container">
            <div class="content-inner">
                <!-- Left Side: Hero Text -->
                <section class="hero-section">
                    <p class="tagline">START YOUR JOURNEY</p>
                    <h1>
                        Unlock the homeowner <br />
                        <span class="highlight">inside YOU</span>, Secure your <br />
                        Dream Property
                    </h1>
                    <p class="subtext">
                        Get started with the most trusted and transparent platform <br /> 
                        to browse, tour, and buy your next home.
                    </p>
                    <div class="hero-btns">
                        <button class="btn-outline">View Listings</button>
                        <button class="btn-primary glow">Book a Tour</button>
                    </div>
                </section>

                <!-- Right Side: Register Form -->
                <section class="form-section">
                    <div class="form-card">
                        <h2>Create <br />new account<span>.</span></h2>
                        
                        <form @submit.prevent>
                            <div class="input-group">
                                <label>Username</label>
                                <div class="input-wrapper">
                                <input type="text" placeholder="junadelacruz"/>
                                <i class="icon">👤</i>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-group">
                                <label>First Name</label>
                                <div class="input-wrapper">
                                    <input type="text" placeholder="Juan" />
                                    <i class="icon">🆔</i>
                                </div>
                                </div>
                                <div class="input-group">
                                <label>Last Name</label>
                                <div class="input-wrapper">
                                    <input type="text" placeholder="Dela Cruz" />
                                    <i class="icon">🆔</i>
                                </div>
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Email</label>
                                <div class="input-wrapper">
                                <input type="email" placeholder="juandelacruz@gmail.com"/>
                                <i class="icon">✉️</i>
                                </div>
                            </div>

                            <div class="input-group password-group">
                                <label>Password</label>
                                <div class="input-wrapper">
                                <input type="password" value="password123" />
                                <i class="icon">👁️</i>
                                </div>
                            </div>

                            <p class="login-link">Already A Member? <a href="#">Log In</a></p>

                            <button class="btn-submit">Create Account</button>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>
</template>

<script>
export default {
  name: 'TravelzoFullscreen'
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

/* Fullscreen Wrapper */
.page-wrapper {
    min-height: 100vh;
    width: 100%;
    background-color: #1a1c23;
    background-image: url('images/login-bg.jpg');
    background-size: cover;
    background-position: center;
    font-family: 'Poppins', sans-serif;
    color: white;
    position: relative;
    display: flex;
    /* flex-direction: column; */
}

/* Dark Overlay spanning entire page */
.page-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(20, 22, 28, 0.75) 0%, rgba(20, 22, 28, 0.95) 60%, rgba(20, 22, 28, 1) 100%);
    z-index: 1;
}

/* Header/Nav Styles */
.navbar {
    position: relative;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 40px 8%;
}

.logo {
    display: flex;
    align-items: center;
    font-size: 24px;
    font-weight: 700;
    position: relative;
}

.t-bar {
    width: 14px;
    height: 4px;
    background: #2196f3;
    position: absolute;
    left: -2px;
    top: 15px;
}

.logo-text span {
    color: #2196f3;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 40px;
}

.nav-links a {
    color: #a0a0a0;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    transition: 0.3s;
}

.nav-links li.active a {
    color: white;
    border-bottom: 2px solid #2196f3;
    padding-bottom: 5px;
}

.search-bar {
    background: rgba(255, 255, 255, 0.08);
    padding: 10px 20px;
    border-radius: 30px;
    display: flex;
    align-items: center;
    width: 250px;
}

.search-bar input {
    background: transparent;
    border: none;
    color: white;
    margin-left: 10px;
    outline: none;
    width: 100%;
}

/* Main Content Area */
.content-container {
    position: relative;
    z-index: 5;
    flex: 1;
    display: flex;
    align-items: center;
    padding: 0 8% 50px 8%;
}

.content-inner {
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: space-between;
}

/* Hero Section */
.hero-section {
    flex: 1;
    max-width: 600px;
}

.tagline {
    letter-spacing: 3px;
    font-size: 14px;
    margin-bottom: 15px;
    color: #ccc;
    font-weight: 600;
}

.hero-section h1 {
    font-size: 56px;
    line-height: 1.1;
    margin-bottom: 25px;
    font-weight: 700;
}

.highlight {
    color: #2196f3;
}

.subtext {
    color: #aaa;
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 45px;
}

.hero-btns {
    display: flex;
    gap: 20px;
}

/* Form Section */
.form-section {
    flex: 1;
    display: flex;
    justify-content: flex-end;
}

.form-card {
    width: 100%;
    max-width: 450px;
}

.form-card h2 {
    font-size: 44px;
    margin-bottom: 40px;
    line-height: 1.2;
}

.form-card h2 span {
    color: #2196f3;
}

.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    font-size: 11px;
    color: #2196f3;
    margin-bottom: 8px;
    text-transform: capitalize;
    font-weight: 600;
}

.input-wrapper {
    background: rgba(42, 45, 55, 0.6);
    backdrop-filter: blur(5px);
    border-radius: 14px;
    display: flex;
    align-items: center;
    padding: 14px 18px;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.input-wrapper input {
    background: transparent;
    border: none;
    color: white;
    width: 100%;
    outline: none;
    font-size: 15px;
}

.password-group .input-wrapper {
    border: 1px solid #2196f3;
}

.row {
    display: flex;
    gap: 20px;
}

.row .input-group {
    flex: 1;
}

.login-link {
    text-align: right;
    font-size: 13px;
    color: #aaa;
    margin: 15px 0 30px 0;
}

.login-link a {
    color: #2196f3;
    text-decoration: none;
    font-weight: 600;
}

/* Buttons */
button {
    cursor: pointer;
    border: none;
    transition: all 0.3s ease;
}

.btn-outline {
    background: transparent;
    border: 1px solid #555;
    color: white;
    padding: 12px 30px;
    border-radius: 30px;
    font-size: 15px;
}

.btn-primary {
    background: #2196f3;
    color: white;
    padding: 12px 40px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 15px;
}

.glow {
    box-shadow: 0 5px 20px rgba(33, 150, 243, 0.4);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(33, 150, 243, 0.6);
}

.btn-submit {
    width: 100%;
    background: #2196f3;
    color: white;
    padding: 18px;
    border-radius: 18px;
    font-weight: 600;
    font-size: 17px;
    box-shadow: 0 10px 30px rgba(33, 150, 243, 0.3);
}

.icon {
    font-style: normal;
    opacity: 0.5;
    font-size: 16px;
    margin-left: 10px;
}

/* Mobile Responsiveness */
@media (max-width: 1100px) {
    .hero-section h1 { font-size: 40px; }
    .navbar { padding: 30px 5%; }
    .content-container { padding: 0 5% 50px 5%; }
}

@media (max-width: 900px) {
    .content-inner {
        flex-direction: column;
        text-align: center;
    }
    .hero-section {
        margin-bottom: 60px;
    }
    .hero-btns {
        justify-content: center;
    }
    .form-section {
        justify-content: center;
    }
    .login-link {
        text-align: center;
    }
    .nav-links {
        display: none; /* Hide nav links on small screens for simplicity */
    }
}
</style>