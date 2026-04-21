<template>
  <v-app class="page-wrapper-main" :class="{ 'light-mode': !isDarkMode }">
    <!-- Navigation Bar -->
    <nav class="navbar" :class="{ 'scrolled': activeIndex > 0 }">
      <div class="logo">
        <span class="t-bar"></span>
        <span class="logo-text">REAL ESTATE<span>.</span></span>
      </div>

      <ul class="nav-links d-none d-md-flex">
        <li :class="{ 'active': activeIndex === 0 }"><a href="#" @click.prevent="scrollTo(0)">Home</a></li>
        <li :class="{ 'active': activeIndex === 1 }"><a href="#" @click.prevent="scrollTo(1)">Log In</a></li>
        <li :class="{ 'active': activeIndex === 2 }"><a href="#" @click.prevent="scrollTo(2)">About Us</a></li>
      </ul>

      <!-- Navbar Actions -->
      <div class="nav-actions d-none d-md-flex align-center">
        <!-- THEME SWITCH -->
        <div class="theme-switch" @click="isDarkMode = !isDarkMode" :class="{ 'is-light': !isDarkMode }">
          <div class="switch-ball">
            <v-icon size="14" :icon="isDarkMode ? 'mdi-moon-waning-crescent' : 'mdi-white-balance-sunny'"></v-icon>
          </div>
        </div>

        <div class="nav-socials ml-4">
          <v-icon class="icon-btn mx-2" icon="mdi-twitter"></v-icon>
          <v-icon class="icon-btn mx-2" icon="mdi-facebook"></v-icon>
          <v-icon class="icon-btn-ig mx-2" icon="mdi-instagram"></v-icon>
        </div>
      </div>
    </nav>

    <!-- THE SMOOTH SLIDER CONTAINER -->
    <div class="slider-wrapper" :style="{ transform: `translateY(-${activeIndex * 100}vh)` }">
      
      <!-- SECTION 1: HOME (FITTED) -->
      <section class="page-section home-hero-bg">
        <div class="home-overlay">
          <div class="home-content">
            <div class="hero-top">
              <h1>Find Your Future Home</h1>
              <p>Discover exclusive luxury properties curated for your lifestyle.</p>
              <div class="search-bar-ui">
                <div class="s-item">Location <v-icon size="small">mdi-chevron-down</v-icon></div>
                <div class="s-div"></div>
                <div class="s-item">Property Type <v-icon size="small">mdi-chevron-down</v-icon></div>
                <div class="s-div"></div>
                <div class="s-item">Price Range <v-icon size="small">mdi-chevron-down</v-icon></div>
                <v-btn class="s-btn" color="#2196f3">Search</v-btn>
              </div>
            </div>

            <div class="featured-properties-row">
              <h3>Featured Properties</h3>
              <div class="prop-grid">
                <div v-for="(p, i) in featured" :key="i" class="prop-card">
                  <div class="p-img"><img :src="p.img"><div class="p-price">${{p.price}}</div></div>
                  <div class="p-info">
                    <p>{{p.addr}}</p>
                    <div class="p-specs">
                      <span><v-icon size="14">mdi-bed-outline</v-icon> {{p.bed}}</span>
                      <span><v-icon size="14">mdi-shower-outline</v-icon> {{p.bath}}</span>
                      <span><v-icon size="14">mdi-arrow-expand-all</v-icon> {{p.sqft}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION 2: ORIGINAL LOGIN/REGISTER -->
      <section class="page-section auth-bg">
        <div class="content-container">
          <div class="content-inner">
            <div class="hero-section">
              <p class="tagline">START YOUR JOURNEY</p>
              <h1>Unlock the homeowner <br /><span class="highlight">inside YOU</span>,<br /> Secure your <br />Dream Property</h1>
              <p class="subtext">Get started with the most trusted platform to browse, tour, and buy your next home.</p>
              <div class="hero-btns">
                <v-btn variant="outlined" class="btn-outline">View Listings</v-btn>
                <v-btn class="btn-primary glow">Book a tripping</v-btn>
              </div>
            </div>

            <div class="form-section">
              <transition name="form-fade" mode="out-in">
                <div v-if="isLogin" class="form-card" key="login">
                  <h2>Welcome <br />back<span>.</span></h2>
                  <form @submit.prevent>
                    <div class="input-group">
                      <label>Email or Username</label>
                      <v-text-field placeholder="juandelacruz@gmail.com" variant="outlined" hide-details class="custom-v-input"></v-text-field>
                    </div>
                    <div class="input-group">
                      <label>Password</label>
                      <v-text-field type="password" variant="outlined" hide-details class="custom-v-input" placeholder="Enter password"></v-text-field>
                    </div>
                    <p class="login-link">Don't have an account? <a href="#" @click.prevent="isLogin = false">Join now</a></p>
                    <v-btn block class="btn-submit glow">Login Account</v-btn>
                  </form>
                </div>
                <div v-else class="form-card" key="register">
                  <h2>Create <br />new account<span>.</span></h2>
                  <form @submit.prevent>
                    <div class="input-group"><label>Username</label><v-text-field variant="outlined" hide-details class="custom-v-input"></v-text-field></div>
                    <div class="input-group"><label>Email</label><v-text-field variant="outlined" hide-details class="custom-v-input"></v-text-field></div>
                    <div class="input-group"><label>Password</label><v-text-field type="password" variant="outlined" hide-details class="custom-v-input"></v-text-field></div>
                    <p class="login-link">Already have an account? <a href="#" @click.prevent="isLogin = true">Log In</a></p>
                    <v-btn block class="btn-submit glow">Create Account</v-btn>
                  </form>
                </div>
              </transition>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION 3: ABOUT -->
      <section class="page-section about-bg">
          <h1 class="text-h2 font-weight-bold">About Us</h1>
          <p class="subtext mt-4">Luxury real estate redefined.</p>
      </section>

    </div>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      isDarkMode: true,
      isLogin: true,
      activeIndex: 0,
      isScrolling: false,
      featured: [
        { addr: '123 Ocean View Drive, Malibu, CA', price: '12,500,000', bed: 6, bath: 7, sqft: '8,200', img: 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=800' },
        { addr: '456 Skyline Tower, New York, NY', price: '9,800,000', bed: 4, bath: 5, sqft: '5,500', img: 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800' },
        { addr: '789 Rolling Hills Estate, Aspen, CO', price: '15,000,000', bed: 8, bath: 9, sqft: '11,000', img: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800' }
      ]
    }
  },
  methods: {
    handleWheel(e) {
      if (this.isScrolling) return;
      if (e.deltaY > 30 && this.activeIndex < 2) {
        this.scrollTo(this.activeIndex + 1);
      } else if (e.deltaY < -30 && this.activeIndex > 0) {
        this.scrollTo(this.activeIndex - 1);
      }
    },
    scrollTo(index) {
      this.isScrolling = true;
      this.activeIndex = index;
      setTimeout(() => { this.isScrolling = false; }, 1000); 
    }
  },
  mounted() {
    window.addEventListener('wheel', this.handleWheel, { passive: false });
  },
  unmounted() {
    window.removeEventListener('wheel', this.handleWheel);
  }
}
</script>

<style>
/* GLOBAL SCROLLBAR HIDE */
html, body {
  margin: 0; padding: 0; overflow: hidden !important;
  height: 100%; width: 100%; scrollbar-width: none; -ms-overflow-style: none; 
}
html::-webkit-scrollbar, body::-webkit-scrollbar { display: none; width: 0 !important; height: 0 !important; }

/* --- THEME VARIABLES --- */
:root {
  --bg-color: #000;
  --text-color: #ffffff;
  --subtext-color: #aaaaaa;
  --card-bg: #1a1c23;
  --input-bg: rgba(42, 45, 55, 0.6);
  --nav-bg: rgba(10, 11, 14, 0.9);
  --grad-home: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,1) 95%);
  --grad-auth: linear-gradient(90deg, rgba(20, 22, 28, 0.75) 0%, rgba(0,0,0,1) 100%);
}
.light-mode {
  --bg-color: #f4f7f9;
  --text-color: #1a1c23;
  --subtext-color: #555555;
  --card-bg: #ffffff;
  --input-bg: #e2e5e9;
  --nav-bg: rgba(255, 255, 255, 0.9);
  --grad-home: linear-gradient(to bottom, rgba(255,255,255,0.2) 0%, rgba(244,247,249,1) 95%);
  --grad-auth: linear-gradient(90deg, rgba(255, 255, 255, 0.8) 0%, rgba(244,247,249,1) 100%);
}

