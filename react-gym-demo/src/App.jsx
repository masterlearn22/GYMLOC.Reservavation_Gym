import React, { useEffect } from 'react';
import Navbar from './components/Navbar';
import Hero from './components/Hero';
import Stats from './components/Stats';
import GymList from './components/GymList';
import Benefits from './components/Benefits';
import Testimonials from './components/Testimonials';
import Footer from './components/Footer';

function App() {
  // Smooth scrolling effect similar to Blade template script
  useEffect(() => {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                  targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
  }, []);

  return (
    <>
      <Navbar />
      <Hero />
      <Stats />
      <GymList />
      <Benefits />
      <Testimonials />

      {/* CTA Section */}
      <section className="py-5 text-center mt-4">
        <div className="container">
          <div className="glass-card p-5" style={{ borderColor: 'var(--neon-accent)', boxShadow: '0 0 30px rgba(57,255,20,0.1)' }}>
            <h2 className="section-title mb-3">Mulai Transformasimu <span>Sekarang</span></h2>
            <p className="text-muted mb-4 lead">Bergabunglah dengan ribuan member lainnya dan temukan gym impianmu.</p>
            <a href="#gym-locations" className="btn-solid-neon px-5 py-3 text-uppercase" style={{ fontSize: '1.1rem', letterSpacing: '1px' }}>Eksplor Gym</a>
          </div>
        </div>
      </section>

      <Footer />
    </>
  );
}

export default App;
