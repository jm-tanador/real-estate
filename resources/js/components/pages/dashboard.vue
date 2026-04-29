<template>
    <div class="site-wrapper">
        <!-- Navigation Header -->
        <header class="navbar">
            <div class="logo">REAL ESTATE <span class="author">by jmtanador</span></div>
            <nav>
                <a href="#" class="active">Home</a>
                <a href="#">Log In</a>
                <a href="#">About Us</a>
            </nav>
            <div class="nav-right">
                <div class="theme-toggle"></div>
                <div class="social-icons">
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-overlay">
                <h1>Find Your Future Home<span>.</span></h1>
                <p>Discover exclusive luxury properties curated for your lifestyle.</p>

                <!-- Floating Search Bar -->
                <div class="search-container">
                    <div class="search-item">
                        <span>Location</span>
                        <select><option>All Locations</option></select>
                    </div>
                    <div class="search-item">
                        <span>Property Type</span>
                        <select><option>All Types</option></select>
                    </div>
                    <div class="search-item">
                        <span>Price Range</span>
                        <select><option>All Prices</option></select>
                    </div>
                    <button class="btn-search">Search</button>
                </div>
            </div>
        </section>

        <!-- Featured Properties Section -->
        <section class="featured-section">
            <h2>Featured Properties</h2>
            
            <div v-if="loading" class="loading">Loading listings...</div>

            <div v-else class="property-grid">
                <!-- Card Item -->
                <div v-for="property in properties" :key="property.id" class="property-card">
                    <div class="card-image-wrapper">
                        <!-- We use a default luxury image if none exists in Firebase -->
                        <img :src="property.image || 'https://images.unsplash.com/photo-1600585154340-be6191da95b8?auto=format&fit=crop&w=800&q=80'" alt="Property">
                        <div class="price-tag">${{ Number(property.price).toLocaleString() }}</div>
                    </div>
                    <div class="card-content">
                        <h3>{{ property.title }}</h3>
                        <p class="location-text"><i class="fas fa-map-marker-alt"></i> {{ property.location }}</p>
                        <div class="property-specs">
                            <span><i class="fas fa-bed"></i> {{ property.beds || 4 }} Beds</span>
                            <span><i class="fas fa-bath"></i> {{ property.baths || 3 }} Baths</span>
                            <span><i class="fas fa-expand-arrows-alt"></i> {{ property.sqft || '2,500' }} Sq Ft</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Floating Chat Button -->
        <div class="chat-btn">
            <i class="fas fa-comment-dots"></i>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            properties: [],
            loading: true,
        }
    },
    methods: {
        async fetchProperties() {
            try {
                const response = await axios.get('/api/properties');
                
                // Safety Check: Only save the data if it is actually an array
                if (Array.isArray(response.data)) {
                    this.properties = response.data;
                } else {
                    console.error("API did not return an array. Check Laravel routing.");
                    this.properties = []; 
                }
            } catch (error) {
                console.error("Error:", error);
            } finally {
                this.loading = false;
            }
        },
    },
    mounted () {
        this.fetchProperties();
    },
}

</script>

<style scoped>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

.site-wrapper {
    background-color: #0b0e14; /* Dark Background */
    color: white;
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
}

/* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 50px;
}
.logo { font-weight: 800; font-size: 1.2rem; letter-spacing: 1px; }
.author { font-weight: 300; font-size: 0.8rem; color: #888; margin-left: 5px; }
nav a { color: #888; text-decoration: none; margin: 0 15px; font-size: 0.9rem; }
nav a.active { color: white; border-bottom: 2px solid #3498db; padding-bottom: 5px; }

/* Hero Section */
.hero {
    height: 60vh;
    background: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1600&q=80');
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}
.hero-overlay {
    background: rgba(0,0,0,0.4);
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.hero h1 { font-size: 3.5rem; margin-bottom: 10px; }
.hero h1 span { color: #3498db; }
.hero p { color: #ccc; font-size: 1.1rem; margin-bottom: 40px; }

/* Search Bar */
.search-container {
    background: rgba(15, 15, 15, 0.8);
    backdrop-filter: blur(10px);
    padding: 15px 30px;
    border-radius: 50px;
    display: flex;
    gap: 30px;
    align-items: center;
    border: 1px solid rgba(255,255,255,0.1);
}
.search-item { display: flex; flex-direction: column; text-align: left; }
.search-item span { font-size: 0.7rem; color: #888; text-transform: uppercase; margin-bottom: 5px; }
.search-item select { background: transparent; color: white; border: none; font-size: 0.9rem; outline: none; }
.btn-search {
    background: #3498db;
    color: white;
    border: none;
    padding: 12px 35px;
    border-radius: 30px;
    font-weight: bold;
    cursor: pointer;
}

/* Featured Properties */
.featured-section { padding: 60px 50px; text-align: center; }
.featured-section h2 { font-size: 2rem; margin-bottom: 40px; }

.property-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
}

/* Property Card */
.property-card {
    background: #161b22;
    border-radius: 15px;
    overflow: hidden;
    text-align: left;
    transition: transform 0.3s ease;
}
.property-card:hover { transform: translateY(-10px); }
.card-image-wrapper { position: relative; height: 230px; }
.card-image-wrapper img { width: 100%; height: 100%; object-fit: cover; }
.price-tag {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #3498db;
    padding: 5px 15px;
    border-radius: 5px;
    font-weight: bold;
    font-size: 0.9rem;
}
.card-content { padding: 20px; }
.card-content h3 { font-size: 1.1rem; margin-bottom: 10px; }
.location-text { color: #888; font-size: 0.85rem; margin-bottom: 20px; }
.property-specs {
    display: flex;
    justify-content: space-between;
    border-top: 1px solid #333;
    padding-top: 15px;
    color: #3498db;
    font-size: 0.85rem;
}

/* Chat Button */
.chat-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: #3498db;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}
</style>