.page-wrapper-main {
  background: var(--bg-color) !important;
  color: var(--text-color) !important;
  transition: background 0.5s ease, color 0.5s ease;
}

/* Switch UI */
.theme-switch {
  width: 54px; height: 28px; background: #2a2d37; border-radius: 20px;
  position: relative; cursor: pointer; border: 1px solid rgba(255,255,255,0.1); transition: 0.3s;
}
.theme-switch.is-light { background: #2196f3; border-color: #2196f3; }
.switch-ball {
  width: 22px; height: 22px; background: white; border-radius: 50%;
  position: absolute; top: 2px; left: 2px; display: flex; align-items: center; justify-content: center;
  transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); color: #1a1c23;
}
.theme-switch.is-light .switch-ball { left: 28px; color: #2196f3; }
</style>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

.page-wrapper-main { font-family: 'Poppins', sans-serif !important; overflow: hidden; }

/* Smooth Slider Logic */
.slider-wrapper {
  height: 100vh; width: 100%; transition: transform 0.8s cubic-bezier(0.645, 0.045, 0.355, 1); will-change: transform;
}
.page-section { height: 100vh; width: 100%; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; }

/* --- NAVBAR (ORIGINAL PADDING) --- */
.navbar {
    position: fixed; top: 0; left: 0; width: 100%; z-index: 1000;
    display: flex; align-items: center; justify-content: space-between;
    padding: 35px 8%; transition: 0.5s ease; background: transparent;
}
.navbar.scrolled { padding: 15px 8%; background: var(--nav-bg); backdrop-filter: blur(15px); }
.logo { font-size: 24px; font-weight: 700; position: relative; color: var(--text-color); display: flex; align-items: center;}
.t-bar { width: 14px; height: 4px; background: #2196f3; position: absolute; left: -2px; top: 15px; }
.logo-text span { color: #2196f3; }
.nav-links { list-style: none; display: flex; gap: 40px; }
.nav-links a { color: var(--subtext-color); text-decoration: none; font-size: 14px; font-weight: 600; transition: 0.3s; }
.nav-links li.active a { color: var(--text-color); border-bottom: 2px solid #2196f3; padding-bottom: 5px; }
.icon-btn, .icon-btn-ig { color: var(--subtext-color); cursor: pointer; transition: 0.3s; }
.icon-btn:hover { color: #2196f3; }

/* --- HOME VIEW (FITTED) --- */
.home-hero-bg { background: url('https://images.unsplash.com/photo-1600607687940-4e524cb35a36?w=1920') no-repeat center/cover; }
.home-overlay { width: 100%; height: 100%; background: var(--grad-home); display: flex; align-items: center; justify-content: center; transition: background 0.5s; }
.home-content { width: 85%; max-width: 1200px; height: 82%; display: flex; flex-direction: column; justify-content: space-between; align-items: center; }
.hero-top { text-align: center; }
.hero-top h1 { font-size: clamp(34px, 6vh, 56px); font-weight: 700; margin-bottom: 5px; color: var(--text-color);}
.hero-top p { color: var(--subtext-color); margin-bottom: 20px; font-size: 16px; }

.search-bar-ui { background: rgba(255,255,255,0.06); backdrop-filter: blur(15px); border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); padding: 8px; display: inline-flex; align-items: center; gap: 10px; }
.light-mode .search-bar-ui { background: rgba(0,0,0,0.05); }
.s-item { padding: 0 15px; font-size: 13px; color: var(--subtext-color); cursor: pointer; display: flex; gap: 5px; }
.s-div { width: 1px; height: 20px; background: rgba(128,128,128,0.2); }
.s-btn { text-transform: none !important; font-weight: 700 !important; border-radius: 8px !important; }

.featured-properties-row h3 { text-align: center; font-size: 22px; margin-bottom: 15px; color: var(--text-color);}
.prop-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.prop-card { background: var(--card-bg); border-radius: 16px; overflow: hidden; border: 1px solid rgba(128,128,128,0.1); transition: background 0.5s; }
.p-img { position: relative; height: clamp(130px, 17vh, 170px); }
.p-img img { width: 100%; height: 100%; object-fit: cover; }
.p-price { position: absolute; top: 12px; right: 12px; background: #2196f3; padding: 4px 10px; border-radius: 6px; font-weight: 700; font-size: 12px; color: white;}
.p-info { padding: 15px; text-align: left;}
.p-info p { font-size: 13px; color: var(--text-color); margin-bottom: 8px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.p-specs { display: flex; gap: 12px; font-size: 11px; color: #2196f3; font-weight: 600; }

/* --- AUTH VIEW (ORIGINAL BUTTONS & INPUTS) --- */
.auth-bg { background-color: var(--card-bg); background-image: url('images/login-bg.jpg'); background-size: cover; transition: background-color 0.5s; }
.auth-bg::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: var(--grad-auth); transition: background 0.5s; }
.content-container { position: relative; z-index: 5; width: 100%; }
.content-inner { display: flex; align-items: center; justify-content: center; gap: 80px; width: 100%; }
.hero-section { flex: 0 1 550px; text-align: left;}
.form-section { flex: 0 1 420px; min-height: 550px; position: relative; }

/* Typography */
.hero-section h1 { font-size: 52px; line-height: 1.1; margin-bottom: 20px; font-weight: 700; color: var(--text-color);}
.tagline { letter-spacing: 3px; font-size: 13px; margin-bottom: 10px; color: var(--subtext-color); font-weight: 600; }
.highlight { color: #2196f3; }
.subtext { color: var(--subtext-color); font-size: 15px; line-height: 1.7; margin-bottom: 35px; }

/* Forms */
.form-card h2 { font-size: 40px; margin-bottom: 30px; line-height: 1.1; color: var(--text-color);}
.form-card h2 span { color: #2196f3; }
.input-group { margin-bottom: 15px; text-align: left;}
.input-group label { display: block; font-size: 10px; color: #2196f3; margin-bottom: 5px; font-weight: 700; text-transform: uppercase; }

/* ORIGINAL BUTTONS & INPUT SIZING */
.custom-v-input :deep(.v-field) {
    background: var(--input-bg) !important;
    border-radius: 12px !important;
    border: 1px solid rgba(128,128,128,0.1) !important;
    height: 50px !important;
    color: var(--text-color);
}
.custom-v-input :deep(.v-field__outline) { display: none; }

.btn-primary { background: #2196f3 !important; color: white !important; height: 48px !important; padding: 0 35px !important; border-radius: 30px !important; font-weight: 600 !important; text-transform: none !important; }
.btn-outline { border: 1px solid #555 !important; color: var(--text-color) !important; border-radius: 30px !important; height: 48px !important; text-transform: none !important; }
.btn-submit { height: 55px !important; background: #2196f3 !important; color: white !important; border-radius: 15px !important; font-weight: 600 !important; font-size: 16px !important; text-transform: none !important; }
.glow { box-shadow: 0 5px 20px rgba(33, 150, 243, 0.35); }

.login-link { text-align: right; font-size: 13px; color: var(--subtext-color); margin: 10px 0 25px 0; }
.login-link a { color: #2196f3; text-decoration: none; font-weight: 600; }

/* About */
.about-bg { background: var(--bg-color); flex-direction: column; color: var(--text-color); transition: background 0.5s; }

@media (max-width: 1000px) {
  .content-inner { flex-direction: column; text-align: center; gap: 40px; }
  .prop-grid { grid-template-columns: 1fr; }
}
</style>