import React from 'react';

const Hero = () => {
  return (
    <header className="hero-modern" id="home">
      <div className="hero-overlay"></div>
      <div className="hero-content">
        <h1 className="title-neon">Unleash Your <span>Potential</span></h1>
        <p className="subtitle-modern">
          Temukan kemudahan mencari gym di sekitarmu dengan harga terbaik dan fasilitas terlengkap. Mulai transformasi dirimu sekarang.
        </p>
        <a href="#gym-locations" className="btn-neon">Cari Gym Sekarang</a>
      </div>
    </header>
  );
};

export default Hero;
