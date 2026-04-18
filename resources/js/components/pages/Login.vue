<template>
    <v-app class="page-wrapper">
        <!-- Navigation Bar -->
        <nav class="navbar" :class="{ 'scrolled': isScrolled }">
            <div class="logo">
                <span class="t-bar"></span>
                <span class="logo-text">REAL ESTATE<span>.</span></span>
            </div>
            
            <ul class="nav-links d-none d-md-flex">
                <li><a href="#">Home</a></li>
                <!-- Only Home, Log In, and About Us as requested -->
                <li class="active"><a href="#" @click.prevent="isLogin = true">Log In</a></li>
                <li><a href="#">About Us</a></li>
            </ul>

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

                <!-- Right Side: Forms with Transition -->
                <div class="form-section">
                    <transition name="form-fade" mode="out-in">
                        <!-- LOGIN FORM -->
                        <div v-if="isLogin" class="form-card" key="login">
                            <h2>Welcome <br />back<span>.</span></h2>
                            <form @submit.prevent>
                                <div class="input-group">
                                    <label>Email or Username</label>
                                    <v-text-field
                                        placeholder="juandelacruz@gmail.com"
                                        variant="outlined"
                                        hide-details
                                        class="custom-v-input"
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
                                    ></v-text-field>
                                </div>
                                <p class="login-link">Don't have an account? <a href="#" @click.prevent="isLogin = false">Join now</a></p>
                                <v-btn block class="btn-submit glow">Login Account</v-btn>
                            </form>
                        </div>

                        <!-- REGISTER FORM -->
                        <div v-else class="form-card" key="register">
                            <h2>Create <br />new account<span>.</span></h2>
                            <form @submit.prevent>
                                <div class="input-group">
                                    <label>Username</label>
                                    <v-text-field placeholder="junadelacruz" variant="outlined" hide-details class="custom-v-input"></v-text-field>
                                </div>
                                <div class="row">
                                    <div class="input-group">
                                        <label>First Name</label>
                                        <v-text-field placeholder="Juan" variant="outlined" hide-details class="custom-v-input"></v-text-field>
                                    </div>
                                    <div class="input-group">
                                        <label>Last Name</label>
                                        <v-text-field placeholder="Dela Cruz" variant="outlined" hide-details class="custom-v-input"></v-text-field>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label>Email</label>
                                    <v-text-field placeholder="juandelacruz@gmail.com" type="email" variant="outlined" hide-details class="custom-v-input"></v-text-field>
                                </div>
                                <div class="input-group password-group">
                                    <label>Password</label>
                                    <v-text-field type="password" variant="outlined" hide-details class="custom-v-input" placeholder="Enter password"></v-text-field>
                                </div>
                                <p class="login-link">Already have an account? <a href="#" @click.prevent="isLogin = true">Log In</a></p>
                                <v-btn block class="btn-submit glow">Create Account</v-btn>
                            </form>
                        </div>
                    </transition>
                </div>
            </div>
        </v-main>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            img: "https://media.newyorker.com/photos/59095bb86552fa0be682d9d0/master/pass/Monkey-Selfie.jpg",
            isScrolled: false,
            isLogin: false, 
        }
    },
    methods: {
        handleScroll() {
            this.isScrolled = window.scrollY > 20;
        }
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll);
    },
    unmounted() {
        window.removeEventListener('scroll', this.handleScroll);
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

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
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(90deg, rgba(20, 22, 28, 0.75) 0%, rgba(20, 22, 28, 0.95) 60%, rgba(20, 22, 28, 1) 100%);
    z-index: 1;
}

/* Navbar */
.navbar {
    position: fixed;
    top: 0; left: 0; width: 100%; z-index: 100;
    display: flex; align-items: center; justify-content: space-between;
    padding: 40px 8%; transition: all 0.4s ease;
    background: transparent; box-sizing: border-box;
}

.navbar.scrolled {
    padding: 15px 8%;
    background: rgba(20, 22, 28, 0.9);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

/* Content Layout (The fix for spacing) */
.content-container {
    position: relative;
    z-index: 5;
    padding-top: 140px !important;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.content-inner {
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: center; /* Changed from space-between */
    gap: 80px; /* Precise control over the space between left and right */
}

.hero-section {
    flex: 0 1 600px; /* Limits hero width */
}

.form-section {
    flex: 0 1 450px; /* Limits form section width */
    min-height: 620px;
    position: relative;
    z-index: 10;
    margin-top: -100px;
}

/* Form Styles */
.form-card { width: 100%; }

.form-fade-enter-active, .form-fade-leave-active { 
    transition: all 0.4s ease; 
}
.form-fade-enter-from { 
    opacity: 0; 
    transform: translateX(20px); 
}
.form-fade-leave-to { 
    opacity: 0; 
    transform: translateX(-20px); 
}

/* Typography & Visuals */
.hero-section h1 { 
    font-size: 56px; 
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
.form-card h2 { 
    font-size: 44px; 
    margin-bottom: 40px; 
    line-height: 1.2; 
}
.form-card h2 span { 
    color: #2196f3; 
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
}
.nav-links li.active a { 
    color: white; 
    border-bottom: 2px solid #2196f3; 
    padding-bottom: 5px; 
}

/* Inputs and Buttons */
.input-group { 
    margin-bottom: 20px; 
}
.input-group label { 
    display: block; 
    font-size: 11px; 
    color: #2196f3; 
    margin-bottom: 8px; 
    font-weight: 600; 
    text-transform: uppercase; 
}

.custom-v-input :deep(.v-field) {
    background: rgba(42, 45, 55, 0.6) !important;
    border-radius: 14px !important;
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
    height: 52px !important;
}
.custom-v-input :deep(.v-field__outline) { 
    display: none; 
}
.password-group .custom-v-input :deep(.v-field) { 
    border: 1px solid #2196f3 !important; 
}

.row { display: flex; gap: 20px; }
.row .input-group { flex: 1; }

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

.btn-primary, .btn-submit { 
    background: #2196f3 !important; 
    color: white !important; 
    text-transform: none !important; 
}
.btn-outline { 
    
    border: 1px solid #555 !important; 
    color: white !important; 
    border-radius: 30px !important; 
    height: 48px !important; 
    text-transform: none !important; 
}
.btn-submit { 
    height: 60px !important; 
    border-radius: 18px !important; 
    font-size: 17px !important; 
    font-weight: 600 !important; 
}
.glow { 
    box-shadow: 0 5px 20px rgba(33, 150, 243, 0.4); 
}

@media (max-width: 1000px) {
    .content-inner { 
        flex-direction: column; 
        text-align: center; 
        gap: 50px; 
    }
    .hero-btns { justify-content: center; }
}
</style>