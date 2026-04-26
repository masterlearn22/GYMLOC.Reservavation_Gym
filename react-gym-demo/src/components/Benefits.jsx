import React from 'react';

const Benefits = () => {
  return (
    <section className="py-5" style={{ backgroundColor: '#0f0f0f' }} id="gym-benefits">
      <div className="container">
        <div className="row mb-5 text-center">
          <div className="col-12">
            <h2 className="section-title">Kenapa Memilih <span>Gymloc?</span></h2>
            <p className="section-subtitle">Pengalaman fitness terbaik dengan berbagai keunggulan</p>
          </div>
        </div>
        <div className="row g-4">
          <div className="col-md-4 mb-4">
            <div className="glass-card p-4 text-center">
              <div className="benefit-icon">
                <i className="fas fa-dumbbell"></i>
              </div>
              <h4 className="text-white mb-3">Peralatan Modern</h4>
              <p className="text-muted">Dilengkapi peralatan fitness tercanggih, terawat, dan berstandar internasional.</p>
            </div>
          </div>
          <div className="col-md-4 mb-4">
            <div className="glass-card p-4 text-center">
              <div className="benefit-icon">
                <i className="fas fa-user-check"></i>
              </div>
              <h4 className="text-white mb-3">Pelatih Bersertifikat</h4>
              <p className="text-muted">Pelatih profesional yang siap membantu Anda mencapai body goals dengan efektif.</p>
            </div>
          </div>
          <div className="col-md-4 mb-4">
            <div className="glass-card p-4 text-center">
              <div className="benefit-icon">
                <i className="fas fa-clock"></i>
              </div>
              <h4 className="text-white mb-3">Jadwal Fleksibel</h4>
              <p className="text-muted">Jam operasional yang fleksibel untuk menyesuaikan dengan padatnya rutinitas Anda.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Benefits;
