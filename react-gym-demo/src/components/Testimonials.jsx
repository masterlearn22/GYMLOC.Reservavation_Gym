import React from 'react';

const Testimonials = () => {
  return (
    <section className="py-5" id="testimonials">
      <div className="container">
        <div className="row mb-5 text-center">
          <div className="col-12">
            <h2 className="section-title">Apa Kata <span>Member Kami</span></h2>
          </div>
        </div>
        <div className="row g-4">
          <div className="col-md-4 mb-4">
            <div className="glass-card p-4">
              <div className="d-flex align-items-center mb-3">
                <div className="text-warning mr-2">
                  <i className="fas fa-star"></i><i className="fas fa-star"></i><i className="fas fa-star"></i><i className="fas fa-star"></i><i className="fas fa-star"></i>
                </div>
              </div>
              <p className="text-muted font-italic mb-4">"Saya sangat puas dengan fasilitas dan pelatih di Gymloc. Sangat memudahkan dalam mencari tempat latihan terdekat!"</p>
              <h6 className="text-white mb-0">- Rina S., Jakarta</h6>
            </div>
          </div>
          <div className="col-md-4 mb-4">
            <div className="glass-card p-4">
              <div className="d-flex align-items-center mb-3">
                <div className="text-warning mr-2">
                  <i className="fas fa-star"></i><i className="fas fa-star"></i><i className="fas fa-star"></i><i className="fas fa-star"></i><i className="fas fa-star-half-alt"></i>
                </div>
              </div>
              <p className="text-muted font-italic mb-4">"Pilihan gym-nya banyak banget dan harganya transparan. Sistem booking-nya juga super gampang. Recommended!"</p>
              <h6 className="text-white mb-0">- Andi P., Bandung</h6>
            </div>
          </div>
          <div className="col-md-4 mb-4">
            <div className="glass-card p-4">
              <div className="d-flex align-items-center mb-3">
                <div className="text-warning mr-2">
                  <i className="fas fa-star"></i><i className="fas fa-star"></i><i className="fas fa-star"></i><i className="fas fa-star"></i><i className="fas fa-star"></i>
                </div>
              </div>
              <p className="text-muted font-italic mb-4">"Fasilitas yang lengkap dan suasana gym yang nyaman bikin betah olahraga. UI website-nya juga keren abis!"</p>
              <h6 className="text-white mb-0">- Siti A., Surabaya</h6>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Testimonials;
