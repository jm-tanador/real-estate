<template>
    <v-app class="page-wrapper">
        <!-- Navigation Bar -->
        <nav class="navbar">
            <div class="logo">
                <span class="t-bar"></span>
                <span class="logo-text">REAL ESTATE<span>.</span></span>
            </div>
            <ul class="nav-links d-none d-md-flex">
                <li><a href="#">Home</a></li>
                <li><a href="#">Log In</a></li>
                <li class="active"><a href="#">Join</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <!-- <div class="search-bar d-none d-sm-flex">
                <v-text-field
                    placeholder="Search"
                    variant="plain"
                    hide-details
                    density="compact"
                    prepend-inner-icon="mdi-magnify"
                    class="mb-2"
                ></v-text-field>
            </div> -->
            <div>
                <ul class="nav-links d-none d-md-flex">
                    <li><a :href="img"><v-icon class="icon-btn" icon="mdi-twitter"></v-icon></a></li>
                    <li><a :href="img"><v-icon class="icon-btn" icon="mdi-facebook"></v-icon></a></li>
                    <li><a :href="img"><v-icon class="icon-btn-ig" icon="mdi-instagram"></v-icon></a></li>
                </ul>
            </div>
        </nav>

        <v-main class="content-container">
        <div class="content-inner">
            <!-- Left Side: Hero Text -->
            <section class="hero-section">
                <p class="tagline">START YOUR JOURNEY</p>
                <h1>
                    Unlock the homeowner <br />
                    <span class="highlight">inside YOU</span>,<br /> Secure your <br />
                    Dream Property
                </h1>
                <p class="subtext">
                    Get started with the most trusted and transparent platform <br /> 
                    to browse, tour, and buy your next home.
                </p>
                <div class="hero-btns">
                    <v-btn variant="outlined" class="btn-outline">View Listings</v-btn>
                    <v-btn class="btn-primary glow">Book a tripping</v-btn>
                </div>
            </section>

            <!-- Right Side: Register Form -->
            <section class="form-section">
                <div class="form-card">
                    <h2>Create <br />new account<span>.</span></h2>
                    
                    <form @submit.prevent>
                        <div class="input-group">
                            <label>Username</label>
                            <v-text-field
                                placeholder="junadelacruz"
                                variant="outlined"
                                hide-details
                                class="custom-v-input"
                                autocomplete="off"
                            ></v-text-field>
                        </div>

                        <div class="row">
                            <div class="input-group">
                                <label>First Name</label>
                                <v-text-field
                                    placeholder="Juan"
                                    variant="outlined"
                                    hide-details
                                    class="custom-v-input"
                                    autocomplete="off"
                                ></v-text-field>
                            </div>
                            <div class="input-group">
                                <label>Last Name</label>
                                <v-text-field
                                    placeholder="Dela Cruz"
                                    variant="outlined"
                                    hide-details
                                    class="custom-v-input"
                                    autocomplete="off"
                                ></v-text-field>
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Email</label>
                            <v-text-field
                                placeholder="juandelacruz@gmail.com"
                                type="email"
                                variant="outlined"
                                hide-details
                                class="custom-v-input"
                                autocomplete="off"
                            ></v-text-field>
                        </div>

                        <div class="input-group password-group">
                            <label>Password</label>
                            <v-text-field
                                type="password"
                                variant="outlined"
                                hide-details
                                class="custom-v-input"
                                placeholder="Enter password"
                                autocomplete="off"
                            ></v-text-field>
                        </div>
                        <div class="input-group password-group">
                            <label>Re-enter password</label>
                            <v-text-field
                                type="password"
                                variant="outlined"
                                hide-details
                                class="custom-v-input"
                                placeholder="Confirm password"
                                autocomplete="off"
                            ></v-text-field>
                        </div>

                        <p class="login-link">Already have an account? <a href="#">Log In</a></p>

                        <v-btn :href="img" block class="btn-submit glow">Create Account</v-btn>
                    </form>
                </div>
            </section>
        </div>
        </v-main>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            img: "https://media.newyorker.com/photos/59095bb86552fa0be682d9d0/master/pass/Monkey-Selfie.jpg"
        }
    },
}
// Vue 3 setup
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

