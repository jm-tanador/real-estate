<template>
  <v-app class="page-wrapper-main">
    <!-- Navigation Bar (Modified only to include scroll links) -->
    <nav class="navbar" :class="{ 'scrolled': isScrolled }">
      <div class="logo">
        <span class="t-bar"></span>
        <span class="logo-text">REAL ESTATE<span>.</span></span>
      </div>

      <ul class="nav-links d-none d-md-flex">
        <li><a href="#" @click.prevent="scrollTo('home-view')">Home</a></li>
        <li :class="{ 'active': activeSection === 'auth-view' }">
          <a href="#" @click.prevent="scrollTo('auth-view')">Log In</a>
        </li>
        <li><a href="#" @click.prevent="scrollTo('about-view')">About Us</a></li>
      </ul>

      <div>
        <ul class="nav-links d-none d-md-flex">
          <li><a :href="img"><v-icon class="icon-btn" icon="mdi-twitter"></v-icon></a></li>
          <li><a :href="img"><v-icon class="icon-btn" icon="mdi-facebook"></v-icon></a></li>
          <li><a :href="img"><v-icon class="icon-btn-ig" icon="mdi-instagram"></v-icon></a></li>
        </ul>
      </div>
    </nav>

    <v-main class="main-scroll-container">
      <!-- SECTION 1: NEW HOME VIEW (From Image - Fitted to Screen) -->
      <section id="home-view" class="section-container home-bg">
        <div class="home-content-fitted">
          <div class="hero-center">
            <h1>Find Your Future Home</h1>
            <p>Discover exclusive luxury properties curated for your lifestyle.</p>
            
            <!-- Search Bar Recreation -->
            <div class="search-bar-ui">
              <div class="search-item">Location <v-icon size="small">mdi-chevron-down</v-icon></div>
              <div class="search-divider"></div>
              <div class="search-item">Property Type <v-icon size="small">mdi-chevron-down</v-icon></div>
              <div class="search-divider"></div>
              <div class="search-item">Price Range <v-icon size="small">mdi-chevron-down</v-icon></div>
              <v-btn class="search-btn-blue" elevation="0">Search</v-btn>
            </div>
          </div>

          <!-- Featured Properties (Bottom of Home Screen) -->
          <div class="featured-bottom">
            <h2 class="featured-title">Featured Properties</h2>
            <div class="property-grid">
              <div v-for="(prop, i) in properties" :key="i" class="prop-card">
                <div class="prop-img-box">
                  <img :src="prop.img" />
                  <div class="prop-price">${{ prop.price }}</div>
                </div>
                <div class="prop-info">
                  <p class="prop-addr">{{ prop.address }}</p>
                  <div class="prop-icons">
                    <span><v-icon size="16">mdi-bed-outline</v-icon> {{ prop.beds }} Beds</span>
                    <span><v-icon size="16">mdi-shower-outline</v-icon> {{ prop.baths }} Baths</span>
                    <span><v-icon size="16">mdi-arrow-expand-all</v-icon> {{ prop.sqft }} Sq Ft</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION 2: YOUR ORIGINAL LOGIN/REGISTER VIEW -->
      <section id="auth-view" class="section-container auth-page-bg">
        <div class="content-container">
          <div class="content-inner">
            <!-- Left Side: Your original Hero Text -->
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

            <!-- Right Side: Your original Forms -->
            <div class="form-section">
              <transition name="form-fade" mode="out-in">
                <!-- LOGIN FORM -->
                <div v-if="isLogin" class="form-card" key="login">
                  <h2>Welcome <br />back<span>.</span></h2>
                  <form @submit.prevent>
                    <div class="input-group">
                      <label>Email or Username</label>
                      <v-text-field placeholder="juandelacruz@gmail.com" variant="outlined" hide-details class="custom-v-input" autocomplete="off"></v-text-field>
                    </div>
                    <div class="input-group password-group">
                      <label>Password</label>
                      <v-text-field type="password" variant="outlined" hide-details class="custom-v-input" placeholder="Enter password" autocomplete="off"></v-text-field>
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
                      <v-text-field autocomplete="off" placeholder="junadelacruz" variant="outlined" hide-details class="custom-v-input"></v-text-field>
                    </div>
                    <div class="row">
                      <div class="input-group">
                        <label>First Name</label>
                        <v-text-field autocomplete="off" placeholder="Juan" variant="outlined" hide-details class="custom-v-input"></v-text-field>
                      </div>
                      <div class="input-group">
                        <label>Last Name</label>
                        <v-text-field autocomplete="off" placeholder="Dela Cruz" variant="outlined" hide-details class="custom-v-input"></v-text-field>
                      </div>
                    </div>
                    <div class="input-group">
                      <label>Email</label>
                      <v-text-field autocomplete="off" placeholder="juandelacruz@gmail.com" type="email" variant="outlined" hide-details class="custom-v-input"></v-text-field>
                    </div>
                    <div class="input-group password-group">
                      <label>Password</label>
                      <v-text-field autocomplete="off" type="password" variant="outlined" hide-details class="custom-v-input" placeholder="Enter password"></v-text-field>
                    </div>
                    <p class="login-link">Already have an account? <a href="#" @click.prevent="isLogin = true">Log In</a></p>
                    <v-btn block class="btn-submit glow">Create Account</v-btn>
                  </form>
                </div>
              </transition>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION 3: ABOUT US -->
      <section id="about-view" class="section-container about-page">
        <v-container>
            <h1 class="text-center">About Our Agency</h1>
            <p class="text-center subtext">Your original about content can go here.</p>
        </v-container>
      </section>
    </v-main>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      img: "https://media.newyorker.com/photos/59095bb86552fa0be682d9d0/master/pass/Monkey-Selfie.jpg",
      isScrolled: false,
      isLogin: true,
      activeSection: 'home-view',
      properties: [
        { address: '123 Ocean View Drive, Malibu, CA', price: '12,500,000', beds: 6, baths: 7, sqft: '8,200', img: 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&q=80&w=800' },
        { address: '456 Skyline Tower, New York, NY', price: '9,800,000', beds: 4, baths: 5, sqft: '5,500', img: 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800' },
        { address: '789 Rolling Hills Estate, Aspen, CO', price: '15,000,000', beds: 8, baths: 9, sqft: '11,000', img: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=800' }
      ]
    }
  },
  methods: {
    handleScroll() {
      this.isScrolled = window.scrollY > 50;
    },
    scrollTo(id) {
      document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
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

/* Global Reset for your theme */
.page-wrapper-main {
    background-color: #000 !important;
    font-family: 'Poppins', sans-serif !important;
    color: white !important;
}

.section-container {
    min-height: 100vh;
    width: 100%;
    position: relative;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

/* Navbar Styles (Your original + positioning) */
.navbar {
    position: fixed;
    top: 0; left: 0; width: 100%; z-index: 100;
    display: flex; align-items: center; justify-content: space-between;
    padding: 40px 8%; transition: all 0.4s ease;
    background: transparent; box-sizing: border-box;
}
.navbar.scrolled {
    padding: 15px 8%;
    background: rgba(20, 22, 28, 0.95);
    backdrop-filter: blur(10px);
}

/* --- HOME VIEW (From the Image) FITTED --- */
.home-bg {
    background: url('https://images.unsplash.com/photo-1600607687940-4e524cb35a36?auto=format&fit=crop&q=80&w=1920') no-repeat center center;
    background-size: cover;
}
.home-content-fitted {
    height: 100vh;
    background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,1) 95%);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 120px 5% 40px 5%; /* Adjusting for navbar and cards */
}
.hero-center { text-align: center; }
.hero-center h1 { font-size: clamp(36px, 6vh, 60px); font-weight: 700; margin-bottom: 10px; }
.hero-center p { font-size: 18px; color: #ccc; margin-bottom: 30px; }

.search-bar-ui {
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255,255,255,0.1);
    display: inline-flex; align-items: center;
    padding: 8px; border-radius: 12px; gap: 15px;
}
.search-item { padding: 0 20px; font-size: 14px; color: #bbb; cursor: pointer; display: flex; align-items: center; gap: 5px; }
.search-divider { width: 1px; height: 25px; background: rgba(255,255,255,0.1); }
.search-btn-blue { background: #2196f3 !important; color: white !important; height: 45px !important; border-radius: 10px !important; text-transform: none !important; font-weight: 600 !important; }

.featured-bottom { width: 100%; max-width: 1200px; margin: 0 auto; }
.featured-title { text-align: center; font-size: 26px; margin-bottom: 20px; font-weight: 600; }
.property-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.prop-card { background: #16181d; border-radius: 16px; border: 1px solid rgba(255,255,255,0.05); overflow: hidden; }
.prop-img-box { position: relative; height: clamp(140px, 18vh, 180px); }
.prop-img-box img { width: 100%; height: 100%; object-fit: cover; }
.prop-price { position: absolute; top: 12px; right: 12px; background: #2196f3; padding: 4px 12px; border-radius: 6px; font-weight: 700; font-size: 13px; }
.prop-info { padding: 15px; }
.prop-addr { font-size: 14px; color: #ddd; margin-bottom: 10px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.prop-icons { display: flex; gap: 12px; font-size: 12px; color: #2196f3; font-weight: 600; }

/* --- AUTH PAGE (YOUR ORIGINAL STYLES RESTORED) --- */
.auth-page-bg {
    background-color: #1a1c23 !important;
    background-image: url('images/login-bg.jpg') !important;
    background-size: cover;
    background-position: center;
}
/* This provides the dark gradient over your image */
.auth-page-bg::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(90deg, rgba(20, 22, 28, 0.75) 0%, rgba(20, 22, 28, 0.95) 60%, rgba(20, 22, 28, 1) 100%);
    z-index: 1;
}

.content-container {
    position: relative;
    z-index: 5;
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.content-inner {
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: center;
    gap: 80px;
}

.hero-section { flex: 0 1 600px; }
.form-section { flex: 0 1 450px; min-height: 580px; position: relative; z-index: 10; }

/* Restoring all your specific text/button styles */
.hero-section h1 { font-size: 56px; line-height: 1.1; margin-bottom: 25px; font-weight: 700; }
.tagline { letter-spacing: 3px; font-size: 14px; margin-bottom: 15px; color: #ccc; font-weight: 600; }
.highlight { color: #2196f3; }
.subtext { color: #aaa; font-size: 16px; line-height: 1.8; margin-bottom: 45px; }
.hero-btns { display: flex; gap: 20px; }

.form-card h2 { font-size: 44px; margin-bottom: 40px; line-height: 1.2; }
.form-card h2 span { color: #2196f3; }

.logo { display: flex; align-items: center; font-size: 24px; font-weight: 700; position: relative; }
.t-bar { width: 14px; height: 4px; background: #2196f3; position: absolute; left: -2px; top: 15px; }
.logo-text span { color: #2196f3; }
.nav-links { display: flex; list-style: none; gap: 40px; }
.nav-links a { color: #a0a0a0; text-decoration: none; font-size: 15px; font-weight: 500; }
.nav-links li.active a { color: white; border-bottom: 2px solid #2196f3; padding-bottom: 5px; }

.input-group { margin-bottom: 20px; }
.input-group label { display: block; font-size: 11px; color: #2196f3; margin-bottom: 8px; font-weight: 600; text-transform: uppercase; }

.custom-v-input :deep(.v-field) {
    background: rgba(42, 45, 55, 0.6) !important;
    border-radius: 14px !important;
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
    height: 52px !important;
}
.custom-v-input :deep(.v-field__outline) { display: none; }

.btn-primary { background: #2196f3 !important; color: white !important; height: 48px !important; padding: 0 40px !important; border-radius: 30px !important; font-weight: 600 !important; text-transform: none !important; }
.btn-submit { height: 60px !important; background: #2196f3 !important; color: white !important; border-radius: 18px !important; font-weight: 600 !important; font-size: 17px !important; text-transform: none !important; }
.glow { box-shadow: 0 5px 20px rgba(33, 150, 243, 0.4); }

.login-link { text-align: right; font-size: 13px; color: #aaa; margin: 15px 0 30px 0; }
.login-link a { color: #2196f3; text-decoration: none; font-weight: 600; }

/* Transitions */
.form-fade-enter-active, .form-fade-leave-active { transition: all 0.4s ease; }
.form-fade-enter-from { opacity: 0; transform: translateX(20px); }
.form-fade-leave-to { opacity: 0; transform: translateX(-20px); }

/* About Section Placeholder */
.about-page { background: #0c0e12; align-items: center; justify-content: center; }

@media (max-width: 1000px) {
    .content-inner { flex-direction: column; text-align: center; gap: 50px; }
    .property-grid { grid-template-columns: 1fr; }
    .home-content-fitted { height: auto; padding-top: 100px; }
    .search-bar-ui { flex-direction: column; width: 90%; }
    .search-divider { display: none; }
}
</style>