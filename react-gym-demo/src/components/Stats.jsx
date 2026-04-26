import React from 'react';

const Stats = () => {
  return (
    <section className="stats-container pb-5">
      <div className="container">
        <div className="row g-4 justify-content-center">
          <div className="col-md-4 col-sm-6 mb-4 mb-md-0">
            <div className="stat-card">
              <div className="stat-number">150+</div>
              <h5 className="stat-title">Lokasi Gym</h5>
              <p className="stat-desc">Tersebar di berbagai kota</p>
            </div>
          </div>
          <div className="col-md-4 col-sm-6 mb-4 mb-md-0">
            <div className="stat-card">
              <div className="stat-number">50+</div>
              <h5 className="stat-title">Fasilitas Lengkap</h5>
              <p className="stat-desc">Peralatan modern dan berkualitas</p>
            </div>
          </div>
          <div className="col-md-4 col-sm-6">
            <div className="stat-card">
              <div className="stat-number">25</div>
              <h5 className="stat-title">Kota Tersedia</h5>
              <p className="stat-desc">Jangkauan luas di seluruh Indonesia</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Stats;