/* restore original layout constraints */
.page-wrapper {
    background-color: #1a1c23 !important;
    background-image: url('images/login-bg.jpg') !important;
    background-size: cover;
    background-position: center;
    font-family: 'Poppins', sans-serif !important;
    color: white !important;
    min-height: 100vh;
}

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

/* Original Navbar Sizing */
.navbar {
    position: relative;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 40px 8%; /* Kept original 8% */
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

.logo-text span { color: #2196f3; }

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
}

.nav-links li.active a {
    color: white;
    border-bottom: 2px solid #2196f3;
    padding-bottom: 5px;
}

/* Search Bar Sizing */
.search-bar {
    background: rgba(255, 255, 255, 0.08);
    padding: 2px 20px;
    border-radius: 30px;
    width: 250px;
}

/* Hero Section Sizing */
.content-container {
    position: relative;
    z-index: 5;
    display: flex;
    align-items: center;
    padding: 0 8% 50px 8%; /* Kept original 8% */
}

.content-inner {
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: space-between;
}

.hero-section {
    flex: 1;
    max-width: 600px;
}

.hero-section h1 {
    font-size: 56px; /* Original Size */
    line-height: 1.1;
    margin-bottom: 25px;
    font-weight: 700;
}

.tagline {
    letter-spacing: 3px;
    font-size: 14px;
    margin-bottom: 15px;
    color: #ccc;
    font-weight: 600;
}

.highlight { color: #2196f3; }

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

/* Form Sizing */
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
    font-size: 44px; /* Original Size */
    margin-bottom: 40px;
    line-height: 1.2;
}

.form-card h2 span { color: #2196f3; }

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

/* Vuetify v-text-field Custom Sizing */
.custom-v-input :deep(.v-field) {
    background: rgba(42, 45, 55, 0.6) !important;
    border-radius: 14px !important; /* Original Radius */
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
    height: 52px !important; /* Force original input height */
}

.custom-v-input :deep(.v-field__input) {
    padding: 14px 18px !important; /* Original internal padding */
    color: white !important;
    font-size: 15px !important;
    min-height: 52px !important;
}

.custom-v-input :deep(.v-field__outline) {
    display: none; /* Remove Vuetify default borders to use our custom one */
}

/* Specific styling for the Password field border */
.password-group .custom-v-input :deep(.v-field) {
    /* border: 1px solid #2196f3 !important; */
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

/* Button Sizing */
.btn-outline {
    background: transparent !important;
    border: 1px solid #555 !important;
    color: white !important;
    height: 48px !important;
    padding: 0 30px !important;
    border-radius: 30px !important;
    text-transform: none !important;
    letter-spacing: normal !important;
}

.btn-primary {
    background: #2196f3 !important;
    color: white !important;
    height: 48px !important;
    padding: 0 40px !important;
    border-radius: 30px !important;
    font-weight: 600 !important;
    text-transform: none !important;
    letter-spacing: normal !important;
}

.glow {
    box-shadow: 0 5px 20px rgba(33, 150, 243, 0.4);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(33, 150, 243, 0.6);
}

.btn-submit {
    height: 60px !important; /* Original chunky height */
    background: #2196f3 !important;
    color: white !important;
    border-radius: 18px !important;
    font-weight: 600 !important;
    font-size: 17px !important;
    text-transform: none !important;
    /* box-shadow: 0 10px 30px rgba(33, 150, 243, 0.3) !important; */
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(33, 150, 243, 0.6);
}

.icon-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(33, 150, 243, 0.6);
    color: #2196f3 !important;
}

.icon-btn-ig:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px #f4059a;
    color: #f4059a !important;
}

/* Mobile Responsiveness */
@media (max-width: 900px) {
    .content-inner {
        flex-direction: column;
        text-align: center;
    }
    .hero-section { margin-bottom: 60px; }
    .hero-btns { justify-content: center; }
    .form-section { justify-content: center; }
    .login-link { text-align: center; }
}
</style>